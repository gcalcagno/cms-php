<?php
	
	//carga controllers y modelos
	spl_autoload_register('load_controllers');
	spl_autoload_register('load_models');

	function load_controllers($class_name){
	    if(!file_exists('controllers/'.$class_name.'.php') )
	        return false;
	    require_once( 'controllers/'.$class_name.'.php');
	    return true;
	}

	function load_models($class_name){
	    if( !file_exists('models/'.$class_name.'.php') )
	        return false;
	    require_once('models/'.$class_name.'.php');
	    return true;
	}


	//instancia clases
	$front = new Front();
	$back = new Back();
	$general = new General();

?>