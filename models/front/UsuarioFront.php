<?php

//CONECTA BASE DE DATOS
require_once $_SERVER['DOCUMENT_ROOT']."/config/core.php";

class UsuarioFront
{
   
    /********** 
    ** Login **
    **********/
    public function login($usuario, $password)
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query("SELECT * FROM usuarios WHERE email = '$usuario'");

        //valida usuario
        if($row = $resultado->fetch_assoc()){
            //valida password
            if($row["password"] == $password){
                $_SESSION['usuario'] = $usuario;
                echo '<script language="javascript">window.location="/home"</script>;';  
                echo 'usuario logueado';
            }else{
                echo "Contraseña Incorrecta";    
            }
        }else{
            echo "El nombre de usuario es incorrecto!";          
        }

       return $resultado;

        $resultado->close();
   
    }


    /*************
    ** Registro **
    *************/
    public function registro($email, $password, $nombre, $apellido)
    {

        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query('SELECT * FROM usuarios');
        $verificar_usuario = 0;

        //valida usuario
        while($row = $resultado->fetch_assoc()){
            if($row["email"] == $email){ 
                $verificar_usuario = 1; 
            }
        } 
  
        //ingresa el usuario
        if($verificar_usuario == 0) { 
            $sql = "INSERT INTO usuarios (email,password, nombre, apellido, tipo) VALUES 
            ('$email','$password','$nombre','$apellido','user')";//Se insertan los datos a la base de datos y el usuario ya fue registrado con exito.
            $resultado=$mysqli->query($sql);
            echo 'Usted se ha registrado correctamente.';
        } else { 
            echo 'Este usuario ya ha sido registrado anteriormente.'; 
        } 

        return $resultado;
        $resultado->close();
   
    }


    /******************
    ** Usuario Datos **
    ******************/
    public function usuarioDatos($usuario)
    {

        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $idUser=$mysqli->query("SELECT id FROM usuarios WHERE email = '$usuario'");
        while ($obj = $idUser->fetch_object()) {
            $id = $obj->id;
        }

        $resultado=$mysqli->query("SELECT * FROM usuarios WHERE  id = '$id'");
        if(!$resultado){
            die('Hubo un error en la consulta [' . $db->error . ']');
        }

        return $resultado;

        $resultado->close();

    }

    /***************************** 
    ** Usuario Categoria existe **
    ******************************/
    public function usuarioCategoriaCheck($idUsuario, $idCategoria)
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $usuarioCategoria=$mysqli->query("SELECT * FROM usuariocategoria 
            WHERE idUsuario = '$idUsuario' AND idCategoria = '$idCategoria' ");

        if (mysqli_num_rows($usuarioCategoria) == 0 ) {
            return false;
        }else{
            return true;
        }

        $resultado->close();
    }


    /********************** 
    ** Update usuario categoria **
    **********************/
    public function updateUsuarioCategoria($id, $categoria)
    {

        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        //borra todas las relaciones
        $mysqli->query("DELETE FROM usuariocategoria WHERE idUsuario = '$id' ");

        //busca categoria, y si la categoria recibida no esta relacionada con el usuario la inserta
        foreach ($categoria as $cat) {
            $newusuarioCategoria=$mysqli->query("INSERT INTO usuariocategoria 
                (idUsuario, idCategoria) VALUES ('$id','$cat')");
        }

        if (!$newusuarioCategoria) {
            die('Invalid query: '. mysql_error());
        }else{
            return $mensajeOk = 'Datos actualizados correctamente';
        }

        $newusuarioCategoria->close();
    }



}