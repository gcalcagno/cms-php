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
        session_start();
        $NoticiasFront = new NoticiasFront();
        $CategoriasFront = new CategoriasFront();

        $noticiasGenerales = $NoticiasFront->listadoNoticia('generales');

        if(isset($_SESSION['usuario'])){ 
            $usuarioCategoria = $CategoriasFront->usuarioCategoria($_SESSION['usuario']);
        }

        //Llamada a la vista y utiliza variable $noticiasGenerales y $usuarioCategoria
        require 'views/front/index.php';

    }
	

	/************************** 
    ** Listado de categorias **
    **************************/
    function listadoCategoria()
    {
        $CategoriasFront = new CategoriasFront();
        $categorias = $CategoriasFront->listado();

        //Llamada a la vista y envía la variable $categorias
        require 'views/front/categoria.php';
    }


    /************************** 
    ** Registro ***************
    **************************/
    function registro()
    {
        //Llamada a la vista
        require 'views/front/registro.php';

    }


    /************************** 
    ** Perfil *****************
    **************************/
    function perfil()
    {
        session_start();
        $UsuarioFront = new UsuarioFront();
        $CategoriasFront = new CategoriasFront();

        $usuarioDatos = $UsuarioFront->usuarioDatos($_SESSION['usuario']);
        while($row = $usuarioDatos->fetch_assoc()){
            $email = $row['email'];
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
        }

        $usuarioCategoria = $CategoriasFront->usuarioCategoria($_SESSION['usuario']);

        //Llamada a la vista y envía las variable $email, $nombre, $apellido y $usuarioCategoria
        require 'views/front/perfil.php';
    }
	
	
}

