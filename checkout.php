<?php

//include_once("init_page.php");
 	
if (Input::get('username') != '') {
	$user = new User();
	$salt = Hash::salt(32);
	$user->create(Input::get('username'), Hash::make(Input::get('password'), $salt), Input::get('firstname'), Input::get('lastname'), $salt);
	$user->login(Input::get('username'), Input::get('password'));
	header ( 'Location:' . $_SERVER ['PHP_SELF'] );
}

if (isset ( $_GET ["step"] )) {
	
	if ($_GET["step"] == 1){
	
		echo ' <h1>Step 1/3</h1>';
		
		echo ' <form name="checkout" method="post" action="index.php?todo=checkout&step=2.php">';
		
		echo ' 	<table>';
		echo ' 	  <tr id="shippingmethod">';
		echo ' 	  	<td>' . $lang['SHIPPINGMETHOD'] . '</td>';
		echo ' 		<td>';
		echo ' 			<input type="radio" name="shippingmethod" value="collection" checked>' . $lang['COLLECTION'] . '</br>';
		echo ' 			<input type="radio" name="shippingmethod" value="shipping">' . $lang['SHIPPING'];
		echo ' 		</td>';
		echo '   </tr>';
		echo ' 	</table>';
		echo '  <hr>';
		echo ' 	<table>';
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
		echo ' 	</table>';
		echo '  <hr>';
		echo ' 	<table>';
		echo ' 	  <tr id="giftbox">';
		echo ' 	  	<td>' . $lang['GIFTBOX'] . '</td>';
		echo ' 		<td>';
		echo ' 			<input type="checkbox" name="giftbox" value="giftbox" checked>';
		echo ' 		</td>';
		echo ' 	  </tr>';
		echo ' 	</table>';
		echo '  <hr>';
		echo ' 	<table>';
		echo ' 	  <tr id="buttons">';
		echo ' 		<td>';
		echo '			<input type="submit" value="' . $lang['NEXT'] . '">';
		echo ' 		</td>';
		echo ' 	  </tr>';
		echo ' 	</table>';
		
		echo '</form>';
	
	} elseif ($_GET["step"] == 2){
	
		echo ' <h1>Step 2/3</h1>';
		
		echo ' <form name="checkout" method="post" action="index.php?todo=checkout&step=3.php">';
		
		echo ' 	<table>';
		echo ' 	  <tr id="shippingmethod">';
		echo ' 	  	<td>' . $lang['SHIPPINGMETHOD'] . '</td>';
		echo ' 		<td>';
		echo ' 			<input type="radio" name="shippingmethod" value="collection" checked>' . $lang['COLLECTION'] . '</br>';
		echo ' 			<input type="radio" name="shippingmethod" value="shipping">' . $lang['SHIPPING'];
		echo ' 		</td>';
		echo '   </tr>';
		echo ' 	</table>';
		echo '  <hr>';
		echo ' 	<table>';
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
		echo ' 	</table>';
		echo '  <hr>';
		echo ' 	<table>';
		echo ' 	  <tr id="giftbox">';
		echo ' 	  	<td>' . $lang['GIFTBOX'] . '</td>';
		echo ' 		<td>';
		echo ' 			<input type="checkbox" name="giftbox" value="giftbox" checked>';
		echo ' 		</td>';
		echo ' 	  </tr>';
		echo ' 	</table>';
		echo '  <hr>';
		echo ' 	<table>';
		echo ' 	  <tr id="buttons">';
		echo ' 		<td>';
		echo '			<input type="submit" value="' . $lang['BACK'] . '">';
		echo ' 		</td>';
		echo ' 		<td>';
		echo '			<input type="submit" value="' . $lang['NEXT'] . '">';
		echo ' 		</td>';
		echo ' 	  </tr>';
		echo ' 	</table>';
		
		echo '</form>';
	
	} elseif ($_GET["step"] == 2){
	
		echo ' <h1>Step 3/3</h1>';
	
	}

}

?>
	
	