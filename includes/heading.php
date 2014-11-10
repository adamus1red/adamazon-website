		<div class="heading">
            <div class="heading-content header-grad">
                <table style="width=100%;">
                    </tbody>
                        <tr >
                            <td style="width=103px;">
                                <a href=<?php echo "". $config['base_url'] . "/";?>><h1 class="pull-left" id="logo">Adamazon</h1></a>
                            </td>
                            <td class="search">
                                <form method="POST" action="search.php" style="margin-right: auto; margin-left: auto; display: inline-block;">
                                    <input type="text" class="search-box" name="searchTerm" placeholder="Search">
                                    <button class="button" id="search" type="submit">Search</button>
                                </form>
                            </td>
                            <td class="pull-right login">
								        <form role="form" method="POST" action="login.php">
                                    <input type="text" placeholder="Email" class="login-box">
                                    <input type="password" placeholder="Password" class="login-box">
                                    <button type="submit" id="login" class="button">Sign in</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
                                    echo "<li><a href=\"". $config['base_url'] . "/\">Home</a></li>";
                                }
                                $hoMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
                                $sql = "SELECT * FROM `category` WHERE `category`.`active` IS TRUE";
                                $result = $hoMySQL->executeSQL($sql);
                                // Loop over results
                                for($i = 0; $i < (count($result)/$config['catCol']); $i++){
                                    echo "<li><a href=\"" .$config['base_url'] ."/category.php?cat=" . $result['catID'] . "\">". $result['catName'] ."</a></li>";
                                }
                            ?>
                            </ul>
                        </td>
                        <td class="content">