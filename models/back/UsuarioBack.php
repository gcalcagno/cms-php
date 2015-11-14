<?php


//CONECTA BASE DE DATOS
require_once $_SERVER['DOCUMENT_ROOT']."/config/core.php";

class UsuarioBack
{

    /********************** 
    ** Listado Usuarios **
    **********************/
    public function listado()
    {
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query("SELECT * FROM usuarios ");

        if (!$resultado) {
            die('Invalid query: '. mysql_error());
        }

        return $resultado;

        $resultado->close();
    }


     /********** 
    ** Login **
    **********/
    public function login($usuario, $password)
    {
        //clase DatabaseConfig utiliza el método connect() para conectarse a la base de datos
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        $resultado=$mysqli->query("SELECT * FROM usuarios WHERE email = '$usuario' AND tipo = 'admin'");

        //valida usuario
        if($row = $resultado->fetch_assoc()){
            //valida password
            if($row["password"] == $password){
                $_SESSION['usuario'] = $usuario;  
                 $_SESSION['admin'] = $usuario;  
                header("Location: admin-dashboard");  
                exit();
            }else{
                $mensajes= array( "error1" => "Contraseña Incorrecta."  );   
            }
        }else{
            $mensajes= array( "error2" => "El nombre de usuario es incorrecto!."  );         
        }

        return $mensajes;

        $resultado->close();
   
    }



}