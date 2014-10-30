<?php
	include_once("includes/config.php");
	include_once("includes/mysql.php");
   $site_page_title = "Search";
   include("includes/header.php");
	include("includes/heading.php");
    
    if(empty($_POST['searchTerm'])) {
    ?>
    <form method="POST" action="search.php">
        <table>
            <tr>
                <td><input type="text" name="searchTerm" size="20"></td>
                <td><input type="submit" value="Search"></td>
            </tr>
        </table>
    </form>
<?php
    } else {
        $search = mysql_real_escape_string($_POST['searchTerm']);
        $oMySQL = new MySQL($mysql_database, $mysql_user, $mysql_password, $mysql_host);
        
        // Build an SQL query to search the blog_entries table
        $sql = "SELECT * FROM blog_entries WHERE adamazon.items
                LIKE '%{$search}%'";
        // Execute the query
        $result = $oMySQL->executeSQL($sql)
        // Loop over results
        while($row = mysql_fetch_array($result)){
            echo "<h2>" . $row['entrytitle'] . "  <small>" . $row['entrydate'] . "</small></h2>\n";
            echo "<p>" . $row['entrytext'] . "</p>\n";
        }
    }
    include("includes/footer.php");
?>