<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
        ];
       return view('Admin/Home/index', $data);
    }

}
