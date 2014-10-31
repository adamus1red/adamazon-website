<?php
	include_once("includes/config.php");
	include_once("includes/mysql.php");
   $site_page_title = "Search";
   include("includes/header.php");
	include("includes/heading.php");
    
    if(!empty($_POST['searchTerm'])) {
        $search = mysql_real_escape_string($_POST['searchTerm']);
        $oMySQL = new MySQL($mysql_database, $mysql_user, $mysql_pass, $mysql_host);
        
        // Build an SQL query to search the blog_entries table
        $sql = "SELECT * FROM `items` WHERE (`description` LIKE '%{$search}%' OR `name` LIKE '%{$search}%') AND `active` IS TRUE";
        // Execute the query
        $result = $oMySQL->executeSQL($sql);
        // Loop over results
        ?>
        <table>
            <thead>
                <tr>
                    <td>Item Number</td>
                    <td>Name</td>
                    <td>Desctiption</td>
                    <td>Price</td>
                    <td>Add to cart</td>
                </tr>
            </thead>
            <tbody>
                
<?php
        for($i = 0; $i < (count($result)/5); $i++){
            echo "<tr>\n".
                 "    <td>".$result['prodID']."</td>\n".
                 "    <td>".$result['name']."</td>\n".
                 "    <td>".$result['description']."</td>\n".
                 "    <td>".$result['price']."</td>\n".
                 "    <td>Add to basket!</td>\n".
                 "</tr>";
        }
        ?>
            </tbody>
        </table>
<?php
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

