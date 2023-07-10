<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        return view('Contents/example');
        // return view('Layouts/index');
    }
}
