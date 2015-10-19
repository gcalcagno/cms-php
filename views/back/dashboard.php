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

			<div class="jumbotron">
				<h1 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h1>
			</div>       
              
            <div class="row">
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="thumbnail">
						<div class="title"><i class="fa fa-flag-o"></i> Noticias</div>
						<div class="count">0</div>				
					</div>		
				</div>
				
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				 	<div class="thumbnail">
				      	<div class="title"><i class="glyphicon glyphicon-tags"></i>Categorias</div>
						<div class="count">0</div>	
				    </div>
				</div>
				
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="thumbnail">
						<div class="title"><i class="glyphicon glyphicon-user"></i>Usuarios</div>	
						<div class="count">0</div>		
					</div>		
				</div>
				
			</div>

          </section>
      </section>

<?php endblock() ?> 