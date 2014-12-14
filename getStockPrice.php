<?php
    include_once("includes/config.php");
    include_once("includes/mysql.php");
    $max = 30;
    $sql="SELECT `valSmall`,`valBig` FROM `stock` WHERE `ID` = 'admzn'";
    $oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
    $sqlPrice = $oMySQL->executeSQL($sql);
    $price = $sqlPrice['valSmall'];
    $pchange = Rand(0, $max);
    $result = Rand (1,2);
    if ($result == 1){
        $newprice = $price + $pchange;
    } else {
        $newprice = $price - $pchange;
    }
    $sql = "UPDATE `stock` SET `valSmall` = '{$price}' WHERE  `stock`.`ID` =  'admzn'";
    $oMySQL->executeSQL($sql);
    echo $sqlPrice['valBig'] . "." . $newprice;
?>
