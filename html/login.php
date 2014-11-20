	<?php

	include("init_page.php");
//JavaScript Validator


$user = new User();

if((Input::get('username') != '') && (Input::get('password') != '')){
	
	$login = $user->login(Input::get('username'), Input::get('password'));
	
	if($login) {
		echo '<p>Correct Login</p>';
		echo Input::get('username');	
	} else {
		echo '<p>Incorrect username or password</p>';
	}
}


$ret_url = "http://localhost/webshop/ch.bfh.bti7054.w2014.p.beerwebshop/html/index.php";
header ( 'Location:' . $ret_url );
?>