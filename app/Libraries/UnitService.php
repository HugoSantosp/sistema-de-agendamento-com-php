<?php 

namespace App\Libraries;

use App\Models\UnitModel;
use App\Entities\Unit;
use CodeIgniter\Config\Factories;

class UnitService extends MyBaseService
{


    private static array $serviceTimes =
    [
        '10 minutes' => '10 minutos',
        '15 minutes' => '15 minutos',
        '20 minutes' => '20 minutos',
        '30 minutes' => '30 minutos',
        '40 minutes' => '40 minutos',
        '1 hour' => '1 hora',

    ];
    

    public function renderUnits(): string
    {


        $units = model(UnitModel::class)->findAll();

        if(empty($units))
        {
            return self::TEXT_FOR_NO_DATA;
        }else 
        {
            
            $this->htmlTable->setHeading('Name', 'Coordenador', 'Email', 'Telefone', 'Endereço','Serviços', 'Status',/* 'Inicio', 'Término', */ 'Ações');
            $unitServiceService =  Factories::class(UnitServiceService::class);

            foreach ($units  as $unit) { 

                $this->htmlTable->addRow([
                    $unit->name,
                    $unit->coordinator,
                    $unit->email,
                    $unit->phone, 
                    $unit->adress,
                    $unitServiceService->renderServicesUnit($unit->services),
                    $unit->status(),
                   /*  $unit->starttime, 
                    $unit->endtime, */
                    $this->renderBtnActions($unit),
                ]);
            
            }


            return $this->htmlTable->generate();    
        }
    }


    /**
     *Renderiza um dropdown HTML com as opções to tempo de serviços
     * 
     *@param string|null $serviceTime
     *@return string 
     */

    public function renderTimesInterval(?string $serviceTime = null): string
    {
        $options = [];
        $options[''] = '---Escolha---';
        
        foreach(self::$serviceTimes as $key => $time)
        {
            $options[$key] = $time;
        }

        return form_dropdown(
        data: 'servicetime', 
        options: $options, 
        selected: old('servicetime', $serviceTime), 
        extra: ['class' => 'form-control'] );
    }



    /**
     * Rendereiza Os botões para as Ações de cada registo
     * 
     * @param Unit $unit (entidade)
     * @return string
     * 
     */

    private function renderBtnActions(Unit $unit): string
    {

        $btnActions = anchor(route_to('admin.units.edit', $unit->id), '<i class="fa fa-pencil-alt text-info  mr-3"></i>  </a>', ['class' => 'link-opacity-100-hover text-decoration-none' ]);
        $btnActions .= anchor(route_to('admin.units.services', $unit->id), '<i class="fa fa-fw fa-cogs text-danger mr-3"></i> </a>', ['class' => 'link-opacity-100-hove text-decoration-none' ]); 
        
        $btnActions .= view_cell( library:  'ButtonsCell::action', params: [
            'route'         => route_to('admin.units.status', $unit->id),
            'text_action'   => '<i class="fa fa-toggle-on "></i>',
            'activated'     => $unit->isActivated(),
            'btn-class'     => 'dropdown-item'         
        ]);

        $btnActions .= view_cell( library:  'ButtonsCell::destroy', params: [
            'route'         => route_to('admin.units.delete', $unit->id),
            'btn-class'     => 'dropdown-item '         
        ]);




        return $btnActions;
    }
}