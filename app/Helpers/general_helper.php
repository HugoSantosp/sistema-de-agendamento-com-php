<?php

if( !function_exists('show_error_input') )
{

    /**
     * Exibe O erro de validação para o campo informado do formulário
     * 
     * 
     * @param string $inputField
     * @return string
     */

    function show_error_input(string $inputField): string
    {
        $inputField = strtolower($inputField);

        if(!session()->has('errorsValidation'))
        {
            return '';
        }

        $errorsValidation = esc(session('errorsValidation'));
        return !array_key_exists($inputField,$errorsValidation) ? '' : "<span class='text-danger'>".$errorsValidation[$inputField]."</span>"; 
    }
}