<?php
    include_once("includes/config.php");
    include_once("includes/mysql.php");
   $site_page_title = "Home";
   include("includes/header.php");
    include("includes/heading.php");
?>

<div style="margin: 40px;">

<?php
   $oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
   $sql = "SELECT * FROM `items` WHERE `active` IS TRUE ORDER BY `items`.`prodID` DESC LIMIT 10";
   $result = $oMySQL->executeSQL($sql);
   if($result!=1){
        for($i = 0; $i < count($result); $i++){
            echo "<article class=\"prod-display\">\n".
                 "<div class=\"container\">\n".
                 "    <a href=\"". $config['base_url'] ."/product?pID=". $result[$i]['prodID'] ."\">\n".
                 "    <img src=\"". $config['base_url'] . "". $result[$i]['productImage'] ."\" class=\"product-image\"alt=\"" . $result[$i]['name'] . "\">\n".
                 "    </a>\n".
                 "    <section class=\"product-data\"><h2 class=\"fancy-header\">". $result[$i]['name'] ."</h2></section>\n".
                 "    <section class=\"product-data\">" . $result[$i]['description'] . "</section>\n".
                 "    <section class=\"product-data\">\n".
                 "       <form action=\"\">\n".
                 "       <input type=\"radio\" name=\"size\" value=\"small\">S\n".
                 "       <input type=\"radio\" name=\"size\" value=\"medium\">M\n".
                 "       <input type=\"radio\" name=\"size\" value=\"large\">L\n".
                 "   </form></section>\n".
                 "    <section class=\"product-data\"><button class=\"button button-main\">Buy Now</button></section>\n".
                 "</div>\n".
                 "</article>";
        }
    } 

?>

</div>

<?php

    include("includes/footer.php");
?>

