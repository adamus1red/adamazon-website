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
            echo "<article class=\"prod-display\">\n".
                 "<table style=\"width:100%\">\n".
                 "    <tbody>\n".
                 "        <tr>\n".
                 "            <td rowspan=\"2\">\n".
                 "                <a href=\"". $config['base_url'] ."/product?pID=". $result[$i]['prodID'] ."\">\n".
                 "                    <img src=\"". $config['base_url'] . "". $result[$i]['productImage'] ."\" class=\"prod-image\"alt=\"" . $result[$i]['name'] . "\">\n".
                 "                </a>\n".
                 "            </td>\n".
                 "            <td class=\"prod-header\"><h2 class=\"fancy-header\">". $result[$i]['name'] ."</h2></td>\n".
                 "        </tr>\n".
                 "        <tr>\n".
                 "            <td class=\"prod-content\"><p>" . $result[$i]['description'] . "</p></td>\n".
                 "        </tr>\n".
                 "    </tbody>\n".
                 "</table>\n".
                 "</article>";
        }
    } 
    include("includes/footer.php"); // footer (duh), also closes the table that formats everything iirc
?>

