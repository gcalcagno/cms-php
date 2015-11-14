<?php session_start(); ?>

<?php
	include 'sesionValida.php';
	require_once $_SERVER['DOCUMENT_ROOT']."/config/core.php";
?>

<?php

	$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;
	$texto = isset($_POST['texto']) ? $_POST['texto'] : null;
	$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
	
	function validaRequerido($valor){
        if(empty($valor)){
            return false;
        }else{
            return true;
        }
    }

	//Si recibe parametros post
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	    	// Recibimos por POST los datos procedentes del formulario   
			$id = $_POST["id"]; 
			$CategoriasBack = new CategoriasBack();
			$mensaje = $CategoriasBack->eliminarCategoria($id);
    
    } 


?>

<?php include dirname(__FILE__).'/layout.php' ?> 

<?php startblock('contenido') ?> 

	<?php
		if (isset($_GET["id"]) && $_GET["id"] != '1'){
			$CategoriasBack = new CategoriasBack();
			$categoria = $CategoriasBack->datos($_GET["id"]);
			while($row = $categoria->fetch_assoc()){
				$nombreCat = $row['nombre'];
			}
	?>
	<div >  
   	
		<div class="col-lg-12 col-md-12">	
			<div class="title-page">
				<h3>
					<i class="icon-title fa fa-flag-o red"></i><strong>Eliminar Categoria</strong>
					<a href="/admin-categoria"> 
						<button type="button" class="text-uppercase btn btn-naranja pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Volver</button>
					</a>
				</h3>
			</div>

			<div class="panel panel-default">
				
				<div class="panel-body padding-block">
					<?php if(isset($mensaje['error'])){?>
						<div class="alert alert-danger"><?php echo $mensaje['error'] ;?></div>
					<?php }?>

					<?php if(isset( $mensaje['ok'] )){?>
						<div class="alert alert-success"><?php echo $mensaje['ok'] ;?></div>
					<?php }else{?>
						<?php if(isset( $nombreCat)){?>
						<form enctype="multipart/form-data" role="form" action="" method="POST" >
						 	<div class="form-group">
							    <label for="email">¿Esta seguro que quiere eliminar la categoria: " <?php echo $nombreCat; ?> "</label>
							   <input value="<?php echo $_GET["id"];?>" hidden type="text" class="form-control" name="id">
							</div>
							
							<button type="submit" class="btn  btn-naranja" id="btnLogA">Si</button>
						</form>
						<?php 
							}else{
								echo 'Categoria no encontrada';
						}?>

					<?php }?>
				</div>

			</div>	

		</div>

	</div>
	
	<?php 
		}else{
			echo 'La categoria <strong>Generales</strong> no se puede eliminar.';
		}
	?>
	
<?php endblock() ?> 