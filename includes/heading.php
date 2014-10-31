		<div class="heading">
            <div class="heading-content">
                <h1 class="pull-left" id="logo"><a href=<?php echo "". $base_url . "/";?>>Adamazon</a></h1>
                <div class="search">
                    <form method="POST" action="search.php" style="width:40%;">
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
                                if(basename(__FILE__) != 'index.php'){
                                    echo "<li><a href=\"". $base_url . "/\">Home</a></li>";
                                }
                                $oMySQL = new MySQL($mysql_database, $mysql_user, $mysql_pass, $mysql_host);
                                $sql = "SELECT * FROM `category` WHERE `category`.`active` IS TRUE";
                                $result = $oMySQL->executeSQL($sql);
                                // Loop over results
                                for($i = 0; $i < (count($result)/$catCol); $i++){
                                    echo "<li><a href=\"" .$base_url ."/category.php?cat=" . $result['catID'] . "\">". $result['catName'] ."</a></li>";
                                }
                            ?>
                            </ul>
                        </td>
                        <td class="content">