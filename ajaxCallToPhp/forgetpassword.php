<?php
ob_start();
session_start();
include_once('../db_class/dbconfig.php');
include_once('../db_class/hr_functions.php');

//if(isset($_POST['register']))
//{
	
	extract($_POST);
	$pdate=date("Y-m-d");
	 $email=$_POST['email'];
	 
	 $selquery=mysqli_query($conn,"select * from `register` where `email`='$email'");
	 
	  $numrows=mysqli_num_rows($selquery);
	 
	 if($numrows>0)
	 {
		 
		 $result_set=mysqli_fetch_assoc($selquery);
		 $ids=$result_set['id'];
		 
		$message=newpasswordlink($email,$ids,$baseurl);
		
			
		$subject="New Password Link";
$from="info@host.bestbargains.in";
$fromname="Bosh Education";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: info@host.bestbargains.in' . "\r\n";

sendgridmail($email,$message,$subject);
//sendBasicMail($email,$from,$fromname,$subject,$message);
echo '1';  
	 }
		else
		{
			
		echo '0';	
			
		}
		 
	 
	 
	