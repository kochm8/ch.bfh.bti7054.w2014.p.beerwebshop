<?php
session_start();   // create or recover session,
include_once ("init_page.php");

?>	

<!DOCTYPE html>
<html>

<head>
	<title>BeerWebshop</title>
	<link rel="stylesheet" type="text/css" href="../css/global.css" />
	<link rel="stylesheet" type="text/css" href="../css/cart.css" />
	<link rel="shortcut icon" href="../img/favicon.ico">
</head>

<body>
	<div id="wrapper">

	<?php include("Header.php"); ?>
	
	<div id="menu">
			<a id="tdb1" href="shopping_cart.php" role="button" aria-disabled="false"><?php echo $lang['SHOPPING_CART']?></a>
	</div>

		<div id="leftcolumn">
		<?php
		
		$res = $DBHanlder->getAllProducts ();
		while ( $products = $res->fetch_object () ) {
			$url = $_SERVER ['PHP_SELF'];
			$url = $url . "?id=" . $products->product_id;
			echo "<a href=\"$url\">" . $products->product_name . "</a>";
			echo "<br />";
		}
		
		?>

	</div>

		<?php include("Content.php");  ?>

		<div id="rightcolumn">
		
		<div class="shopping-cart">			
				<?php
							
				echo '<h2>'.$lang['SHOPPING_CART'].'</h2>';
				
				$url = $_SERVER ['PHP_SELF'];
				
				if (isset ( $_SESSION ["sidebar_cart"] )) {
					
					$totalPrice = 0;
					echo '<ol>';
					foreach ( $_SESSION ["sidebar_cart"] as $key => $value ) {
												
						$res = $DBHanlder->getProductById ( $value['id'] );
						while ( $cart = $res->fetch_object () ) {
							
							echo '<li class="cart-itm">';
							echo '<span class="remove-itm"><a href="cart_update.php?id=' . $cart->product_id .'&type=remove'. '&return_url=' . $current_url . '">&times;</a></span>';
							echo '<h3>' . $cart->product_name . '</h3>';
							echo '<div class="p-code">'.'Id'.': ' . $cart->product_id . '</div>';
							echo '<div class="p-qty">'.$lang['QUANTITY'].': '.$value['quan'] . '</div>';
							echo '<div class="p-price">'.$lang['PRICE'].': CHF ' . $cart->price . '</div>';
							echo '</li>';
							
							$totalPrice = $totalPrice + ($cart->price * $value['quan']);
						}
					}
					echo '</ol>';
					echo '<strong>Total: CHF ' . $totalPrice . '</strong><br /><br />';
					echo '<a href="view_cart.php">'.$lang['CHECKOUT'].'</a>';
					echo '<br />';	
					echo '<a href="cart_update.php?type=clear&return_url=' . $current_url . '">'.$lang['CLEARCART'].'</a>';
				} else {
					echo '<br />' . $lang['EMPTYCART'];
				}
				?>

			</div>

		</div>

		<div id="footer">
			<p>&copy;blablabla</p>
		</div>

	</div>
</body>
</html>
