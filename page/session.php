<?php
include('server.php');

   if (!isset($_SESSION['username'])) {
       header("location: index.php");
    }
    $sesh_test = "sesh_test" ;
    $sesh_user = $_SESSION['username'];
   // We could add method to:
      // ELSE check Session(username) and Session(password) and compare to the database
 ?>
