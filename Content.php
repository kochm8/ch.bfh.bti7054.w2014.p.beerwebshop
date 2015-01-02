<div id="content">
	
	<?php
	
	if (isset ( $_GET ["categoryid"] )) {

		$category_ID = $_GET ["categoryid"];
			
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
			
		
	} elseif (isset ( $_GET ["todo"] )) {
		
		if($_GET ["todo"] == "register"){
			
			include("register.php");
			
		} else {
			
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