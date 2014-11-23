<?php

class DBHandler extends mysqli {
	
	private static $_instance = null;
	
	function __construct() {
		global $db_username;
		global $db_host;
		global $db_password;
		global $db_name;
	
		parent::__construct($db_host, $db_username, $db_password);
		parent::select_db($db_name);
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
	 * get all products
	 */
	public  function  getAllProducts(){
		return $this->query("SELECT * FROM beer");
	}
	
	/*
	 * get all categories
	 */
	public  function  getAllCategories(){
		return $this->query("SELECT * FROM category");
	}

	
	/*
	 * create login
	 */
	public  function createUser($username, $password, $firstname, $lastname, $salt ){
		return $this->query("insert into user (username, password, firstname, lastname, salt) values('$username', '$password', '$firstname', '$lastname', '$salt');");
	}
	
	
	/*
	 *  get user by username
	 */
	public function getUserByUsername($username){
		$result = $this->query("SELECT * FROM user where username = '$username';");
		return $this->fetchSingleRow($result);
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