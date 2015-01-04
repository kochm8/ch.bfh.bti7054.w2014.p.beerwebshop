<?php

class Session {
	
	/*
	 * session exists
	 */
    public static function exists($name) {
    	
    	if (isset($_SESSION[$name])) {
    		return true;
    	}else{
    		return false;
    	}
    }

    /*
     * Put session
     */
    public static function put($name, $value) {
        return $_SESSION[$name] = $value;
    }

    /*
     * get session
     */
    public static function get($name) {
        return $_SESSION[$name];
    }

    /*
     * delete session
     */
    public static function delete($name) {
        if(self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }

    /*
     *  flash session
     */
    public static function flash ($name, $string = 'null') {
        if(self::exists($name)) {
            $session = self::get($name);
            self::delete($name);
                return $session;
        } else {
            self::put($name, $string);
        }
    }
}