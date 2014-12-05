<?php
include_once ("init_page.php");


// JavaScript Validator fehlt hier noch


$user = new User ();

if ((Input::get ( 'username' ) != '') && (Input::get ( 'password' ) != '')) {
	$login = $user->login ( Input::get ( 'username' ), Input::get ( 'password' ) );
}

 header ( 'Location:' . base64_decode( Input::get('return_url')) );
?>