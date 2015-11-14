<?php
	//validamos si se inició sesión
	if(isset($_SESSION['admin'])) 
	{
		header('Location: /admin-dashboard'); 
	  	exit();
	}
?>

<?php include 'views/back/layout-login.php' ?> 


<?php startblock('contenido') ?> 

	<!-- LOGIN -->
	<?php
		$UsuarioBack = new UsuarioBack();

        if (isset($_POST["admin"]) && !empty($_POST["admin"])) {
		    $usuario = $_POST["admin"];   
			$password = $_POST["password_usuario"];
			$mensaje = $UsuarioBack->login($usuario, $password);
		}
	
		?>

        <div class="form-admin">
       		<?php if(isset($mensaje['error1'])){?>
				<div class="alert alert-danger"><?php echo $mensaje['error1'] ;?></div>
			<?php }?>
			<?php if(isset($mensaje['error2'])){?>
				<div class="alert alert-danger"><?php echo $mensaje['error2'] ;?></div>
			<?php }?>
            <div class="subtitulo titulo-gris"> 
                <span class="icon glyphicon glyphicon-lock"></span>
                <hr>
            </div>
            <form role="form" class="form" action="" method="post">
			  	<div class="form-group">
			    	<label class="text-uppercase">Usuario</label>
			    	<input name="admin" type="text" class="form-control" required >
			  	</div>
			  	<div class="form-group">
			    	<label class="text-uppercase">Contraseña</label>
			   		<input name="password_usuario" type="password" class="form-control" required >
			 	</div>
			 	<button name="iniciar" type="submit" class="text-uppercase btn ">Ingresar</button>
			</form>
        </div>

	<!-- END // LOGIN -->
	

<?php endblock() ?> 