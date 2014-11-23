<div id="content">
	
	<?php
	
	if (isset ( $_GET ["id"] )) {
		
		echo "<p>". $lang['PRODUCT']."</p>";

		$category_ID = $_GET ["id"];
			
		$_db = DBHandler::getInstance ();
		$res = $_db->getProductsByCategoryId($category_ID);

		while ( $beer = $res->fetch_object () ) {

			echo "<table>";
			
			echo "<tr>";
			echo "<td>";
			echo "Id: ";
			echo "</td>";
			echo "<td>";
			echo $beer->beer_ID;
			echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>";
			echo $lang['NAME'].":";
			echo "</td>";
			echo "<td>";
			echo $beer->beer_name;
			echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>";
			echo '<img class="cnt_img" src="../img/beer/'.$beer->beer_image.'" alt="'.$beer->beer_image.'" ">';
			echo "</td>";
			echo "<td>";
			echo $beer->beer_desc;
			echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>";
			echo $lang['PRICE']." CHF: ";
			echo "</td>";
			echo "<td>";
			echo $beer->beer_price;
			echo "</td>";
			echo "</tr>";
			
			echo "</table>";
			
			echo "<hr>";
			
		}
		
		echo '<form method="get" action="cart_update.php">';
		echo '<button class="add_to_cart">'.$lang['ADDTOCART'].'</button>';
		echo '<input type="hidden" name="id" value="'.$_GET ['id'].'" />';
		echo '<input type="hidden" name="type" value="add" />';
		echo '<input type="hidden" name="return_url" value="'.$current_url.'" />';
		echo '</form>';
		
		
	}else{
		
		echo "<h1>Welcome</h1>";
		
	}
	
	?>

</div>