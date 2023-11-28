<?php

namespace App\Models;

use App\Entities\Service;


class ServiceModel extends MyBaseModel
{
    protected $DBGroup          = 'default';
    protected $table            = 'services';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Service::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'status' ,
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
   /*  protected $deletedField  = 'deleted_at'; */

    // Validation
    protected $validationRules      = [
        'id' => 'permit_empty|is_natural_no_zero',
        'name' => 'required|max_length[69]|is_unique[services.name,id,{id}]',


    ];
    protected $validationMessages   = [
        'name' => [
            'required' => 'Campo Obrigatório',
            'max_length' => 'Máximo 69 Caracteres',
            'is_unique' => 'Esse nome já Existe', 
        ],
       
        
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['escapeData'];
    protected $afterInsert    = [];
    protected $beforeUpdate   = ['escapeData'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];



 
}
