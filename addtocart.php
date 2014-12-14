<<<<<<< HEAD

<?php
include_once("includes/config.php");
include_once("includes/mysql.php");

// initialize empty cart items array
$cart_items=array();
 
// get the product id and name
$id = isset($_GET['pid']) ? $_GET['pid'] : "";
//$name = isset($_GET['name']) ? $_GET['name'] : "";
 
// add new item on array
$cart_items[$id]=$id;
 
// read the cookie
$cookie = $_COOKIE['cart_items_cookie'];
$cookie = stripslashes($cookie);
$saved_cart_items = json_decode($cookie, true);
 
// if $saved_cart_items is null, prevent null error
if(!$saved_cart_items){
    $saved_cart_items=array();
}
 
// check if the item is in the array, if it is, do not add
if(array_key_exists($id, $saved_cart_items)){
    // redirect to product list and tell the user it was already added to the cart
    header('Location: cart');
}
 
else{
    // if cart has contents
    if(count($saved_cart_items)>0){
        foreach($saved_cart_items as $key=>$value){
            // add old item to array, it will prevent duplicate keys
            $cart_items[$key]=$value;
        }
    }
 
    // put item to cookie
    $json = json_encode($cart_items, true);
    setcookie('cart_items_cookie', $json);
 
    // redirect
    header('Location: index');
}

?>
=======
<?php
// ob_start();
// include_once("includes/config.php");
// include_once("includes/mysql.php");
// //clean the data:
// //1.check if bookid is numeric
// //2.then escape it with mysql_escape string
// //3.then test to see if a book with that id exist
// if(!is_numeric($_POST['pid'])){
// //Non numeric value entered. Someone tampered with the catid
// $error=true;
// $errormsg=" Security, Serious error. Contact webmaster: bid entered: ".$_POST['bid']."";
// }else{
// //book_id is numeric number
// //Now, lets see if that <code>book id</code> is valid run a query
// $cbID=mysql_escape_string($_POST['bid']);
// }
// //Now that the bookid is clean, lets test its valididty
// $pidcheck = "SELECT prodID FROM items WHERE prodID='".$cbID."'";
// $result=mysql_query($pidcheck);
// if(!$result){
// $err=true;
// //bookid not valid, sent to index page
// header("location:index.php");
// }
// //now, clean the other form value - quantity
// //since it comes from a select-menu it is pretty secure
// //but it is still worth filtering, just in case
// if(!is_numeric($_POST['qty'])){
// $err=true;
// }else{
// $cqty=mysql_escape_string($_POST['qty']);
// }
// if(!$err){
// $PHPSESSID=session_id();
// //(session_id,bid,date_added,qty)
// $addtocart="INSERT INTO cart_track SET session_id='".$PHPSESSID."',pid='".$cbID."',date_added ='".$td."',qty='".$cqty."'";
// mysql_query($addtocart);
// //go to showcart
// header("location:showcart.php");
// exit;
// }
// ob_end_flush()
?>

-------

<?php
include_once("includes/config.php");
include_once("includes/mysql.php");

session_start();
 
// get the product id
$id = isset($_GET['pid']) ? $_GET['pid'] : "";
//$name = isset($_GET['name']) ? $_GET['name'] : "";
//$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";
 
/*
 * check if the 'cart' session array was created
 * if it is NOT, create the 'cart' session array
 */
if(!isset($_SESSION['cart_items'])){
    $_SESSION['cart_items'] = array();
}
 
// check if the item is in the array, if it is, do not add
if(array_key_exists($id, $_SESSION['cart_items'])){
    // redirect to product list and tell the user it was added to cart
    header('Location: cart');
}
 
// else, add the item to the array
else{
    $_SESSION['cart_items'][$id]=$id;
 
    // redirect to product list and tell the user it was added to cart
    header('Location: cart');
}
?>
>>>>>>> 3085d8503eace0aab169c7a2ce7281842c417c43
