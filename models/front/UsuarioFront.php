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
                $_SESSION['nombre'] = $row["nombre"];
                echo '<script language="javascript">window.location="/home"</script>;';  
            }else{
                echo "<div class='alert alert-danger'>Contraseña Incorrecta</div>"; 
            }
        }else{
            echo "<div class='alert alert-danger'>El nombre de usuario es incorrecto!</div>";         
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
            //return $mensajeOk = 'Datos ingresados correctamente';
            echo '<div class="alert alert-success">Usted se ha registrado correctamente. <strong><a href="/home">INICIA SESIÓN AQUI</a></strong></div></br>';
            unset($_POST['nombreRegistro']);
            unset($_POST['apellidoRegistro']);
            unset($_POST['emailRegistro']);
            unset($_POST['passwordRegistro']);
        } else { 
            //return $mensajeOk = 'Datos ingresados correctamente';
            echo '<div class="alert alert-danger">Este usuario ya ha sido registrado anteriormente.</div></br>'; 
        } 

       // $resultado->close();
   
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


    /********************** 
    ** Recuperar Pass *****
    **********************/
    public function recuperarPass($email)
    {

        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        //borra todas las relaciones
        $resultado = $mysqli->query("SELECT * FROM usuarios WHERE email = '$email' ");

        if (mysqli_num_rows($resultado) == 0) {
            echo 'El email es incorrecto';
        }else{
            return $mensajeOk = 'Datos actualizados correctamente';
        }

        //enviar email
        mail($email, '$título', '$mensaje', '$cabeceras');

        $resultado->close();
    }



}