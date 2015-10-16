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

<h1>BIENVENIDO</h1>
<a href="logout.php">Cerrar Sesión</a>
