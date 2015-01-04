<?php
class Product {

	private $_db;
	
	public function __construct() {
		$this->_db = DBHandler::getInstance();
	}

	/*
	 * get all produkt links
	 */
	public static function getProductLinks() {
		//get products from database
		$_db = DBHandler::getInstance ();
		$res = $_db->getAllProducts ();
		
		//loop through products and create url link to product
		while ( $products = $res->fetch_object () ) {
			$url = $_SERVER ['PHP_SELF'];
			$url = $url . "?id=" . $products->product_id;
			echo "<a href=\"$url\">" . $products->product_name . "</a>";
			echo "<br />";
		}
	}
}

?>