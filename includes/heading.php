<?php
include_once("mysql.php");
include_once("config.php");
include_once("commonFunctions.php");
?>
		<div class="heading">
            <div class="heading-content header-grad parent">
                <div class="headleft">
                                <a href=<?php echo "". $config['base_url'] . "/index";?>><h1 id="logo">Adamazon</h1></a>
				</div>
				<div class="headcenter">
					<form method="POST" action="search.php">
                        <input type="text" class="search-box" name="searchTerm" placeholder="Search">
                        <button class="button" id="search" type="submit">Search</button>
                    </form>
				</div>
				<div class="headright">
			    <?php if ($uID == '') { ?>
					<form role="form" method="POST" action="login">
						<input type="text" placeholder="Email" class="login-box">
						<input type="password" placeholder="Password" class="login-box">
						<button type="submit" id="login" class="button">Sign in</button>
					</form>
                <?php 
				} else {
					$sql = "SELECT * FROM `users` WHERE `sessionID` = '" . $uID . "' AND `active` IS TRUE";
					$oMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
					$result = $oMySQL->executeSQL($sql);
					if($result['sessionID'] == $uID){
						echo "<ul id=\"dropdown\">".
							 "<li><h1><a href=\"#\" onmouseover=\"mopen('uDrop')\" onmouseout=\"mclosetime()\">" . $result['username'] ."</a></h1>".
							 "	<div id=\"uDrop\" onmouseover=\"mcancelclosetime()\" onmouseout=\"mclosetime()\">".
							 "		<a href=\"". $config['base_url'] . "/user\">Control Panel</a>".
							 "		<a href=\"". $config['base_url'] . "/login?logout=1\">Logout</a>".
							 "		<a href=\"#\">Orders</a>".
							 "	</div>".
							 "</li>".
						 "</ul>".
						 "<div style=\"clear:both\"></div>";
					} else {
						die("Error 2858");
					}
				}
				?>
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
                                echo "<li><a href=\"". $config['base_url'] . "/index\">Home</a></li>";
                                $hoMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
                                $sql = "SELECT * FROM `category` WHERE `category`.`active` IS TRUE";
                                $result = $hoMySQL->executeSQL($sql);
                                // Loop over results
                                for($i = 0; $i < count($result); $i++){
                                    echo "<li><a href=\"" .$config['base_url'] ."/category?cat=" . $result[$i]['catID'] . "\">". $result[$i]['catName'] ."</a></li>";
                                }
                            ?>
                            </ul>
                        </td>
                        <td class="content">