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
		<script type="text/javascript" src="<?php echo $config['base_url'];?>/js/fucking-IE.js"></script>
        <script src="//code.jquery.com/jquery-1.10.1.min.js"></script>
        <!--[if IE]>
<script language="Javascript">
alert ("It looks like you aren't using Internet Explorer. To see our site correctly, please update.")
</script>
<![endif]-->
	</head>
	<body>
