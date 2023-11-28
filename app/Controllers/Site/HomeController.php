<?php

namespace App\Controllers\Site;
use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Meus Agendamentos',
        ];
        return view('Site/Home/index', $data);
    }

    public function schedules(): string
    {
        $data = [
            'title' => 'Criar Agendamento',
           
        ];

        return view('Site/Schedules/index', $data);
    }
}
