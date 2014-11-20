<?php
class Product {

	private $_db;
	
	public function __construct() {
		$this->_db = DBHandler::getInstance();
	}

	public static function getProductLinks() {
		$_db = DBHandler::getInstance ();
		$res = $_db->getAllProducts ();
		while ( $products = $res->fetch_object () ) {
			$url = $_SERVER ['PHP_SELF'];
			$url = $url . "?id=" . $products->product_id;
			echo "<a href=\"$url\">" . $products->product_name . "</a>";
			echo "<br />";
		}
	}
}

?>