<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\UnitServiceService;
use App\Models\UnitModel;
use CodeIgniter\Config\Factories;

class UnitsServicesController extends BaseController
{
        /** @var UnitModel */
        private UnitModel $UnitModel;

        /** @var UnitServiceService */
        private UnitServiceService $unitServiceService;


        public function __construct()
        {
            $this->UnitModel = model(UnitModel::class);
            $this->unitServiceService = Factories::class(UnitServiceService::class);
        }
    /**
     * Renderiza a view para gerenciar os serviços das unidades 
     * 
     * @param integer $unitId
     * @return RendereInterface
     * 
     *   */ 
    public function services(int $unitId)
    {
        $data = [
            'title'           => 'Gerenciamento de Serviços da Unidade',
            'unit'            => $unit = $this->UnitModel->findOrFail($unitId),
            'servicesOptions' => $this->unitServiceService->renderUnitServices($unit->services),
        ];

        return view('Admin/Units/services', $data);
    }

    public function store(int $unitId)
    {
        $this->checkMethod('put');
        $unit = $this->UnitModel->findOrFail($unitId);
        $postServices = $this->request->getPost('services');
    
        $unit->services = $postServices ?? null ;

        if(!$unit->hasChanged())
        {
            return redirect()   
                    ->back()
                    ->with('info', 'Não há dados para atualizar');
        }

        $success = $this->UnitModel->save($unit);

        

        if(!$success)
        {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('Danger', 'Verifique os Erros e tente Nvamente')
                    ->with('errorsValidation', $this->UnitModel->errors());
        }


        return redirect()->back()->with('success', 'Dados Atualizados com Sucesso');
    }
}
