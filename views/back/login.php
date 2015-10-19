<?php include 'views/back/layout.php' ?> 


<?php startblock('contenido') ?> 

	<!-- LOGIN -->
	<?php
        if (isset($_POST["admin"]) && !empty($_POST["admin"])) {
		    $usuario = $_POST["admin"];   
			$password = $_POST["password_usuario"];
			$back = new Back();
			$resultado = $back->login($usuario, $password);
		}
	
		if(!isset($_SESSION['usuario'])){
		?>

        <div class="form-admin">
            <div class="subtitulo titulo-gris"> 
                <h3>Login</h3>
            </div>
            <form role="form" class="form" action="" method="post">
			  	<div class="form-group">
			    	<label>Usuario</label>
			    	<input name="admin" type="text" class="form-control" required >
			  	</div>
			  	<div class="form-group">
			    	<label>Password</label>
			   		<input name="password_usuario" type="password" class="form-control" required >
			 	</div>
			 	<button name="iniciar" type="submit" class="btn enviar">Enviar</button>
			</form>
			<a href="registro-admin.php" >Registrarme</a>
        </div>
    <?php
		}
	?>
	<!-- END // LOGIN -->
	

<?php endblock() ?> 