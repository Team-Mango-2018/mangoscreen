<?php
   include("config.php");
   
   $error = "";
   
      // username and password sent from form 
      
      //qeurying the database
      $sql = "SELECT username, password FROM tb_test";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
	echo "This is username: {$row['username']}  <br> ".
		"This is password : {$row['password']} <br> ";
		
	echo "<br> Process finish";
	

?>
