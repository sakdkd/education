<?php
ob_start();
session_start();
include_once('../db_class/dbconfig.php');
include_once('../db_class/hr_functions.php');


if(extract($_POST))
{
$pdate=date("Y-m-d");
$query=mysqli_query($conn,"INSERT INTO `contactus`(`name`, `mobile`, `email`, `message`, `pdate`, `status`, `view`) VALUES ('$contact_name','$contact_mobile','$contact_email','$contact_msg','$pdate','1','1')"); 

if($query)
{

$arr=array("status"=>'1');
	
	
	
}
else
{
$arr=array("status"=>'2');
	
}

   }
else
{
$arr=array("status"=>'0');
	
}

 
	header('Content-type: application/json');

		echo json_encode($arr); 
?> 