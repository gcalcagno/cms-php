<?php
	error_reporting(E_ERROR | E_PARSE);
	require($_SERVER['DOCUMENT_ROOT'].'/assets/ti.php'); 
	require_once $_SERVER['DOCUMENT_ROOT']."/config/core.php";
?> 


	<!-- HEADER -->
	<?php include 'header.php'; ?>
	<!-- HEADER -->
	

	<body>

		<!-- MENU -->
		<?php include 'menu.php'; ?>
		<!-- END //MENU -->

		
		<!-- CONTENEDOR GENERAL -->
	   	<div class="contenedor col-xs-12 col-sm-12 col-md-12 ol-lg-12">
				

			<!--CONTENIDO -->
			<div class="contenido col-xs-12 col-sm-9 col-md-9 ol-lg-9">
					<?php startblock('contenido') ?> <?php endblock() ?> 
			</div>
			<!-- END // CONTENIDO -->
				

			<!-- SIDEBAR -->
		    <div class="sidebar col-xs-12 col-sm-3 col-md-3 ol-lg-3">

		        <!-- LOGIN -->
				<?php

			        if (isset($_POST["email"]) && !empty($_POST["email"])) {
					    $usuario = $_POST["email"];   
						$password = $_POST["password_usuario"];
						$UsuarioFront = new UsuarioFront();
						$resultado = $UsuarioFront->login($usuario, $password);
					}
					
					$uri = $_SERVER['REQUEST_URI'];
					$parte=explode ('/',$uri);
					$i= $parte[1];

					if(isset($_POST['enviar']))
			        { 
			            //valida campos vacíos
			            if(
			              $_POST['admin'] == '' ||
			              $_POST['password_usuario'] == '' 
			              ) { 
			              	$errorRequired ='Por favor llene todos los campos. ';
			            } 
			        }

					if(!isset($_SESSION['usuario']) && $i != 'registro'){
					?>
					<p class="subtitulo-general text-uppercase">Ingresá para ver mas categorías y filtrar según tus preferencias.</p>
			           	
			        <div class="login">
			        	<h3 class="text-uppercase subtitulo-default">Login</h3>
			        	<?php if(isset($errorRequired)){?>
							<div class="alert alert-danger"><?php echo $errorRequired ;?></div>
						<?php }?>
			            <form role="form" class="form" action="" method="post">
						  	<div class="form-group">
						    	<label>Email</label>
						    	<input name="email" type="email" class="form-control"  >
						  	</div>
						  	<div class="form-group">
						    	<label>Password</label>
						   		<input name="password_usuario" type="password" class="form-control"  >
						 	</div>
						 	<button name="enviar" type="submit" class="btn enviar text-uppercase">Ingresar</button>
						</form>
						<a href="/registro" class="lnk text-uppercase" >Registrarme</a>
						<a href="/recuperar-pass" class="lnk2 text-uppercase" >Recuperar Contraseña</a>
			        </div>
		        <?php
					}
				?>
		        <!-- END // LOGIN -->


		        <!-- ARTICULOS -->
		        <div class="articulos">
		            
		            <h3 class="text-uppercase subtitulo-default">Articulos recientes</h3>
		            
		            <!--widget-->
		            <div class="widget">

		            <?php
						//instancia clases
						$NoticiasFront = new NoticiasFront();
						$CategoriasFront = new CategoriasFront();

						//listado de post
						if(!isset($_SESSION['usuario'])){
							$articulosRecientes = $NoticiasFront->noticiasRecientes('generales');
						}else{
							$articulosRecientes = $NoticiasFront->noticiasRecientes('all');
						}
						

			  			while($row = $articulosRecientes->fetch_assoc()){
				  			$imagen = $NoticiasFront->imagenPortadaNoticia($row['id']);
				  			$categoria = $CategoriasFront->categoriaNoticia($row['id']);
			           	?>

						<!--item-->
						<a href="/noticia/<?php echo $row['id']; ?>">
			                <div class="item col-xs-12 col-sm-12 col-md-12 ol-lg-12">
			                    <div class="imagen" style="background-image: url(/uploads/<?php echo $imagen; ?>)">
			                    </div>
			                    <div class="texto">
			                        <h6 class="text-uppercase text-naranja">
			                        <?php 
								        foreach($categoria as $cat){
											echo '<span class="glyphicon glyphicon-tag"></span>'.$cat. ' ';
										}
								 	?>
								 	</h6>
			                        <h4><?php echo $row['titulo']; ?></h4>
			                    </div>
			                </div>
		                </a>
		                <!-- item-->
					<?php
			        	}
		        	?>

		            </div>
		            <!--widget-->
		        </div>
		        <!-- END // ARTICULOS -->

		    </div>
		    <!-- END // SIDEBAR -->


		</div>
		<!-- END // CNTENEDOR GENERAL -->


		<!-- FOOTER -->
		<?php include 'footer.php'; ?>
	    <!-- END // FOOTER -->


