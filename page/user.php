<?php include('session.php') ?>

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

    <!-- Custom styles for this template-->
    <link href="../css/grayscale.min.css" rel="stylesheet">
    <link href="../css/grayscale.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
      <link href="../css/main.css" rel="stylesheet">

    <!--Gallery-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">


</head>

<body id="page-top" onload="start()">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top " id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Mango Screen</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <a class="nav-link js-scroll-trigger" href="calendar/index.php">Calendar</a>
                    <a class="nav-link js-scroll-trigger" href="#notes_scroll">Notes</a>
                    <a class="nav-link js-scroll-trigger" href="logout.php">Log Out</a>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead main-w3layouts wrapper">
        <div class="row" id="headrow">
            <div class="col" id="mid">

            </div>
            <div class="col-5" id="mid">
                <div>
                    <h1 id="time"></h1>
                </div>
                <div>
                    <h1 class="greeting"> </h1>
                </div>
                <br>
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

    <!-- notes Section -->
    <section class="gallery-links" id="notes_scroll">
      <div class="wrapper" >
        <h2>notes</h2>

        <div class="gallery-container" >
          <?php
          include_once 'includes/dbh.inc.php';

          $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
          $stmt = mysqli_stmt_init($conn);
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL Statement Failed!";
          }else {
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            while ($row = mysqli_fetch_assoc($result)) {
              echo '<a href="#">
                <div style="background-image:url(img/gallery/'.$row["imgFullNameGallery"].');"></div>
                <h3>'.$row["titleGallery"].'</h3>
                <p>'.$row["descGallery"].'</p>
              </a>';
            }
          }

          ?>
         <br>
         <br>
        </div>

        <!-- image upload form -->
            <div class="container">

                <div class="row">



                    <div class="col-md-12 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center ">
                              <?php
                              if (isset($_SESSION['username'])) {
                                echo '<div class="gallery-upload ">
                                <div class"row">
                                <h2>Upload</h2>

                                  <form class="form-horizontal"  action="includes/notes.upload.inc.php" method="post" enctype="multipart/form-data">

                                  <div class="form-group row">

                                      <input class="form-control" type="text" name="filetitle" placeholder="Image Title...">
                                  </div>

                                  <div class="form-group row">

                                    <input class="form-control" type="text" name="filedesc" placeholder="Image description...">
                                  </div>

                                    <div>
                                    <input  type="file" name="file">
                                    </div>
                                      </br>
                                      <div>
                                    <button class="btn btn-primary btn-md"type="submit" name="submit">Upload</button>
                                      </div>

                                  </form>

                                </div>';

                              }
                              ?>
                                </div>
                            </div>
                        </div>
                    </div>
        </section>




    <section id="career" class="signup-section">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto text-center">

                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white mb-5">Team Mango is dedicated to keeping students on track</h2>
                    <h2 style = "color:white;"> Penuel | Zuha | Jodeyne | Rehan</h2>


                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section bg-black">
        <div class="container">

            <div class="row">


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


    <script src="../js/main.js"></script>
        </body>

        </html>
