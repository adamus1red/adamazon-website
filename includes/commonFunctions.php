<?php

// base class with member properties and methods
class commonFunctions {
		
	public function __construct() {
		include_once('mysql.php');
		include_once('config.php');
	}
    /*
	function Vegetable($edible, $color="green") 
   {

   }
   */
    function checkID($user_ID) {
        $sql = "SELECT `users`.`userID` FROM `users` WHERE `userID` IS '" . $userID . "' AND `active` IS TRUE";
        $oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
        $result = $oMySQL->executeSQL($sql);
        if(($result != 1) && (count($result)==1)) {
            $sql = "SELECT `users`.`username` FROM `users` WHERE `userID` IS '" . $userID . "' AND `active` IS TRUE";
            $oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
            $result = $oMySQL->executeSQL($sql);
            return $result['username'];
        }        
    }
   
	function generateRandomString($length = 32) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
}