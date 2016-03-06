<?php @session_start();?>
<?php
      //carga todas las clases
      require_once $_SERVER['DOCUMENT_ROOT']."/config/core.php";
?>

<!DOCTYPE html>
<html lang="es">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
      <title> Backend - CMS </title>

      <!-- Favicon -->
      <link rel="shortcut icon" type="image/png" href="/assets/back/images/favicon.png"/>
      
      <!-- librerías opcionales que activan el soporte de HTML5 para IE8 -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      
      <!-- CSS de Bootstrap -->
      <link href="/assets/bootstrap-3.3.4/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <link href="/assets/bootstrap-3.3.4/css/bootstrap-social.css" rel="stylesheet" media="screen">
    
      <!-- CSS de font-awesome-4.3.0 para iconos sociales-->
      <link href="/assets/back/fonts/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" media="screen">
      
      <link rel="stylesheet" href="/assets/dataTables/css/jquery.dataTables.css">
      
      <!-- CSS -->
      <link href="/assets/back/css/estilos.css?v=05" rel="stylesheet" media="screen">
    
    </head>