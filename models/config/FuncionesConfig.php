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
        /*$texto = mb_substr($valor, 0, $limite, 'UTF-8');
        $logn = mb_strlen($valor);
        if($logn >= $limite){
            echo $texto.' ...';
        }*/

        echo substr($valor, 0, $limite);
        $logn = strlen($valor);
        if($logn >= $limite){
            echo ' ...';
        }
    }

}

?>