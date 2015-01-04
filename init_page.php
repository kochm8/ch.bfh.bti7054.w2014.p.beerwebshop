<?php
/*
 *  initialize a php file
 */
	session_start();
	
	if($_SERVER['HTTP_HOST'] == 'localhost'){
		include_once ("database/config.php");
	}else{
		include_once ("database/biz.nf.config.php");
	}
	
	spl_autoload_register(function($class) {
		require_once 'classes/' . $class . '.php';
	});
	
	
	$language = new Language("en");
	
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

?>