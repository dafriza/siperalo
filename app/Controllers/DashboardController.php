<?php

namespace App\Controllers;

use App\Models\PNCModel;
use App\Models\UserModel;
use App\Models\ResorModel;
use App\Models\DataAsetModel;
use App\Models\RadioLokModel;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    private $userModel, $resorModel, $radioLokModel, $pncModel, $dataAsetModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->resorModel = new ResorModel();
        $this->radioLokModel = new RadioLokModel();
        $this->pncModel = new PNCModel();
        $this->dataAsetModel = new DataAsetModel();
    }
    public function index()
    {
        $karyawans = $this->userModel->where('role', 'karyawan')->countAll();
        $resors = $this->resorModel->countAll();
        $radioLoks = $this->radioLokModel->countAll();
        $dataAsets = $this->dataAsetModel->countAll();
        $radioLoksWithRelations = $this->radioLokModel->user();
        $title = 'Dashboard Admin';
        $data_small_box = compact('karyawans', 'resors', 'radioLoks', 'dataAsets','radioLoksWithRelations','title');
        // print_r($data_small_box);
        return view('Contents/dashboard', $data_small_box);
        // return view('Components/data', $data_small_box);
        // return view('Layouts/index');
        // return view('Layouts/index');
    }
}
