<?php
    include_once("includes/config.php");
    include_once("includes/mysql.php");
   $site_page_title = "Home";
   include("includes/header.php");
    include("includes/heading.php");
   $oMySQL = new MySQL($mysql_database, $mysql_user, $mysql_pass, $mysql_host);
   $sql = "SELECT * FROM `items` WHERE `active` IS TRUE LIMIT 10";
   $result = $oMySQL->executeSQL($sql);
   if($result!=1){
        for($i = 0; $i < count($result); $i++){
            echo "<article>\n".
                 "    <a href=\"". $base_url ."/product.php?pID=". $result[$i]['prodID'] ."\">\n".
                 "        <img src=\"". $base_url . "". $result[$i]['productImage'] ."\" class=\"product-image\"alt=\"" . $result[$i]['name'] . "\">\n".
                 "    </a>\n".
                 "    <h2 class=\"prod-header\">". $result[$i]['name'] ."</h2>\n".
                 "    <p>" . $result[$i]['description'] . "</p>".
                 "</article><hr>";
              
        }
    } 
    include("includes/footer.php");
?>