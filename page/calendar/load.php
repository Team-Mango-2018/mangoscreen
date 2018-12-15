<?php
include('../session.php');

//load.php

$connect = new PDO('mysql:host=penmayp50734.ipagemysql.com;dbname=mango_screen', 'mango_db_access', '#-mang-pass-2819-*');

$data = array();

$query = "SELECT * FROM user_cal_item WHERE user_id='$sesh_user' ORDER BY cal_id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["cal_id"],
  'title'   => $row["title"],
  'start'   => $row["start_event"],
  'end'   => $row["end_event"]
 );
}

echo json_encode($data);

?>
