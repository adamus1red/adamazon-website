<?php
    include_once("includes/config.php");
    include_once("includes/mysql.php");
    $site_page_title = "product";
    include("includes/header.php");
    include("includes/heading.php");
    
    $request = mysql_real_escape_string($_GET['pID']);
    
    $oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
    $sql = "SELECT * FROM `rjb12180`.`items` WHERE `prodID` = " . $request . " LIMIT 0 , 30 ";
    $result = $oMySQL->executeSQL($sql);
    if($result!=1||!empty($result)) {
			echo "<article class=\"prod-display\">\n".
                 "<table style=\"width:100%\">\n".
                 "    <tbody>\n".
                 "        <tr>\n".
                 "            <td rowspan=\"2\">\n".
                 "                <a href=\"". $config['base_url'] ."/product?pID=". $result['prodID'] ."\">\n".
                 "                    <img src=\"". $config['base_url'] . "". $result['productImage'] ."\" class=\"prod-image\"alt=\"" . $result['name'] . "\">\n".
                 "                </a>\n".
                 "            </td>\n".
                 "            <td class=\"prod-header\"><h2 class=\"fancy-header\">". $result['name'] ."</h2></td>\n".
                 "        </tr>\n".
                 "        <tr>\n".
                 "            <td class=\"prod-content\"><p>" . $result['description'] . "</p></td>\n".
                 "        </tr>\n".
                 "       <tr><td class=\"pull-right\"><form action=\"addtocart.php\">\n".
                 "       <input name=\"qty\" type=\"hidden\" value=\"1\" />\n".
                 "       <input type=\"radio\" name=\"pid\" value=\"{$result['prodID']}\">S\n".
                 "       <input type=\"radio\" name=\"pid\" value=\"1{$result['prodID']}\">M\n".
                 "       <input type=\"radio\" name=\"pid\" value=\"2{$result['prodID']}\">L\n".
                 "       <input type=\"submit\" name=\"submit\" value=\"Add to Cart\" class=\"button button-main\"></section></form>\n</td></tr>".
                 "    </tbody>\n".
                 "</table>\n".
                 "</article>";
	} else {
		echo "<h3>No product found</h3>";	
	}
	
	include("includes/footer.php");
?>
