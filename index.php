<?php
    include_once("includes/config.php");
    include_once("includes/mysql.php");
   $site_page_title = "Home";
   include("includes/header.php");
    include("includes/heading.php");
   $oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
   $sql = "SELECT * FROM `items` WHERE `active` IS TRUE LIMIT 10";
   $result = $oMySQL->executeSQL($sql);
   if($result!=1){
        for($i = 0; $i < count($result); $i++){
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
    include("includes/footer.php");
?>

