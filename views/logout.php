<?php 
 //Vaciar sesión
 $_SESSION = array();
 //Destruir Sesión
 session_destroy();
 //Redireccionar a login.php
 echo '<script language="javascript">window.location="/home"</script>;';

?>