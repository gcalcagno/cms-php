<?php


//CONECTA BASE DE DATOS
require_once $_SERVER['DOCUMENT_ROOT']."/config/core.php";

class NoticiasBack
{

    /********************** 
    ** Carga de Noticias **
    **********************/
    public function cargaNoticia($titulo, $texto, $descarga, $fecha, $imagen, $categoria)
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        //inserta noticia
        $resultado=$mysqli->query("INSERT INTO noticia (titulo,texto, descarga,fecha) VALUES ('$titulo','$texto','$descarga','$fecha')");

        //busca id noticia
        $noticia=$mysqli->query("SELECT * FROM noticia WHERE titulo = '$titulo'");

        if ($noticia) {
            if($row = $noticia->fetch_assoc()){
                echo '<br>'.$row['id'].'<br>';
                $idNoticia = $row['id'];
            }
        }else{
            echo '<br>NO HAY RESULTADOS<br>';
        }

        //inserta imagen noticia
        if(!empty($imagen)){
            $imagen=$mysqli->query("INSERT INTO imagennoticia (nombre,idNoticia) VALUES ('$imagen','$idNoticia')");

        }
        
        //inserta categoria noticia
        foreach ($categoria as $cat) {

            $categoria=$mysqli->query("INSERT INTO categorianoticia (idCategoria,idNoticia) VALUES ('$cat','$idNoticia')");

        }

        //valida
        if (!$resultado) {
            die('Invalid query: '. mysql_error());
        }else{
            return $mensajeOk = 'Datos ingresados correctamente';
        }

        //$resultado->close();
    }


    /********************** 
    ** Update de Noticias **
    **********************/
    public function updateNoticia($titulo, $texto, $descarga, $fecha, $imagen, $categoria)
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        //inserta noticia
        $resultado=$mysqli->query("UPDATE noticia
SET titulo='$titulo'
WHERE id='1'");

        //busca id noticia
        $noticia=$mysqli->query("SELECT * FROM noticia WHERE titulo = '$titulo'");

        if ($noticia) {
            if($row = $noticia->fetch_assoc()){
                echo '<br>'.$row['id'].'<br>';
                $idNoticia = $row['id'];
            }
        }else{
            echo '<br>NO HAY RESULTADOS<br>';
        }

        //inserta imagen noticia
        if(!empty($imagen)){
            $imagen=$mysqli->query("INSERT INTO imagennoticia (nombre,idNoticia) VALUES ('$imagen','$idNoticia')");

        }
        
        //inserta categoria noticia
        foreach ($categoria as $cat) {

            $categoria=$mysqli->query("INSERT INTO categorianoticia (idCategoria,idNoticia) VALUES ('$cat','$idNoticia')");

        }

        //valida
        if (!$resultado) {
            die('Invalid query: '. mysql_error());
        }else{
            return $mensajeOk = 'Datos ingresados correctamente';
        }

        //$resultado->close();
    }

    /********************** 
    ** Listado Noticias **
    **********************/
    public function listado()
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        //busca id noticia
        $resultado=$mysqli->query("SELECT * FROM noticia ");

        //valida
        if (!$resultado) {
            die('Invalid query: '. mysql_error());
        }

       return $resultado;

        //$resultado->close();
    }


     public function editarNoticia($id)
    {
        //clase Database utiliza el método connect() para conectarse a la base de datos
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        //consulta
        $resultado=$mysqli->query("SELECT * FROM noticia  WHERE id = $id");
        if(!$resultado){
            die('Hubo un error en la consulta [' . $db->error . ']');
        }

        return $resultado;

        $resultado->close();

    }

}