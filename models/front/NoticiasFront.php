<?php

//CONECTA BASE DE DATOS
require_once "config/core.php";

class NoticiasFront
{
    /************************ 
    ** Listado de noticias **
    ************************/
    public function listadoNoticia($categoria)
    {
        //clase Database utiliza el método connect() para conectarse a la base de datos
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        //consulta
        $resultado=$mysqli->query(
            "SELECT * FROM `categoria` c, `categorianoticia`cn, `noticia`n WHERE c.nombre = '$categoria' and cn.idNoticia = n.id and cn.idCategoria = c.id");
       
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
        $db = new DatabaseConfig();
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


    public function noticiasRecientes()
    {
        //clase Database utiliza el método connect() para conectarse a la base de datos
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        //consulta
        $resultado=$mysqli->query("SELECT * FROM noticia  ORDER BY id DESC LIMIT 5");
        if(!$resultado){
            die('Hubo un error en la consulta [' . $db->error . ']');
        }

        return $resultado;

        $resultado->close();

    }


}