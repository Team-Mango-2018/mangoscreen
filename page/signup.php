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
    <title>Mango Screen </title>
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
    <!-- Script for recaptcha-->
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
                <form action="signup.php" method="post"> <!-- updated-->
                    <input class="text" type="text" name="username" placeholder="Username" required=""></br>
                    <input class="text" type="text" name="fname" placeholder="First Name" required="">
                    <input class="text" type="text" name="lname" placeholder="Last Name" required="">
                    <input class="text email" type="email" name="email" placeholder="Email" required="">
                    <input class="text" type="text" name="university" placeholder="University" required="">
                    <input class="text" type="text" name="course" placeholder="Course" required=""></br>
                    <input class="text" type="password" name="password_1" placeholder="Password" required="">
                    <input class="text w3lpass" type="password" name="password_2" placeholder="Confirm Password" required="">
                    <div class="wthree-text">
                        <label class="anim">
                            <input type="checkbox" class="checkbox" required="">
                            <span>I Agree To The Terms & Conditions</span>
                        </label>
                        <div class="clear"> </div>
                    </div>
                    <!-- Re-captcha -->
                    <div class="g-recaptcha" data-sitekey="6LcsB3wUAAAAABKvJ0Dyu4D4eS-u_bvaPOGnDTYy"></div>
                    <!-- Submission button -->
                    <input type="submit" name="reg_user" value="Register">
                </form>
                <p>Already have an account? <a href="login.php"> Login Now!</a></p>
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
