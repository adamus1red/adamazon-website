<?php
include_once("mysql.php");
include_once("config.php");
include_once("commonFunctions.php");
    
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
        <script src="<?php echo $config['base_url'];?>/js/instantclick.min.js" data-no-instant></script>
        <script data-no-instant>InstantClick.init();</script>
	</head>
	<body>
