<?php 

namespace App\Libraries;

use App\Entities\Service;
use App\Models\ServiceModel;

class ServiceService extends MyBaseService
{
    

    /**
     * Rendereiza uma tabela HTML com os resultados
     * 
     * 
     * @return string
      */

    public function renderServices(): string{


        $services = model(ServiceModel::class)->orderBy('name','ASC')->findAll();

        if(empty($services))
        {
            return self::TEXT_FOR_NO_DATA;
        }else 
        {
            
            $this->htmlTable->setHeading('Name','Status','Ações');

            foreach ($services  as $service) { 

                $this->htmlTable->addRow([
                    $service->name,
                    $service->status(),
                    $this->renderBtnActions($service),
                ]);
            
            }


            return $this->htmlTable->generate();    
        }
    }


    /**
     * Rendereiza Os botões para as Ações de cada registo
     * 
     * @param Service $unit (entidade)
     * @return string
     * 
     */

    private function renderBtnActions(Service $service): string
    {

        $btnActions = anchor(route_to('admin.services.edit', $service->id), '<i class="fa fa-pencil-alt text-info "></i>  </a>', ['class' => 'py-2 link-opacity-100-hover text-decoration-none' ]);
        
        $btnActions .= view_cell( library:  'ButtonsCell::action', params: [
            'route'         => route_to('admin.services.status', $service->id),
            'text_action'   => '<i class="fa fa-toggle-on "></i>',
            'activated'     => $service->isActivated(),
            'btn-class'     => 'dropdown-item py-2'         
        ]);

        $btnActions .= view_cell( library:  'ButtonsCell::destroy', params: [
            'route'         => route_to('admin.services.delete', $service->id),
            'btn-class'     => 'dropdown-item py-2'         
        ]);

        return $btnActions;
    }
}