<?php
    include_once("includes/config.php");
    include_once("includes/mysql.php");
    function generateRandomString($length = 32) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }


    if(isset($_GET['logout'])){
        setcookie($config['login_cookie'], null, -1);
        header('Location: index.php?re=0');
    } else if(isset($_GET['reg'])){
        if((!empty($_POST['password'])) || (!empty($_POST['username'])) || (!empty($_POST['password2']))) {
            echo "<p>1</p>";
            if($_POST['password'] == $_POST['password2']){
                $rawNewUser = $_POST['username'];
                $rawNewPass = $_POST['password'];
                $password = sha1("". $config['pass_salt'] . $rawNewPass, $raw_output = null);
                echo "<p>" . $password . "</p>";
                echo "<p>2</p>";
                $lMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
                $randsess = generateRandomString();
                setcookie($config['login_cookie'], $randsess, time()+3600);
                if($lMySQL->executeSQL("SELECT * FROM `users` WHERE `username` = '" . mysql_real_escape_string($rawNewUser) . "'") == 1){
                $sql = "INSERT INTO  `users` (`userID` ,`username` ,`password` ,`sessionID` ,`active`) VALUES (NULL ,'" . $rawNewUser . "',  '" . $password . "', '".$randsess."' ,  '1');";
                echo "<p>3</p>";
                $lMySQL->executeSQL($sql);
                if (function_exists('mail')){
                // Email user account confirmation
                $to      = mysql_real_escape_string($rawNewUser);
                $subject = "Adamazon Login";
                $message = "Hello\n".
                           "You are now registered for Adamazon!\n".
                           "Your username is: " . mysql_real_escape_string($rawNewUser) . "\n".
                           "and your password is: " . mysql_real_escape_string($rawNewPass);
                $headers = "From: webmaster@adamazon.tk" . "\r\n" .
                           "Reply-To: webmaster@adamazon.tk" . "\r\n" .
                           "X-Mailer: PHP/" . phpversion();

                mail($to, $subject, $message, $headers);
                }
                header('Location: index?re=0');
                } else {
                    header('Location: login?re=2&reg=1');
                }
            } else {
                header('Location: login?re=1&reg=1');
            }
        } else {
            $site_page_title = "User Login";
            include("includes/header.php");
            include("includes/heading.php");
            echo "<p>1</p>";
            if(isset($_GET['re'])){
                if($_GET['re'] == 1){
                echo "<h1 class=\"button button-main\">Invalid stuff submitted</h1>";
                } else if ($_GET['re'] == 2){
                    echo "<h1 class=\"button button-main\">Username already exists</h1>";
                }
            }
            echo '<form role="form" method="POST" action="login?reg">'.
                 '<input name="username" type="text" placeholder="Email address" id="username">'.
                 '<input name="password" type="password" placeholder="Password" id="password">'.
                 '<input name="password2" type="password" placeholder="Confirm Password" id="password">'.
                 '<input class="button" id="login" type="submit" name="Submit" value="Login">'.
                 '</form>';
            
            echo "    <script type='text/javascript'>
        $(document).ready(function () {
            $('#username').keyup(function () {
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if (re.test($(this).val())) {

                    $(this).css(\"background-color\", \"green\");

                } else {

                    $(this).css(\"background-color\", \"red\");
                }
            });
        });
    </script>";
            include("includes/footer.php");
        }
    } else {
        if((empty($_POST['password'])) || (empty($_POST['username']))) {
            $site_page_title = "User Login";
            include("includes/header.php");
            include("includes/heading.php");
            //Login form
            if(isset($_GET['re'])){
                echo "<h1 class=\"button button-main\">Bad login</h1>";
                echo "<h3><a href=\"" . $config['base_url'] . "/login?reg=1\">Register Here</a></h3>";
            }
            echo '<form role="form" method="POST" action="login">'.
                 '<input name="username" type="text" placeholder="Email address" id="username">'.
                 '<input name="password" type="password" placeholder="Email address" id="password">'.
                 '<input class="button" id="login" type="submit" name="Submit" value="Login">'.
                 '</form>';
            echo "    <script type='text/javascript'>
        $(document).ready(function () {
            $('#username').keyup(function () {
                var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if (re.test($(this).val())) {

                    $(this).css(\"background-color\", \"green\");

                } else {

                    $(this).css(\"background-color\", \"red\");
                }
            });
        });
    </script>";
            include("includes/footer.php");
        } else if((isset($_POST['password'])) || (isset($_POST['username']))){
            $rawpassword = $_POST['password'];
            $rawusername = $_POST['username'];
            $username = mysql_escape_string($rawusername);
            $password = sha1("". $config['pass_salt'] . $rawpassword, $raw_output = null);
            $sql = "SELECT * FROM users WHERE username='" . $username . "' and password='" . $password . "'";
            $lMySQL = new MySQL($config['mysql_database'], $config['mysql_user'], $config['mysql_pass'], $config['mysql_host']);
            $result = $lMySQL->executeSQL($sql);
            if(trim($result['password']," \t\n\r\0\x0B") == trim($password," \t\n\r\0\x0B")){
                 // User password matches Get them a random session number!
                $randsess = generateRandomString();
                setcookie($config['login_cookie'], $randsess, time()+3600);
                $lMySQL->executeSQL("UPDATE  `users` SET  `sessionID` =  \"" . $randsess . "\" WHERE `userID` = " . $result['userID']);
                header('Location: index?re=0');
            } else {
                header('Location: login?re=1');
            }
        } else {
            header('Location: index');
        }
    }

?>
