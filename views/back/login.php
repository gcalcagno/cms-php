<?php include 'views/back/layout-login.php' ?> 


<?php startblock('contenido') ?> 

	<!-- LOGIN -->
	<?php
        if (isset($_POST["admin"]) && !empty($_POST["admin"])) {
		    $usuario = $_POST["admin"];   
			$password = $_POST["password_usuario"];
			$UsuarioBack = new UsuarioBack();
			$resultado = $UsuarioBack->login($usuario, $password);
		}
	
		if(!isset($_SESSION['usuario'])){
		?>

        <div class="form-admin">
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
    <?php
		}
	?>
	<!-- END // LOGIN -->
	

<?php endblock() ?> 