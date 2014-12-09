<?php

include_once("includes/config.php");
include_once("includes/mysql.php");
$site_page_title = "product";
include("includes/header.php");
include("includes/heading.php");
$oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);

$cookie_userID = $_COOKIES['adamazon_login'];
$cookie_orderID = $_COOKIES['adamazon_orderID'];


if(isset($cookie_orderID)){
	$sql = INSERT INTO `order` (`orderID`, `prodID`, `quantity`, `final`) VALUES;
	$result = $oMySQL->executeSQL($sql);

}

if(!isset($cookie_orderID)){
	$sql = INSERT INTO `order` (, `prodID`, `quantity`, `final`) VALUES;
	$result = $oMySQL->executeSQL($sql);

}
setcookie(&cookie_userID,cookie_orderID);
?>