<?php
session_start ();
include_once ("config.php");
include_once ("db.php");

$DBHanlder = new DBHandler ();
$current_url = base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>

<head>
<title>BeerWebshop</title>
<link rel="stylesheet" type="text/css" href="../css/global.css" />
<link rel="stylesheet" type="text/css" href="../css/cart.css" />
</head>
<body>
	<div id="wrapper">

	<?php include("Header.php"); ?>
	
	<div id="menu">
			<a id="tdb1" href="shopping_cart.php" role="button" aria-disabled="false">Warenkorb</a>
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
			Warenkorb
				
				<?php
				
				$url = $_SERVER ['PHP_SELF'];
				
				$code = "Id";
				$quantity = "Menge";
				$price = "Preis";
				
				if (isset ( $_SESSION ["sidebar_cart"] )) {
					
					$totalPrice = 0;
					echo '<ol>';
					foreach ( $_SESSION ["sidebar_cart"] as $key => $value ) {
												
						$res = $DBHanlder->getProductById ( $value['id'] );
						while ( $cart = $res->fetch_object () ) {
							
							echo '<li class="cart-itm">';
							echo '<span class="remove-itm"><a href="cart_update.php?id=' . $cart->product_id .'&type=remove'. '&return_url=' . $url . '">&times;</a></span>';
							echo '<h3>' . $cart->product_name . '</h3>';
							echo '<div class="p-code">'.$code.': ' . $cart->product_id . '</div>';
							echo '<div class="p-qty">'.$quantity.': '.$value['quan'] . '</div>';
							echo '<div class="p-price">'.$price.': CHF ' . $cart->price . '</div>';
							echo '</li>';
							
							$totalPrice = $totalPrice + ($cart->price * $value['quan']);
						}
					}
					echo '</ol>';
					echo '<span class="check-out-txt"><strong>Total: CHF ' . $totalPrice . '</strong> <a href="view_cart.php">Check-out!</a></span>';
					echo '<span class="empty-cart"><a href="cart_update.php?type=clear&return_url=' . $current_url . '">Empty Cart</a></span>';
				} else {
					echo '<br /> Your Cart is empty';
				}
				?>

			</div>

		</div>

		<div id="footer">
			<p>Footer</p>
		</div>

	</div>
</body>
</html>
