<?php
	//  This file have information about MySQL Data base configuration
	
   define('DB_SERVER', 'penmayp50734.ipagemysql.com'); //need to be modified for iPage
   define('DB_USERNAME', 'mango_db_access'); // need to be modified for ipage
   define('DB_PASSWORD', '#-mang-pass-2819-*'); // need to be modified for iPage
   define('DB_DATABASE', 'mango_screen');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>