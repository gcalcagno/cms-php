<?php

//CONECTA BASE DE DATOS
//require_once "config/conection.php";

class FuncionesConfig
{

    /* 
    ** Limitar textos
    */
    public function limitarTextos($valor, $limite)
    {
        echo mb_substr($valor, 0, $limite, 'UTF-8');
        $logn = mb_strlen($valor, 'UTF-8');
        if($logn >= $limite){
            echo ' ...';
        }
    }

}