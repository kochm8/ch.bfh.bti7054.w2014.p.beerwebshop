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
	  <tr id="firstname">
	    <td><?php echo $lang['FIRSTNAME'] ?> </td>
	    <td><input type="text" name="firstname" value="" id="firstname" class="register_input" /></td> 
	  </tr>

	  <tr id="lastname">
	    <td><?php echo $lang['LASTNAME'] ?> </td>
	    <td><input type="text" name="lastname" value="" id="lastname" class="register_input" /></td> 
	  </tr>
	  
	  <tr id="username">
	    <td><?php echo $lang['USERNAME'] ?> </td>
	    <td><input type="text" name="username" id="username" value="" class="register_input" /></td>
	  </tr>
	  
	  <tr id="password">
	    <td><?php echo $lang['PASSWORD'] ?> </td>
	    <td><input type="password" name="password" id="password" class="register_input" /></td>
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
	
	