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
        echo substr($valor, 0, $limite);
         $logn = strlen($valor);
        if($logn >= $limite){
            echo ' ...';
        }
    }

}

?>