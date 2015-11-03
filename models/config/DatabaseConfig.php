<?php

//CONECTA BASE DE DATOS
//require_once "config/conection.php";

class DatabaseConfig
{

    /********************* 
    ** Database connect **
    *********************/
    public function connect()
    {
        if ($_SERVER['SERVER_NAME'] == "cms.loc"){
            $mysqli = mysqli_connect("localhost", "root", "", 'gcmaster_cms');
        }else{
            $mysqli = mysqli_connect("192.254.236.253", "gcmaster_cms", "Hh;%aDnv%]d", 'gcmaster_cms');
        }
        
        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }

        mysqli_set_charset($mysqli,"utf8");

        return $mysqli;
    }

}