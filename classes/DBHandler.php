<?php

class DBHandler extends mysqli {
	
	private static $_instance = null;
	
	function __construct() {
		global $db_username;
		global $db_host;
		global $db_password;
		global $db_name;
		global $db_port;
	
		if($db_port == ''){
			parent::__construct($db_host, $db_username, $db_password, $db_name);
		}{
			parent::__construct($db_host, $db_username, $db_password, $db_name , $db_port);
		}
		//parent::select_db($db_name);
	}
	
	public function getCategoryById($id){
		return $this->query("SELECT * FROM category WHERE category_ID = '$id'");
	}
	
	/*
	 * get product by ID
	 */
	public function getProductById($id){
		return $this->query("SELECT * FROM beer WHERE beer_ID = '$id'"); 
	}
	
	
	/*
	 * get products by category id
	 */
	public function getProductsByCategoryId($id){
		return $this->query("SELECT * FROM beer WHERE FK_categoryID = '$id'");
	}
	
	/*
	 * get new products
	 */
	public function getNewProducts(){
		return $this->query("SELECT * FROM beer WHERE is_new = '1'");
	}

	/*
	 * get all products
	 */
	public function  getAllProducts(){
		return $this->query("SELECT * FROM beer");
	}
	
	/*
	 * get all categories
	 */
	public function  getAllCategories(){
		return $this->query("SELECT * FROM category");
	}

	
	/*
	 * create login
	 */
	public function createUser($salutation, $firstname, $lastname, $street, $streetnr, $city, $citynr, $birthdate, $email, $tel, $mobile, $language, $username, $password, $salt){
		
		return $this->query("insert into user (salutation, firstname, lastname, street_name, street_number, city_name, city_number, birthdate, email, tel, mobile, language, username, password, salt)
										values('$salutation', '$firstname', '$lastname', '$street', '$streetnr', '$city', '$citynr', '$birthdate', '$email', '$tel', '$mobile', '$language', '$username', '$password', '$salt');");
		
	}
	
	/*
	 * get user address
	 */
	public function getAddressByUsername($username){
		return $this->query("SELECT firstname, lastname, street_name, street_number, city_name, city_number, email, tel, mobile FROM user WHERE username = '" . $username ."'");
	}
	
	
	/*
	 *  get user by username
	 */
	public function getUserByUsername($username){
		$result = $this->query("SELECT * FROM user where username = '$username';");
		return $this->fetchSingleRow($result);
	}
	
	
	/*
	 *  get user by username
	 */
	public function saveOrder($userID, $date, $price_total, $isGiftbox, $status){
			return $this->query("INSERT INTO beerheavenOrder (FK_userID, date, price_total, is_giftbox, status)
										VALUES ('$salutation', '$date', '$price_total', '$isGiftbox', '$status');");
	}
	
	
	/*
	 * get single row
	 */
	public function fetchSingleRow($result){
		
		$row = mysqli_fetch_assoc($result);
		return $row;
	}
	
	
	/*
	 * get instance
	 */
	public static function getInstance() {
		if(!isset(self::$_instance)) {
			self::$_instance = new DBHandler();
		}
		return self::$_instance;
	}
	
}

?>