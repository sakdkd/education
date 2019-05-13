<?php
ob_start();
session_start();
include_once('../db_class/dbconfig.php');
include_once('../db_class/hr_functions.php');

//if(isset($_POST['register']))
//{
	
	extract($_POST);
	$pdate=date("Y-m-d");
	 $rpassword=$_POST['password'];
	 $rpasswordnew=md5($rpassword); 
		$lname=$_POST['name'];
		$location=$_POST['userlocation'];

	$remail=$_POST['email'];
	$rphone=$_POST['mobile'];
	$insertquerys=mysqli_query($conn,"select * from `register` where `email`='$remail'");
	 $numrows=mysqli_num_rows($insertquerys);
	
	if($numrows==0)
	{
	$insertquery=mysqli_query($conn,"INSERT INTO `register`(`name`, `email`, `password`, `pdate`, `status`,`phone`,`lname`,`location`) VALUES ('$rname','$remail','$rpasswordnew','$pdate','1','$rphone','$lname','$location')");
	
	if($insertquery)
	{
		 $insid=mysqli_insert_id($conn);
		$_SESSION['id']=$insid;
		//  $welmessage=registrationmail($conn,$insid);

//$success=mail($to,$subject,$message,$headers);
$subjectadmin="Welcome";
//$success=sendBasicMail($remail,$from,$fromname,$subjectadmin,$welmessage);
		
		 $arr = array('status' =>1);

		
	}
	
	}
	else
	{
		
		 $arr = array('status' =>0);
		
		
	}
	
	
	header('Content-type: application/json');

echo json_encode($arr); 
	
	
	
	
	
//}