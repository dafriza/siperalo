<?php

namespace App\Controllers;
use App\Models\PNCModel;
use App\Models\UserModel;
use App\Entities\UserEntity;
use App\Controllers\BaseController;

class AuthController extends BaseController
{
    private $userModel;
    private $userEntity;
    private $pncModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userEntity = new UserEntity();
        $this->pncModel = new PNCModel();
    }
    public function index()
    {
        return view('Auth/login');
    }
    function loginAction()
    {
        $data = $this->request->getPost();
        $fillData = $this->userEntity->fill($data);
        $auth = $this->userModel->attempts($fillData);
        // print_r($auth);
        return $this->auth($auth);
    }

    function logoutAction() {
        session()->remove('data');
        session()->setFlashdata('success','Logout Sukses!');
        return redirect()->route('login');
    }

    function auth($auth)
    {
        if ($auth['status']) {
            session()->setFlashdata('success', 'Berhasil Login!');
            $userId = $auth['data'];
            $dataPNC = $this->pncModel->find($userId['id']);
            $authData = [
                'id' => $dataPNC->id,
                'nama' => $dataPNC->nama_pnc,
                'nipp' => $dataPNC->nipp,
                'role' => $userId['role'],
                'active' => true
            ];
            session()->set('data',$authData);
            return redirect()->route('dashboard');
        } else {
            session()->setFlashdata('error', 'Username atau Password Salah!');
            return redirect()->route('login');
        }
    }
}
