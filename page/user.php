<?php
   //include('server.php');
   include('session.php');
?>

<?php
//=================================//
/*
Changes:
    > REPO MERGE: Jodeyne => Main
      ^ name changes:
          ^ tbl_images => notes_tbl
          ^ $connect => $db

*/
//===============================//

//no need !!!
/*
    $connect = mysqli_connect("localhost", "root", "", "testing");
*/

 //Upload Image function
    /*
        if(isset($_POST["insert"]))
        {  if(!empty($_FILES['image']['tmp_name'])
            && file_exists($_FILES['image']['tmp_name']))
        {
             $file= addslashes(file_get_contents($_FILES['image']['tmp_name']));
             $query = "INSERT INTO tbl_images(name) VALUES ('$file')";
             if(mysqli_query($connect, $query))
             {
               echo '<script>alert("Image Inserted into Database")</script>';
             }
           }
        }
    */
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

    <!--Gallery-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
    <link href="../css/main.css" rel="stylesheet">


</head>

<body id="page-top" onload="start()">

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
                    <a class="nav-link js-scroll-trigger" href="#calendar">Calendar</a>
                    <a class="nav-link js-scroll-trigger" href="#notes">Notes</a>
                    <a class="nav-link js-scroll-trigger" href="#events">Events</a>
                    <a class="nav-link js-scroll-trigger" href="#career">Careers</a>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
        <div class="row" id="headrow">
            <div class="col" id="mid">
                calendar here
            </div>
            <div class="col-5" id="mid">
                <div>
                    <h1 id="time"></h1>
                </div>
                <div>
                    <h1 class="greeting"></h1>
                </div>
                <div>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5" id="quoteDisplay"></h2>
                </div>
            </div>
            <div class="col" id="mid">
                <div id="myDIV" class="header">
                    <h2>My To Do List</h2>
                    <input type="text" id="myInput" placeholder="DO all the CA\s'">
                    <span onclick="newElement()" class="addBtn">Add</span>
                </div>

                <ul id="myUL">
                </ul>

            </div>
        </div>
    </header>

    <!-- Calendar -->
    <section id="calendar" class="about-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2 class="text-white mb-4">Built with Bootstrap 4</h2>
                    <p class="text-white-50">Grayscale is a free Bootstrap theme created by Start Bootstrap. It can be yours right now, simply download the template on
                        <a href="http://startbootstrap.com/template-overviews/grayscale/">the preview page</a>. The theme is open source, and you can use it for any purpose, personal or commercial.</p>
                </div>
            </div>
            <img src="../img/ipad.png" class="img-fluid" alt="">
        </div>
    </section>

    <!-- notes Section -->
    <section id="notes" class="projects-section bg-light">
        <div class="container">

            <!--Use Case: Upload Notes-->
              <!-- Featured Project Row -->
            <div class="row align-items-center no-gutters mb-4 mb-lg-5">
                <div class="col-xl-8 col-lg-7">
                    <form method="post" enctype="multipart/form-data">
                        <!-- Button to selcet image-->
                        <input type="file" name="image" id="image" />
                        <br />
                        <!-- POST -->
                            <!--Button to upload image to database -->
                        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />
                    </form>
                </div>

                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">

                    </div>
                </div>
            </div>

            <!-- Notes Row -->
                <div class="carouselGallery-grid hidden-xs">
                <table class="carouselGallery-col-1 carouselGallery-carousel">
                    <div>
                        <h1>Notes</h1>
                    </div>

                <!-- Querying all the images and displays all the images -->
                  <?php
                      // #replacement id => notes_id
                      $query = "SELECT * FROM notes_tbl ORDER BY notes_id DESC";
                      $result = mysqli_query($db, $query);

                      while($row = mysqli_fetch_array($result))
                      {
                           echo '
                                <tr>
                                     <td>

                                          <img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" height="200" width="200" class="img-thumnail" />
                                     </td>
                                </tr>
                           ';
                      }
                ?>
                </table>

            </div>
                </div>

    </section>

    <br>
         <button type="button"  onclick="location.href='calendar/index.php'"> <h1>Go to calendar</h1> </button>
    <br>

    <section id="career" class="signup-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto text-center">

                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white mb-5">Subscribe to receive updates!</h2>

                    <form class="form-inline d-flex">
                        <input type="email" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="inputEmail" placeholder="Enter email address...">
                        <button type="submit" class="btn btn-primary mx-auto">Subscribe</button>
                    </form>

                </div>
            </div>
        </div>
    </section>

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
            Copyright &copy; MangoScreen 2018
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
    <script src="../js/js.js"></script>
    <script>
        $(document).ready(function() {
            $('#insert').click(function() {
                var image_name = $('#image').val();
                if (image_name == '') {
                    alert("Please Select Image");
                    return false;
                } else {
                    var extension = $('#image').val().split('.').pop().toLowerCase();
                    if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                        alert('Invalid Image File');
                        $('#image').val('');
                        return false;
                    }
                }
            });
        });

    </script>

    <script src="../js/main.js"></script>
        </body>

        </html>
