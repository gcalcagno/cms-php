<?php

	//validamos si se inició sesión
	if(!isset($_SESSION['usuario'])) 
	{
	  header('Location: index.php'); 
	  exit();
	}
?>

<?php include 'views/back/layout.php' ?> 

<?php startblock('contenido') ?> 

   	<div class="tablas">  
   	
		<div class="col-lg-12 col-md-12">	
			<div class="title-page">
				<h3>
					<i class="icon-title icon glyphicon glyphicon-tags"></i><strong>Categorias</strong>
					<a href="/admin-categoria-carga"> 
						<button type="button" class="text-uppercase btn  btn-naranja pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar categoria</button>
					</a>
				</h3>
			</div>

			<div class="panel panel-default">
				
				<div class="panel-body">
					<table class="table bootstrap-datatable countries">
						<thead>
							<tr>
								<th class="text-uppercase">Nombre</th>
								<th class="text-uppercase center">Activo</th>
								<th></th>
							</tr>
						</thead>   
						<tbody>
						<?php 
						while($row = $resultado->fetch_assoc()){?>
							<tr>
								<td><?php echo $row['nombre']; ?></td>
								<td class="center">
									<?php if( $row['activo'] == '1'){
										echo 'si';
									}else{
										echo 'no';
									}?>
								</td>
								<td>
									<a href="#" >
										<button type="button" class="text-uppercase btn btn-edit pull-right"> <span class="glyphicon glyphicon-pencil"></span></button>
									</a> 
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