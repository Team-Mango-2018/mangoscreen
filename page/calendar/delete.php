<?php

//delete.php
   //changing variable name

if(isset($_POST["id"]))
{
 $connect = new PDO('mysql:host=localhost;dbname=mango_screen', 'root', '');
 $query = "
 DELETE from user_cal_item WHERE cal_id=:cal_id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':cal_id' => $_POST['id']
  )
 );
}

?>
