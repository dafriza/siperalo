<?php

namespace App\Controllers;

use App\Models\ResorModel;
use App\Entities\ResorEntity;
use App\Controllers\BaseController;

class ResorController extends BaseController
{
    private $resorModel, $resorEntity;
    public function __construct()
    {
        $this->resorModel = new ResorModel();
        $this->resorEntity = new ResorEntity();
    }
    public function index()
    {
        $title = 'Resor';
        $resors = $this->resorModel->findAll();
        $data = compact('title', 'resors');
        // print_r($data);
        return view('Contents/resor/index', $data);
    }
    function add()
    {
        $title = 'Resor Add';
        $data = compact('title');
        return view('Contents/resor/add', $data);
    }
    function edit($id)
    {
        $title = 'Resor Edit';
        $findResor = $this->resorModel->find($id);
        $data = compact('title', 'findResor');
        return view('Contents/resor/edit', $data);
    }

    function update()
    {
        $dataAll = $this->request->getPost();
        $this->resorEntity->fill($dataAll);
        $res = $this->resorModel->save($this->resorEntity);
        if ($res) {
            session()->setFlashdata('success', 'Berhasil update data!');
            return redirect()->back();
        } else {
            $error = $this->resorModel->errors()['nama_resor'] ?? ('' . ' ' . $this->resorModel->errors()['kode_resor'] ?? '');
            session()->setFlashdata('error', $error);
            return redirect()->back();
        }
    }

    function delete($id)
    {
        $res = $this->resorModel->delete($id);
        session()->setFlashdata('success', 'Berhasil hapus data!');
        return redirect()->route('resor.index');
    }
}
