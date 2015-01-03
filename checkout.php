<?php

if(!$user->isLoggedIn()) {
	echo "User not logged in!";
	unset($_GET["step"]);
}

echo ' <script>';
echo ' function toggleinvoiceaddress()';
echo ' {';
echo ' 	if(document.getElementById("cbxInvbilladdress").checked)';
echo '  	alert("lol1");';
echo ' 		document.getElementById("invaddress").style.display = true;';
echo ' 	else';
echo '  	alert("lol2");';
echo ' 		document.getElementById("invaddress").style.display = false;';
echo ' }';
echo ' </script>';

if (isset ( $_GET ["step"] )) {
	
	if ($_GET["step"] == 1){
	
		echo ' <h1>' . $lang['STEP']. ' 1/3</h1>';
		
		echo ' <form name="checkout" method="post" action="index.php?todo=checkout&step=2">';
		
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

		echo ' <form name="checkout" method="post" action="index.php?todo=checkout&step=3">';
		
		echo ' 	<table>';
		echo ' 	  <tr id="invbilladdress">';
		echo ' 	  	<td>' . $lang['INVBILLADDRESS'] . '</td>';
		echo ' 		<td>';
		echo ' 			<input type="checkbox" id="cbxInvbilladdress" name="cbxInvbilladdress" value="cbxInvbilladdress" onclick="toggleinvoiceaddress()" unchecked>';
		echo ' 		</td>';
		echo ' 	  </tr>';
		echo ' 	  <tr id="billingaddress">';
		echo ' 	  	<td>' . $lang['BILLINGADDRESS'] . '</td>';
		echo ' 		<td>';
		echo ' 			Rechnungsadresse';
		echo ' 		</td>';
		echo ' 	  </tr>';
		echo ' 	</table>';
		
		echo '  <div id="invaddress">';
		echo ' 	<table>';
		echo '	  		<tr id="salutation">';
		echo '				<td>' . $lang["SALUTATION"] . '*: </td>';
		echo '	    		<td>';
		echo '				  <select name="salutation" id="salutation" class="register_input">';
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
		echo '			    <td><input type="text" name="street" value="" id="street" class="register_input" /><input type="text" name="streetnr" value="" id="streetnr" class="register_input" /></td>'; 
		echo '			  </tr>	';		  
		echo '			  <tr id="city">';
		echo '			    <td>' . $lang["POSTALCITY"] . '*: </td>';
		echo '			    <td><input type="text" name="city" value="" id="city" class="register_input" /><input type="text" name="citynr" value="" id="citynr" class="register_input" /></td>';
		echo '			  </tr>';
		echo ' 	</table>';
		echo ' </div>';
		
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
	
	} elseif ($_GET["step"] == 3){
	
		echo ' <h1>' . $lang['STEP'] . ' 3/3</h1>';

	
	}

}

?>
	
	