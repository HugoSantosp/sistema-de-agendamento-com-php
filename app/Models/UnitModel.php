<?php

namespace App\Models;

use App\Entities\Unit;


class UnitModel extends MyBaseModel
{
    protected $DBGroup          = 'default';
    protected $table            = 'units';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Unit::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name',
        'email',
        'phone' ,
        'coordinator',
        'adress' ,
        'services',
        'starttime',
        'endtime' ,
        'servicetime',
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
        'name' => 'required|max_length[69]|is_unique[units.name,id,{id}]',
        'phone' => 'required|max_length[14]|is_unique[units.phone,id,{id}]',
        'email' => 'required|valid_email|max_length[99]|is_unique[units.email,id,{id}]',
        'coordinator' => 'required|max_length[128]',
        'adress' => 'required|max_length[128]',
        'starttime' => 'required',
        'endtime' => 'required',
        'servicetime' => 'required',

    ];
    protected $validationMessages   = [
        'name' => [
            'required' => 'Campo Obrigatório',
            'max_length' => 'Máximo 69 Caracteres',
            'is_unique' => 'Esse nome já Existe', 
        ],
        'phone' => [
            'required' => 'Campo Obrigatório',
 
        ],
        'email' => [
            'required' => 'Campo Obrigatório',
            
        ],
        'coordinator' => [
            'required' => 'Campo Obrigatório',
            
        ],
        'adress' => [
            'required' => 'Campo Obrigatório',
            
        ],
        'starttime' => [
            'required' => 'Campo Obrigatório',
            
        ],
        'endtime' => [
            'required' => 'Campo Obrigatório',
            
        ],
        'servicetime' => [
            'required' => 'Campo Obrigatório',
            
        ],
        
    ];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ['escapeCustomData'];
    protected $afterInsert    = ['escapeCustomData'];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    /**
     * Escapa os dados de forma com controlada pois temos uam coluna services como JSON
     * 
     * @param array $data
     * @return array
     */

    protected function escapeCustomData(array $data): array
    {
        if(!isset($data['data']))
        {
            return $data;
        }

        foreach ($this->allowedFields as $attributes)
        {
            if(isset($data['data'][$attributes])) 
            {
                if($attributes === 'services')
                {
                    continue;
                }
                $data['data'][$attributes] = esc($data['data'][$attributes]);
            }
        }

        return $data;
    }

}
