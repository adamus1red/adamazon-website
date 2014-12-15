<?php
include_once("includes/config.php");
include_once("includes/mysql.php");
 
$site_page_title="Cart";
include("includes/header.php");
include("includes/heading.php");
 
$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['id']) ? $_GET['id'] : "";
 
if($action=='removed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>Product was removed from your cart!</strong>";
    echo "</div>";
}
 
$cookie = $_COOKIE['cart_items_cookie'];
$cookie = stripslashes($cookie);
$saved_cart_items = json_decode($cookie, true);
 
if(count($saved_cart_items)>0){
    // get the product ids
    $countID = 0;
    $ids = "";
    foreach($saved_cart_items as $id){
        $ids = $ids . $id . ",";
         $countID = $countID + 1;
    }
 
    // remove the last comma
    $ids = rtrim($ids, ',');
 
    //start table
    echo "<table class='table table-hover table-responsive table-bordered'>";
 
        // our table heading
        echo "<tr>";
            echo "<th class='textAlignLeft'>Product Name</th>";
            echo "<th>Price (GBP)</th>";
            echo "<th>Size</th>";
            echo "<th>Action</th>";
        echo "</tr>";
 
        $oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
        $sql = "SELECT prodID, name, price, size FROM items WHERE prodID IN ({$ids}) ORDER BY name";
        $result = $oMySQL->executeSQL($sql);
 
        $total_price=0;
        //print_r($result);
        //echo "\n" . $countID . "\n" . count($result);
        if($countID > 1){
            $i = 0;
            while($i < count($result)){
                echo "<tr>\n".
                     "    <td>". $result[$i]['name'] ."</td>\n".
                     "    <td>&#163;". $result[$i]['price'] ."</td>\n".
                     "    <td>". $result[$i]['size'] ."</td>\n".
                     "    <td>\n".
                     "        <a href='remove_from_cart.php?id=". $result[$i]['prodID'] ."&name=". $result[$i]['name'] ."' class='btn btn-danger'>\n".
                     "            <span class='glyphicon glyphicon-remove'></span> Remove from cart\n".
                     "        </a>\n".
                     "    </td>\n".
                     "</tr>";
 
                $total_price+=$result[$i]['price'];
                $i++;
            }
        } else {
            echo "<tr>\n".
                 "    <td>". $result['name'] ."</td>\n".
                 "    <td>&#163;". $result['price'] ."</td>\n".
                 "    <td>". $result['size'] ."</td>\n".
                 "    <td>\n".
                 "        <a href='remove_from_cart.php?id=". $result['prodID'] ."&name=". $result['name'] ."' class='btn btn-danger'>\n".
                 "            <span class='glyphicon glyphicon-remove'></span> Remove from cart\n".
                 "        </a>\n".
                 "    </td>\n".
                 "</tr>";
            $total_price+=$result['price'];
         }

        echo "</table>";

        echo "<ul style='list-style-type: none'><li class='pull-left' style='line-style: none; text-decoration: none;'><h4>Total Price: &#163;" . $total_price . "</h4></li>";

            echo "<li class='pull-left' style='line-style: none; text-decoration: none;'><script async='async' src='https://www.paypalobjects.com/js/external/paypal-button.min.js?merchant=tasinclair1-facilitator@gmail.com'"; 
                echo    "data-button='buynow'"; 
                echo    "data-name='Adamazon Sale'";
                echo    "data-amount='" . $total_price . "'"; 
                echo    "data-currency='GBP'"; 
                echo    "data-shipping='0'";
                echo    "data-callback='https://devweb2014.cis.strath.ac.uk/~mlb12174/massive-octo-dubstep/order.php'";
                echo    "data-env='sandbox'";
            echo "></script></li></ul>";

}
 
else{
    echo "<div class='alert alert-danger'>";
        echo "<strong>No products found</strong> in your cart!";
    echo "</div>";
}
 
include("includes/footer.php");
?>
