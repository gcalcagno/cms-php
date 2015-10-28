<?php


//CONECTA BASE DE DATOS
require_once "config/core.php";

class DashboardBack
{

    /*************
    ** Count **
    *************/
    public function count($tabla)
    {

        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query("SELECT COUNT(*) FROM $tabla");
        
        $row = $resultado->fetch_row();
        return $row[0];
   
    }
}