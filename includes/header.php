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

    $cart_items=array();
 

 if(isset($_COOKIE[$config['cart_cookie']])){
	// read the cookie
	$cookie = $_COOKIE[$config['cart_cookie']];
} else {
    setcookie($config['cart_cookie'], null);
    $cookie = null;
}
	$cookie = stripslashes($cookie);
	$saved_cart_items = json_decode($cookie, true);
 
    // put item to cookie
    $json = json_encode($saved_cart_items, true);
    
   
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $config['site_name'];?> - <?php echo $site_page_title;?></title>
		<link rel="stylesheet" href="<?php echo $config['base_url'];?>/css/main.css">
        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	</head>
	<body>
