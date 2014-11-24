<?php

include("init_page.php");
 	
if (Input::get('username') != '') {
	$user = new User();
	$salt = Hash::salt(32);
	$user->create(Input::get('username'), Hash::make(Input::get('password'), $salt), Input::get('firstname'), Input::get('lastname'), $salt);
	
	$url = $_SERVER ['PHP_SELF'];
	header ( 'Location:' . $url );
}
?>

<form action="" method="post">
	<table>
	  <tr>
	    <td>Vorname</td>
	    <td><input type="text" name="firstname" value="" id="firstname"></td> 
	  </tr>
	  <tr>
	    <td>Nachname</td>
	    <td><input type="text" name="lastname" value="" id="lastname"></td> 
	  </tr>
	  <tr>
	    <td>Username</td>
	    <td><input type="text" name="username" id="username" value=""></td>
	  </tr>
	  <tr>
	    <td>Password</td>
	    <td><input type="password" name="password" id="password"></td>
	  </tr>
	</table>
	<input type="submit" value="Register">
</form>
	
	
	
	