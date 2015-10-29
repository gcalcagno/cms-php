<?php include 'views/back/layout.php' ?> 


<?php startblock('contenido') ?> 

<?php

	if (isset($_GET["id"])){
		$NoticiasFront = new NoticiasFront();
		$resultado = $NoticiasFront->noticia($_GET["id"]);
	
		while($row = $resultado->fetch_assoc()){
			$imagen = $NoticiasFront->imagenPortadaNoticia($row['id']);
			$categoria = $CategoriasFront->categoriaNoticia($row['id']);
?>
			<!--*** NOTICIA ***-->
			<div class="noticia">
				<!-- head -->
				<div class="head">
					<div class="guia">
					<p class="text-uppercase item">categorias:</p>
						<p class="text-uppercase item text-naranja">
							<?php
								foreach($categoria as $cat){
									echo '<span class="glyphicon glyphicon-tag"></span>'.$cat. ' ';
								}
							?>
						</p>
					</div>
					<div class="titulo pull-left">
						<h1 class="pull-left naranja"><?php echo $row['titulo']; ?></h1>
						<hr>
					</div>
					
				</div>
				<!-- //head -->

				<!-- body (etiquta span = bold)-->
				<div class="body">
					<img src="uploads/<?php echo $imagen; ?>">
					<?php echo nl2br($row['texto']);?>
				</div>
				<!-- //body -->	

			</div>
			<!--*** //NOTICIA ***-->

<?php 
		}
	}
?>
	<?php endblock() ?> 