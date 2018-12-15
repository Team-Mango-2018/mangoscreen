<?php

$host= gethostname();
$ip = gethostbyname($host);
$db_server =  substr($ip , 0, 7);  // returns the first 7 character

if ( $db_server == '192.168' ) {
   $servername = 'localhost';
   $username = 'root' ;
   $password = '';
   $message_1 = "<p> The server is a local server </p>";
}else{
   $servername = "penmayp50734.ipagemysql.com";
   $username = "mango_db_access" ;
   $password = "#-mang-pass-2819-*" ;
   $message_1 = "<p> The server is not local </p>";
}


$dbName = "mango_screen";

$conn = mysqli_connect($servername, $username, $password, $dbName);
