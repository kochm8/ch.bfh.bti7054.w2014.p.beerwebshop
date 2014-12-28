<?php

class User {
	
	private $_db,
	$_data,
	$_sessionName,
	$_cookieName,
	$isLoggedIn;

	
	public function __construct($user = null) {
		$this->_db = DBHandler::getInstance();
		$this->_sessionName = 'user';
		$this->_cookieName = 'hash';

		if(!$user) {
			
			if(Session::exists($this->_sessionName)) {
				$user = Session::get($this->_sessionName);
				$this->isLoggedIn = true;
				$data = $this->_db->getUserByUsername($user);
				$this->_data = array('username' => $data['username'],'firstname' =>  $data['firstname'],'lastname' =>  $data['lastname']);
			}
			
		} else {
			$this->isLoggedIn = false;
		}
	}

	
<<<<<<< HEAD
	public function create($salutation, $firstname, $lastname, $birthdate, $email, $tel, $mobile, $language, $username, $password, $salt) {
=======
	public function create($username, $password, $firstname, $lastname, $salt, $title, $email, $birthday, $telephone, $mobile) {
>>>>>>> branch 'master' of https://github.com/kochm8/ch.bfh.bti7054.w2014.p.beerwebshop
		
<<<<<<< HEAD
		if(!$this->_db->createUser($salutation, $firstname, $lastname, $birthdate, $email, $tel, $mobile, $language, $username, $password, $salt)){
=======
		if(!$this->_db->createUser($username, $password, $firstname, $lastname, $salt, $title, $email, $birthday, $telephone, $mobile)){
>>>>>>> branch 'master' of https://github.com/kochm8/ch.bfh.bti7054.w2014.p.beerwebshop
			throw new Exception('Sorry, there was a problem creating your account;');
		}
	}


	public function login($username, $password) {
		
		$data = $this->_db->getUserByUsername($username);
		
		if ($data['password'] == substr(Hash::make($password, $data['salt']), 0, 50)){
			Session::put($this->_sessionName, $data['username']);
			return true;
		}else{
			return false;
		}

	}

	
	public function logout() {
		Session::delete($this->_sessionName);
	}

	
	public function data(){
		return $this->_data;
		echo $this->_data;
	}

	
	public function isLoggedIn() {
		return $this->isLoggedIn;
	}
}
?>
