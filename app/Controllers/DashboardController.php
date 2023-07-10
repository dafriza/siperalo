<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ResorModel;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    private $userModel, $resorModel, $radioLokModel;
    public function __construct() {
        $this->userModel = new UserModel();
        $this->resorModel = new ResorModel();
    }
    public function index()
    {

        return view('Contents/dashboard');
        // return view('Layouts/index');
        // return view('Layouts/index');
    }
}
