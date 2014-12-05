<?php

require_once("init_page.php");

$user = new User();
$user->logout();

$ret_url = "http://localhost/webshop/ch.bfh.bti7054.w2014.p.beerwebshop/index.php";
header ( 'Location:' . $ret_url);

?>