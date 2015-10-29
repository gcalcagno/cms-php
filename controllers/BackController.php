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
        $DashboardBack = new DashboardBack();
        $countUsuarios = $DashboardBack->count('usuarios');
        $countNoticias = $DashboardBack->count('noticia');
        $countCategorias = $DashboardBack->count('categoria');
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
        $NoticiasBack = new NoticiasBack();
        $resultado = $NoticiasBack->listado();
        //Llamada a la vista
        require 'views/back/listNoticia.php';
    }

    function listCategoria()
    {
        $CategoriasBack = new CategoriasBack();
        $resultado = $CategoriasBack->listado();
        //Llamada a la vista
        require 'views/back/listCategoria.php';
    }

    function listUsuario()
    {
        $UsuarioBack = new UsuarioBack();
        $resultado = $UsuarioBack->listado();
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

