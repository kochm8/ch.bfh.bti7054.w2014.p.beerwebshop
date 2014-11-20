<?php

include("init_page.php");
 	
if (Input::get('username') != '') {
	$user = new User();
	$salt = Hash::salt(32);
	$user->create(Input::get('username'), Hash::make(Input::get('password'), $salt), Input::get('name'), Input::get('name'), $salt);
	
	$ret_url = "http://localhost/webshop/ch.bfh.bti7054.w2014.p.beerwebshop/html/index.php";
	header ( 'Location:' . $ret_url );
}
?>

<form action="" method="post">
<div class="field">
<label for="name">Name</label>
<input type="text" name="name" value="" id="name">
</div>

<div class="field">
<label for="username">Username</label>
<input type="text" name="username" id="username" value="">
</div>

<div class="field">
<label for="password">Password</label>
<input type="password" name="password" id="password">
</div>
<input type="submit" value="Register">
</form>
	
	
	
	