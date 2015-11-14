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
        $logn = mb_strlen($valor);
        if($logn >= $limite){
            echo ' ...';
        }
    }

}

?>