<?php


//CONECTA BASE DE DATOS
require_once $_SERVER['DOCUMENT_ROOT']."/config/core.php";

class DashboardBack
{

    /**********
    ** Count **
    **********/
    public function count($tabla)
    {

        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query("SELECT COUNT(*) FROM $tabla WHERE activo = '1' ");
        
        $row = $resultado->fetch_row();
        return $row[0];
   
    }
}