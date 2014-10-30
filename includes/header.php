<?php
include_once("mysql.php");
/*
   if (eregi("MSIE",getenv("HTTP_USER_AGENT")) ||
       eregi("Internet Explorer",getenv("HTTP_USER_AGENT"))) {
	Header("Location: http://www.domain.com/ie_reject.html");
	exit;
   }
   */
?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $site_name;?> - <?php echo $site_page_title;?></title>
		<link rel="stylesheet" href="<?php echo $base_url;?>/css/main.css">
		<script type="text/javascript" src="<?php echo $base_url;?>/js/we-love-ie.js"></script>
	</head>
	<body>
