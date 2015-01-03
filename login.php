<!-- 
<html>
<head>
</head>
<body>

	<form id="login_error" action="index.php" method="post" >
		<input id="check" type="hidden" value=""/>
	</form>
<?php
include_once ("init_page.php");

$user = new User ();

if ((Input::get ( 'username' ) != '') && (Input::get ( 'password' ) != '')) {
	$login = $user->login ( Input::get ( 'username' ), Input::get ( 'password' ) );
}

echo ' <script type="text/javascript">';

if(!$user->isLoggedIn()){
	$msg = "Username or Password wrong";
	echo ' var form  = document.getElementById("login_error");';

	echo ' var input = document.getElementById("check");';
	echo ' input.value = false;';
}
			
echo ' form.submit();';
echo ' </script>';
	
//header ( 'Location:' . base64_decode( Input::get('return_url')) );
?>

</body>
</html>
 -->
 
 <?php
include_once ("init_page.php");

$user = new User ();

if ((Input::get ( 'username' ) != '') && (Input::get ( 'password' ) != '')) {
	$login = $user->login ( Input::get ( 'username' ), Input::get ( 'password' ) );
}
		
header ( 'Location:' . base64_decode( Input::get('return_url')) );
 
 
 