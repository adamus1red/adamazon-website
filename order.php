<?php
    include_once("includes/config.php");
    include_once("includes/mysql.php");
    $site_page_title = "product";
    include("includes/header.php");
    include("includes/heading.php");
    $lMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
    
    if(isset($_COOKIE[$config['login_cookie']]) && !empty($_POST['pID'])) {
    	$login_sess = mysql_escape_string($_COOKIE[$config['login_cookie']]);
    	$sql = "SELECT `userID` FROM `users` WHERE `sessionID` = '" . $login_sess . "' AND `active` = TRUE";
    	$lMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
    	$userID = $result['usedID'];
    	$prod = $_POST;
    	if(!isset($_COOKIE[$config['order_cookie']]) && ) {
    		$sql = "SHOW TABLE STATUS FROM  `" . $config['mysql_database'] . "` LIKE  'users'";
			$result = $lMySQL->execureSQL($sql);
			global $orderNo = $result['Auto_increment'];
    		setcookie($config['order_cookie'], $orderNo, time() + 3600);
    	} else {
			global $orderNo = mysql_escape_string($_COOKIE[$config['order_cookie']);
    	}

    	$sql = "INSERT INTO  `" . $config['mysql_database'] "`.`ordered` (`orderID` ,`userID` ,`total`) VALUES ('" . $orderNo . "',  '" . $userID . "')";
		$lMySQL->executeSQL($sql);
		$sql = "INSERT INTO  `" . $config['mysql_database'] "`.`order` (`orderID`, `prodID`, `size`, `quantity`, `final`) 
		VALUES ('" . $orderNo . "', '" . $prod['pID'] . "' ,'". $prod['size'] ."' ,'" . $prod['quantity'] . "' , FALSE)";
		$lMySQL->executeSQL($sql);
		header('Location: order');
	} else {
		if(!isset($_COOKIE[$config['login_cookie']])){
			header('Location: login');	
		} else {
			$oID = mysql_escape_string($_COOKIE[$config['order_cookie']]);
			echo "Current basket";
			$sql = "SELECT * FROM  `order` WHERE `orderID` = " . $oID;
			$result = $lMySQL->execureSQL($sql);
			for($i = 0; $i < (count($result)/5); $i++){
				echo "";
				
				print_r($result);
				
				//Checkout button here. Should execute SQL to set final in order to true
			}
		}
	}