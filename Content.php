<div id="content">
	
	<?php

	//checks if the user finished an order
	if(Input::get('finish')){
		if(Input::get('paymentmethod')== '3'){
			include_once 'paypal.php';
			Cart::clear();
		}else{
			echo $lang['FINISH'];
			Cart::clear();
		}
	}
	
	
	//shows all beers by category
	if(Input::get("categoryid")){
		$category_ID = Input::get("categoryid");
			
		$_db = DBHandler::getInstance ();
		
		//Content Beers
		$res = $_db->getProductsByCategoryId($category_ID);
		$beers = array();
		
		while ( $beer = $res->fetch_object () ) {
			$beers[] = $beer;
		}
		
		$content = new Content_table($beers, $lang);
		$content->setTitle($_db->getCategoryById($category_ID)->fetch_object()->category_name);
		$content->printTable($current_url);
			
		
	} elseif (Input::get("todo")) {
		
		//show register form
		if(Input::get("todo") == "register"){
			include("register.php");
			
		} else {
		//show checkout page
			include("checkout.php");
			
		}
		
	}else{
		
		//echo "<h1>" . $lang['NEWBEERS'] . "</h1>";
		/*
		$_db = DBHandler::getInstance ();
		$res = $_db->getProductsByCategoryId("1");
		$beers = array();
		while ( $beer = $res->fetch_object () ) {
			$beers[] = $beer;
		}
		$content = new Content_table($beers, $lang);
		$content->setTitle($_db->getCategoryById("1")->fetch_object()->category_name);
		$content->printTable($current_url);*/
		
		
		
		$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
		
		$yql_query = 'select wind from weather.forecast where woeid in (select woeid from geo.places(1) where text="chicago, il")';
		$yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
		
		// Make call with cURL
		$session = curl_init($yql_query_url);
		curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
		$json = curl_exec($session);
		
		// Convert JSON to PHP object
// 		$phpObj =  json_decode($json);
// 		var_dump($phpObj);
		
// 		print_r($phpObj, true);
		
// 		$phpArray = get_object_vars($phpObj);
		
		$jsonIterator = new RecursiveIteratorIterator(
		new RecursiveArrayIterator(json_decode($json, TRUE)),
		RecursiveIteratorIterator::SELF_FIRST);
		
		foreach ($jsonIterator as $key => $val) {
			if(is_array($val)) {
				echo "$key:\n";
			} else {
				echo "$key => $val\n";
			}
		}
		
		
				
// 		$client = new SoapClient("http://www.webservicex.net/globalweather.asmx?wsdl");
// 		$params = new stdClass;
// 		$params->CityName= 'Auckland';
// 		$params->CountryName= 'New Zealand';
// 		$result = $client->GetWeather($params);
// 		// Check for errors...
// // 		$weatherXML = $result->GetWeatherResponse;
		
// 		$phpArray = get_object_vars($result);
// 		print_r($phpArray, true);
		
	}
	
	?>

</div>