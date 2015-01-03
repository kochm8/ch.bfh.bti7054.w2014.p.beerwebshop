<?php
	if(!$user->isLoggedIn()) {
		echo "User not logged in!";
		unset($_GET["step"]);
	}
?>

<script type="text/javascript">

	function toggleinvoiceaddress(){ 

		if(document.getElementById("cbxInvbilladdress").checked){
	 		document.getElementById("invaddress").style.display = 'block';
		}else{
	 		document.getElementById("invaddress").style.display = 'none';
		}
	}


	function goToSep(step){
		var form = document.getElementById('checkout');
		form.action = "index.php?todo=checkout&step="+step;
		form.submit();		
	}


	function finish(){
		alert("dini mer besteut bi beerheaven");
	}

</script>

<?php 
if (isset ( $_GET ["step"] )) {
	
	if ($_GET["step"] == 1){
	
		echo ' <h1>' . $lang['STEP']. ' 1/3</h1>';
		
		echo ' <form name="checkout" id="checkout" method="post" action="index.php?todo=checkout&step=2">';
		
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
		echo ' 			<input type="checkbox" name="giftbox" value="giftbox" unchecked>';
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
	
		echo ' <h1>' . $lang['STEP'] . ' 2/3</h1>';

		echo ' <form id="checkout" method="post" action="">';
		
		echo ' 	<table>';
		echo ' 	  <tr id="invbilladdress">';
		echo ' 	  	<td>' . $lang['INVBILLADDRESS'] . '</td>';
		echo ' 		<td>';
		echo ' 			<input type="checkbox" id="cbxInvbilladdress" name="cbxInvbilladdress" value="cbxInvbilladdress" onclick="toggleinvoiceaddress();" unchecked>';
		echo ' 		</td>';
		echo ' 	  </tr>';
		echo ' 	  <tr id="billingaddress">';
		echo ' 	  	<td>' . $lang['BILLINGADDRESS'] . '</td>';
		echo ' 		<td>';
		echo ' 		';
		echo ' 		</td>';
		echo ' 	  </tr>';
		echo ' 	</table>';
		
		echo '  <div id="invaddress" class="hidden">';
		echo ' 	<table>';
		echo '	  		<tr id="salutation">';
		echo '				<td>' . $lang["SALUTATION"] . '*: </td>';
		echo '	    		<td>';
		echo '				  <select name="salutation" id="salutation" class="register_select">';
		echo '			  		<option value="mrs">' . $lang["MRS"] . '</option>';
		echo '			  		<option value="mr">' . $lang["MR"] . '</option>';
		echo '				  </select>';
		echo '		 		</td> ';
		echo '	  		  </tr>';  
		echo '	  		  <tr id="firstname">';
		echo '			    <td>' . $lang["FIRSTNAME"] . '*: </td>';
		echo '			    <td><input type="text" name="firstname" value="" id="firstname" class="register_input" /></td>'; 
		echo '			  </tr>';			  
		echo '			  <tr id="lastname">';
		echo '			    <td>' . $lang["LASTNAME"] . '*: </td>';
		echo '			    <td><input type="text" name="lastname" value="" id="lastname" class="register_input" /></td>'; 
		echo '			  </tr>';			  
		echo '			  <tr id="street">';
		echo '			    <td>' . $lang["STREETNR"] . '*: </td>';
		echo '			    <td><input type="text" name="street" value="" id="street" class="register_input" /><input type="text" name="streetnr" value="" id="streetnr" class="register_input_small" /></td>'; 
		echo '			  </tr>	';		  
		echo '			  <tr id="city">';
		echo '			    <td>' . $lang["POSTALCITY"] . '*: </td>';
		echo '			    <td><input type="text" name="city" value="" id="city" class="register_input" /><input type="text" name="citynr" value="" id="citynr" class="register_input_small" /></td>';
		echo '			  </tr>';
		echo ' 	</table>';
		echo ' </div>';
		
		echo ' 	<table>';
		echo ' 	  <tr id="buttons">';
		echo ' 		<td>';
		echo '			<input type="submit" value="' . $lang['BACK'] . '" onclick="goToSep(1);">';
		echo ' 		</td>';
		echo ' 		<td>';
		echo '			<input type="submit" value="' . $lang['NEXT'] . '" onclick="goToSep(3);">';
		echo ' 		</td>';
		echo ' 	  </tr>';
		echo ' 	</table>';
		
		echo '</form>';
	
	} elseif ($_GET["step"] == 3){
	
		echo ' <h1>' . $lang['STEP'] . ' 3/3</h1>';

		echo ' <form id="checkout" method="post" action="">';
?>
		
		<table>
		  <tr>
		    <th class="cart_confirmation">Position</th>
		    <th class="cart_confirmation">Aktikel</th>
		    <th class="cart_confirmation">Anzahl</th>
		    <th class="cart_confirmation">Preis pro Stück CHF</th>
		    <th class="cart_confirmation">Preis CHF</th>
		  </tr>

		  
<?php 
		  
		  $cart = Cart::getCart();
		  $_db = DBHandler::getInstance ();
		  
		  $totalPrice = 0;
		  $i = 0;

		  foreach ( $cart as $key => $value ) {
		  	
		  	$price = 0;		  
		  	$i = $i + 1;
		  	$res = $_db->getProductById ( $value['id'] );
		  	
		  	while ( $db_cart = $res->fetch_object () ) {
		  		echo '<tr>';
		  		echo '<td class="cart_confirmation">' . $i . '</td>';
		  		echo '<td class="cart_confirmation">' . $db_cart->beer_name . '</td>';
		  		echo '<td class="cart_confirmation">'. $value['quan'] .'</td>';
		  		echo '<td class="cart_confirmation">'. $db_cart->beer_price .'</td>';
		  		
		  		$price = $price + ($db_cart->beer_price * $value['quan']);
		  		echo '<td class="cart_confirmation">'. number_format($price, 2, '.', '') .'</td>';
		  		echo '</tr>';
		  			

		  	}
		  	$totalPrice = $totalPrice + $price;
		  }
		  
		  echo '</table>';
		  echo '<br />';
		  echo '<strong>Total: <u> CHF ' . number_format($totalPrice, 2, '.', '') . '</u></strong><br /><br />';
		  
		  
		  $res = $_db->getAddressByUsername($user->data()['username']);
		  
		  while ( $address = $res->fetch_object () ) {
		  	$knd_name =  $address->firstname . ' ' . $address->lastname;
		  	$knd_address = $address->street_name . ' ' . $address->street_number;
		  	$knd_city = $address->city_number . ' ' . $address->city_name;
		  	$knd_email = $address->email ;
		  	$knd_tel = 'Tel: '. $address->tel;
		  	$knd_mobile = 'Mobile: '.$address->mobile;
		  }
		  
		//Rechnungsadresse
		echo '<br />';
		echo '<br />';
		echo '<strong>Rechnungsadresse:</strong>';
		echo '<br />';
		  
		echo $knd_name . '<br />';
		echo $knd_address . '<br />';
		echo $knd_city . '<br />';
	  	echo '<br />';
	  	echo $knd_email . '<br />';
	  	echo $knd_tel . '<br />';
	  	echo $knd_mobile . '<br />';
		 
	  	//Lieferadresse
		echo '<br />';
		echo '<br />';
		echo '<strong>Lieferadresse:</strong>';
		echo '<br />';
		echo $knd_name . '<br />';
		echo $knd_address . '<br />';
		echo $knd_city . '<br />';

		
		//Zahlungsart
		echo '<br />';
		echo '<strong>Zahlungsoption:</strong>';
		echo '<br />';
		echo '<br />';
		
		//Versandart
		echo '<br />';
		echo '<strong>Versandart:</strong>';
		echo '<br />';
		echo '<br />';
		
		//Sonstiges
		echo '<strong>Geschenk</strong>';
		echo '<br />';
		echo '<br />';
		
		//Bestätigung
		echo ' 	<table>';
		echo ' 	  <tr id="buttons">';
		echo ' 		<td>';
		echo '			<input type="submit" value="' . $lang['BACK'] . '" onclick="goToSep(2);">';
		echo ' 		</td>';
		echo ' 		<td>';
		echo '			<input type="submit" value="' . $lang['ORDER'] . '" onclick="finish();">';
		echo ' 		</td>';
		echo ' 	  </tr>';
		echo ' 	</table>';
		
		echo '</form>';
	}

}

?>
	
	