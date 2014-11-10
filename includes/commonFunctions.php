<?php

// base class with member properties and methods
class commonFunctions {
	
	var $username;
   var $session;
		
	public function __construct() {
		include_once('mysql.php');
		include_once('config.php');
	}
	function Vegetable($edible, $color="green") 
   {

   }
   
	function generateRandomString($length = 32) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
		
	function checkSession($user_session) {
		if(count($user_session) == 32) {
			$userID = $_COOKIE[$config['session_cookie']];
			$sql = "SELECT `users`.`sessionID` FROM `users` WHERE `sessionID` IS '" . $session . "' AND `active` IS TRUE";
			$oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
			$result = $oMySQL->executeSQL($sql);
   			if(($result != 1) && (count($result)==1)) {
   				if($result['sessionID'] == $user_session) {
   					return 0;
   				} else { 
   					return 1;
   				}
   			} else {
   				return 2;
   			}
		} else {
   			return 3;
		}
	}
}