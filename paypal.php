<?php

/*
 * Call the PayPal Sandbox API
 */
$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; // Test Paypal API URL
$paypal_id='mi_koch90-facilitator@hotmail.com'; // Business email ID

$cart = Cart::getCart();
$_db = DBHandler::getInstance ();
$i = 0;

echo '<form id="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">';
echo '<input type="hidden" name="cmd" value="_cart">';
echo '<input type="hidden" name="upload" value="1">';
echo '<input type="hidden" name="business" value="mi_koch90-facilitator@hotmail.com">';

  foreach ( $cart as $key => $value ) {

  	$res = $_db->getProductById ( $value['id'] );
  	$i = $i + 1;
  	
  	while ( $db_cart = $res->fetch_object () ) {
  		echo '<input type="hidden" name="item_number_'.$i.'" value="'.$i.'">';
		echo '<input type="hidden" name="item_name_'.$i.'" value="' . $db_cart->beer_name . '">';
		echo '<input type="hidden" name="amount_'.$i.'" value="'. $db_cart->beer_price .'">';
		echo '<input type="hidden" name="quantity_'.$i.'" value="'. $value['quan'] .'">';	
  	}
  }

echo '<input type="hidden" name="currency_code" value="CHF">';
echo '<input type="hidden" name="cpp_header_image" value="http://oi61.tinypic.com/2w57q4o.jpg">';
echo '</form>';

?>

<script type="text/javascript">
	
	var form = document.getElementById('paypal');
	form.submit();	

</script>
