<?php

namespace App\Controllers;

use App\Models\RadioLokModel;
use App\Entities\RadioLokEntity;
use App\Controllers\BaseController;

class RadioLokController extends BaseController
{
    private $radioLokModel, $radioLokEntity;
    public function __construct()
    {
        $this->radioLokModel = new RadioLokModel();
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
    function add()
    {
        $title = 'Radio Lokomotif Add';
        $data = compact('title');
        return view('Contents/radio_lok/add', $data);
    }
    function edit($id)
    {
        $title = 'Radio Lokomotif Edit';
        $findPNC = $this->radioLokModel->find($id);
        $data = compact('title', 'findPNC');
        return view('Contents/radio_lok/edit', $data);
    }

    function update()
    {
        $dataAll = $this->request->getPost();
        $this->radioLokEntity->fill($dataAll);
        $res = $this->radioLokModel->save($this->radioLokEntity);
        if ($res) {
            session()->setFlashdata('success', 'Berhasil update data!');
            return redirect()->back();
        } else {
            $error = $this->radioLokModel->errors()['nipp'] ?? ('' . ' ' . $this->radioLokModel->errors()['nama_pnc'] ?? '');
            session()->setFlashdata('error', $error);
            return redirect()->back();
        }
    }

    function delete($id)
    {
        $res = $this->radioLokModel->delete($id);
        session()->setFlashdata('success', 'Berhasil hapus data!');
        return redirect()->route('radio_lok.index');
    }

    function detail($id)
    {
        $findRadioLok = $this->radioLokModel->user('radio_loks.id',$id)[0];
        $title = 'Radio Lokomotif Detail';
        $data = compact('title', 'findRadioLok');
        // print_r($findRadioLok->get);
        return view('Contents/radio_lok/detail', $data);
    }
}
