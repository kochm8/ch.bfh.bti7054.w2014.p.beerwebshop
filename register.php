<?php

include_once("init_page.php");
 	
if (Input::get('username') != '') {
	$user = new User();
	$salt = Hash::salt(32);
	$user->create(Input::get('username'), Hash::make(Input::get('password'), $salt), Input::get('firstname'), Input::get('lastname'), $salt);
	$user->login(Input::get('username'), Input::get('password'));
	header ( 'Location:' . $_SERVER ['PHP_SELF'] );
}
?>

<form action="" method="post">
	<table>
	  <tr>
	    <td><?php echo $lang['FIRSTNAME'] ?> </td>
	    <td><input type="text" name="firstname" value="" id="firstname" class="register_input"></td> 
	  </tr>
	  <tr>
	    <td><?php echo $lang['LASTNAME'] ?> </td>
	    <td><input type="text" name="lastname" value="" id="lastname" class="register_input"></td> 
	  </tr>
	  <tr>
	    <td><?php echo $lang['USERNAME'] ?> </td>
	    <td><input type="text" name="username" id="username" value="" class="register_input"></td>
	  </tr>
	  <tr>
	    <td><?php echo $lang['PASSWORD'] ?> </td>
	    <td><input type="password" name="password" id="password" class="register_input"></td>
	  </tr>
	</table>
	<input type="submit" value="<?php echo $lang['REGISTER'] ?> ">
</form>
	
	
	
	