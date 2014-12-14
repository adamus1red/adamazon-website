<?php
include_once("mysql.php");
include_once("config.php");
include_once("commonFunctions.php");
?>
    <header id="heading">
        <nav id ="header-nav">
            <ul>
                <li><a href="<?php echo "". $config['base_url'] . "/index";?>"><h1 id="logo">Adamazon</h1></a></li>
                <li class="search"><form method="POST" action="search" style="margin-right: auto; margin-left: auto; display: inline-block;">
                    <input type="text" class="search-box" name="searchTerm" placeholder="Search" style="width=400px;">
                    <button class="button" id="search" type="submit">Search</button>
                </form></li>
                <li class="pull-right">
                    <?php if ($uID == '') { ?>
                    <form role="form" method="POST" action="login" style="margin-right: auto; margin-left: auto; display: inline-block;">
                        <input name="username" class="login-box" placeholder="Email address" type="text" id="username">
                        <input name="password" class="login-box" placeholder="Password" type="password" id="password">
                        <input class="button" id="login" type="submit" name="Submit" value="Login">
                    </form><br />
                    <a class="button button-main" syle="color: black;" href="<?php echo "". $config['base_url'] . "/login?reg=1";?>">Register Here</a>
                    <?php 
                        } else {
                            $sql = "SELECT * FROM `users` WHERE `sessionID` = '" . $uID . "' AND `active` IS TRUE";
                            $oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
                            $result = $oMySQL->executeSQL($sql);
                            if($result['sessionID'] == $uID){
                                echo "<ul id=\"dropdown\">".
                                     "<li  style=\"margin-right: 25px;\"><h1><a href=\"#\" onmouseover=\"mopen('uDrop')\" onmouseout=\"mclosetime()\">" . $result['username'] ."</a></h1>".
                                     "  <div id=\"uDrop\" onmouseover=\"mcancelclosetime()\" onmouseout=\"mclosetime()\">".
                                     "      <a href=\"". $config['base_url'] . "/user\">Control Panel</a>".
                                     "      <a href=\"". $config['base_url'] . "/login?logout=1\">Logout</a>".
                                      "      <a href=\"". $config['base_url'] . "/cart\">Basket</a>".
                                     "      <a href=\"#\">Orders</a>".
                                     "  </div>".
                                     "</li>".
                                 "</ul>".
                                 "<div style=\"clear:both\"></div>";
                            } else {
                                header('Location: login?logout=0');
                            }
                        }
                    ?>
                </li>
            </ul>
        </nav>

        <nav id="menu-nav">
        <nav class ="menu-nav">
            <ul>
                <?php 
                        echo "<li><a href=\"". $config['base_url'] . "/index\">Home</a></li>";
                        $hoMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
                        $sql = "SELECT * FROM `category` WHERE `category`.`active` IS TRUE";
                        $result = $hoMySQL->executeSQL($sql);
                        // Loop over results
                        for($i = 0; $i < count($result); $i++){
                            echo "<li><a href=\"" .$config['base_url'] ."/category?cat=" . $result[$i]['catID'] . "\">". $result[$i]['catName'] ."</a></li>";
                        }
                        echo "<li><a href=\"". $config['base_url'] . "/about\">About Us</a></li>";
                ?>
            </ul>
        </nav>
        
    </header>
