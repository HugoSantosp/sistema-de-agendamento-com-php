<?php

namespace App\Cells;

class ButtonsCell 
{



    /**
     * Renderiza Um botão e formulario para ativa e desativar um registro
     * 
     * @param array $params
     * @return string
     */
    public function action(array $params): string
    {
            
        $btn_class = 'btn bt-sm  bg-transparent ';
        $btn_class .= $params['activated'] ? 'text-warning' : 'text-success';

        $form = form_open($params['route'], ['class' => 'd-inline'], hidden: ['_method' => 'PUT']);
        $form .= form_button([
            'class'   => $params['btn_class'] ?? $btn_class, 
            'type'    => 'submit',
            'content' => $params['text_action'] 
        ]);
        $form .= form_close();

        return  $form;
        
    }

  /**
     * Renderiza Um botão e formulario para exclusão de um registro
     * 
     * @param array $params
     * @return string
     */
    public function destroy(array $params): string
    {
            
        $formAttributes = [
            'class'     => 'd-inline',
            'onsubmit'  => 'return confirm("Tem certeza da exclução")',

        ];

        $form = form_open($params['route'], attributes: $formAttributes, hidden: ['_method' => 'DELETE']);
        $form .= form_button([
            'class'   => $params['btn_class'] ?? ' btn btn-sm bg-transparent text-danger', 
            'type'    => 'submit',
            'content' => '<i class="fa fa-trash-alt "></i>' 
        ]);
        $form .= form_close();

        return  $form;
        
    }

}
