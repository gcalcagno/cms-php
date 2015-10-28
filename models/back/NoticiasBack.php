<?php


//CONECTA BASE DE DATOS
require_once "config/core.php";

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

}