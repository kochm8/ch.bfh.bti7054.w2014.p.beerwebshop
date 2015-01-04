<?php

/*
 * User Logout
 */

require_once("init_page.php");

$user = new User();
$user->logout();

header ( 'Location:' . $_SERVER ['HTTP_REFERER']);

?>