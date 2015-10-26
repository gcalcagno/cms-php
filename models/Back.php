<?php


//CONECTA BASE DE DATOS
require_once "config/core.php";

class Back
{

    /********************** 
    ** Carga de Noticias **
    **********************/
    public function cargaNoticia($titulo, $texto, $descarga, $fecha, $imagen, $categoria)
    {
        $db = new Database();
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
        $noticia=$mysqli->query("INSERT INTO imagennoticia (nombre,idNoticia) VALUES ('$imagen','$idNoticia')");

        //valida
        if (!$resultado) {
            die('Invalid query: '. mysql_error());
        }else{
            echo 'Datos ingresados correctamente';
        }

        //$resultado->close();
    }

    /********************** 
    ** Listado Noticias **
    **********************/
    public function listado($tabla)
    {
        $db = new Database();
        $mysqli = $db->connect();

        //busca id noticia
        $resultado=$mysqli->query("SELECT * FROM $tabla ");

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
        //clase Database utiliza el método connect() para conectarse a la base de datos
        $db = new Database();
        $mysqli = $db->connect();

        //consulta
        $resultado=$mysqli->query("SELECT * FROM usuarios WHERE email = '$usuario'");


        //valida usuario
        if($row = $resultado->fetch_assoc()){
            //valida password
            if($row["password"] == $password){
                //almacena datos de usuario en una sesión
                session_start();  
                $_SESSION['usuario'] = $usuario;  
                header("Location: admin-dashboard");  
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
    public function registro($usuario, $password)
    {

        //clase Database utiliza el método connect() para conectarse a la base de datos
        $db = new Database();
        $mysqli = $db->connect();

        //consulta
        $resultado=$mysqli->query('SELECT * FROM usuarios');
        $verificar_usuario = 0;

        //valida usuario
        while($row = $resultado->fetch_assoc()){
            if($row["email"] == $usuario){ 
                $verificar_usuario = 1; 
            }
        } 
  
        //ingresa el usuario
        if($verificar_usuario == 0) { 
            $sql = "INSERT INTO usuarios (email,password) VALUES ('$usuario','$password')";//Se insertan los datos a la base de datos y el usuario ya fue registrado con exito.
            $resultado=$mysqli->query($sql);
            echo 'Usted se ha registrado correctamente.';
        //si el usuario ya existe muestra un mensaje
        } else { 
            echo 'Este usuario ya ha sido registrado anteriormente.'; 
        } 

        return $resultado;
        $resultado->close();
   
    }



    /*************
    ** Count **
    *************/
    public function count($tabla)
    {

        $db = new Database();
        $mysqli = $db->connect();

        $resultado=$mysqli->query("SELECT COUNT(*) FROM $tabla");
        
        $row = $resultado->fetch_row();
        return $row[0];
   
    }
}