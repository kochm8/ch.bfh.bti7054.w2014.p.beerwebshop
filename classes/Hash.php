<?php

class Hash {
	
	/*
	 * make mash
	 */
	public static function make($string, $salt = '') {
		return hash('sha256', $string . $salt);
	}

	/*
	 * Generate salt
	 */
	public static function salt($length) {
		return mcrypt_create_iv($length);
	}

	/*
	 * makes a unique ID
	 */
	public static function unique() {
		return self::make(uniqid());
	}
}


?>