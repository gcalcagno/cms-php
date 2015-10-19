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
	$resultado = $back->listado('categoria');
?>

<section id="main-content">

   	<section class="wrapper">  
   			
			<br><br>

			<div class="row">
               	
				<div class="col-lg-12 col-md-12">	
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3><i class="fa fa-flag-o red"></i><strong>Categorias</strong>
							<a href="admin-categoria-carga">
							<button type="button" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Agregar categoria</button>
							</a></h3>
						</div>
						<div class="panel-body">
							<table class="table bootstrap-datatable countries">
								<thead>
									<tr>
										<th>Nombre</th>
										<th>Activo</th>
										<th></th>
									</tr>
								</thead>   
								<tbody>
								<?php 
								while($row = $resultado->fetch_assoc()){?>
									<tr>
										<td><?php echo $row['nombre']; ?></td>
										<td>
											<?php if( $row['activo'] == '1'){
												echo 'si';
											}else{
												echo 'no';
											}?>
										</td>
										<td>
											<a href="#" >
												<button type="button" class="btn btn-warning">Editar</button>
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

          </section>
      </section>

<?php endblock() ?> 