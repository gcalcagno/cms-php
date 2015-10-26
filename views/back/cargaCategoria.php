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
<div >  
   	
		<div class="col-lg-12 col-md-12 col-sm-12">	
			<div class="title-page">
				<h3>
					<i class="icon-title fa fa-flag-o red"></i><strong>Cargar Categoria</strong>
					<a href="admin-categoria"> 
						<button type="button" class="text-uppercase btn btn-naranja pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Volver</button>
					</a>
				</h3>
			</div>

			<div class="panel panel-default">
				
				<div class="panel-body padding-block">
					<form class="col-lg-6 col-md-6 col-sm-12" enctype="multipart/form-data" role="form" action="carga.php" method="POST" >
					  <div class="form-group">
					    <label for="nombre">Nombre de Categoria</label>
					    <input type="text" class="form-control" name="nombre">
					  </div>
					  <button type="submit" class="btn btn-naranja" id="btnLogA">Cargar</button>
					</form>
				</div>

			</div>	

		</div>

	</div>






<?php endblock() ?> 