<?php
	//validamos si se inició sesión
	if(!isset($_SESSION['admin'])) 
	{
	  header('Location: /admin'); 
	  exit();
	}
?>