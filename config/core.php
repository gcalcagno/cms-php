<?php
//carga clases
define('PATH_CFG','clases/');
function __autoload($class_name){
    require_once('clases/'.$class_name.'.php');
}
?>