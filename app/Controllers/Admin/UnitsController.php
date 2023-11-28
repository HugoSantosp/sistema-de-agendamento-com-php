<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Unit;
use App\Libraries\UnitService;
use App\Models\UnitModel;
use CodeIgniter\Config\Factories;

class UnitsController extends BaseController
{

    /** @var UnitService  */
    private UnitService $UnitService;

    /** @var UnitModel  */
    private UnitModel $UnitModel;

    /**
     * Renderizador de interface gráfica para Unidades
     * 
     * @return RendererInterface
     * 
     */

     public function __construct()
     {
        $this->UnitService = Factories::class(UnitService::class);
        $this->UnitModel = model(UnitModel::class);
        
     }
    
    public function index()
    {


        $data = [
            'title' => 'Unidades',
            'units' => $this->UnitService->renderUnits()
        ];     

       return view('Admin/Units/index', $data);
    }


    
    /** 
     * Renderiza a View para gerenciar as unidades
     * 
     * @param integer $id
     * @return RenderInterface 
      */



    public function editar(int $id)
    {
        $data = [
            'title'         => 'Editar Unidade',
            'unit'          => $unit = $this->UnitModel->findOrFail($id),
            'timesInterval' => $this->UnitService->renderTimesInterval($unit->servicetime),
        ];

        return view ('Admin/Units/edit', $data);
        
    }

    /**
     * Processa a atualização do registro no banco de dados
     * @param integer $id
     * @return RedirectResponse
     * 
      */

    public function update($id)
    {
        $this->checkMethod('put');
        $unit = $this->UnitModel->findOrFail($id);
        $unit->fill($this->clearRequest());
        
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


        return redirect()->route('admin.units')->with('success', 'Dados Atualizados com Sucesso');
    }


    
    /**
     * Processa a ativação e/ou desativação do registro no banco de dados
     * @param integer $id
     * @return RedirectResponse
     * 
      */
    public function status($id)
    {
        $this->checkMethod('put');
        $unit = $this->UnitModel->findOrFail($id);
        $unit->setAction();

        
        $this->UnitModel->save($unit);

        return redirect()->route('admin.units')->with('success', 'Status de Unidade atualizado com Sucesso');
    }



    public function new()
    {           
        $data = [
            'title'          => 'Criar Nova Unidade',
            'units'          => new  Unit(),
            'timesInterval'  => $this->UnitService->renderTimesInterval(),
        ];     

       return view('Admin/Units/new', $data);
    }


    /**
     * Metedo cria Nova Unidade 
     */
    
    public function create()
    {
        $this->checkMethod('post');
        $unit = new Unit($this->clearRequest());

        if(!$this->UnitModel->insert($unit))
        {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('Danger', 'Verifique os Erros e tente Nvamente')
                    ->with('errorsValidation', $this->UnitModel->errors());
        }


        return redirect()->route('admin.units')->with('success', 'Unidade Criada Com succeso');
    }





    public function delete(int $id)
    {
        $this->checkMethod('delete');
        $unit = $this->UnitModel->findOrFail($id);
        $unit->setAction();

        
        $this->UnitModel->delete($unit->id);

        return redirect()->route('admin.units')->with('success', 'Registro excluído com sucesso');
    }


}
