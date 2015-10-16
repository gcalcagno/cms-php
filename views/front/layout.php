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
						$back = new Back();
						$resultado = $back->login($usuario, $password);
					}
				
					if(!isset($_SESSION['usuario'])){
					?>

			        <div class="frase">
			            <div class="subtitulo titulo-gris"> 
			                <h3>Login</h3>
			            </div>
			            <form role="form" class="form" action="index.php" method="post">
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
						<a href="registro.php" >Registrarme</a>
			        </div>
		        <?php
					}
				?>
		        <!-- END // LOGIN -->


		        <!-- ARTICULOS -->
		        <div class="articulos">
		            <div class="titulo-multiple"> 
		                <div class="subtitulo-a">
		                    <h3 class="text-uppercase b-gris7">Articulos recientes</h3>
		                </div>
		            </div>
		            <!--widget-->
		            <div class="widget">
		                <!--item-->
		                <div class="item col-xs-12 col-sm-12 col-md-12 ol-lg-12">
		                    <div class="imagen">
		                        <img src="assets/front/images/foto-post-3.jpg">
		                    </div>
		                    <div class="texto">
		                        <h6 class="text-uppercase text-verde">Videos</h6>
		                        <h4>Video charl sobre Ley Nacional Bosques nativos</h4>
		                    </div>
		                </div>
		                <!-- item-->
		                <!--item-->
		                <div class="item col-xs-12 col-sm-12 col-md-12 ol-lg-12">
		                    <div class="imagen">
		                        <img src="assets/front/images/foto-post-4.jpg">
		                    </div>
		                    <div class="texto">
		                        <h6 class="text-uppercase text-naranja">Noticias</h6>
		                        <h4>Se creó la reserva Nacional en Pizarro Salta</h4>
		                    </div>
		                </div>
		                <!-- item-->
		                <!--item-->
		                <div class="item col-xs-12 col-sm-12 col-md-12 ol-lg-12">
		                    <div class="imagen">
		                        <img src="assets/front/images/foto-post-1.jpg">
		                    </div>
		                    <div class="texto">
		                        <h6 class="text-uppercase text-marron">Articulos</h6>
		                        <h4>¿Por qué es importante crear el parque nacional La Felicidad?</h4>
		                    </div>
		                </div>
		                <!-- item-->
		                <!--item-->
		                <div class="item col-xs-12 col-sm-12 col-md-12 ol-lg-12">
		                    <div class="imagen">
		                        <img src="assets/front/images/foto-post-2.jpg">
		                    </div>
		                    <div class="texto">
		                        <h6 class="text-uppercase text-rosa">Eventos</h6>
		                        <h4>Taller Jardines Amigables con la Nayuraleza</h4>
		                    </div>
		                </div>
		                <!-- item-->
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


