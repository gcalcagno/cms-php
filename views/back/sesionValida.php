<?php
	//validamos si se inició sesión
	if(!isset($_SESSION['admin'])) 
	{
	  //header('Location: /admin'); 
	  echo '<script language="javascript">window.location="/admin"</script>;'; 
	  exit();
	}
?>