<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class MybaseEntity extends Entity
{
   /*  protected $datamap = []; */
    protected $dates   = ['created_at', 'updated_at'];
    protected $casts   = [
        'status' => 'boolean'
    ];



    public function isActivated(): bool
    {
        return $this->status;

    }


    public function status(): string
    {
        
        return $this->isActivated() ? '<span class="badge badge-primary">Ativo</span>' : '<span class="badge badge-danger">Inativo</span>';
    }

    public function textToAction(): string
    {
       
        return $this->isActivated() ? 'Desativar' : 'Ativar';

    }

    /**
     * Metedos de ação de ativa ou desativa os registros
     */

    public function activate(): void
    {
        $this->status = 1;
    }

    public function deactivate(): void
    {
        $this->status = 0;
    }



    public function setAction()
    {

        $this->isActivated() ? $this->deactivate() : $this->activate();

        
    }



}
