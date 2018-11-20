<?php
	//penmayp50734.ipagemysql.com

$host= gethostname();
$ip = gethostbyname($host);

$host= gethostname();
	$ip = gethostbyname($host);
	$db_server =  substr($ip , 0, 7); 
	echo "<br> $db_server <br>";
	
	if ( $db_server == '192.168' ) {
		echo "The same";
	} Else{
		echo "Not the same";
	}

?>