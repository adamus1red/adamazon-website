<?php
    include_once("includes/config.php");
    include_once("includes/mysql.php");
   $site_page_title = "Search";
   include("includes/header.php");
    include("includes/heading.php");
     $request = mysql_real_escape_string($_GET['cat']);
    if(!empty($request)) {
        $oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
        
        // Build an SQL query to search the blog_entries table
             $sql = "SELECT DISTINCT i.prodID, i.name, i.description, i.price FROM `items` i INNER JOIN `is_cat` c ON (i.prodID = c.prodID) WHERE (c.catID=\"".$request."\") AND i.active IS TRUE";
        // Execute the query
        $result = $oMySQL->executeSQL($sql);
        // Loop over results
        if($result!=1){
        ?>
        <div style="margin-top: 40px; margin-left: 40px; margin-right: 40px;">
        <table style="width: 100%;">
            <thead>
                <tr>
                    <td>Item Number</td>
                    <td>Name</td>
                    <td>Desctiption</td>
                    <td>Price</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
        </div>
                
<?php
        if(!empty($result[1])){
          $j = 0;
        for($i = 0; $i < count($result); $i++){
            echo "<tr>\n".
                 "    <td>".$result[$i]['prodID']."</td>\n".
                 "    <td>".$result[$i]['name']."</td>\n".
                 "    <td>".$result[$i]['description']."</td>\n".
                 "    <td>".$result[$i]['price']."</td>\n".
                 "    <td><form action=\"addtocart.php\">\n".
                 "       <input name=\"qty\" type=\"hidden\" value=\"1\" />\n".
                 "       <input type=\"radio\" name=\"pid\" value=\"{$result[$i]['prodID']}\">S\n".
                 "       <input type=\"radio\" name=\"pid\" value=\"1{$result[$i]['prodID']}\">M\n".
                 "       <input type=\"radio\" name=\"pid\" value=\"2{$result[$i]['prodID']}\">L\n".
                 "       <input type=\"submit\" name=\"submit\" value=\"Add to Cart\" class=\"button button-main\"></section></form>\n</td>\n".
                 "</tr>";
                 $j++;
        }
     } else {
          for($i = 0; $i < (count($result)/$config['prodCol']); $i++){
            echo "<tr>\n".
                 "    <td>".$result['prodID']."</td>\n".
                 "    <td>".$result['name']."</td>\n".
                 "    <td>".$result['description']."</td>\n".
                 "    <td>".$result['price']."</td>\n".
                 "    <td><form action=\"addtocart.php\">\n".
                 "       <input name=\"qty\" type=\"hidden\" value=\"1\" />\n".
                 "       <input type=\"radio\" name=\"pid\" value=\"{$result['prodID']}\">S\n".
                 "       <input type=\"radio\" name=\"pid\" value=\"1{$result['prodID']}\">M\n".
                 "       <input type=\"radio\" name=\"pid\" value=\"2{$result['prodID']}\">L\n".
                 "       <input type=\"submit\" name=\"submit\" value=\"Add to Cart\" class=\"button button-main\"></section></form>\n</td>\n".
                 "</tr>";
        }
     }
           ?>
        </tbody>
        </table>
<?php   } else { ?>
        <div style="margin-top: 40px; margin-left: 40px; margin-right: 40px;">
            <h3>No results returned</h3>
        </div>
<?php   }
    } else {
        echo "    <form method=\"POST\" action=\"search.php\">\n".
             "        <table>\n".
             "            <tr>\n".
             "                <td><input type=\"text\" name=\"searchTerm\" size=\"20\"></td>\n".
             "                <td><input type=\"submit\" value=\"Search\"></td>\n".
             "            </tr>\n".
             "        </table>\n".
             "    </form>\n";
    }
    include("includes/footer.php");
?>

