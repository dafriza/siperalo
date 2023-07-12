<?php

namespace App\Controllers;

use App\Models\ResorModel;
use App\Models\DataAsetModel;
use App\Models\RadioLokModel;
use App\Entities\RadioLokEntity;
use App\Controllers\BaseController;

class RadioLokController extends BaseController
{
    private $radioLokModel, $radioLokEntity, $dataAsetModel, $resorModel, $pncModel;
    public function __construct()
    {
        $this->radioLokModel = new RadioLokModel();
        $this->dataAsetModel = new DataAsetModel();
        $this->resorModel = new ResorModel();
        $this->radioLokEntity = new RadioLokEntity();
    }
    public function index()
    {
        $title = 'Radio Lokomotif';
        $radioLoks = $this->radioLokModel->user();
        $data = compact('title', 'radioLoks');
        // print_r($radioLoks);
        return view('Contents/radio_lok/index', $data);
    }
    function laporan()
    {
        $title = 'Laporan Karyawan';
        $radioLoksWithRelations = $this->radioLokModel->user(session('data')['id'], 'radio_loks.pnc_id');
        $this->statusRadioLok($radioLoksWithRelations);
        $data_small_box = compact('title', 'radioLoksWithRelations');
        return view('Contents/radio_lok/laporan', $data_small_box);
    }
    function add()
    {
        $title = 'Radio Lokomotif Add';
        $raloks = $this->dataAsetModel->findAll();
        $resors = $this->resorModel->findAll();
        $data = compact('title', 'raloks', 'resors');
        return view('Contents/radio_lok/add', $data);
    }
    function edit($id)
    {
        $title = 'Radio Lokomotif Edit';
        $raloks = $this->dataAsetModel->findAll();
        $resors = $this->resorModel->findAll();
        $findRadioLok = $this->radioLokModel->user($id, 'radio_loks.id')[0];
        $data = compact('title', 'findRadioLok', 'raloks', 'resors');
        // print_r($findRadioLok);
        return view('Contents/radio_lok/edit', $data);
    }

    function update()
    {
        $dataAll = $this->request->getPost();
        $this->radioLokEntity->fill($dataAll);
        print_r($dataAll);
        $res = $this->radioLokModel->save($this->radioLokEntity);
        if ($res) {
            session()->setFlashdata('success', 'Berhasil update data!');
            return redirect()->back();
        } else {
            // print_r($this->radioLokModel->errors());
            $error = $this->radioLokModel->errors()['seri_lokomotif'] ?? ('' . ' ' . $this->radioLokModel->errors()['tanggal'] ?? ('' . ' ' . $this->radioLokModel->errors()['ralok_id'] ?? ('' . ' ' . $this->radioLokModel->errors()['resor_id'] ?? ('' . ' ' . $this->radioLokModel->errors()['pnc_id'] ?? ('' . ' ' . $this->radioLokModel->errors()['rtc_call'] ?? ('' . ' ' . $this->radioLokModel->errors()['pc_call'] ?? ('' . ' ' . $this->radioLokModel->errors()['incoming_call'] ?? ('' . ' ' . $this->radioLokModel->errors()['clock_display'] ?? ('' . ' ' . $this->radioLokModel->errors()['channel_section'] ?? ('' . ' ' . $this->radioLokModel->errors()['volume'] ?? ('' . ' ' . $this->radioLokModel->errors()['emergency_call'] ?? ('' . ' ' . $this->radioLokModel->errors()['connector'] ?? ''))))))))))));
            session()->setFlashdata('error', $error);
            return redirect()->back();
        }
    }

    function delete($id)
    {
        $res = $this->radioLokModel->delete($id);
        session()->setFlashdata('success', 'Berhasil hapus data!');
        if (session('data')['role'] == 'superadmin') {
            return redirect()->route('radio_lok.index');
        } elseif (session('data')['role'] == 'karyawan') {
            return redirect()->route('radio_lok.laporan');
        }
    }

    function detail($id)
    {
        $findRadioLok = $this->radioLokModel->user($id, 'radio_loks.id')[0];
        $title = 'Radio Lokomotif Detail';
        $data = compact('title', 'findRadioLok');
        return view('Contents/radio_lok/detail', $data);
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
