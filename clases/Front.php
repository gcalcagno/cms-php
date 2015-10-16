<?php

//CONECTA BASE DE DATOS
require_once "config/core.php";

class Front
{

    /************************ 
    ** Listado de noticias **
    ************************/
    public function listadoNoticia()
    {
        //clase Database utiliza el método connect() para conectarse a la base de datos
        $db = new Database();
        $mysqli = $db->connect();

        //consulta
        $resultado=$mysqli->query("SELECT * FROM noticia");
        if(!$resultado){
            die('Hubo un error en la consulta [' . $db->error . ']');
        }

        return $resultado;

        $resultado->close();

    }


    /******************** 
    ** Imagen noticias **
    *********************/
    public function imagenPortadaNoticia($idNoticia)
    {
        //clase Database utiliza el método connect() para conectarse a la base de datos
        $db = new Database();
        $mysqli = $db->connect();

        //consulta
        $resultado=$mysqli->query("SELECT * FROM imagennoticia WHERE idNoticia = '$idNoticia'");
        
        if(mysqli_num_rows($resultado) == 0 ){
            $portada = 'default.jpg';
        }else{
            while($row = $resultado->fetch_assoc()){
               $portada = $row['nombre'];
            }
        }

        return $portada;

        $resultado->close();

    }

    /******************** 
    ** Categoria noticias **
    *********************/
    public function categoriaNoticia($idNoticia)
    {
        //clase Database utiliza el método connect() para conectarse a la base de datos
        $db = new Database();
        $mysqli = $db->connect();

        //consulta
        //$resultado=$mysqli->query("SELECT * FROM categorianoticia WHERE idNoticia = '$idNoticia'");
        $resultado=$mysqli->query(
            "SELECT * FROM `categoria` c, `categorianoticia`cn, `noticia`n WHERE cn.idNoticia = '$idNoticia' 
            and cn.idNoticia = n.id and cn.idCategoria = c.id");
       
        $array = array();

        if(mysqli_num_rows($resultado) == 0 ){
            echo 'error';
        }else{
            while($row = $resultado->fetch_assoc()){
                $categoria = $row['nombre'];
                $array[] =  $row['nombre'];
            }
        }

        return $array;

        $resultado->close();

    }


    /************************** 
    ** Listado de categorias **
    ********
    ******************/
    public function listadoCategoria()
    {
        //clase Database utiliza el método connect() para conectarse a la base de datos
        $db = new Database();
        $mysqli = $db->connect();

        //consulta
        $resultado=$mysqli->query('SELECT * FROM categoria');
        if(!$resultado){
            die('Hubo un error en la consulta [' . $db->error . ']');
        }

        return $resultado;

        $resultado->close();
    }


}