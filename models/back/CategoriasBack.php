<?php


//CONECTA BASE DE DATOS
require_once $_SERVER['DOCUMENT_ROOT']."/config/core.php";

class CategoriasBack
{

    /********************** 
    ** Listado Categoria **
    **********************/
    public function listado()
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query("SELECT * FROM categoria WHERE activo = '1' ORDER BY nombre ");

        if (!$resultado) {
            die('Invalid query: '. mysql_error());
        }

        return $resultado;

        $resultado->close();
    }

    /********************** 
    ** Datos Categoria **
    **********************/
    public function datos($id)
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query("SELECT * FROM categoria WHERE  id ='$id' ");

        if (!$resultado) {
            die('Invalid query: '. mysql_error());
        }

       return $resultado;

        $resultado->close();
    }


    /***************************** 
    ** Categoria Noticia existe **
    ******************************/
    public function categoriaNoticiaCheck($idCategoria, $idNoticia)
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $categoriaNoticia=$mysqli->query("SELECT * FROM categorianoticia 
            WHERE idNoticia = '$idNoticia' AND idCategoria = '$idCategoria' ");

        if (mysqli_num_rows($categoriaNoticia) == 0 ) {
            return false;
        }else{
            return true;
        }

        $resultado->close();
    }


    /********************
    ** Carga categoria **
    *********************/
    public function cargaCategoria($nombre)
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query("SELECT * FROM categoria WHERE nombre = '$nombre' ");

        if (mysqli_num_rows($resultado) == 0 ) {
            $resultado=$mysqli->query("INSERT INTO categoria (nombre) VALUES ('$nombre')");
            if (!$resultado) {
                die('Invalid query: '. mysql_error());
            }else{
               $mensajes= array( "ok" => "La categoria <strong>$nombre</strong> se ha creado correctamente."  );
            }
        }else{
            $mensajes= array( "error" => "La categoria <strong>$nombre</strong> ya existe." );
        }

        return $mensajes;

        $resultado->close();
    }


    /********************** 
    ** Eliminar Categoria **
    **********************/
    public function eliminarCategoria($id)
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        //datos categoria
        $categoria=$mysqli->query("SELECT * FROM categoria WHERE  id ='$id' ");
        while($row = $categoria->fetch_assoc()){
            $nombreCat = $row['nombre'];

        }//busca id noticia
        $resultado=$mysqli->query("DELETE FROM categoria WHERE id = '$id' ");

        if (!$resultado) {
            die('Invalid query: '. mysql_error());
        }

        if (!$mysqli->affected_rows) {
            $mensajes= array( "error" => "Ocurrió un error, intente nuevamente mas tarde."  );
        }else{
           $mensajes= array( "ok" => "La categoria <strong>$nombreCat</strong> se ha eliminado correctamente."  );
        }

        return $mensajes;

        $resultado->close();
    }


    



}