<?php
/*
 * Shopping Cart checkout
 */
	if(!$user->isLoggedIn()) {
		echo $lang['NOTLOGGEDIN'];
		unset($_GET["step"]);
	}
?>

<script type="text/javascript">

	var js = document.createElement("script");
	js.type = "text/javascript";
	js.src = "js/Validator.js";
	document.body.appendChild(js);

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

		var input = document.getElementById("pay");
		if(input.value == '3'){
		
			alert("paypal");
		}
	}


	function validate(){
		if((document.getElementById("invaddress").style.display == 'none') || (document.getElementById("invaddress").style.display == '')){
			goToSep(3);
			return true;
		}else{
			var validator = new Validator("checkout"); 
			validator.validate("firstname"); 
			validator.validate("lastname"); 
			validator.validate("street"); 
			validator.validate("streetnr"); 
			validator.validate("city"); 
			validator.validate("citynr"); 
		
			validator.validateNumeric("citynr");
			validator.validateNumeric("streetnr");
	
			if(validator.getResult()){
				goToSep(3);
			}

			return validator.getResult();
		}
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
		echo ' 			<input type="radio" name="shippingmethod" value="1" checked>' . $lang['COLLECTION'] . '</br>';
		echo ' 			<input type="radio" name="shippingmethod" value="2">' . $lang['SHIPPING'];
		echo ' 		</td>';
		echo '   </tr>';
		echo ' 	</table>';
		echo '  <hr>';
		echo ' 	<table>';
		echo ' 	  <tr id="paymentmethod">';
		echo ' 	  	<td>' . $lang['PAYMENTMETHOD'] . '</td>';
		echo ' 		<td>';
		echo ' 			<input type="radio" name="paymentmethod" value="1" checked>' . $lang['ADVANCEPAYMENT'] . '</br>';
		echo ' 			<input type="radio" name="paymentmethod" value="2">' . $lang['BILL'] . '</br>';
		echo ' 			<input type="radio" name="paymentmethod" value="3">PayPal</br>';
		echo ' 			<input type="radio" name="paymentmethod" value="4">PostFinance</br>';
		echo ' 			<input type="radio" name="paymentmethod" value="5">' . $lang['CREDITCARD'];
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
		echo '			  <tr>';
		echo '			    <td>'. $lang['FIRSTNAME'] . '*: </td>';
		echo '			    <td><input type="text" name="firstname" value="" class="register_input" /></td> ';
		echo '			    <td id="firstname"></td>';
		echo '			  </tr>';
		echo '			  ';
		echo '			  <tr>';
		echo '				    <td>'. $lang['LASTNAME'] . '*:</td>';
		echo '			    <td><input type="text" name="lastname" value="" class="register_input" /></td> ';
		echo '			    <td  id="lastname"></td>';
		echo '			  </tr>';
		echo '			  ';
		echo '			  <tr>';
		echo '			    <td>' . $lang['STREETNR'] . '*:</td>';
		echo '			    <td><input type="text" name="street" value="" class="register_input" /></td>';
		echo '			    <td width="90px"><input type="text" name="streetnr" value="" class="register_input_small" /></td>';
		echo '			    <td><div id="streetnr"></div><div  id="street"></div></td>';
		echo '			  </tr>';
		echo '			  	';
		echo '			  <tr>';
		echo '			    <td>'. $lang['POSTALCITY'] . '*:</td>';
		echo '			    <td><input type="text" name="city" value="" class="register_input" />';
		echo '			    <td><input type="text" name="citynr" value="" class="register_input_small" /></td>';
		echo '			    <td><div id="city"></div><div  id="citynr"></div></td>';
		echo '			  </tr>';
		echo ' 	</table>';
		echo ' </div>';
		
		echo ' <input type="hidden" name="giftbox" value="' . Input::get('giftbox') . '">';
		echo ' <input type="hidden" name="paymentmethod" value="' . Input::get('paymentmethod') . '">';
		echo ' <input type="hidden" name="shippingmethod" value="' . Input::get('shippingmethod') . '">';
		
		echo ' 	<table>';
		echo ' 	  <tr id="buttons">';
		echo ' 		<td>';
		echo '			<input type="submit" value="' . $lang['BACK'] . '" onclick="goToSep(1);">';
		echo ' 		</td>';
		echo ' 		<td>';
		echo '			<input type="submit" value="' . $lang['NEXT'] . '" onclick="return validate();">';
		echo ' 		</td>';
		echo ' 	  </tr>';
		echo ' 	</table>';
		
		echo '</form>';
	
	} elseif ($_GET["step"] == 3){

		echo '<h1>' . $lang['STEP'] . ' 3/3</h1>';

		echo '<h2>' . $lang['CONFIRMATION'] . '</h2>';
		echo '<br />';
		
		echo '<form id="checkout" method="post" action="index.php">';

		
		echo '<table>';
		echo '<tr>';
	    echo '<th class="cart_confirmation">'. $lang['POSITION'] .'</th>';
	    echo '<th class="cart_confirmation">'. $lang['PRODUCT'] .'</th>';
	    echo '<th class="cart_confirmation">'. $lang['QUANTITY'] .'</th>';
	    echo '<th class="cart_confirmation">'. $lang['PRICEPP'] .'</th>';
	    echo '<th class="cart_confirmation">'. $lang['PRICE'] .'</th>';
	  	echo '</tr>';

	  	echo ' <input type="hidden" name="giftbox" value="' . Input::get('giftbox') . '">';
	  	echo ' <input type="hidden" name="paymentmethod" id="pay" value="' . Input::get('paymentmethod') . '">';
	  	echo ' <input type="hidden" name="shippingmethod" value="' . Input::get('shippingmethod') . '">';
		 
		  
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
		echo '<strong>' . $lang['BILLINGADDRESS'] .':</strong>';
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
		echo '<strong>'. $lang['SHIPPINGADDRESS'] . ':</strong>';
		echo '<br />';
		if(Input::get('firstname') != ''){
			$knd_name = Input::get('firstname') . ' ' . Input::get('lastname');
			$knd_address = Input::get('street') . ' ' . Input::get('streetnr');
			$knd_city = Input::get('city') . ' ' . Input::get('citynr');
		}
		echo $knd_name . '<br />';
		echo $knd_address . '<br />';
		echo $knd_city . '<br />';
		
		//Zahlungsart
		echo '<br />';
		echo '<strong>' . $lang['PAYMENTMETHOD'] . ':</strong>';
		echo '<br />';
		if(Input::get('paymentmethod') == 1){
			echo $lang['ADVANCEPAYMENT'];
		}elseif(Input::get('paymentmethod') == 2){
			echo $lang['BILL'];
		}elseif(Input::get('paymentmethod') == 3){
			echo 'PayPal';
		}elseif(Input::get('paymentmethod') == 4){
			echo 'PostFinance';
		}elseif(Input::get('paymentmethod') == 5){
			echo $lang['CREDITCARD'];
		}
		echo '<br />';
		
		//Versandart
		echo '<br />';
		echo '<strong>' . $lang['SHIPPINGMETHOD'] . ':</strong>';
		echo '<br />';
		if(Input::get('shippingmethod') == 1){
			echo $lang['COLLECTION'];
		}elseif(Input::get('shippingmethod') == 2){
			echo $lang['SHIPPING'];
		}
		echo '<br />';
		echo '<br />';
		
		//Sonstiges
		echo '<strong>' . $lang['OTHERS'] . ':</strong>';
		echo '<br />';
		if(Input::get('giftbox') != ''){
			echo $lang['GIFTBOX'];
		}
		echo '<br />';
		echo '<br />';
		
		//Bestätigung
		echo ' 	<table>';
		echo ' 	  <tr id="buttons">';
		echo ' 		<td>';
		echo '			<input type="submit" value="' . $lang['BACK'] . '" onclick="goToSep(2);">';
		echo ' 		</td>';
		echo ' 		<td>';
		echo '			<input type="submit" name="finish" value="' . $lang['ORDER'] . '" >';
		echo ' 		</td>';
		echo ' 	  </tr>';
		echo ' 	</table>';
		
		echo '</form>';
	}

}
?>
	
	