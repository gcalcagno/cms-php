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
							<h3><i class="fa fa-flag-o red"></i><strong>   Cargar Noticia</strong></h3>
						</div>

						<form enctype="multipart/form-data" role="form" action="" method="POST" >
						  <div class="form-group">
						    <label for="email">Titulo</label>
						    <input type="text" class="form-control" name="titulo">
						  </div>
						  <div class="form-group">
						    <label for="pwd">Texto:</label>
						    <textarea class="form-control" name="texto"></textarea>
						  </div>
						  <div class="form-group">
						    <label for="email">Lnk de Descarga</label>
						    <input type="text" class="form-control" name="descarga">
						  </div>

						  <div class="form-group">
						    <label for="email">Img Portada</label>
						    <input class="form-control" name="uploadedfile" type="file" />
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
						  </div>

						  <button type="submit" class="btn btn-default" id="btnLogA">Cargar</button>
						</form>

					</div>
						
				</div>
			</div>	

          </section>
      </section>



	<?php
		
		//Si recibe parametros post
	    if (!empty($_POST)) {
	    	// Recibimos por POST los datos procedentes del formulario   
			$titulo = $_POST["titulo"];   
			$texto = $_POST["texto"]; 
			$descarga = $_POST["descarga"];  
			$fecha = date("Y-m-d"); 
			$categoria = $_POST["categoria"]; 
			print_r($_POST);
			$target_path = "uploads/";
			$target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 
			if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) { 
				echo "El archivo ". basename( $_FILES['uploadedfile']['name']). " ha sido subido";
			} else{
				echo "Ha ocurrido un error, trate de nuevo!";
			}
			$imagen =  $_FILES['uploadedfile']['name'];
			//Llamamos al metodo para insertar los datos
			$back = new Back();
			$back->cargaNoticia($titulo, $texto, $descarga, $fecha, $imagen, $categoria);
	    }
	?>

<?php endblock() ?> 