<?php
    include_once("includes/config.php");
    include_once("includes/mysql.php");
    $site_page_title = "product";
    include("includes/header.php");
    include("includes/heading.php");
    
    $request = mysql_real_escape_string($_GET['pID']);
    
    $oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
    $sql = "SELECT * FROM `rjb12180`.`items` WHERE `prodID` = " . $request . " LIMIT 0, 30 ";
    $result = $oMySQL->executeSQL($sql);
    if($result!=1||!empty($result)) {
		for($i = 0; $i < (count($result)/$prodCol); $i++){
			echo "<article class=\"prod-display\">\n".
                 "<table style=\"width:100%\">\n".
                 "    <tbody>\n".
                 "        <tr>\n".
                 "            <td class=\"prod-image\"rowspan=\"2\">\n".
                 "                <a href=\"". $base_url ."/product.php?pID=". $result['prodID'] ."\">\n".
                 "                    <img src=\"". $base_url . "". $result['productImage'] ."\" class=\"product-image\"alt=\"" . $result['name'] . "\">\n".
                 "                </a>\n".
                 "            </td>\n".
                 "            <td class=\"prod-header\"><h2>". $result['name'] ."</h2></td>\n".
                 "        </tr>\n".
                 "        <tr>\n".
                 "            <td class=\"prod-content\"><p>" . $result['description'] . "</p></td>\n".
                 "        </tr>\n".
                 "    </tbody>\n".
                 "</table>\n".
                 "</article>";
   	}
	} else {
		echo "<h3>No product found</h3>";	
	}
	
	include("includes/footer.php");
?>