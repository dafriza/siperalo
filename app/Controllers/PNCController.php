<?php

namespace App\Controllers;

use App\Models\PNCModel;
use App\Models\UserModel;
use App\Entities\PNCEntity;
use App\Entities\UserEntity;
use App\Controllers\BaseController;

class PNCController extends BaseController
{
    private $pncModel, $pncEntity, $userModel, $userEntity;
    public function __construct()
    {
        $this->pncModel = new PNCModel();
        $this->userModel = new UserModel();
        $this->pncEntity = new PNCEntity();
        $this->userEntity = new UserEntity();
    }
    public function index()
    {
        $title = 'PNC';
        $pncs = $this->pncModel->findAll();
        $data = compact('title', 'pncs');
        // print_r($data);
        return view('Contents/pnc/index', $data);
    }
    function add()
    {
        $title = 'PNC Add';
        $data = compact('title');
        return view('Contents/pnc/add', $data);
    }
    function edit($id)
    {
        $title = 'PNC Edit';
        $findPNC = $this->pncModel->find($id);
        $data = compact('title', 'findPNC');
        return view('Contents/pnc/edit', $data);
    }

    function update()
    {
        $dataAll = $this->request->getPost();
        $this->pncEntity->fill($dataAll);
        $res = $this->pncModel->save($this->pncEntity);
        if ($res) {
            session()->setFlashdata('success', 'Berhasil update data!');
            return redirect()->back();
        } else {
            $error = $this->pncModel->errors()['nipp'] ?? ('' . ' ' . $this->pncModel->errors()['nama_pnc'] ?? '');
            session()->setFlashdata('error', $error);
            return redirect()->back();
        }
    }

    function store()
    {
        $dataUser = $this->request->getRawInputVar(['username', 'password', 'role']);
        $dataUser['password'] = password_hash($dataUser['password'], PASSWORD_DEFAULT);
        $this->userEntity->fill($dataUser);
        $this->userModel->insert($this->userEntity);
        $dataPNC = $this->request->getRawInput(['nipp', 'nama_pnc']);
        $dataPNC['user_id'] = $this->userModel->getInsertID();
        $this->pncEntity->fill($dataPNC);
        $res = $this->pncModel->insert($this->pncEntity);
        if ($res) {
            session()->setFlashdata('success', 'Berhasil update data!');
            return redirect()->back();
        } else {
            $error = $this->pncModel->errors()['nipp'] ?? ('' . ' ' . $this->pncModel->errors()['nama_pnc'] ?? '');
            session()->setFlashdata('error', $error);
            return redirect()->back();
        }
    }

    function delete($id)
    {
        $res = $this->pncModel->delete($id);
        session()->setFlashdata('success', 'Berhasil hapus data!');
        return redirect()->route('resor.index');
    }
}
