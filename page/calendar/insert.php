<?php

//insert.php

$connect = new PDO('mysql:host=penmayp50734.ipagemysql.com;dbname=mango_screen', 'mango_db_access', '#-mang-pass-2819-*');

if(isset($_POST["title"]))
{
 $query = "
 INSERT INTO user_cal_item
 (title, start_event, end_event, user_id)
 VALUES (:title, :start_event, :end_event, :user_id)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':user_id'=> $_POST['user_id'],
  )
 );
}


?>
