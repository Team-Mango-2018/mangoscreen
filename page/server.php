<?php
session_start();

//===================================//
/*
Changes:
    > REPO MERGE: Jodeyne => Main
      ^ name changes:
          ^ tbl_images => notes_tbl
          ^ $connect => $db
					^ notes_tbl(name) => notes_tbl(image)

*/
// ===========================//


//Changes by Penuel ; source at https://wordpress.stackexchange.com/questions/54453/functions-php-code-that-only-runs-on-localhost
// Check if php running in local host:
	// if php running in local host THEN change database server name to "localhost"
	// 	ELSE server name is penmayp50734.ipagemysql.com
	$host= gethostname();
	$ip = gethostbyname($host);
	$db_server =  substr($ip , 0, 7);  // returns the first 7 character

	if ( $db_server == '192.168' ) {
		$db_server_name = 'localhost';
		$db_username = 'root' ;
		$db_password = '';
		$message_1 = "<p> The server is a local server </p>";
	}else{
		$db_server_name = "penmayp50734.ipagemysql.com";
		$db_username = "mango_db_access" ;
		$db_password = "#-mang-pass-2819-*" ;
		$message_1 = "<p> The server is not local </p>";
	}

// initializing variables
$username = "";
$email    = "";
$errors = array();

// connect to the database
$db = mysqli_connect($db_server_name , $db_username , $db_password , 'mango_screen');

// REGISTER USER
if (isset($_POST['reg_user']) && isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
{
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	// Re-captca Secret -- #Re-captcha
  $secret = '6LcsB3wUAAAAACAT9xjoS9FHZO1w3DYzZNxg2Y_H';
	// #Re-captcha
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

  	$query = "INSERT INTO user (username,fname, lname, email, university, course, password)
  		  			  VALUES('$username', '$fname', '$lname', '$email', '$university', '$course', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: user.php');
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
	  $_SESSION['password'] = $password;
  	  header('location: user.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

//Upload Images
		// #ref_help https://www.codexworld.com/store-retrieve-image-from-database-mysql-php/
		//#replacement $connect to $db || #replacement notes_tbl(name) => notes_tbl(image)
if(isset($_POST["insert"]))
{  if(!empty($_FILES['image']['tmp_name'])
		&& file_exists($_FILES['image']['tmp_name']))
		{
			 $file= addslashes(file_get_contents($_FILES['image']['tmp_name']));
			 $query = "INSERT INTO notes_tbl(image) VALUES ('$file')";
			 if(mysqli_query($db, $query))
			 {
				 echo '<script>alert("Image Inserted into Database")</script>';
			 }
		 }
}

?>
