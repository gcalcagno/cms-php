<?php include 'views/front/layout.php' ?> 


<?php startblock('contenido') ?> 


	<!--*** ARTICULOS RELACIONADOS ***-->
	<div class="bloque-posteos-relacionados bloque">
		<div class="subtitulo titulo-naranja"> 
			<h3>Noticias Generales</h3>
		</div>
		<!--Bloque posteos-->
		<div class="posteos">

			<?php
				//instancia clases
				$front = new Front();
				$general = new General();

				//listado de post
				$resultado = $front->listadoNoticia();
	  			while($row = $resultado->fetch_assoc()){
	  			//imagenNoticia
	  			$portada = $front->imagenPortadaNoticia($row['id']);
	  			//categoriaNoticia
	  			$categoria = $front->categoriaNoticia($row['id']);
	           	?>
	           		<!--item post-->
					<div class="item col-xs-12 col-sm-4 col-md-4 ol-lg-4">
						<div class="imagen">
							<img src="uploads/<?php echo $portada; ?>">
						</div>
						<div class="texto">
							<h6 class="text-uppercase text-naranja"><?php 
						        foreach($categoria as $valor){
									echo $valor. ' ';
								}
							 ?></h6>
							<h4><?php $general->limitarTextos($row['titulo'], 50); ?></h4>
							<p><?php $general->limitarTextos($row['texto'], 150); ?></p>
						</div>
					</div>
					<!-- item post-->
			<?php
	        	}
        	?>
		</div>
		<!--//Bloque posteos-->
	</div>
	<!--*** //ARTICULOS RELACIONADOS ***-->

<?php endblock() ?> 