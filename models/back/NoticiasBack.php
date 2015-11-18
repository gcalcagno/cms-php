<?php


//CONECTA BASE DE DATOS
require_once $_SERVER['DOCUMENT_ROOT']."/config/core.php";

class NoticiasBack
{

    /********************** 
    ** Listado Noticias **
    **********************/
    public function listado()
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query("SELECT * FROM noticia WHERE activo = '1' GROUP BY fecha");

        if (!$resultado) {
            die('Invalid query: '. mysql_error());
        }

        return $resultado;

        $resultado->close();
    }


    /********************** 
    ** Datos Noticia **
    **********************/
    public function datos($id)
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query("SELECT * FROM noticia WHERE  id ='$id' ");

        if (!$resultado) {
            die('Invalid query: '. mysql_error());
        }

        return $resultado;

        $resultado->close();
    }


    /********************** 
    ** Carga de Noticias **
    **********************/
    public function cargaNoticia($titulo, $texto, $descarga, $fecha, $imagen, $categoria)
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query("INSERT INTO noticia (titulo,texto, descarga,fecha) VALUES ('$titulo','$texto','$descarga','$fecha')");
        $id = $mysqli->insert_id;
        $noticia=$mysqli->query("SELECT * FROM noticia WHERE id = '$id'");

        if ($noticia) {
            if($row = $noticia->fetch_assoc()){
                $idNoticia = $row['id'];
            }
        }else{
            echo '<br>NO HAY RESULTADOS<br>';
        }

        if(!empty($imagen)){
            $imagen=$mysqli->query("INSERT INTO imagennoticia (nombre,idNoticia) VALUES ('$imagen','$idNoticia')");
        }
        
        foreach ($categoria as $cat) {
            $categoria=$mysqli->query("INSERT INTO categorianoticia (idCategoria,idNoticia) 
                VALUES ('$cat','$idNoticia')");
        }

        if (!$resultado) {
            die('Invalid query: '. mysql_error());
        }else{
            return $mensajeOk = 'Datos ingresados correctamente';
        }

        $resultado->close();
    }



    /********************** 
    ** Update de Noticias **
    **********************/
    public function updateNoticia($id, $titulo, $texto, $descarga, $fecha, $imagen, $categoria)
    {

        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query("UPDATE noticia
        SET titulo ='$titulo', texto = '$texto' WHERE id='$id'");

        //si se envio una imagen la inserta
        if(!empty($imagen)){
            $eliminaImagen=$mysqli->query("DELETE FROM imagennoticia WHERE idNoticia = '$id' ");
            $imagen=$mysqli->query("INSERT INTO imagennoticia (nombre,idNoticia) VALUES ('$imagen','$id')");
        }

        //borra todas las relaciones
        $mysqli->query("DELETE FROM categorianoticia WHERE idNoticia = '$id' ");
        
        //busca categoria, y si la categoria recibida no esta relacionada con el usuario la inserta
        foreach ($categoria as $cat) {
            $newCategoriaNoticia=$mysqli->query("INSERT INTO categorianoticia (idCategoria,idNoticia) VALUES ('$cat','$id')");
        }

        if (!$resultado) {
            die('Invalid query: '. mysql_error());
        }else{
            return $mensajeOk = 'Datos actualizados correctamente';
        }

        $resultado->close();
    }

    

    /********************** 
    ** Editar Noticia **
    **********************/
     public function editarNoticia($id)
    {

        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query("SELECT * FROM noticia  WHERE id = $id");
        if(!$resultado){
            echo 'Noticia no encontrada';
        }

        return $resultado;

        $resultado->close();

    }


    /********************** 
    ** Eliminar Noticia **
    **********************/
    public function eliminarNoticia($id)
    {
        
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $noticia=$mysqli->query("SELECT * FROM noticia WHERE id ='$id' ");

        while($row = $noticia->fetch_assoc()){
            $nombreNoticia = $row['titulo'];
        }

        $resultado=$mysqli->query("UPDATE noticia
        SET activo ='0' WHERE id='$id'");

        if (!$resultado) {
            $mensajes= array( "error" => "Ocurrió un error, intente nuevamente mas tarde."  );
        }else{
           $mensajes= array( "ok" => "La noticia <strong>$nombreNoticia</strong> se ha eliminado correctamente."  );
        }

        return $mensajes;

        $resultado->close();
    }


    
}