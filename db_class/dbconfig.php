<?php 
	date_default_timezone_set('Asia/Calcutta'); 
	$baseurl="http://78.46.117.226/education";
	$builderbaseurl="http://78.46.117.226/education/admin";
	$builderlocal=$_SERVER['DOCUMENT_ROOT']."/education";
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = 'ani123#$*12';
	$dbname = 'wp_kapil';
          global $conn;
	      $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);
       // 
         if(! $conn ) {
            die('Could not connect: ' . mysqli_error());
         }
		 
//$nonexcArrroles= array("2","10","12");


?>
