<?php
	include 'sesionValida.php';
?>

<?php include 'views/back/layout.php' ?> 

<?php startblock('contenido') ?> 

   	<div class="dashboard">  

			<div class="jumbotron">
				<h1 class="title"><i class="fa fa-laptop"></i> Dashboard</h1>
				<p class="text">Bienvenido al Backend CMS </p>
			</div>      

			<div class="block-dashboard">
				<a href="/admin-noticia">
					<div class="block-item">
						<div class="panel panel-primary ">
						  <div class="panel-body">
							  	<div class="col-lg-12 col-md-12">
							  		<i class="icon glyphicon glyphicon-list-alt"></i> 
							  	</div>
						    	<hr>
						    	<div class="title">Noticias</div>
								<div class="count"><?php echo $countNoticias ;?></div>	
						  	</div>
						</div>
					</div>
				</a>

				<a href="/admin-categoria">
					<div class="block-item">
						<div class="panel panel-primary">
						 	<div class="panel-body">
						      	<div class="col-lg-12 col-md-12">
							  		<i class="icon glyphicon glyphicon-tags"></i>
							  	</div>
						    	<hr>
						      	<div class="title">Categorias</div>
								<div class="count"><?php echo $countCategorias ;?></div>	
						    </div>
						</div>
					</div>
				</a>
				
				<a href="/admin-usuario">
					<div class="block-item">
						<div class="panel panel-primary">
							<div class="panel-body">
								<div class="col-lg-12 col-md-12">
							  		<i class="icon glyphicon glyphicon-user"></i>
							  	</div>
							  	<hr>
								<div class="title">Usuarios</div>	
								<div class="count"><?php echo $countUsuarios ;?></div>		
							</div>		
						</div>
					</div>
				</a>
				
          </div>
     </div>
<?php endblock() ?> 