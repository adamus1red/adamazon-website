<?php
    include_once("includes/config.php"); // Global config variables
    include_once("includes/mysql.php"); // How to do mysql
   $site_page_title = "Home";
   include("includes/header.php"); // Gives your <head>
    include("includes/heading.php"); // Header with logo, search, userlogin and sidebar (should be moved)
   $oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']); // Creates SQL connection
   $sql = "SELECT * FROM `items` WHERE `active` IS TRUE ORDER BY `items`.`prodID` DESC LIMIT 10"; // Selectes the 10 newest items
   $result = $oMySQL->executeSQL($sql); // executes the sql statement
   if($result!=1){ // check we got a result
        for($i = 0; $i < count($result); $i++){ // iterate through the results and output the data
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
                 "    <section class=\"product-data\"><h2 class=\"fancy-text\">". $result[$i]['name'] ."</h2></section>\n".
                 "    <section class=\"product-data\">" . $result[$i]['description'] . "</section>\n".
                 "    <section class=\"product-data\">\n".
                 "       <form action=\"addtocart.php\">\n".
                 "       <input name=\"pid\" type=\"hidden\" value=\"".$result[$i]['prodID']."\" />\n".
                 "       <input name=\"qty\" type=\"hidden\" value=\"1\" />\n".
                 "       <input type=\"radio\" name=\"size\" value=\"small\">S\n".
                 "       <input type=\"radio\" name=\"size\" value=\"medium\">M\n".
                 "       <input type=\"radio\" name=\"size\" value=\"large\">L\n".
                 "       <input type=\"submit\" name=\"submit\" value=\"Add to Cart\" class=\"button button-main\"></section></form>\n".
                 "</div>\n".
                 "</article>";
        }
    } 

?>

</div>

<?php

    include("includes/footer.php");
?>

