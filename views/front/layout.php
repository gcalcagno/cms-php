<?php require_once 'assets/ti.php' ?> 


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

			        if (isset($_POST["admin"]) && !empty($_POST["admin"])) {
					    $usuario = $_POST["admin"];   
						$password = $_POST["password_usuario"];
						$front = new Front();
						$resultado = $front->login($usuario, $password);
						echo 'form';
					}
				
					if(!isset($_SESSION['usuario'])){
					?>

			        <div class="login">
			           	<h3 class="text-uppercase subtitulo-default">Login</h3>
			            <form role="form" class="form" action="" method="post">
						  	<div class="form-group">
						    	<label>Usuario</label>
						    	<input name="admin" type="text" class="form-control" required >
						  	</div>
						  	<div class="form-group">
						    	<label>Password</label>
						   		<input name="password_usuario" type="password" class="form-control" required >
						 	</div>
						 	<button name="iniciar" type="submit" class="btn enviar text-uppercase">Ingresar</button>
						</form>
						<a href="registro" class="lnk text-uppercase" >Registrarme</a>
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
						$front = new Front();
						$general = new General();

						//listado de post
						$articulosRecientes = $front->articulosRecientes();
			  			while($row = $articulosRecientes->fetch_assoc()){
			  				//imagenNoticia
				  			$portada = $front->imagenPortadaNoticia($row['id']);
				  			//categoriaNoticia
				  			$categoria = $front->categoriaNoticia($row['id']);
			           	?>

						<!--item-->
		                <div class="item col-xs-12 col-sm-12 col-md-12 ol-lg-12">
		                    <div class="imagen" style="background-image: url(uploads/<?php echo $portada; ?>)">
		                    </div>
		                    <div class="texto">
		                        <h6 class="text-uppercase text-naranja"><?php 
						        foreach($categoria as $valor){
									echo $valor. ' ';
								}
							 ?></h6>
		                        <h4><?php echo $row['titulo']; ?></h4>
		                    </div>
		                </div>
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


