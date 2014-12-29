<?php

include_once("init_page.php");

$_db = DBHandler::getInstance ();
$res = $_db->getAllProducts();

$hint = Input::get("hint");
$return_url = base64_encode(Input::get("return_url"));

$hints = array();

if($hint != ''){
	
	while ( $beer = $res->fetch_object () ) {
		
		$found = false;
		
		if (strpos($beer->beer_country,$hint)===0 ){
			$found = true;
		}
		
		if (strpos($beer->beer_name,$hint)===0 ){
			$found = true;
		}
		
		if (strpos($beer->beer_ID,$hint)===0 ){
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