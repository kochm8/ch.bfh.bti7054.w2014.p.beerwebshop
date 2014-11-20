<div id="content">
	
	<?php
	
	if (isset ( $_GET ["id"] )) {
		
		echo "<p>". $lang['PRODUCT']."</p>";

		$product_id = $_GET ["id"];
			
		$_db = DBHandler::getInstance ();
		$res = $_db->getProductById($product_id);
		
		echo "<table>";

		while ( $products = $res->fetch_object () ) {

			echo "<tr>";
			echo "<td>";
			echo "Id: ";
			echo "</td>";
			echo "<td>";
			echo $products->product_id;
			echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>";
			echo $lang['NAME'].":";
			echo "</td>";
			echo "<td>";
			echo $products->product_name;
			echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>";
			echo '<img class="cnt_img" src="../img/beer/'.$products->product_img_name.'" alt="'.$products->product_img_name.'" ">';
			echo "</td>";
			echo "<td>";
			echo $products->product_desc;
			echo "</td>";
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>";
			echo $lang['PRICE']." CHF: ";
			echo "</td>";
			echo "<td>";
			echo $products->price;
			echo "</td>";
			echo "</tr>";
			
		}

	echo "</table>";
		
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