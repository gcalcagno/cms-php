<?php
	include 'sesionValida.php';

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
			$mensaje = $CategoriasBack->cargaCategoria($nombre);
		}
    }

?>

<?php include 'views/back/layout.php' ?> 

<?php startblock('contenido') ?> 
<div >  
   	
		<div class="col-lg-12 col-md-12 col-sm-12">	
			<div class="title-page">
				<h3>
					<i class="icon-title fa fa-flag-o red"></i><strong>Cargar Categoria</strong>
					<a href="/admin-categoria"> 
						<button type="button" class="text-uppercase btn btn-naranja pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Volver</button>
					</a>
				</h3>
			</div>

			<div class="panel panel-default">
				
				<div class="panel-body padding-block">

					<?php if(isset( $mensaje['ok'] )){?>
						<div class="alert alert-success"><?php echo $mensaje['ok'] ;?></div>
					<?php }?>

					<?php if(isset($mensaje['error'])){?>
					<div class="alert alert-danger"><?php echo $mensaje['error'] ;?></div>
					<?php }?>

					<form class="col-lg-6 col-md-6 col-sm-12" enctype="multipart/form-data" role="form" action="" method="POST" >
					  <div class="form-group">
					    <label for="nombre">Nombre de Categoria</label>
					    <input type="text" class="form-control" name="nombre">
					  </div>
					  <?php if(isset($errorNombre)){?>
						<div class="alert alert-danger"><?php echo $errorNombre ;?></div>
						<?php }?>
					  <button type="submit" class="btn btn-naranja" id="btnLogA">Cargar</button>
					</form>
				</div>

			</div>	

		</div>

	</div>


<?php endblock() ?> 