<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/css/Css_Reset.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="/assets/css/login.css?v=<?php echo time(); ?>">
    <?php require_once('../config/cookies.php'); ?>
    <?php session_start(); ?>
    <?php require_once('../config/mitigations.php'); ?>
</head>
<body>
    <?php require("../includes/nav.php"); ?>

    <div id="login_ban"> </div>
            <div id="logreg">
                <diV id="login_form">
                    <h3>LOGIN</h3>
                    <form action="checklogin.php" method="POST">
                        <input type="email" name="uemail" placeholder="Email"><br>
                        <input type="password" name="pword" placeholder="Password"><br>
                        <a href="#">Forgot Password?</a><br>
                        <input type="submit" name="login" value="Login" id="loginBTN">
                        <div class="stt">
                        <?php
                            $val = isset($_GET['stt'])?$_GET['stt']:"";

                            if($val==1) 
                                echo "<b>Invalid username or password</b>";
                            elseif ($val==2)
                                echo "<b>Logged out</b>";
                            elseif ($val ==4)
                                echo "<b>Successfully Registered</b>";
                            elseif ($val == 5)
                            echo "<b>Login to Proceed</b>";
                        ?>
                        </div>
                </form>
            </diV>
            <div id="register">
                    <h2>New to our wesbite?</h2>
                    <a href="register.php"><p>Register here!</p></a>
                </form>
            </div>
        </div>

        <?php require("../includes/footer.php"); ?>
</body>
</html>