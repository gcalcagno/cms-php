<?php
	//crea la sesion
	session_start();

	//validamos si se inició sesión
	if(!isset($_SESSION['usuario'])) 
	{
	  header('Location: index.php'); 
	  exit();
	}
?>

<?php include 'views/back/layout.php' ?> 

<?php startblock('contenido') ?> 


<?php //instancia clases
	$back = new Back();
	$general = new General();
	//listado de noticias
	$resultado = $back->listado('usuarios');
?>


   	<div class="tablas">  
   	
		<div class="col-lg-12 col-md-12">	
			<div class="title-page">
				<h3>
					<i class="icon-title icon glyphicon glyphicon-user"></i><strong>Usuarios</strong>
				</h3>
			</div>

			<div class="panel panel-default">
				
				<div class="panel-body">
					<table class="table bootstrap-datatable countries">
						<thead>
							<tr>
								<th class="text-uppercase">Nombre</th>
								<th class="text-uppercase">Apellido</th>
								<th class="text-uppercase">Email</th>
								<th class="text-uppercase center">Activo</th>
								<th></th>
							</tr>
						</thead>   
						<tbody>
						<?php 
						while($row = $resultado->fetch_assoc()){?>
							<tr>
								<td><?php echo $row['nombre']; ?></td>
								<td><?php echo $row['apellido']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td class="center">
									<?php if( $row['activo'] == '1'){
										echo 'si';
									}else{
										echo 'no';
									}?>
								</td>
							</tr>

							<?php } ?>
						</tbody>
					</table>
				</div>

			</div>	

		</div>

	</div>

<?php endblock() ?> 