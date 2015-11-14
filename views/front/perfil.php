<?php include 'views/front/layout.php' ?> 

<?php

	//validamos si se inició sesión
	if(!isset($_SESSION['usuario'])) 
	{
	  header('Location: index.php'); 
	  exit();
	}
?>

<?php startblock('contenido') ?> 

	<?php
		$CategoriasBack = new CategoriasBack();
		$UsuarioFront = new UsuarioFront();

		$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
		
		function validaRequerido($valor){
	        if(empty($valor)){
	            return false;
	        }else{
	            return true;
	        }
	    }

		//Si recibe parametros post
	    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		    if (!validaRequerido($categoria)) {
		        $errores[] = 'Debe seleccionar al menos una categoría.';
		        $errorCategoria ='Debe seleccionar al menos una categoría.';
		    }

		    if (empty($errores)) {
				$mensajeOk = $UsuarioFront->updateUsuarioCategoria ($id,$categoria);
			}
	    
	    } 

	?>

	<!-- MIS DATOS -->
   	<div class="tablas">  
   	
		<div class="col-lg-12 col-md-12">	
			<div class="title-page">
				<h3>
					<i class="icon-title icon glyphicon glyphicon-user"></i><strong>Mis Datos</strong>
				</h3>
			</div>

			<div class="panel panel-default">
				
				<div class="panel-body">
					<table class="table bootstrap-datatable countries">
						<thead>
							<tr>
								<th class="text-uppercase">Usuario</th>
								<th class="text-uppercase">Nombre</th>
								<th class="text-uppercase">Apellido</th>
							</tr>
						</thead>   
						<tbody>
							<tr>
								<td><?php echo $email; ?></td>
								<td><?php echo $nombre; ?></td>
								<td><?php echo $apellido; ?></td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>	

		</div>

	</div>
	<!-- MIS DATOS -->

	<!-- MIS CATEGORIAS -->
   	<div class="tablas">  
   	
		<div class="col-lg-12 col-md-12">	
			<div class="title-page">
				<h3>
					<i class="icon-title icon glyphicon glyphicon-tags"></i><strong>Mis Categorias</strong>
					<!--<a href="#"> 
						<button type="button" class="text-uppercase btn  btn-naranja pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar categoria</button>
					</a>-->
				</h3>
			</div>

			<?php if(isset($mensajeOk)){?>
				<div class="alert alert-success"><?php echo $mensajeOk ;?></div>
			<?php }?>
			<?php if(isset($errorCategoria)){?>
				<div class="alert alert-danger"><?php echo $errorCategoria ;?></div>
			<?php }?>

			<div class="panel panel-default">
				
				<div class="panel-body">
					<table class="table bootstrap-datatable countries">
						<thead>
							<tr>
								<th class="text-uppercase">Categorias</th>
								<th> Estado </th>
							</tr>
						</thead>   
						<tbody>
						<?php 
						 	//listado de categorias
							$resultado = $CategoriasBack->listado();
							while($row = $resultado->fetch_assoc()){
					    ?>
					    <form enctype="multipart/form-data" role="form" action="" method="POST" >
						    <tr>
						    	<?php if ($row['nombre'] != 'generales' && $row['nombre'] != 'Generales'){?>
						   		<td><label for="categoria"><?php echo $row['nombre']; ?></label></td>
						    	<td><input type="checkbox" name="categoria[]" value="<?php echo $row['id']; ?>"
									<?php
										$usuarioCat = $UsuarioFront->usuarioCategoriaCheck($id, $row['id']);
										//si la categoria esta asignada al usuario
										if($usuarioCat == true ){
											echo 'checked';
										}
									?>
						    	></td>
						    	<?php }?>
							</tr>
						    <?php } ?>

							<tr>
								<td colspan="2"> <button type="submit" name="enviar" value="Guardar" class="btn enviar btn-default text-uppercase">Guardar</button>
	        					</td>	
							</tr>
						</form>
						
						</tbody>
					</table>
				</div>

			</div>	

		</div>

	</div>
	<!-- MIS CATEGORIAS -->


	

<?php endblock() ?> 