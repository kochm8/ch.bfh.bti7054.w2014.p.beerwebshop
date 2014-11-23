<div id="content">
	
	<?php
	
	if (isset ( $_GET ["id"] )) {
		
		echo "<h1>" . $lang['BEER'] . "</h1>";

		$category_ID = $_GET ["id"];
			
		$_db = DBHandler::getInstance ();
		$res = $_db->getProductsByCategoryId($category_ID);

		while ( $beer = $res->fetch_object () ) {

			echo "<table>";
			
			echo "<tr>";
			echo "<td>";
			echo $lang['NAME']. ":";
			echo "</td>";
			echo "<td>";
			echo $beer->beer_name;
			echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>";
			echo $lang['COUNTRY'] . ":";
			echo "</td>";
			echo "<td>";
			echo $beer->beer_country;
			echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>";
			echo $lang['CONTENT'] . ":";
			echo "</td>";
			echo "<td>";
			echo $beer->beer_size."cl | " . $beer->beer_alcohol . "%";
			echo "</td>";
			echo "</tr>";

			echo "<tr>";
			echo "<td>";
			echo $lang['PRICE'] . " CHF: ";
			echo "</td>";
			echo "<td>";
			echo $beer->beer_price;
			echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td align='center' width='150'>";
			echo '<img src="../img/beer/' . $beer->beer_image . '" alt="' . $beer->beer_name . '" height="150">';
			echo "</td>";
			echo "<td>";
			echo $beer->beer_desc;
			echo "</td>";
			echo "</tr>";
			
			echo "</table>";
			
			echo '<form method="get" action="cart_update.php">';
			echo '<button class="add_to_cart">' . $lang['ADDTOCART'] . '</button>';
			echo '<input type="hidden" name="id" value="' . $beer->beer_ID . '" />';
			echo '<input type="hidden" name="type" value="add" />';
			echo '<input type="hidden" name="return_url" value="' . $current_url . '" />';
			echo '</form>';
			
			echo "<hr>";
			
		}	
		
	}else{
		
		echo "<h1>" . $lang['NEWBEERS'] . "</h1>";
		
	}
	
	?>

</div>