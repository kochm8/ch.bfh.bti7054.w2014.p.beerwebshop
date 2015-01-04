<?php

//include_once("init_page.php");
 	
if (Input::get('username') != '') {
	$user = new User();
	$salt = Hash::salt(32);
	
	try {
	$user->create(Input::get('salutation'),
					Input::get('firstname'),
					Input::get('lastname'),
					Input::get('street'),
					Input::get('streetnr'),
					Input::get('city'),
					Input::get('citynr'),
					Input::get('birthdate'),
					Input::get('email'),
					Input::get('tel'),
					Input::get('mobile'),
					Input::get('language'),
					Input::get('username'),
					Hash::make(Input::get('password'), $salt),
					$salt);
	
	$user->login(Input::get('username'), Input::get('password'));
	header ( 'Location:' . $_SERVER ['PHP_SELF'] );

	}catch(Exception $e) {
		echo '<div class="error">'. $lang['USEREXISTS'] .'</div><br />';
	}
}
?>



<form name="register" method="post">

	<table>
	  <tr>
	    <td><?php echo $lang['SALUTATION'] . '*:' ?> </td>
	    <td>
		    <select name="salutation" class="register_select">
			  <option value="mrs"><?php echo $lang['MRS'] ?></option>
			  <option value="mr"><?php echo $lang['MR'] ?></option>
			</select>
	    </td> 
	    <td id="salutation"> </td>
	  
	  </tr>
	  
	  <tr>
	    <td><?php echo $lang['FIRSTNAME'] . '*:' ?> </td>
	    <td><input type="text" name="firstname" value="" class="register_input" /></td> 
	    <td id="firstname"></td>
	  </tr>
	  
	  <tr>
	    <td><?php echo $lang['LASTNAME'] . '*:' ?> </td>
	    <td><input type="text" name="lastname" value="" class="register_input" /></td> 
	    <td  id="lastname"></td>
	  </tr>
	  
	  <tr>
	    <td><?php echo $lang['STREETNR'] . '*:' ?> </td>
	    <td><input type="text" name="street" value="" class="register_input" /></td>
	    <td width="90px"><input type="text" name="streetnr" value="" class="register_input_small" /></td>
	    <td><div id="streetnr"></div><div  id="street"></div></td>
	  </tr>
	  	
	  <tr>
	    <td><?php echo $lang['POSTALCITY'] . '*:' ?> </td>
	    <td><input type="text" name="city" value="" class="register_input" />
	    <td><input type="text" name="citynr" value="" class="register_input_small" /></td>
	    <td><div id="city"></div><div  id="citynr"></div></td>
	  </tr>
	
	  <tr>
	    <td><?php echo $lang['BIRTHDATE'] . ':' ?> </td>
	    <td><input type="text" name="birthdate" value="" class="register_input" /></td> 
	    <td  id="birthdate"></td>
	  </tr>

	  <tr>
	    <td><?php echo $lang['EMAIL'] . '*:' ?> </td>
	    <td><input type="text" name="email" value="" class="register_input" /></td> 
	    <td id="email"></td>
	  </tr>
	  
	  <tr>
	    <td><?php echo $lang['EMAILCONFIRM'] . '*:' ?> </td>
	    <td><input type="text" name="emailconfirm" value="" class="register_input" /></td>
	    <td id="emailconfirm"></td>
	  </tr>
	  
	  <tr>
	    <td><?php echo $lang['TEL'] . ':' ?> </td>
	    <td><input type="text" name="tel" value="" class="register_input" /></td>
	    <td  id="tel"></td>
	  </tr>
	  
	  <tr>
	    <td><?php echo $lang['MOBILE'] . ':' ?> </td>
	    <td><input type="text" name="mobile" value="" class="register_input" /></td>
	    <td id="mobile"></td>
	  </tr>
	  
	  <tr>
	    <td><?php echo $lang['LANGUAGE'] . '*:' ?> </td>
	    <td>
		    <select name="language" class="register_select">
			  <option value="de"><?php echo $lang['DE'] ?></option>
			  <option value="en"><?php echo $lang['EN'] ?></option>
			</select>
	    </td> 
	    <td id="language"></td>
	  </tr>
	  
	  <tr>
	    <td><?php echo $lang['USERNAME'] . '*:' ?> </td>
	    <td><input type="text" name="username" value="" class="register_input" /></td>
	    <td id="username"></td>
	  </tr>
	  
	  <tr>
	    <td><?php echo $lang['PASSWORD'] . '*:' ?> </td>
	    <td><input type="password" name="password" value="" class="register_input" /></td>
	    <td id="password"></td>
	  </tr>
	  
	  <tr>
	    <td><?php echo $lang['PASSWORDCONFIRM'] . '*:' ?> </td>
	    <td><input type="password" name="passwordconfirm" value="" class="register_input" /></td>
	    <td  id="passwordconfirm"></td>
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
	validator.validate("street"); 
	validator.validate("streetnr"); 
	validator.validate("city"); 
	validator.validate("citynr"); 
	validator.validate("email"); 
	validator.validate("emailconfirm"); 	
	validator.validate("username");
	validator.validate("password"); 
	validator.validate("passwordconfirm");  
	

	validator.validateNumeric("citynr");
	validator.validateNumeric("streetnr");
	
	validator.validatePhone("tel");
	validator.validatePhone("mobile");
	validator.validateEmail("email"); 
	validator.isEqual("email", "emailconfirm"); 
	validator.isEqual("password", "passwordconfirm");

	return validator.getResult();
}


</script> 
	
	