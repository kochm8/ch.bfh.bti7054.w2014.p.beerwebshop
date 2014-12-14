<?php
$value = 'irgendetwas von irgendwo';
setcookie("TestCookie", $value);
include_once("init_page.php");
?>	

<!DOCTYPE html>
<html>

<head>
	<title>BeerHeaven</title>
	<link rel="stylesheet" type="text/css" href="css/global.css" />
	<link rel="stylesheet" type="text/css" href="css/cart.css" />
	<link rel="shortcut icon" href="img/favicon.ico">
</head>

<body>
	<div id="wrapper">

		<?php include("Header.php"); ?>

		<div id="leftcolumn">
			<h2>Categories</h2>
			<?php
				$url = $_SERVER ['PHP_SELF'];
				echo "<a href=\"$url\">" . $lang['NEWBEERS'] . "</a>";
				echo "<br />";
				Category::getCategoryLinks();
			?>
		</div>

		<?php include("Content.php");  ?>

		<div id="rightcolumn">
		
			<div class="shopping-cart">			
				<?php
							
				echo '<h2>' . $lang['SHOPPING_CART'] . '</h2>';
				
				$url = $_SERVER ['PHP_SELF'];
				
				if (isset ( $_SESSION ["sidebar_cart"] )) {
					
					$totalPrice = 0;
					$_db = DBHandler::getInstance ();
					echo '<ol>';
					foreach ( $_SESSION ["sidebar_cart"] as $key => $value ) {
												
						$res = $_db->getProductById ( $value['id'] );
						while ( $cart = $res->fetch_object () ) {
							
							echo '<li class="cart-itm">';
							echo '<span class="remove-itm"><a href="cart_update.php?id=' . $cart->beer_ID .'&type=remove'. '&return_url=' . $current_url . '">&times;</a></span>';
							echo '<h3>' . $cart->beer_name . '</h3>';
							echo '<div class="p-qty">' . $lang['QUANTITY'].': ' . $value['quan'] . '</div>';
							echo '<div class="p-price">' . $lang['PRICE'].': CHF ' . $cart->beer_price . '</div>';
							echo '</li>';
							
							$totalPrice = $totalPrice + ($cart->beer_price * $value['quan']);
						}
					}
					echo '</ol>';
					echo '<strong>Total: CHF ' . str_pad(str_pad($totalPrice, 3, "."), 5, "0") . '</strong><br /><br />';
					echo '<a href="' . $_SERVER['PHP_SELF'] . '?todo=checkout&step=1' . '">'.$lang['CHECKOUT'].'</a>';
					echo '<br />';	
					echo '<a href="cart_update.php?type=clear&return_url=' . $current_url . '">'.$lang['CLEARCART'].'</a>';
				} else {
					echo '<br />' . $lang['EMPTYCART'];
				}
				?>

			</div>

		</div>

		<div id="footer">
		</div>

	</div>
</body>
</html>
