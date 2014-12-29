<?php

include_once("init_page.php");

$_db = DBHandler::getInstance ();
$res = $_db->getAllProducts();

$hint = strtolower(Input::get("hint"));
$return_url = base64_encode(Input::get("return_url"));

$hints = array();

if($hint != ''){
	
	while ( $beer = $res->fetch_object () ) {
		
		$found = false;
		$beer_country = strtolower($beer->beer_country);
		$beer_name = strtolower($beer->beer_name);
		$beer_ID = strtolower($beer->beer_ID);
		
		if (strpos($beer_country,$hint)===0 ){
			$found = true;
		}
		
		if (strpos($beer_name,$hint)===0 ){
			$found = true;
		}
		
		if (strpos($beer_ID,$hint)===0 ){
			$found = true;
		}
		
		if($found){
			$hints[] = $beer;
		}
	}
	
	if(sizeof($hints) > 0){
		$content = new Content_table($hints, $lang);
		$content->printTable($return_url);
	}
}


?>