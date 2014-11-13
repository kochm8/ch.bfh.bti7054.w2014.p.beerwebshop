<div id="content">
	
	<?php
	//$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	
	echo "<p>". $lang['PRODUCT']."</p>";
	
	if (isset ( $_GET ["id"] )) {

		$product_id = $_GET ["id"];
			
		$res = $DBHanlder->getProductById($product_id);
		
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
			echo '<img class="cnt_img" src="../img/beer/'.$products->product_img_name.'" alt="B1" ">';
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
		
		
	}
	
	?>

</div>