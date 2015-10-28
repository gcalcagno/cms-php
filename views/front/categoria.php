<?php include 'views/front/layout.php' ?> 


<?php startblock('contenido') ?> 

<!--*** ARTICULOS RELACIONADOS ***-->
	<div class="bloque-posteos-relacionados bloque">
		<div class="subtitulo titulo-naranja"> 
			<h3>Categorias</h3>
			<p class="subtitulo-general text-uppercase">Registrate y accedé a todas las categorias</p>
		</div>
		<!--Bloque categorias-->
		<div class="bloque">

			<?php
				//la variable catgorias viene del controlador
				while($row = $categorias->fetch_assoc()){ 
			?>
				<!--item categoria-->  
				<div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <div class="caption">
				        <h3><p class="text-uppercase"><?php echo $row['nombre']; ?></p></h3>
				        <p><?php echo $row['descripcion']; ?></p>
				      </div>
				    </div>
				</div>
				<!-- item categoria-->
			<?php
	        	}
        	?>
		</div>
		<!--//Bloque categorias-->
	</div>
	<!--*** //ARTICULOS RELACIONADOS ***-->

	<?php endblock() ?> 