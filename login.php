<?php
    include_once("includes/config.php");
    include_once("includes/mysql.php");
	include_once("includes/commonFunctions.php");
    echo "0";
	if( (empty($_POST['password']) ) || (empty($_POST['username'])   )) {
		setcookie($config['session_cookie'], 'BLANK');
		$_COOKIE[$config['session_cookie']] = 'BLANK';
		$site_page_title = "User Login";
   	include("includes/header.php");
    	include("includes/heading.php");
    	//Login form

    	echo '<form role="form" method="POST" action="login.php">'.
            '<input type="text" placeholder="Email" class="login-box">'.
            '<input type="password" placeholder="Password" class="login-box">'.
         	'<button type="submit" id="login" class="button">Sign in</button>'.
         '</form>';

    	include("includes/footer.php");
	} else if( (!empty($_POST['password']) ) || (!empty($_POST['username']) ) ){
		echo "1";
		$rawpassword = $_POST['password'];
		$rawpassword = $_POST['username'];
		$username = mysql_escape_string($rawusername);
    	$password = sha1("". $config['pass_salt'] . $rawpassword, $raw_output = null);
		$sql = "SELECT `users`.`username`,`users`.`password` FROM `users` WHERE `username` LIKE '%{$username}%' AND `active` IS TRUE";
		$oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
		$result = $oMySQL->executeSQL($sql);
		if(($result != 1) && (count($result)==1)){
			if($result['password'] == $password){
				// User password matches Get them a random session number!
				$randsess = generateRandomString();
				setcookie($config['session_cookie'], $randsess, time()+3600);
				setcookie($config['login_cookie'], $result['userID'], time()+3600);
				$oMySQL->executeSQL("UPDATE `users` SET  `sessionID`= '" . $randsess . "' WHERE `users`.`userID` = \"" . $result['userID'] . "\"");
				header('Location: ' . $_SERVER['HTTP_REFERER'] .'?re=0');
			} else {
				header('Location: ' . $_SERVER['HTTP_REFERER'] . '?re=1');
			}
		} else {
			header('Location: ' . $_SERVER['HTTP_REFERER'] . '?re=2');
		}
	}

?>