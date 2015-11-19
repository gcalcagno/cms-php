<?php session_start(); ?>

<?php
	include 'sesionValida.php';
	require_once $_SERVER['DOCUMENT_ROOT']."/config/core.php";
?>

<?php
		$titulo = isset($_POST['titulo']) ? $_POST['titulo'] : null;
		$texto = isset($_POST['texto']) ? $_POST['texto'] : null;
		$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : null;
		$descarga = isset($_POST['descarga']) ? $_POST['descarga'] : null;
		$imagen = isset($_FILES['uploadedfile']['name']) ? $_FILES['uploadedfile']['name'] : null;
		
		$fecha = date("Y-m-d"); 
		
		function validaRequerido($valor){
	        if(empty($valor)){
	            return false;
	        }else{
	            return true;
	        }
	    }

		//Si recibe parametros post
	    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	    	if (!validaRequerido($titulo)) {
		        $errores[] = 'El campo titulo es obligatorio.';
		        $errorTitulo ='El campo titulo es obligatorio.';
		    }

		    if (!validaRequerido($texto)) {
		        $errores[] = 'El campo texto es obligatorio.';
		        $errorTexto ='El campo texto es obligatorio.';
		    }

		    if (!validaRequerido($categoria)) {
		        $errores[] = 'Debe seleccionar al menos una categoría.';
		        $errorCategoria ='Debe seleccionar al menos una categoría.';
		    }

		    if (empty($errores)) {
		    	if($imagen != null) {
					$target_path =  $_SERVER['DOCUMENT_ROOT']."/uploads/";
					$token = rand(1, 10000000000000000);
					$target_path = $target_path.$token; 
					if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) { 
						$imagen =  $token;
					} 
					$imagen =  $token;
		    	}
				
				$NoticiasBack = new NoticiasBack();
				$mensajeOk = $NoticiasBack->updateNoticia ($_GET["id"], $titulo, $texto, $descarga, $fecha, $imagen, $categoria);
			}
	    
	    } 

	?>

<?php include dirname(__FILE__).'/layout.php' ?> 


<?php startblock('contenido') ?> 

	<?php

		if (isset($_GET["id"])){
			$CategoriasFront = new CategoriasFront();
			$NoticiasFront = new NoticiasFront();
			$NoticiasBack = new NoticiasBack();
			$resultado = $NoticiasBack->editarNoticia($_GET["id"]);
		
			while($row = $resultado->fetch_assoc()){
				$imagen = $NoticiasFront->imagenPortadaNoticia($row['id']);
				$categoria = $CategoriasFront->categoriaNoticia($row['id']);
	?>
	<div >  
   	
		<div class="col-lg-12 col-md-12">	
			<div class="title-page">
				<h3>
					<i class="icon-title fa fa-flag-o red"></i><strong>Editar Noticia</strong>
					<a href="/admin-noticia"> 
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
						<div class="form-group">
						    <label for="titulo">Título</label>
						    <input value="<?php echo $row['titulo'];?>" type="text" class="form-control" name="titulo">
						</div>
						<?php if(isset($errorTitulo)){?>
							<div class="alert alert-danger"><?php echo $errorTitulo ;?></div>
						<?php }?>
						<div class="form-group">
						    <label for="pwd">Texto</label>
						    <textarea class="form-control" name="texto"><?php echo $row['texto'];?></textarea>
						</div>
						<?php if(isset($errorTexto)){?>
							<div class="alert alert-danger"><?php echo $errorTexto ;?></div>
						<?php }?>

						  <!--<div class="form-group">
						    <label for="descarga">Link de Descarga</label>
						    <input value="<?php //echo $row['descarga'];?>"type="text" class="form-control" name="descarga">
						  </div>-->

						<div class="form-group">
						    <label for="uploadedfile">Img Portada</label>
						    <div class="imagen-post" style="background-image: url(/uploads/<?php echo $imagen; ?>)"></div>
						    <input class="form-control " name="uploadedfile" type="file" value ="<?php echo $imagen; ?>"/>
						</div>

						<div class="form-group">
						    <label for="categoria">Categorías</label><br>
							<?php $CategoriasBack = new CategoriasBack();

							//listado de categorias
							$resultado = $CategoriasBack->listado();
							while($row = $resultado->fetch_assoc()){
						    ?>
						    <p>
						   		<label for="email"><?php echo $row['nombre']; ?></label>
							    <input type="checkbox" name="categoria[]" value="<?php echo $row['id']; ?>"
										<?php
											$categoriaNoticia = $CategoriasBack->categoriaNoticiaCheck($row['id'], $_GET["id"]);
											//si la categoria esta asignada a esa noticia
											if($categoriaNoticia == true ){
												echo 'checked';
											}
										?>
							    >
						    </p>	
						    <?php } ?>

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