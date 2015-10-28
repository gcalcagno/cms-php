<?php
	
	//carga controllers y modelos
	spl_autoload_register('load_controllers');
	spl_autoload_register('load_models_front');
	spl_autoload_register('load_models_back');
	spl_autoload_register('load_models_config');

	function load_controllers($class_name){
	    if(!file_exists('controllers/'.$class_name.'.php') )
	        return false;
	    require_once( 'controllers/'.$class_name.'.php');
	    return true;
	}

	function load_models_config($class_name){
	    if( !file_exists('models/config/'.$class_name.'.php') )
	        return false;
	    require_once('models/config/'.$class_name.'.php');
	    return true;
	}

	function load_models_front($class_name){
	    if( !file_exists('models/front/'.$class_name.'.php') )
	        return false;
	    require_once('models/front/'.$class_name.'.php');
	    return true;
	}

	function load_models_back($class_name){
	    if( !file_exists('models/back/'.$class_name.'.php') )
	        return false;
	    require_once('models/back/'.$class_name.'.php');
	    return true;
	}


?>