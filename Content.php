<div id="content">
	
	<?php
	
	if (isset ( $_GET ["categoryid"] )) {

		$category_ID = $_GET ["categoryid"];
			
		$_db = DBHandler::getInstance ();
		
		//Content Title
		$res = $_db->getCategoryById($category_ID);
		while ( $category = $res->fetch_object() ) {
			echo "<h1>" . $category->category_name . "</h1>";
		}
		
		//Content Beers
		$res = $_db->getProductsByCategoryId($category_ID);
		$beers = array();
		while ( $beer = $res->fetch_object () ) {
			$beers[] = $beer;
		}
		$content = new Content_table($beers, $lang);
		$content->printTable($current_url);
			
		
	} elseif (isset ( $_GET ["todo"] )) {
		
		if($_GET ["todo"] == "register"){
			
			include("register.php");
			
		} else {
			
			include("checkout.php");
			
		}
		
	}else{
		
		echo "<h1>" . $lang['NEWBEERS'] . "</h1>";
		
	}
	
	?>

</div>