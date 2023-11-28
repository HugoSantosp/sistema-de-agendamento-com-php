<?php

namespace App\Libraries;

use CodeIgniter\Config\Factories;
use CodeIgniter\View\Table as HTMLTable;

class MyBaseService
{

    /**
     * @var HTMLTable
     */
    protected HTMLTable $htmlTable;


    /** Mensagem para front-end de Sem dados para mostrar */
    protected const TEXT_FOR_NO_DATA = "<div class='text-danger text-center text-capitalize'> Não dados Para para ser Exibido </div>";

    public  function __construct()
    {

        $this->htmlTable = Factories::class(HTMLTable::class);

        $this->htmlTable->setTemplate([
            'table_open' => ' <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">',
        ]);
        
    }

}