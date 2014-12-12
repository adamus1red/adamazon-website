<?php
include_once("includes/config.php");
include_once("includes/mysql.php");

session_start();
 
$site_page_title ="Cart";
include("includes/header.php");
include("includes/heading.php");
 
$action = isset($_GET['action']) ? $_GET['action'] : "";
$name = isset($_GET['id']) ? $_GET['id'] : "";
 
if($action=='removed'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> was removed from your cart!";
    echo "</div>";
}
 
else if($action=='quantity_updated'){
    echo "<div class='alert alert-info'>";
        echo "<strong>{$name}</strong> quantity was updated!";
    echo "</div>";
}
 
if(count($_SESSION['cart_items'])>0){
 
    // get the product ids
    $countID = 0;
    $ids = "";
    foreach($_SESSION['cart_items'] as $id=>$value){
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
            echo "<th>Price (USD)</th>";
            echo "<th>Action</th>";
        echo "</tr>";

        $oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
        $sql = "SELECT prodID, name, price FROM items WHERE prodID IN ({$ids}) ORDER BY name";
        $result = $oMySQL->executeSQL($sql);
 
        $total_price=0;
        //print_r($result);
        //echo "\n" . $countID . "\n" . count($result);
        if($countID > 1){
            $i = 0;
            while($i < count($result)){
                echo "<tr>\n".
                     "    <td>". $result[$i]['name'] ."</td>\n".
                     "    <td>&#36;". $result[$i]['price'] ."</td>\n".
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
                 "    <td>&#36;". $result['price'] ."</td>\n".
                 "    <td>\n".
                 "        <a href='remove_from_cart.php?id=". $result['prodID'] ."&name=". $result['name'] ."' class='btn btn-danger'>\n".
                 "            <span class='glyphicon glyphicon-remove'></span> Remove from cart\n".
                 "        </a>\n".
                 "    </td>\n".
                 "</tr>";
            $total_price+=$result['price'];
            $i++;
        }
 
        echo "<tr>";
                echo "<td><b>Total</b></td>";
                echo "<td>&#36;{$total_price}</td>";
                echo "<td>";
                    echo "<a href='#' class='btn btn-success'>";
                        echo "<span class='glyphicon glyphicon-shopping-cart'></span> Checkout";
                    echo "</a>";
                echo "</td>";
            echo "</tr>";
 
    echo "</table>";
}
 
else{
    echo "<div class='alert alert-danger'>";
        echo "<strong>No products found</strong> in your cart!";
    echo "</div>";
}
 
include("includes/footer.php");
?>
