<?php
include_once("mysql.php");
include_once("config.php");
include_once("commonFunctions.php");
?>
		<div class="heading">
            <div class="heading-content header-grad parent">
                <div class="grid3">
                                <a href=<?php echo "". $config['base_url'] . "/index";?>><h1 id="logo">Adamazon</h1></a>
				</div>
				<div class="grid3">
					<form method="POST" action="search.php">
                        <input type="text" class="search-box" name="searchTerm" placeholder="Search">
                        <button class="button" id="search" type="submit">Search</button>
                    </form>
				</div>
				<div class="grid3" style="float:right;">
			    <?php if ($uID == '') { ?>
					<form role="form" method="POST" action="login">
    					<input name="username" class="login-box" placeholder="Email address" type="text" id="username">
    			        <input name="password" class="login-box" placeholder="Password" type="password" id="password">
						<input class="button" id="login" type="submit" name="Submit" value="Login">
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
							 "		<a href=\"". $config['base_url'] . "/login?logout=1\">Logout <img src=\"./images/icons/glyphicons_387_log_out.png\"></a>".
							 "		<a href=\"#\">Orders</a>".
							 "	</div>".
							 "</li>".
						 "</ul>".
						 "<div style=\"clear:both\"></div>";
					} else {
						header('Location: login?re=0');
					}
				}
				?>
                </div>
            </div>
        </div>
        <div class="content center-block">
			<div class="wrap">
				<div class="grid4">
					<ul class="sidebar-content inline">
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
				</div>
				<div class="gridmain">
