<?php include 'views/front/layout.php' ?> 

<?php startblock("contenido") ?> 

	<?php 
		$FuncionesConfig = new FuncionesConfig();
		$NoticiasFront = new NoticiasFront();
		$CategoriasFront = new CategoriasFront();

		if(isset($_SESSION['usuario'])){ 
			foreach($usuarioCategoria as $categoria){
	?>
	
			<!--*** CATEGORIA USUARIO ***-->
			<div class="bloque-posteos-relacionados bloque">
				<div class="subtitulo titulo-naranja"> 
					<h3>
						<i class="icon-menu logout icon glyphicon glyphicon-star "></i> 
						<?php echo $categoria; ?>
					</h3>
				</div>
				<!--Bloque posteos-->
				<div class="posteos">

					<?php
						//listado de post
						$noticiaCategoria = $NoticiasFront->listadoNoticia($categoria);
			  			while($row = $noticiaCategoria->fetch_assoc()){
				  			$imagen = $NoticiasFront->imagenPortadaNoticia($row['id']);
				  			$categoria = $CategoriasFront->categoriaNoticia($row['id']);
			           	?>
			           		<!--item post-->
			           		<a href="noticia/<?php echo $row['id']; ?>">
								<div class="item col-xs-12 col-sm-4 col-md-4 ol-lg-4">
									<div class="imagen" style="background-image: url(/uploads/<?php echo $imagen; ?>)">
								
									</div>
									<div class="texto">
										<h6 class="text-uppercase text-naranja"><?php 
									        foreach($categoria as $cat){
												echo '<span class="glyphicon glyphicon-tag"></span>'.$cat. ' ';
											}
										 ?></h6>
										<h4><?php $FuncionesConfig->limitarTextos($row['titulo'], 40); ?></h4>
										<p><?php $FuncionesConfig->limitarTextos($row['texto'], 150); ?></p>
									</div>
								</div>
							</a>
							<!-- item post-->
					<?php
			        	} //end while
		        	?>
				</div>
				<!--//Bloque posteos-->

			</div>
			<!--*** //CATEGORIA USUARIO  ***-->


		<?php
			}//end foreach
		?>


	<?php 
		}//end if
	?>

	<!--*** CATEGORIA GENERAL ***-->
	<div class="bloque-posteos-relacionados bloque">
		<div class="subtitulo titulo-naranja"> 
			<h3>Noticias Generales</h3>
		</div>
		<!--Bloque posteos-->
		<div class="posteos">

			<?php
	  			while($row = $noticiasGenerales->fetch_assoc()){
		  			$imagen = $NoticiasFront->imagenPortadaNoticia($row['id']);
				  	$categoria = $CategoriasFront->categoriaNoticia($row['id']);
	           	?>
	           		<!--item post-->
	           		<a href="noticia/<?php echo $row['id']; ?>">
						<div class="item col-xs-12 col-sm-4 col-md-4 ol-lg-4">
							<div class="imagen" style="background-image: url(uploads/<?php echo $imagen; ?>)"></div>
							<div class="texto">
								<h6 class="text-uppercase text-naranja">
									<?php 
								        foreach($categoria as $cat){
											echo '<span class="glyphicon glyphicon-tag"></span> '.$cat. ' ';
										}
									?>
								</h6>
								<h4><?php $FuncionesConfig->limitarTextos($row['titulo'], 40); ?></h4>
								<p><?php $FuncionesConfig->limitarTextos($row['texto'], 150); ?></p>
							</div>
						</div>
					</a>
					<!-- item post-->
			<?php
	        	}
        	?>
		</div>
		<!--//Bloque posteos-->

	</div>
	<!--*** //CATEGORIA GENERAL ***-->
	
<?php endblock() ?> 