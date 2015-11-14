<?php

//CONECTA BASE DE DATOS
require_once  $_SERVER['DOCUMENT_ROOT']."/config/core.php";

class NoticiasFront
{
    /************************ 
    ** Listado de noticias **
    ************************/
    public function listadoNoticia($categoria)
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query(
            "SELECT * FROM `categoria` c, `categorianoticia`cn, `noticia`n 
            WHERE c.nombre = '$categoria' and cn.idNoticia = n.id 
            and cn.idCategoria = c.id and n.activo = '1' ORDER BY n.id DESC");
       
        if(mysqli_num_rows($resultado) == 0){
            echo 'No hay noticias para esta categoria';
        }

        return $resultado;

        $resultado->close();

    }


    /******************** 
    ** Imagen noticias **
    *********************/
    public function imagenPortadaNoticia($idNoticia)
    {

        $db = new DatabaseConfig();
        $mysqli = $db->connect();

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


    public function noticiasRecientes($categoria)
    {

        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        if($categoria == 'all'){
            $resultado=$mysqli->query(
            "SELECT * FROM noticia WHERE activo = '1' ORDER BY id DESC LIMIT 5");
        }else{
            $resultado=$mysqli->query(
            "SELECT * FROM `categoria` c, `categorianoticia`cn, `noticia`n 
            WHERE c.nombre = '$categoria' and cn.idNoticia = n.id 
            and cn.idCategoria = c.id and n.activo = '1' ORDER BY n.id DESC LIMIT 5");
        }

        if(!$resultado){
            die('Hubo un error en la consulta [' . $db->error . ']');
        }

        return $resultado;

        $resultado->close();

    }


    public function noticia($id)
    {

        $db = new DatabaseConfig();
        $mysqli = $db->connect();


        $resultado=$mysqli->query("SELECT * FROM noticia  WHERE id = $id AND activo = '1' ");
        
        if(!$resultado || mysqli_num_rows($resultado) == 0){
            echo 'Noticia no encontrada';
        }

        return $resultado;

        $resultado->close();

    }

}