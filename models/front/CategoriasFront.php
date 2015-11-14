<?php

//CONECTA BASE DE DATOS
require_once $_SERVER['DOCUMENT_ROOT']."/config/core.php";

class CategoriasFront
{

    /******************** 
    ** Categoria noticias **
    *********************/
    public function categoriaNoticia($idNoticia)
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query(
            "SELECT * FROM `categoria` c, `categorianoticia`cn, `noticia`n WHERE cn.idNoticia = '$idNoticia' 
            and cn.idNoticia = n.id and cn.idCategoria = c.id");
       
        $array = array();

        if(mysqli_num_rows($resultado) != 0 ){
            while($row = $resultado->fetch_assoc()){
                $categoria = $row['nombre'];
                $array[] =  $row['nombre'];
            }
        }

        return $array;

        $resultado->close();

    }


    /*********************** 
    ** Categorias Usuario **
    ************************/
    public function usuarioCategoria($usuario)
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $idUser=$mysqli->query("SELECT id FROM usuarios WHERE email = '$usuario'");
        while ($obj = $idUser->fetch_object()) {
            $id = $obj->id;
        }

        $resultado=$mysqli->query(
            "SELECT * FROM `categoria` c, `usuariocategoria` uc, `noticia`n WHERE uc.idUsuario = '$id ' 
            and uc.idCategoria = n.id and uc.idCategoria = c.id");

        $array = array();

        if(mysqli_num_rows($resultado) != 0 ){
            while($row = $resultado->fetch_assoc()){
                $categoria = $row['nombre'];
                $array[] =  $row['nombre'];
            }
        }

        return $array;

        $resultado->close();

    }


    /*******************
    ** Listado *********
    ******************/
    public function listado()
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query("SELECT * FROM categoria");
        if(!$resultado){
            die('Hubo un error en la consulta [' . $db->error . ']');
        }

        return $resultado;

        $resultado->close();

    }

}