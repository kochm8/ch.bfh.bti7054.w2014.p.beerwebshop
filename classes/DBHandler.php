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
	 *  get orders by user ID
	 */
	public function getOrdersByUserID($userID){
		return $this->query("SELECT * FROM beerheavenOrder WHERE FK_userID = '$userID';");
	}
	
	
	/*
	 *  get beers by order ID
	 */
	public function getBeersByOrderID($orderID){
		return $this->query("SELECT * FROM rel_order_beer LEFT JOIN beer ON rel_order_beer.FK_beerID = beer.beer_ID WHERE FK_orderID = '$orderID';");
	}
	
	
	/*
	 *  save Order
	 */
	public function saveOrder($userID, $date, $totalPrice, $isGiftbox, $status){
			return $this->query("INSERT INTO beerheavenOrder (FK_userID, date, price_total, is_giftbox, status)
											VALUES ('$userID', '$date', '$totalPrice', '$isGiftbox', '$status');");
	}
	
	
	/*
	 *  get Order
	 */
	public function getOrderID($userID, $date, $totalPrice, $isGiftbox, $status){
		 return $res = $this->query("SELECT order_ID from beerheavenOrder WHERE FK_userID = '$userID'
																	AND date = '$date'
																	AND price_total = '$totalPrice'
																	AND is_giftbox = '$isGiftbox'
																	AND status = '$status' ;");
	}
	
	
	/*
	 *  save single products
	 */
	public function saveProductOrder($orderID, $beerID, $quantity){
		$this->query("INSERT INTO rel_order_beer (FK_orderID, FK_beerID, quantity)
										VALUES ('$orderID', '$beerID', '$quantity');");
		return mysql_insert_id();
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