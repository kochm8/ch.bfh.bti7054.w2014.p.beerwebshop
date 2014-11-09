<?php
session_start ();

if (isset ( $_GET ["type"] ) && $_GET ["type"] == 'add') {
	$product_id = $_GET ["product_id"];
	$return_url = base64_decode ( $_GET ["return_url"] );
}

$new_product = array ();

if (isset ( $_SESSION ["products"] )) // if we have the session
{
	foreach ( $_SESSION ["products"] as $key => $value ) {
		$new_product [] = $value;
	}
}

$new_product [] = $product_id;
$_SESSION ["products"] = $new_product;

header ( 'Location:' . $return_url );

?>