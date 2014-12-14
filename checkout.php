<?php

//include_once("init_page.php");
 	
if (Input::get('username') != '') {
	$user = new User();
	$salt = Hash::salt(32);
	$user->create(Input::get('username'), Hash::make(Input::get('password'), $salt), Input::get('firstname'), Input::get('lastname'), $salt);
	$user->login(Input::get('username'), Input::get('password'));
	header ( 'Location:' . $_SERVER ['PHP_SELF'] );
}
?>



<form name="checkout" method="post">

	<table>
	  <tr id="firstname">
	  	<td><?php echo $lang['SHIPPINGMETHOD'] ?> </td>
		<td>
			<input type="radio" name="shippingmethod" value="abholung" checked>Abholung
			<input type="radio" name="shippingmethod" value="versand">Versand
		</td>
	  </tr>

	</table>
	
	<input type="submit" value="<?php echo $lang['REGISTER'] ?>"  onclick="return validate()">
</form>


	
<script type='text/javascript'> 

var js = document.createElement("script");
js.type = "text/javascript";
js.src = "js/Validator.js";
document.body.appendChild(js);

function validate(){

	var validator = new Validator("register"); 
	validator.validate("firstname"); 
	validator.validate("lastname"); 
	validator.validate("username"); 
	validator.validate("password"); 
	return validator.getResult();
}


</script> 
	
	