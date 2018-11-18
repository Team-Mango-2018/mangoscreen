<?php

//Changes by Penuel
// Word replacement => a variable called "user" to "uservalidation"
// Word replacement => a table called "users" to "user"

session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect('penmayp50734.ipagemysql.com', 'mango_db_access', '#-mang-pass-2819-*', 'mango_screen');

// REGISTER USER
if (isset($_POST['reg_user']) && isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
{
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $secret = '6LcBs3gUAAAAACnvzj9GYIWOHr4NRcSw1hqB_5GG';
  $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
  $responseData = json_decode($verifyResponse);
  if($responseData->success)
  {
      $succMsg = 'Your contact request have submitted successfully.';
  }
  else
  {
      $errMsg = 'Robot verification failed, please try again.';
  }

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $uservar = mysqli_fetch_assoc($result);

  if ($uservar) { // if user exists
    if ($uservar['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($uservar['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO user (username, email, password)
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// ...
// LOGIN USER
if(isset($_POST['login_user']) && isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
{
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
      $secret = '6LcBs3gUAAAAACnvzj9GYIWOHr4NRcSw1hqB_5GG';
      $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
      $responseData = json_decode($verifyResponse);
      if($responseData->success)
      {
          $succMsg = 'Your contact request have submitted successfully.';
      }
      else
      {
          $errMsg = 'Robot verification failed, please try again.';
      }

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>
