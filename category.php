<?php
    include_once("includes/config.php");
    include_once("includes/mysql.php");
   $site_page_title = "Search";
   include("includes/header.php");
    include("includes/heading.php");
     $request = mysql_real_escape_string($_GET['cat']);
    if(!empty($request)) {
        $oMySQL = new MySQL($mysql_database, $mysql_user, $mysql_pass, $mysql_host);
        
        // Build an SQL query to search the blog_entries table
             $sql = "SELECT DISTINCT i.prodID, i.name, i.description, i.price FROM `items` i INNER JOIN `is_cat` c ON (i.prodID = c.prodID) WHERE (c.catID=\"".$request."\")";
        // Execute the query
        $result = $oMySQL->executeSQL($sql);
        // Loop over results
        if($result!=1){
        ?>
        <table>
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
                
<?php
        if(!empty($result[1])){
          $j = 0;
        for($i = 0; $i < count($result); $i++){
            echo "<tr>\n".
                 "    <td>".$result[$i]['prodID']."</td>\n".
                 "    <td>".$result[$i]['name']."</td>\n".
                 "    <td>".$result[$i]['description']."</td>\n".
                 "    <td>".$result[$i]['price']."</td>\n".
                 "    <td id=\"basket\">Add to basket!</td>\n". //TODO Impliment adding stuff to basket
                 "</tr>";
                 $j++;
        }
     } else {
          for($i = 0; $i < (count($result)/$prodCol); $i++){
            echo "<tr>\n".
                 "    <td>".$result['prodID']."</td>\n".
                 "    <td>".$result['name']."</td>\n".
                 "    <td>".$result['description']."</td>\n".
                 "    <td>".$result['price']."</td>\n".
                 "    <td id=\"basket\">Add to basket!</td>\n". //TODO Impliment adding stuff to basket
                 "</tr>";
        }
     }
           ?>
        </tbody>
        </table>
<?php   } else { ?>
            <h3>No results returned</h3>
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
