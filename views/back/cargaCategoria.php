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

<section id="main-content">

   	<section class="wrapper">  
   			
			<br><br>

			<div class="row">
               	
				<div class="col-lg-9 col-md-12">	
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3><i class="fa fa-flag-o red"></i><strong>   Cargar Categoria</strong></h3>
						</div>

						<form enctype="multipart/form-data" role="form" action="carga.php" method="POST" >
						  <div class="form-group">
						    <label for="nombre">nombre</label>
						    <input type="text" class="form-control" name="nombre">
						  </div>
						  <button type="submit" class="btn btn-default" id="btnLogA">Cargar</button>
						</form>

					</div>
						
				</div>
			</div>	

          </section>
      </section>




<?php endblock() ?> 