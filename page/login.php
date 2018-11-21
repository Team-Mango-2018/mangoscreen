<?php include('server.php') ?>
<!--
Author: Colorlib
Author URL: https://colorlib.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>

<head>
    <title>Mango Screen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }

    </script>

    <!-- Scripts for re-captcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Custom Theme files -->
    <link href="../css/loginSignup.css" rel="stylesheet" type="text/css" media="all" />
    <!-- //Custom Theme files -->
    <!-- web font -->
    <link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
    <!-- //web font -->
</head>

<body>

    <!-- main -->
    <div class="main-w3layouts wrapper">
        <h1>Mango Screen</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form action="login.php" method="post"> <!-- added-->
				<?php include('errors.php'); ?> <!-- added-->
                    <input class="text email text-center" type="text" name="username" placeholder="Username" required=""> <!-- updated -->
                    <input class="text" type="password" name="password" placeholder="Password" required="">
                    <div class="wthree-text">
                        <label class="anim">
                        </label>
                        <div class="clear"> </div>
                    </div>
                    <!-- Re-captch-->
                    <div class="g-recaptcha" data-sitekey="6LcsB3wUAAAAABKvJ0Dyu4D4eS-u_bvaPOGnDTYy"></div>
                    <!-- Log-In button -->
                    <input type="submit" value="Log In" name="login_user">  <!-- updated -->
                </form>
                <p>Don't have an Account? <a href="signup.php"> Sign Up!</a></p>
            </div>
        </div>
        <!-- copyright -->
        <div class="colorlibcopy-agile">
            <p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
        </div>
        <!-- //copyright -->
        <ul class="colorlib-bubbles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <!-- //main -->
</body>

</html>
