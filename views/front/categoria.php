<?php include 'views/front/layout.php' ?> 


<?php startblock('contenido') ?> 

<!--*** ARTICULOS RELACIONADOS ***-->
	<div class="bloque-posteos-relacionados bloque">
		<div class="subtitulo titulo-naranja"> 
			<h3>Categorias</h3>
		</div>
		<!--Bloque posteos-->
		<div class="bloque">

			<?php
				//instancia clases
				$front = new Front();
				$general = new General();

				//listado de post
				$resultado = $front->listadoCategoria();
	  			while($row = $resultado->fetch_assoc()){
	           	?>
	           	<!--item categoria-->
					<p><?php echo $row['nombre']; ?></p>
				<!-- item categoria-->
			<?php
	        	}
        	?>
		</div>
		<!--//Bloque posteos-->
	</div>
	<!--*** //ARTICULOS RELACIONADOS ***-->

	<?php endblock() ?> 