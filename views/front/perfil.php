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


<?php //instancia clases

	//listado de noticias
	//$resultado = $back->listado('categoria');
	//$resultado = $front->usuarioCategoria($_SESSION['usuario']);
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
								<!--<th></th>-->
							</tr>
						</thead>   
						<tbody>
							<tr>
								<td><?php echo $email; ?></td>
								<td><?php echo $nombre; ?></td>
								<td><?php echo $apellido; ?></td>
								<!--<td>
									<a href="#" >
										<button type="button" class="text-uppercase btn btn-edit pull-right"> <span class="glyphicon glyphicon-pencil"></span></button>
									</a> 
								</td>-->
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

			<div class="panel panel-default">
				
				<div class="panel-body">
					<table class="table bootstrap-datatable countries">
						<thead>
							<tr>
								<th class="text-uppercase">Categorias</th>
								<!--<th></th>-->
							</tr>
						</thead>   
						<tbody>
						<?php 
						foreach($usuarioCategoria as $categoria){?>
							<tr>
								<td><?php echo $categoria ?></td>
								<!--<td>
									<a href="#" >
										<button type="button" class="text-uppercase btn btn-edit pull-right"> <span class="glyphicon glyphicon-pencil"></span></button>
									</a> 
								</td>-->
							</tr>

							<?php } ?>
						</tbody>
					</table>
				</div>

			</div>	

		</div>

	</div>
	<!-- MIS CATEGORIAS -->


	

<?php endblock() ?> 