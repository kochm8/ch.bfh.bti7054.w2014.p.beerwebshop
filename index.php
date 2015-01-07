<?php
include_once("init_page.php");
?>	

<!DOCTYPE html>
<html>

<head>
	<title>BeerHeaven</title>
	<link rel="stylesheet" type="text/css" href="css/global.css" />
	<link rel="stylesheet" type="text/css" href="css/cart.css" />
	<link rel="stylesheet" type="text/css" href="css/leftcolumn.css" />
	<link rel="shortcut icon" href="img/favicon.ico" />
</head>

<body>
	<div id="wrapper">

<!-- Header Part wih: Logo, Search, Login  -->
		<?php include("Header.php"); ?>

		
<!-- Leftcolumn: Beer Categorys -->
		<div id="leftcolumn">
			<?php
				echo "<h2>".$lang['CATEGORIES']."</h2>";
			
				$url = $_SERVER ['PHP_SELF'];
				Category::getCategoryLinks();
			?>
		</div>

		
<!-- Content -->
		<?php include("Content.php");  ?>

		
<!-- Rightcolumn: Shopping Cart -->
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
					//echo str_pad(str_pad($totalPrice, 3, "."), 5, "0")
					echo '<strong>Total: CHF ' . number_format($totalPrice, 2, '.', '') . '</strong><br /><br />';
					echo '<a href="' . $_SERVER['PHP_SELF'] . '?todo=checkout&step=1' . '">'.$lang['CHECKOUT'].'</a>';
					echo '<br />';	
					echo '<a href="cart_update.php?type=clear&return_url=' . $current_url . '">'.$lang['CLEARCART'].'</a>';
				} else {
					echo '<br />' . $lang['EMPTYCART'];
				}
				?>

			</div>
			
			<div class="weather">			
				<?php
							
					$BASE_URL = "http://query.yahooapis.com/v1/public/yql";
					
					$yql_query = 'select item.condition from weather.forecast where woeid in (select woeid from geo.places(1) where text="Bern")';
					$yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
					
					// Make call with cURL
					$session = curl_init($yql_query_url);
					curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
					$json = curl_exec($session);
					
					// Convert JSON to PHP object
			// 		$phpObj =  json_decode($json);
			// 		var_dump($phpObj);
					
					$jsonIterator = new RecursiveIteratorIterator(
					new RecursiveArrayIterator(json_decode($json, TRUE)),
					RecursiveIteratorIterator::SELF_FIRST);
					
					echo '<h2>' . $lang['WEATHER'] . '</h2>';
					
					foreach ($jsonIterator as $key => $val) {
						switch ($key) {
							case "date";
							echo "$val<br>";
							break;
							case "temp";
								$val = ($val - 32) * 5/9;
								echo round($val, 0, PHP_ROUND_HALF_UP) . "°C<br>";
								break;
							case "text";
								echo "$val<br>";
								break;
						}
					}
				?>

			</div>

		</div>

<!-- Footer -->
		<div id="footer">
		</div>

	</div>
	

	
</body>
</html>
