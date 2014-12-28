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



<form name="register" method="post">

	<table>
	  <tr id="salutation">
	    <td><?php echo $lang['SALUTATION'] . ':' ?> </td>
	    <td>
		    <select name="salutation" id="salutation" class="register_input">
			  <option value="mrs"><?php echo $lang['MRS'] ?></option>
			  <option value="mr"><?php echo $lang['MR'] ?></option>
			</select>
	    </td> 
	  </tr>
	  
	  <tr id="firstname">
	    <td><?php echo $lang['FIRSTNAME'] . ':' ?> </td>
	    <td><input type="text" name="firstname" value="" id="firstname" class="register_input" /></td> 
	  </tr>
	  
	  <tr id="lastname">
	    <td><?php echo $lang['LASTNAME'] . ':' ?> </td>
	    <td><input type="text" name="lastname" value="" id="lastname" class="register_input" /></td> 
	  </tr>
	
	  <tr id="birthdate">
	    <td><?php echo $lang['BIRTHDATE'] . ':' ?> </td>
	    <td><input type="text" name="birthdate" value="" id="birthdate" class="register_input" /></td> 
	  </tr>

	  <tr id="email">
	    <td><?php echo $lang['EMAIL'] . ':' ?> </td>
	    <td><input type="text" name="email" value="" id="email" class="register_input" /></td> 
	  </tr>
	  
	  <tr id="emailconfirm">
	    <td><?php echo $lang['EMAILCONFIRM'] . ':' ?> </td>
	    <td><input type="text" name="emailconfirm" value="" id="emailconfirm"class="register_input" /></td>
	  </tr>
	  
	  <tr id="tel">
	    <td><?php echo $lang['TEL'] . ':' ?> </td>
	    <td><input type="text" name="tel" value="" id="tel" class="register_input" /></td>
	  </tr>
	  
	  <tr id="mobile">
	    <td><?php echo $lang['MOBILE'] . ':' ?> </td>
	    <td><input type="text" name="mobile" value="" id="mobile" class="register_input" /></td>
	  </tr>
	  
	  <tr id="language">
	    <td><?php echo $lang['LANGUAGE'] . ':' ?> </td>
	    <td>
		    <select name="language" id="language" class="register_input">
			  <option value="de"><?php echo $lang['DE'] ?></option>
			  <option value="en"><?php echo $lang['EN'] ?></option>
			</select>
	    </td> 
	  </tr>
	  
	  <tr id="username">
	    <td><?php echo $lang['USERNAME'] . ':' ?> </td>
	    <td><input type="text" name="username" value="" id="username" class="register_input" /></td>
	  </tr>
	  
	  <tr id="password">
	    <td><?php echo $lang['PASSWORD'] . ':' ?> </td>
	    <td><input type="password" name="password" value="" id="password" class="register_input" /></td>
	  </tr>
	  
	  <tr id="passwordconfirm">
	    <td><?php echo $lang['PASSWORDCONFIRM'] . ':' ?> </td>
	    <td><input type="password" name="passwordconfirm" value="" id="passwordconfirm" class="register_input" /></td>
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
	validator.validateEmail("email"); 
	validator.isEqual("email", "emailconfirm"); 
	validator.validate("username");
	validator.validate("password"); 
	validator.isEqual("password", "passwordconfirm"); 
	return validator.getResult();
}


</script> 
	
	