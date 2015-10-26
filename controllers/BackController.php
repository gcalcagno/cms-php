<?php
//CONECTA BASE DE DATOS
require_once "config/core.php";

class BackController
{

	/****************
    ** Login Admin **
    *****************/
    function login()
    {
        //Llamada a la vista
        require 'views/back/login.php';
    }

    function dashboard()
    {
        //Llamada a la vista
        require 'views/back/dashboard.php';
    }

    function logout()
    {
        //Llamada a la vista
        require 'views/logout.php';
    }

    function listNoticia()
    {
        //Llamada a la vista
        require 'views/back/listNoticia.php';
    }

    function listCategoria()
    {
        //Llamada a la vista
        require 'views/back/listCategoria.php';
    }

    function listUsuario()
    {
        //Llamada a la vista
        require 'views/back/listUsuario.php';
    }

    function cargaCategoria()
    {
        //Llamada a la vista
        require 'views/back/cargaCategoria.php';
    }

    function cargaNoticia()
    {
        //Llamada a la vista
        require 'views/back/cargaNoticia.php';
    }
	
	
}

