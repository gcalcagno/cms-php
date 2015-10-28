<?php

//CONECTA BASE DE DATOS
require_once "config/core.php";

class CategoriasFront
{

    /******************** 
    ** Categoria noticias **
    *********************/
    public function categoriaNoticia($idNoticia)
    {
        //clase Database utiliza el método connect() para conectarse a la base de datos
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        //consulta
        //$resultado=$mysqli->query("SELECT * FROM categorianoticia WHERE idNoticia = '$idNoticia'");
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
       //clase Database utiliza el método connect() para conectarse a la base de datos
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        //consulta id usuario
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
        //clase Database utiliza el método connect() para conectarse a la base de datos
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        //consulta
        $resultado=$mysqli->query("SELECT * FROM categoria");
        if(!$resultado){
            die('Hubo un error en la consulta [' . $db->error . ']');
        }

        return $resultado;

        $resultado->close();

    }

}