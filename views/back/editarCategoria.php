<?php session_start(); ?>

<?php
	include 'sesionValida.php';
	require_once $_SERVER['DOCUMENT_ROOT']."/config/core.php";
?>

<?php
		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
	
		
		function validaRequerido($valor){
	        if(empty($valor)){
	            return false;
	        }else{
	            return true;
	        }
	    }

		//Si recibe parametros post
	    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	    	if (!validaRequerido($nombre)) {
		        $errores[] = 'El campo nombre es obligatorio.';
		        $errorNombre ='El campo nombre es obligatorio.';
		    }


		    if (empty($errores)) {
				$CategoriasBack = new CategoriasBack();
				$mensajeOk = $CategoriasBack->updateCategoria($_GET["id"], $nombre);
			}
	    
	    } 

	?>

<?php include dirname(__FILE__).'/layout.php' ?> 


<?php startblock('contenido') ?> 

	<?php

		if (isset($_GET["id"])){
			$CategoriasFront = new CategoriasFront();
			$NoticiasFront = new NoticiasFront();
			$CategoriasBack = new CategoriasBack();
			$resultado = $CategoriasBack->editarCategoria($_GET["id"]);
		
			while($row = $resultado->fetch_assoc()){
	?>
	<div >  
   	
		<div class="col-lg-12 col-md-12">	
			<div class="title-page">
				<h3>
					<i class="icon-title fa fa-flag-o red"></i><strong>Editar Categoria</strong>
					<a href="/admin-categoria"> 
						<button type="button" class="text-uppercase btn btn-naranja pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Volver</button>
					</a>
				</h3>
			</div>

			<div class="panel panel-default">
				
				<div class="panel-body padding-block">
					<?php if(isset($mensajeOk)){?>
						<div class="alert alert-success"><?php echo $mensajeOk ;?></div>
					<?php }?>
					<?php if(isset($errorCategoria)){?>
						<div class="alert alert-danger"><?php echo $errorCategoria ;?></div>
					<?php }?>
					<form enctype="multipart/form-data" role="form" action="" method="POST" >
						<?php if(isset($errorNombre)){?>
							<div class="alert alert-danger"><?php echo $errorNombre ;?></div>
						<?php }?>
						<div class="form-group">
						    <label for="nombre">nombre</label>
						    <input value="<?php echo $row['nombre'];?>" type="text" class="form-control" name="nombre">
						</div>
						
						<button type="submit" class="btn  btn-naranja" id="btnLogA">Guardar</button>
					</form>
				</div>

			</div>	

		</div>

	</div>
	
	<?php 
			}
		}
	?>
	
<?php endblock() ?> 