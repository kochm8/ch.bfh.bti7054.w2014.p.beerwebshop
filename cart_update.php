<?php
/*
 * Updates the shopping cart
 */
session_start ();
include_once("init_page.php");

$product_id = $_GET ["id"];
$return_url = base64_decode ( $_GET ["return_url"] );

if (isset ( $_GET ["type"] ) && $_GET ["type"] == 'add') {
	Cart::update($product_id);
}

if (isset ( $_GET ["type"] ) && $_GET ["type"] == 'remove') {
	Cart::remove($product_id);
}

if (isset ( $_GET ["type"] ) && $_GET ["type"] == 'clear') {
	Cart::clear();
}

header ( 'Location:' . $return_url );
s
?>