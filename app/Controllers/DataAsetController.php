<?php

namespace App\Controllers;
use App\Models\DataAsetModel;
use App\Entities\DataAsetEntity;
use App\Controllers\BaseController;

class DataAsetController extends BaseController
{
    private $dataAsetModel, $dataAsetEntity;
    public function __construct()
    {
        $this->dataAsetModel = new DataAsetModel();
        $this->dataAsetEntity = new DataAsetEntity();
    }
    public function index()
    {
        $title = 'Data Aset';
        $data_asets = $this->dataAsetModel->findAll();
        $data = compact('title', 'data_asets');
        // print_r($data);
        return view('Contents/data_aset/index', $data);
    }
    function add()
    {
        $title = 'Data Aset Add';
        $data = compact('title');
        return view('Contents/data_aset/add', $data);
    }
    function edit($id)
    {
        $title = 'Data Aset Edit';
        $findDataAset = $this->dataAsetModel->find($id);
        $data = compact('title', 'findDataAset');
        return view('Contents/data_aset/edit', $data);
    }

    function update()
    {
        $dataAll = $this->request->getPost();
        $this->dataAsetEntity->fill($dataAll);
        $res = $this->dataAsetModel->save($this->dataAsetEntity);
        if ($res) {
            session()->setFlashdata('success', 'Berhasil update data!');
            return redirect()->back();
        } else {
            $error = $this->dataAsetModel->errors()['id_ralok'] ?? ('' . ' ' . $this->dataAsetModel->errors()['tipe_ralok'] ?? '');
            session()->setFlashdata('error', $error);
            return redirect()->back();
        }
    }

    function delete($id)
    {
        $res = $this->dataAsetModel->delete($id);
        session()->setFlashdata('success', 'Berhasil hapus data!');
        return redirect()->route('data_aset.index');
    }
}
