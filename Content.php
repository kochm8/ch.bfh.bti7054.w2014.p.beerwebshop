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
		
	}
	
	?>

</div>