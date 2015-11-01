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

        //busca id noticia
        $resultado=$mysqli->query("SELECT * FROM usuarios ");

        //valida
        if (!$resultado) {
            die('Invalid query: '. mysql_error());
        }

       return $resultado;

        //$resultado->close();
    }


     /********** 
    ** Login **
    **********/
    public function login($usuario, $password)
    {
        //clase DatabaseConfig utiliza el método connect() para conectarse a la base de datos
        $db = new DatabaseConfig();
        $mysqli = $db->connect();

        //consulta
        $resultado=$mysqli->query("SELECT * FROM usuarios WHERE email = '$usuario' AND tipo = 'admin'");


        //valida usuario
        if($row = $resultado->fetch_assoc()){
            //valida password
            if($row["password"] == $password){
                //almacena datos de usuario en una sesión
                $_SESSION['usuario'] = $usuario;  
                header("Location: admin-dashboard");  
                exit();
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


    /********** 
    ** validaUsuario **
    **********/
    public function validaUsuario()
    {
       
    }


}