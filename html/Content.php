<div id="content">
	
	<?php
	
	$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	
	echo "<p>Produkt</p>";
	
	if (isset ( $_GET ["id"] )) {

		$product_id = $_GET ["id"];

		//connection to the database
		$dbhandle = mysql_connect($db_host , $db_username, $db_password)
		or die("Unable to connect to MySQL");
			
		//select a database to work with
		$selected = mysql_select_db($db_name,$dbhandle)
		or die("Could not select database $db_name");
			
		//execute the SQL query and return records
		$result = mysql_query("SELECT * FROM products where product_id = '$product_id'");
			
		//close the connection
		mysql_close($dbhandle);
		
		
		while ($row = mysql_fetch_array($result)) {
			echo "<p>Id: ".$row{'product_id'};
			echo "</p>";
			echo "<p>Name ".$row{'product_name'};
			echo "</p>";
			echo "<p>".$row{'product_desc'};
			echo "</p>";
			echo "<p>Preis: ".$row{'price'};
			echo "</p>";
			}
		
		
		echo '<form method="get" action="cart_update.php">';
		echo '<button class="add_to_cart">Add To Cart</button>';
		echo '<input type="hidden" name="product_id" value="'.$_GET ['id'].'" />';
		echo '<input type="hidden" name="type" value="add" />';
		echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
		echo '</form>';
		
		
	}
	
	?>

</div>