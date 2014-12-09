<?php 
	include('includes/config.php');
	
	$rawpassword = $_GET['pass'];
	
	echo sha1("". $config['pass_salt'] . $rawpassword, $raw_output = null);
?>