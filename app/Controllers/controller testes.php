<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Agendamentos',
        ];
        return view('Site/Home/index', $data);
    }
}
