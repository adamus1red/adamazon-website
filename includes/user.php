<?php

/*
	Processes user logins

	Output:
		returns 0: user login successful
		returns 1: user login failed password miss match
		returns 2: no user found
		returns 3: Other error
*/

    class User {
    	var $username; // Username we're processing
    	var $password; // hashed password
		var $dbpass; // password stored in the database
		var $dbuser; // username stored in the database
    	
		function __construct(){
			$config = parse_ini_file("config.ini");
			$oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
		}    	

    	public function login ($rawusername, $rawpassword) {
    		$username = mysql_escape_string($rawusername);
    		$password = sha1("".$pass_salt . $rawpassword, $raw_output = null);
			$sql = "SELECT * FROM `users` WHERE `username` LIKE '%{$username}%' AND `active` IS TRUE";
			$result = $oMySQL->executeSQL($sql);
			if(($result != 1) && (count($result)==1)){
				if($result['password'] == $password){
					// User password matches Get them a random session number!
					$randsess = generateRandomString();
					setcookie("adamazon_session", $randsess, time()+3600);
					setcookie("adamazon_user", $result['userID'], time()+3600);
					$oMySQL->executeSQL("UPDATE `users` SET  `sessionID`= '" . $randsess . "' WHERE `users`.`userID` = \"" . $result['userID'] . "\"");
					return 0;
				} else {
					return 1;
				}
			} else {
				return 2;
			}
    		
    	}
    	
		private function generateRandomString($length = 20) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, strlen($characters) - 1)];
			}
			return $randomString;
		}
		
		public function checkSession() {
			$user = $_COOKIE["adamazon_user"];
			$session = $_COOKIE["adamazon_session"];
			if(!isset($user) && !isset($session)) {
				$userID = $_COOKIE[$cookie_name];
				$sql = "SELECT * FROM `users` WHERE `userID` IS '" . $userID . "' AND `active` IS TRUE";
				$result = $oMySQL->executeSQL($sql);
    			if(($result != 1) && (count($result)==1)) {
    				if($result['sessionID'] == $_COOKIE[$session_cookie]) {
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
		
		public function getUsername() {
			$user = $_COOKIE["adamazon_user"];
			$session = $_COOKIE["adamazon_session"];
			if(!isset($user) && !isset($session)){
				$userID = $_COOKIE[$cookie_name];
				$sql = "SELECT `username` FROM `users` WHERE `userID` IS '" . $userID . "' AND `active` IS TRUE";
				$result = $oMySQL->executeSQL($sql);
    			if(($result != 1) && (count($result)==1)) {
    				return $result['username'];
    			} else {
    				return 2;
    			}
    		}
		}
}
?>