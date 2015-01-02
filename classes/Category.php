<?php
class Category {

	private $_db;
	
	public function __construct() {
		$this->_db = DBHandler::getInstance();
	}

	public static function getCategoryLinks() {
		//get categories from database
		$_db = DBHandler::getInstance ();
		$res = $_db->getAllCategories ();
		
		$url = $_SERVER ['PHP_SELF'];
		
		//loop through categories and create url to category
		echo '<ul>';
		while ( $categories = $res->fetch_object () ) {
			$url = $url . "?categoryid=" . $categories->category_ID;
			echo "<li><a href=\"$url\">" . $categories->category_name . "</a></li>";
			echo "<br />";
		}
		echo '</ul>';
	}
}

?>