<?php

//CONECTA BASE DE DATOS
//require_once "config/conection.php";

class Database
{

    /********************* 
    ** Database connect **
    *********************/
    public function connect()
    {
        $mysqli = mysqli_connect("localhost", "root", "", 'gcmaster_cms');

        if (mysqli_connect_errno()) {
            printf("Error de conexión: %s\n", mysqli_connect_error());
            exit();
        }

        mysqli_set_charset($mysqli,"utf8");

        return $mysqli;
    }

}