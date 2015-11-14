<?php
	include 'sesionValida.php';
?>

<?php include 'views/back/layout.php'; ?> 

<?php startblock('contenido') ?> 


<?php //instancia clases
	$FuncionesConfig = new FuncionesConfig();
?>


	<div class="tablas">  
   	
		<div class="col-lg-12 col-md-12">	
			<div class="title-page">
				<h3>
					<i class="icon-title glyphicon glyphicon-list-alt"></i><strong>Noticias</strong>
					<a href="/admin-noticia-carga"> 
						<button type="button" class="text-uppercase btn btn-naranja pull-right"><i class="glyphicon glyphicon-plus"></i> Agregar noticia</button>
					</a>
				</h3>
			</div>

			<div class="panel panel-default">
				
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th class="text-uppercase col-10 center">Fecha</th>
								<th class="text-uppercase col-20 center">Titulo</th>
								<th class="text-uppercase col-30 center">Texto</th>
								<!--<th class="text-uppercase col-20 center">Link de Descarga</th>-->
								<th class="text-uppercase col-5 center">Activo</th>
								<th class="text-uppercase col-5 center"></th>
							</tr>
						</thead>   
						<tbody>
						<?php 
						while($row = $resultado->fetch_assoc()){?>
							<tr>
								<td ><?php echo $row['fecha']; ?></td>
								<td ><?php echo $row['titulo']; ?></td>
								<td ><?php $FuncionesConfig->limitarTextos($row['texto'], '150'); ?>
								</td>
								<!--<td ><?php //echo $row['descarga']; ?></td>-->
								<td class="center">
									<?php if( $row['activo'] == '1'){
										echo 'si';
									}else{
										echo 'no';
									}?>
								</td>
								<td class="center">
									<a href="eliminarNoticia/<?php echo $row['id']; ?>" >
										<button type="button" class="text-uppercase btn btn-edit pull-right"> <span class="glyphicon glyphicon-remove"></span></button>
									</a>
									<a href="editarNoticia/<?php echo $row['id']; ?>" >
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