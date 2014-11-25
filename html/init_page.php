<?php

	session_start();
	include_once ("database/config.php");
	
	if (session_status() == PHP_SESSION_NONE){
		include_once ("database/config.php");
	}
	
	/*
	include_once("classes/DBHandler.php");
	include_once("classes/Language.php");
	include_once("classes/Product.php");
	include_once("classes/User.php");
	include_once("classes/Session.php");
	include_once("classes/Hash.php");
	include_once("classes/Input.php");
	*/
	
	spl_autoload_register(function($class) {
		require_once 'classes/' . $class . '.php';
	});
	
	
	$language = new Language("en");
	
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

?>