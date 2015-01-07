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
				$this->_data = array('user_ID' => $data['user_ID'],
						'username' => $data['username'],
						'firstname' =>  $data['firstname'],
						'lastname' =>  $data['lastname'],
						'salutation' =>  $data['salutation'],
						'knd_address' => $data['street_name'] . ' ' . $data['street_number'],
						'knd_name' =>  $data['firstname'] . ' ' . $data['lastname'],
						'knd_address' => $data['street_name'] . ' ' . $data['street_number'],
						'knd_city' => $data['city_number'] . ' ' . $data['city_name'],
						'knd_email' => $data['email'],
						'knd_tel' => $data['tel'],
						'knd_mobile' => $data['mobile']
						);
			}
			
		} else {
			$this->isLoggedIn = false;
		}
	}

	/*
	 * create a user
	 */
	public function create($salutation, $firstname, $lastname, $street, $streetnr, $city, $citynr, $birthdate, $email, $tel, $mobile, $language, $username, $password, $salt) {
		
		if(!$this->_db->createUser($salutation, $firstname, $lastname, $street, $streetnr, $city, $citynr, $birthdate, $email, $tel, $mobile, $language, $username, $password, $salt)){
			throw new Exception('Sorry, there was a problem creating your account;');
		}
	}


	/*
	 * login user
	 */
	public function login($username, $password) {
		
		$data = $this->_db->getUserByUsername($username);
		
		if ($data['password'] == substr(Hash::make($password, $data['salt']), 0, 50)){
			Session::put($this->_sessionName, $data['username']);
			return true;
		}else{
			return false;
		}

	}

	/*
	 * logout a user
	 */
	public function logout() {
		Session::delete($this->_sessionName);
	}

	
	/*
	 * get some userdata
	 */
	public function data(){
		return $this->_data;
	}

	/*
	 * checks if a user is logged in
	 */
	public function isLoggedIn() {
		return $this->isLoggedIn;
	}
	
}
?>
