<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Entities\Service;
use App\Libraries\ServiceService;
use App\Models\ServiceModel;
use CodeIgniter\Config\Factories;

class ServicesController extends BaseController
{

    /** @var ServiceService  */
    private ServiceService $ServiceService;

    /** @var ServiceModel  */
    private ServiceModel $ServiceModel;

    /**
     * Renderizador de interface gráfica para Unidades
     * 
     * @return RendererInterface
     * 
     */

     public function __construct()
     {
        $this->ServiceService = Factories::class(ServiceService::class);
        $this->ServiceModel = model(ServiceModel::class);
        
     }
    
    public function index()
    {


        $data = [
            'title' => 'Serviços',
            'services' => $this->ServiceService->renderServices()
        ];     

       return view('Admin/Services/index', $data);
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
            'title'         => 'Editar Serviços',
            'service'          => $service = $this->ServiceModel->findOrFail($id),
        ];

        return view ('Admin/Services/edit', $data);
        
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
        $service = $this->ServiceModel->findOrFail($id);
        $service->fill($this->clearRequest());
        
        if(!$service->hasChanged())
        {
            return redirect()   
                    ->back()
                    ->with('info', 'Não há dados para atualizar');
        }

        $success = $this->ServiceModel->save($service);


        if(!$success)
        {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('Danger', 'Verifique os Erros e tente Novamente')
                    ->with('errorsValidation', $this->ServiceModel->errors());
        }


        return redirect()->route('admin.services')->with('success', 'Dados Atualizados com Sucesso');
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
        $service = $this->ServiceModel->findOrFail($id);
        $service->setAction();

        
        $this->ServiceModel->save($service);

        return redirect()->route('admin.services')->with('success', 'Status de Serviço atualizado com Sucesso');
    }



    public function new()
    {           
        $data = [
            'title'          => 'Adicionar Novo Serviço',
            'services'          => new  service(),
        ];     

       return view('Admin/services/new', $data);
    }


    /**
     * Metedo cria Nova Unidade 
     */
    
    public function create()
    {
        $this->checkMethod('post');
        $service = new service($this->clearRequest());

        if(!$this->ServiceModel->insert($service))
        {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('Danger', 'Verifique os Erros e tente Nvamente')
                    ->with('errorsValidation', $this->ServiceModel->errors());
        }


        return redirect()->route('admin.services')->with('success', 'Serviço Adicionado Com succeso');
    }





    public function delete(int $id)
    {
        $this->checkMethod('delete');
        $service = $this->ServiceModel->findOrFail($id);
        $service->setAction();

        
        $this->ServiceModel->delete($service->id);

        return redirect()->route('admin.services')->with('success', 'Registro excluído com sucesso');
    }


}
