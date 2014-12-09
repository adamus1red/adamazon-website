<?php
    include_once("includes/config.php");
    include_once("includes/mysql.php");
    include_once("includes/commonFunctions.php");
    $site_page_title = "User Control Panel";
    if((isset($_POST['passupdate'])) && (isset($_POST['passupdate2']))){
        if (isset($_COOKIE[$config['login_cookie']])) {
            $uID = $_COOKIE[$config['login_cookie']];
        }
        $passupdate = sha1("". $config['pass_salt'] . $_POST['passupdate'], $raw_output = null);
        $passupdate2 = sha1("". $config['pass_salt'] . $_POST['passupdate2'], $raw_output = null);
        if($passupdate == $passupdate2){
            $sql = "UPDATE `users` SET  `password` =  '" . $passupdate . "' WHERE  `users`.`sessionID` = '" . $uID . "'";
            $lMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
            $result = $lMySQL->executeSQL($sql);
            header('Location: user?re=2');
        } else {
            header('Location: user?re=1');
        }
    } else {
        include("includes/header.php");
        include("includes/heading.php");
        if(isset($_GET['re'])){
            if($_GET['re'] == 1){
                echo "<h1>Passwords did not match</h1>";
            } else if($_GET['re'] == 2){
                echo "<h1>Password updated correctly</h1>";
            }
        }
        echo '<form role="form" method="POST" action="user">'.
             '<input name="passupdate" type="password" placeholder="Password" id="passupdate">'.
             '<input name="passupdate2" type="password" placeholder="Confirm Password" id="passupdate2">'.
             '<input class="button" id="login" type="submit" name="Submit" value="Login">'.
             '</form>';
        include("includes/footer.php");
    }
?>