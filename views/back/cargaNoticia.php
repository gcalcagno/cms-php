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

		    	// Recibimos por POST los datos procedentes del formulario   
				$texto = $_POST["texto"]; 
				$descarga = $_POST["descarga"];  
				$fecha = date("Y-m-d"); 
				$categoria = $_POST["categoria"]; 
				print_r($_POST);
				$target_path = "uploads/";
				$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
				if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) { 
					echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";
					$imagen =  $_FILES['uploadedfile']['name'];
				} else{
					echo "Ha ocurrido un error, trate de nuevo!";
				}
				$imagen =  $_FILES['uploadedfile']['name'];
				//Llamamos al metodo para insertar los datos
				$back = new Back();
				$mensajeOk = $back->cargaNoticia($titulo, $texto, $descarga, $fecha, $imagen, $categoria);
			}
	    
	    }


	?>
<?php include 'views/back/layout.php' ?> 

<?php startblock('contenido') ?> 
<div >  
   	
		<div class="col-lg-12 col-md-12">	
			<div class="title-page">
				<h3>
					<i class="icon-title fa fa-flag-o red"></i><strong>Cargar Noticia</strong>
					<a href="admin-noticia"> 
						<button type="button" class="text-uppercase btn btn-naranja pull-right"><i class="glyphicon glyphicon-arrow-left"></i> Volver</button>
					</a>
				</h3>
			</div>

			<div class="panel panel-default">
				
				<div class="panel-body padding-block">
					<?php if(isset($mensajeOk)){?>
					<div class="alert alert-success"><?php echo $mensajeOk ;?></div>
					<?php }?>
					<form enctype="multipart/form-data" role="form" action="" method="POST" >
						  <div class="form-group">
						    <label for="email">Titulo</label>
						    <input type="text" class="form-control" name="titulo">
						  </div>
						  <?php if(isset($errorTitulo)){?>
							<div class="alert alert-danger"><?php echo $errorTitulo ;?></div>
							<?php }?>
						  <div class="form-group">
						    <label for="pwd">Texto:</label>
						    <textarea class="form-control" name="texto"></textarea>
						  </div>
						  <?php if(isset($errorTexto)){?>
							<div class="alert alert-danger"><?php echo $errorTexto ;?></div>
							<?php }?>
						  <div class="form-group">
						    <label for="email">Lnk de Descarga</label>
						    <input type="text" class="form-control" name="descarga">
						  </div>

						  <div class="form-group">
						    <label for="email">Img Portada</label>
						    <input class="form-control " name="uploadedfile" type="file" />
						  </div>

						  <div class="form-group">
						    <label for="email">Categorias:</label><br>
							<?php $front = new Front();
							//listado de categorias
							$resultado = $front->listadoCategoria();
							while($row = $resultado->fetch_assoc()){
						    ?>
						    <label for="email"><?php echo $row['nombre']; ?></label>
						    <input type="checkbox"  name="categoria[]" value="<?php echo $row['id']; ?>">

						    <?php } ?>
						    <?php if(isset($errorCategoria)){?>
							<div class="alert alert-danger"><?php echo $errorCategoria ;?></div>
							<?php }?>
						  </div>

						  <button type="submit" class="btn  btn-naranja" id="btnLogA">Cargar</button>
						</form>
				</div>

			</div>	

		</div>

	</div>




<?php endblock() ?> 