<?php
include_once("mysql.php");
include_once("config.php");
include_once("commonFunctions.php");
/*
   if (eregi("MSIE",getenv("HTTP_USER_AGENT")) ||
       eregi("Internet Explorer",getenv("HTTP_USER_AGENT"))) {
	Header("Location: http://www.domain.com/ie_reject.html");
	exit;
   }
   */
   
    
    if (isset($_COOKIE[$config['login_cookie']])) {
        $uID = $_COOKIE[$config['login_cookie']];
		setcookie($config['login_cookie'], $_COOKIE[$config['login_cookie']], time()+3600);
    } else {
        $uID = 0;
    }
   
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $config['site_name'];?> - <?php echo $site_page_title;?></title>
		<link rel="stylesheet" href="<?php echo $config['base_url'];?>/css/main.css">
		<script type="text/javascript" src="<?php echo $config['base_url'];?>/js/we-love-ie.js"></script>
	</head>
	<body>
