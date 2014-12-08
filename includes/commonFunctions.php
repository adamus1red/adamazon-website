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
    function checkID($sessionID) {
		include_once('config.php');
        $sql = "SELECT `users`.`sessionID` FROM `users` WHERE `sessionID` IS '" . $sessionID . "' AND `active` IS TRUE";
        $oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
        $result = $oMySQL->executeSQL($sql);
        if(trim($result['sessionID']," \t\n\r\0\x0B") == trim($sessionID," \t\n\r\0\x0B")){
            $sql = "SELECT `users`.`username` FROM `users` WHERE `sessionID` IS '" . $sessionID . "' AND `active` IS TRUE";
            $oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
            $result = $oMySQL->executeSQL($sql);
            return $result['username'];
        }        
    } 
}