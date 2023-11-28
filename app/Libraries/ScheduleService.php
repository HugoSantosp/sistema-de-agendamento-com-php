<?php 

namespace App\Libraries;

use App\Models\ServiceModel;
use App\Models\UnitModel;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use PharIo\Manifest\InvalidUrlException;

class ScheduleService
{
        /**
         * Renderiza a Lista com opções de unidades ativas
         * 
         * 
         * @return string
         */
        public function renderUnits() :string
        {     

                
                         $units = model(UnitModel::class)->where("status = '1'")->orderBy('name', 'ASC')->findAll(); 

                        if(empty($units))
                        {
                             
                                return 'Não há Unidades disponíveis para o agendamento' ;
                        }

                        $style = '<style>
                        ul.demo {
                          list-style-type: none;
                          margin: 0;
                          padding: 0;
                        }
                        </style>';
                        $ul = $style . '<ul class="demo">';
                       
                        foreach ($units as $unit)
                        {
                                $radio = " <div class='mb-3 form-check'>";
                                $radio .= "  <input type='radio' name='unit_id' value='{$unit->id}' class='custom-control-input' id='service-{$unit->id}'>";
                                $radio .= "  <label class='custom-control-label' for='service-{$unit->id}'>$unit->name</label>";
                                $radio .= "</div>";

                                $ul .= "<li class='list-group-item'>{$radio}</li>";
                        }
                        
                        $ul .= '</ul>';


                
                 return $ul;

        }


        
        /**
         * Recupero os serviços associados a unidade informada
         * 
         * @param integer $unitId     
         * @return string
         */
        public function renderUnitsServices(int $unitId): string
        {

                //Validando a existencia da unidade ativa com os serviços
                $unit = model(UnitModel::class)->where(['status' => 1, 'services !=' => null, 'services !=' => ''])->findOrFail($unitId);

                // buscamos os serviços desta unidade
                $services = model(ServiceModel::class)->whereIn('id', $unit->services)->where('status',1)->orderBy('name', 'ASC')->findAll();

                if(empty($services))
                {
                    throw new InvalidArgumentException("Os serviços associados a unidade não estão ativos ou não axistem");
                }

          /*       $options = []; */
                $style = '<style>
                ul.demo {
                  list-style-type: none;
                  margin: 0;
                  padding: 0;
                }
                </style>';
                $ul = '<h3>' . $style . '<ul class="demo">';
                foreach ($services  as $service)
                {       
                        $radio = " <div class='mb-3 form-check'>";
                        $radio .= "  <input type='radio' name='service' value='{$service->name}' class='custom-control-input' id='{$service->id}'> ";
                        $radio .= "  <label class='custom-control-label' for='{$service->id}'>$service->name</label>";
                        $radio .= "</div>";
                       $ul .= "<li class='list-group-item'>{$radio}</li>";
                }
                $ul .= '</ul>'. '</h3>';

                return $ul; 
        }
  
}