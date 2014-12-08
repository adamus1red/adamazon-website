<?php
    include_once("includes/config.php");
    include_once("includes/mysql.php");
	include_once("includes/commonFunctions.php");
	function generateRandomString($length = 32) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	if((empty($_POST['password']) ) || (empty($_POST['username']))) {
		$site_page_title = "User Login";
		include("includes/header.php");
    	include("includes/heading.php");
    	//Login form
		if($_GET['re'] == 2){
			echo "<h1>Bad login</h1>";
		}
    	echo '<form role="form" method="POST" action="login.php">'.
            '<input name="username" type="text" id="username">'.
			'<input name="password" type="password" id="password">'.
         	'<input type="submit" name="Submit" value="Login">'.
         '</form>';

    	include("includes/footer.php");
	} else if((isset($_POST['password'])) || (isset($_POST['username']))){
		$rawpassword = $_POST['password'];
		$rawusername = $_POST['username'];
		if (!filter_var($rawusername, FILTER_VALIDATE_EMAIL)) {
			//valid
		
		$username = mysql_escape_string($rawusername);
    	$password = sha1("". $config['pass_salt'] . $rawpassword, $raw_output = null);
		$sql = "SELECT * FROM users WHERE username='" . $username . "' and password='" . $password . "'";
		$lMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
		$result = $lMySQL->executeSQL($sql);
		echo "<!-- break 1 -->";
		echo $rawpassword."<br />";
		echo $password . "<br />";
		echo $result['password'] . "<br />";
		print_r($result) . "<br />";
		
		if(trim($result['password']," \t\n\r\0\x0B") == trim($password," \t\n\r\0\x0B")){
		echo "<!-- break 2 -->";
			// User password matches Get them a random session number!
			$randsess = generateRandomString();
			setcookie($config['login_cookie'], $randsess, time()+3600);
			$lMySQL->executeSQL("UPDATE  `users` SET  `sessionID` =  \"" . $randsess . "\" WHERE `userID` = " . $result['userID']);
			header('Location: index.php?re=0');
		} else {
			echo "break 2";
			header('Location: ' . $_SERVER['HTTP_REFERER'] . '?re=1');
		}
		} else {
			header('Location: ' . $_SERVER['HTTP_REFERER'] . '?re=2');
		}
	}

?>