<?php include 'views/back/layout.php' ?> 


<?php startblock('contenido') ?> 

	<?php
        if(isset($_POST['enviar']))
        { 
            session_start();
            //valida campos vacíos
            if($_POST['usuario'] == '' or $_POST['password'] == '' or $_POST['repassword'] == '') { 
                echo 'Por favor llene todos los campos.';
            } else { 
                //valida contraseñas iguales
                if($_POST['password'] != $_POST['repassword']){ 
                   echo 'las contraseñas no son iguales';
                }else{
                    //llama a la clase
                    $back = new Back();
                    $resultado = $back->registro($_POST["usuario"], $_POST["password"]);
                }
            }
        }
    ?> 
   
    <!--*** FORM REGISTRO ***-->
    <div class="form-admin">
        <div class="subtitulo titulo-naranja"> 
            <h3>Registro</h3>
        </div>
        <form role="form" action="" method="POST" >
          <div class="form-group">
            <label for="email">Usuario</label>
            <input type="text" class="form-control" name="usuario">
          </div>
          <div class="form-group">
            <label for="pwd">Password</label>
            <input type="password" class="form-control" name="password">
          </div>
          <div class="form-group">
            <label for="pwd">Repetir Password</label>
            <input type="password" class="form-control" name="repassword">
          </div>
          <button type="submit" name="enviar" value="Registrar" class="btn btn-default">Registrar</button>
        </form>
		<a href="index-admin.php" >volver al Login</a>
    </div>
    <!--*** //FORM REGISTRO ***-->
	

<?php endblock() ?> 