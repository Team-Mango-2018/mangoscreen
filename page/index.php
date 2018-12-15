<?php
  session_start();

	//If user not logged in
  if (!isset($_SESSION['username'])) {
     	$_SESSION['msg'] = "You must log in first";
  	header("location: login.php");
   }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mango Screen - Your Personal Organiser</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/grayscale.min.css" rel="stylesheet">
    <link href="../css/grayscale.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body id="page-top" onload="startTime()">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Mango Screen</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                        <a class="nav-link js-scroll-trigger" href="#about">About</a>

                        <a class="nav-link js-scroll-trigger" href="#projects">Projects</a>

                        <a class="nav-link js-scroll-trigger" href="#signup">Contact</a>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
        <div class="container d-flex h-100 align-items-center">
            <div class="mx-auto text-center">
                <h1 id="time"></h1>
                <br>
                <br>
                <h1 class="greeting"></h1>
                <br>
                <br>
                <br>
                <br>
                <h2 class="text-white-50 mx-auto mt-2 mb-5" id="quoteDisplay"></h2>
                <a href="login.php" class="btn btn-primary ">Log in</a>
                <a href="signup.php" class="btn btn-primary ">Sign up</a>
            </div>
        </div>
    </header>



    <!-- Contact Section -->
    <section class="contact-section bg-black">
        <div class="container">

            <div class="row">

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">4923 Market Street, Orlando FL</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">
                                <a href="#">hello@yourdomain.com</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone</h4>
                            <hr class="my-4">
                            <div class="small text-black-50">+1 (555) 902-8832</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="social d-flex justify-content-center">
                <a href="#" class="mx-2">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fab fa-github"></i>
                </a>
            </div>

        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
        <div class="container">
            Copyright &copy; Your Website 2018
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/grayscale.min.js"></script>
    <script src="../js/grayscale.js"></script>
    <script>
        //Script for the time
        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('time').innerHTML =
                h + ":" + m + ":" + s;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
    </script>
<script>
var quotes =[
    'Keep your face to the sunshine and you cannot see a shadow. <br>- Helen Keller',
    'limit your "always" and your "nevers." <br>- Amy Poehler',
    'Spread love everywhere you go. <br>- Mother Teresa',
    'A champion is defined not by their wins but by how they can recover when they fall. <br>- Serena Williams',
    'Motivation comes from working on things we care about. <br>- Sheryl Sandberg',
    'No matter what people tell you, words and ideas can change the world. <br>- Robin Williams',
    'With the right kind of coaching and determination you can accomplish anything.  <br>- Reese Witherspoon',
    'If you look at what you have in life, you\'ll always have more.  <br>- Oprah Winfrey',
    'Life has got all those twists and turns. You\'ve got to hold on tight and off you go.  <br>- Nicole Kidman',
    'You are enough just as you are.  <br>- Meghan Markle',
    'My mission in life is not merely to survive, but to thrive.  <br>- Maya Angelou',
    'Let us make our future now, and let us make our dreams tomorrow\'s reality. <br>- Malala Yousafzai',
    'Life changes very quickly, in a very positive way, if you let it. <br>- Lindsey Vonn',
    'You get what you give. <br>- Jennifer Lopez',
    'You must do the things you think you cannot do. <br>- Eleanor Roosevelt',
    'Nothing is impossible. The word itself says "I\'m possible!" <br>- Audrey Hepburn',
    'Happiness is not by chance, but by choice. <br>- Jim Rohn',
    'We must be willing to let go of the life we planned so as to have the life that is waiting for us.  <br>- Joseph Campbell',
    'Don\'t wait. The time will never be just right. <br>- Napoleon Hill',
    'Some people look for a beautiful place. Others make a place beautiful.  <br>- Hazrat Inayat Khan',
    'OO alam ko pogi ako  <br>- Jodeyne Teneza'




]

function newQuote(){
    var randomNumber = Math.floor(Math.random() * (quotes.length));
    document.getElementById('quoteDisplay').innerHTML = quotes[randomNumber];
}
</script>




</body>

</html>
