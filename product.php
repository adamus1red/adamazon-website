<?php
    include_once("includes/config.php");
    include_once("includes/mysql.php");
    $site_page_title = "product";
    include("includes/header.php");
    include("includes/heading.php");
    
    $request = mysql_real_escape_string($_GET['pID']);
    
    $oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
    $sql = "SELECT * FROM `items` WHERE `prodID` = " . $request . " LIMIT 0, 30 ";
    $result = $oMySQL->executeSQL($sql);
    if($result!=1||!empty($result)) {
		for($i = 0; $i < (count($result)/$config['prodCol']); $i++){
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
                 "        <tr><form name=\"order\" action=\"order\" method=\"POST\">\n".
                 "            <td class=\"prod-content\"><p>&pound;" . $result['price'] . "</p></td>\n".
                 "            <td class=\"prod-content\"><select>\n".
                 "              <option value=\"1\">Small</option>\n".
                 "              <option value=\"2\">Medium</option>\n".
                 "              <option value=\"3\">large</option>\n".
                 "              <option value=\"4\">American</option>\n".
                 "              </select>\n</td>\n".
                 "              <td><input class=\"button\" id=\"basket\" type=\"submit\" name=\"Submit\" value=\"basket\"></td>".
                 "</form>        </tr>\n".
                 "    </tbody>\n".
                 "</table>\n".
                 "</article>";
   	}
	} else {
		echo "<h3>No product found</h3>";	
	}
	
	include("includes/footer.php");
?>
