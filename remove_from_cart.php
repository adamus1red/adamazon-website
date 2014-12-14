<<<<<<< HEAD
<?php

$cookie = $_COOKIE['cart_items_cookie'];
$cookie = stripslashes($cookie);
$saved_cart_items = json_decode($cookie, true);
 
// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";
 
// remove the item from the array
$saved_cart_items = array_diff($saved_cart_items, array($id));
 
// delete cookie value
setcookie("cart_items_cookie", "", time()-3600);
 
// enter new value
$json = json_encode($saved_cart_items, true);
setcookie('cart_items_cookie', $json);
 
// redirect to product list and tell the user it was added to cart
header('Location: cart.php?action=removed&id=' . $id);
=======
<?php
session_start();
 
// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
 
// remove the item from the array
unset($_SESSION['cart_items'][$id]);
 
// redirect to product list and tell the user it was added to cart
header('Location: cart.php?action=removed&id=' . $id . '&name=' . $name);
>>>>>>> 3085d8503eace0aab169c7a2ce7281842c417c43
?>