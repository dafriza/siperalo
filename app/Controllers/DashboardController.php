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
        if (session('data')['role'] == 'superadmin') {
            $karyawans = $this->userModel->where('role', 'karyawan')->countAll();
            $resors = $this->resorModel->countAll();
            $radioLoks = $this->radioLokModel->countAll();
            $dataAsets = $this->dataAsetModel->countAll();
            $radioLoksWithRelations = $this->radioLokModel->user();
            $title = 'Dashboard Admin';
            $this->statusRadioLok($radioLoksWithRelations);
            $data_small_box = compact('karyawans', 'resors', 'radioLoks', 'dataAsets', 'radioLoksWithRelations', 'title');
            return view('Contents/dashboard', $data_small_box);
        } elseif (session('data')['role'] == 'karyawan') {
            $title = 'Dashboard Karyawan';
            $radioLoksWithRelations = $this->radioLokModel->user(session('data')['id'], 'radio_loks.pnc_id');
            $this->statusRadioLok($radioLoksWithRelations);
            $data_small_box = compact('title', 'radioLoksWithRelations');
            return view('Contents/dashboard', $data_small_box);
        }
    }
    function statusRadioLok($radioLoksWithRelations)
    {
        foreach ($radioLoksWithRelations as $key => $radioLoksWithRelation) {
            $checkIndex = 0;
            if ($radioLoksWithRelation->rtc_call == 0) {
                $radioLoksWithRelations[$key]->status = 'Tombol RTS tidak berfungsi';
                $checkIndex++;
                $radioLoksWithRelations[$key]->numb = $checkIndex;
            }
            if ($radioLoksWithRelation->pc_call == 0) {
                $radioLoksWithRelations[$key]->status = 'Tombol PC tidak berfungsi';
                $checkIndex++;
                $radioLoksWithRelations[$key]->numb = $checkIndex;
            }
            if ($radioLoksWithRelation->incoming_call == 0) {
                $radioLoksWithRelations[$key]->status = 'Tombol Incoming tidak berfungsi';
                $checkIndex++;
                $radioLoksWithRelations[$key]->numb = $checkIndex;
            }
            if ($radioLoksWithRelation->clock_display == 0) {
                $radioLoksWithRelations[$key]->status = 'Clock tidak berfungsi';
                $checkIndex++;
                $radioLoksWithRelations[$key]->numb = $checkIndex;
            }
            if ($radioLoksWithRelation->channel_section == 0) {
                $radioLoksWithRelations[$key]->status = 'Channel tidak berfungsi';
                $checkIndex++;
                $radioLoksWithRelations[$key]->numb = $checkIndex;
            }
            if ($radioLoksWithRelation->volume == 0) {
                $radioLoksWithRelations[$key]->status = 'Volume tidak berfungsi';
                $checkIndex++;
                $radioLoksWithRelations[$key]->numb = $checkIndex;
            }
            if ($radioLoksWithRelation->emergency_call == 0) {
                $radioLoksWithRelations[$key]->status = 'Tombol Emergency tidak berfungsi';
                $checkIndex++;
                $radioLoksWithRelations[$key]->numb = $checkIndex;
            }
            if ($radioLoksWithRelation->connector == 0) {
                $radioLoksWithRelations[$key]->status = 'Connector tidak berfungsi';
                $checkIndex++;
                $radioLoksWithRelations[$key]->numb = $checkIndex;
            }
            if ($checkIndex > 1) {
                $radioLoksWithRelations[$key]->status = 'Banyak fitur tidak berfungsi';
                $radioLoksWithRelations[$key]->numb = $checkIndex;
            } elseif ($checkIndex == 0) {
                $radioLoksWithRelations[$key]->status = 'Baik';
            }
        }
    }
}
