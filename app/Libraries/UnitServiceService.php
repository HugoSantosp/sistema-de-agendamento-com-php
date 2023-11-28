<?php 

namespace App\Libraries;

use App\Models\ServiceModel;

class UnitServiceService extends MyBaseService
{
        /**
         * Renderiza a Lista de Serviços Associados a Unidade atravez de checkbox
         * 
         * 
         * @param array\null $existingServicesIds
         * @return 
         */
        public function renderUnitServices(?array $existingServicesIds =  null) :string
        {
                        $services = model(ServiceModel::class)->orderBy('name','ASC')->findAll();

                        if(empty($services))
                        {
                                $anchor = '<div class="text-info"> Não há serviços disponíveis </div>';
                                $anchor .= anchor(route_to('admin.services'), 'Ver Serviços', ['class' => 'btn btn-sm btn-outline-primary']);
                                return $anchor;
                        }


                        $ul = '<ul class="list-group mt-3">';
                       ;
                        foreach ($services as $service)
                        {
                                $checked = in_array($service->id, $existingServicesIds ?? []) ? 'checked' : '';
                                $checkbox = " <div class='mb-3 form-check'>";
                                $checkbox .= "  <input type='checkbox' {$checked} name='services[]' value='{$service->id}' class='custom-control-input' id='service-{$service->id}'>";
                                $checkbox .= "  <label class='custom-control-label' for='service-{$service->id}'>$service->name</label>";
                                $checkbox .= "</div>";

                                $ul .= "<li class='list-group-item'>{$checkbox}</li>";
                        }
                        
                        $ul .= '</ul>';
                
                 return $ul;

        }



          /**
         * Renderiza a Lista não ordenada de Serviços Associados a Unidade atravez de checkbox
         * 
         * 
         * @param array\null $existingServicesIds
         * @return 
         */
      public function renderServicesUnit(?array $existingServicesIds = null): string
      {
         if($existingServicesIds == null || empty($existingServicesIds))
         {
                return self::TEXT_FOR_NO_DATA;
         }

         $services = model(ServiceModel::class)->whereIn('id', $existingServicesIds)->orderBy('name','ASC')->findAll();

         if(empty($services))
         {
                return self::TEXT_FOR_NO_DATA;
         }

         $list = [];

         foreach($services as $service)
         {
                $list[] = "{$service->name}";
         }

         return ul($list);
      }
  
}