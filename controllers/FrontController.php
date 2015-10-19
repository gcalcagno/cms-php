<?php
//CONECTA BASE DE DATOS
require_once "config/core.php";

class FrontController
{
    /************************** 
    ** Home *******************
    **************************/
    function home()
    {

        //clase Database utiliza el método connect() para conectarse a la base de datos
        $db = new Database();
        $mysqli = $db->connect();

        //consulta
        $resultado=$mysqli->query("SELECT * FROM noticia");
        if(!$resultado){
            die('Hubo un error en la consulta [' . $db->error . ']');
        }

        //Llamada a la vista
        require 'views/front/index.php';
        return $resultado;
        $resultado->close();

    }
	
	/************************** 
    ** Listado de categorias **
    **************************/
    function listadoCategoria()
    {
        $db = new Database();
        $mysqli = $db->connect();

        //consulta
        $resultado=$mysqli->query('SELECT * FROM categoria');
        if(!$resultado){
            die('Hubo un error en la consulta [' . $db->error . ']');
        }

        
        //Llamada a la vista
        require 'views/front/categoria.php';
        return $resultado;
        $resultado->close();

    }


    function registro()
    {
        //Llamada a la vista
        require 'views/front/registro.php';

    }
	
	
}

