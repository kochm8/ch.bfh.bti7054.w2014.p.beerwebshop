<?php

//include_once("init_page.php");
 	
if (Input::get('username') != '') {
	$user = new User();
	$salt = Hash::salt(32);
	$user->create(Input::get('username'), Hash::make(Input::get('password'), $salt), Input::get('firstname'), Input::get('lastname'), $salt);
	$user->login(Input::get('username'), Input::get('password'));
	header ( 'Location:' . $_SERVER ['PHP_SELF'] );
}



echo ' <form name="checkout" method="post">';

echo ' 	<table>';
	
echo ' 	  <tr id="shippingmethod">';
echo ' 	  	<td>' . $lang['SHIPPINGMETHOD'] . '</td>';
echo ' 		<td>';
echo ' 			<input type="radio" name="shippingmethod" value="collection" checked>' . $lang['COLLECTION'] . '</br>';
echo ' 			<input type="radio" name="shippingmethod" value="shipping">' . $lang['SHIPPING'];
echo ' 		</td>';
echo '   </tr>';
	  
echo ' 	  <tr id="paymentmethod">';
echo ' 	  	<td>' . $lang['PAYMENTMETHOD'] . '</td>';
echo ' 		<td>';
echo ' 			<input type="radio" name="paymentmethod" value="advancepayment" checked>' . $lang['ADVANCEPAYMENT'] . '</br>';
echo ' 			<input type="radio" name="paymentmethod" value="bill">' . $lang['BILL'] . '</br>';
echo ' 			<input type="radio" name="paymentmethod" value="paypal">PayPal' . '</br>';
echo ' 			<input type="radio" name="paymentmethod" value="postfinance">PostFinance' . '</br>';
echo ' 			<input type="radio" name="paymentmethod" value="creditcard">' . $lang['CREDITCARD'];
echo ' 		</td>';
echo ' 	  </tr>';

echo ' 	  <tr id="giftbox">';
echo ' 	  	<td>' . $lang['GIFTBOX'] . '</td>';
echo ' 		<td>';
echo ' 			<input type="checkbox" name="giftbox" value="giftbox" checked>';
echo ' 		</td>';
echo ' 	  </tr>';

echo ' 	</table>';
	
echo '	<input type="submit" value="' . $lang['SAVE'] . '">';
echo '</form>';


?>
	
	