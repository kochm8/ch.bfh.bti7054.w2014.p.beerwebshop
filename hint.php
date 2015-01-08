<?php
/*
 * Shows some search results
 */

include_once("init_page.php");

$_db = DBHandler::getInstance ();
$res = $_db->getAllProducts();

$hint = strtolower(Input::get("hint"));
$return_url = base64_encode(Input::get("return_url"));

//setcookie ( "Search", $hint );

$hints = array();

if($hint != ''){
	
	while ( $beer = $res->fetch_object () ) {
		
		$found = false;
		$beer_country = strtolower($beer->beer_country);
		$beer_name = strtolower($beer->beer_name);
		$beer_ID = strtolower($beer->beer_ID);
		
		/*
		echo $beer_country .":". stripos($beer_country,$hint) . " / ";
		echo $beer_name .":".  stripos($beer_name,$hint) . " / ";
		echo $beer_ID .":".  stripos($beer_ID,$hint) . " / ";
		echo "<hr>";*/
		
		if (stripos($beer_country,$hint)>-1 ){
			$found = true;
		}
		
		if (stripos($beer_name,$hint)>-1 ){
			$found = true;
		}
		
		if (stripos($beer_ID,$hint)>-1 ){
			$found = true;
		}
		
		if($found){
			$hints[] = $beer;
		}
	}
	
	$content = new Content_table($hints, $lang);
	$content->setTitle($lang['SEARCHRESULT']);
	$content->printTable($return_url);
	
}else{
	echo " ";
}


?>