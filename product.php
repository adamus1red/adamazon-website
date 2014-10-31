<?php
    include_once("includes/config.php");
    include_once("includes/mysql.php");
    $site_page_title = "product";
    include("includes/header.php");
    include("includes/heading.php");
    
    $request = mysql_real_escape_string($_GET['pID']);
    
    $oMySQL = new MySQL($mysql_database, $mysql_user, $mysql_pass, $mysql_host);
    $sql = "SELECT * FROM `rjb12180`.`items` WHERE `prodID` = " . $request . " LIMIT 0, 30 ";
    $result = $oMySQL->executeSQL($sql);
    if($result!=1||!empty($result)) {
		for($i = 0; $i < (count($result)/$prodCol); $i++){
			echo "<article>\n".
           	  "    <img src=\"". $base_url . "". $result['productImage'] ."\" class=\"product-image\"alt=\"" . $result['name'] . "\">\n".
              "    <h2 class=\"prod-header\">". $result['name'] ."</h2>\n".
              "    <p>" . $result['description'] . "</p>".
              "<a id=\"basket\" class=\"button\" href=\"".$base_url."/basket.php?add=".$request."\">Add to basket</a>".
              "</article>";
   	}
	} else {
		echo "<h3>No product found</h3>";	
	}
	
	include("includes/footer.php");
?>