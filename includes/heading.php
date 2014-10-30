		<div class="heading">
            <div class="heading-content">
                <h1 class="pull-left" id="logo">Adamazon</h1>
                <div class="search">
                    <form method="POST" action="search.php">
                        <input type="text" class="search-box" name="searchTerm" placeholder="Search">
                        <button class="button" id="search" type="submit">Search</button>
                    </form>
                </div>
                <div class="pull-right login">
                    <form role="form" method="POST" action="login.php">
                        <input type="text" placeholder="Email" class="login-box">
                        <input type="password" placeholder="Password" class="login-box">
                        <button type="submit" id="login" class="button">Sign in</button>
                    </form>
                </div>
            </div>
		</div>
		<div class="content center-block">
            <table>
                <tbody>
                    <tr>
                        <td class="sidebar">
                            <ul class="sidebar-content">
                            <?php 
                                $oMySQL = new MySQL($mysql_database, $mysql_user, $mysql_pass, $mysql_host);
                                $sql = "SELECT * FROM `category` WHERE `category`.`active` IS TRUE";
                                $result = $oMySQL->executeSQL($sql);
                                // Loop over results
                                for($i =0; $i < count($result); $i++){
                                    echo "<li><a href=\"" .$base_url ."/category.php?cat=" . $result['catID'] . "\">". $result['catName'] ."</a></li>";
                                }
                            ?>
                            </ul>
                        </td>
                        <td class="content">