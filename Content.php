<div id="content">
	
	<?php

	//checks if the user finished an order
	if(Input::get('finish')){
		if(Input::get('paymentmethod')== '3'){
			include_once 'paypal.php';
// 			Cart::clear();
		}else{
// 			echo $lang['FINISH'];
// 			echo '<br />';
// 			Cart::clear();
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
			
		} elseif(Input::get("todo") == "myorders") {
		//show my orders
			include("myorders.php");
			
		} else {
		//show checkout page
			include("checkout.php");
			
		}
		
	}else{
		
		$_db = DBHandler::getInstance ();
		
		//New Beers
		$res = $_db->getNewProducts();
		$beers = array();
		
		while ( $beer = $res->fetch_object () ) {
			$beers[] = $beer;
		}
		
		$content = new Content_table($beers, $lang);
		$content->setTitle($lang['NEWBEERS']);
		$content->printTable($current_url);
		
	}
	
	?>

</div>
