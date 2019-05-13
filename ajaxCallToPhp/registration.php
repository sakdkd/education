<?php
ob_start();
session_start();
include_once('../db_class/dbconfig.php');
include_once('../db_class/hr_functions.php');


$email=$_POST['email'];
$password=md5($_POST['password']);
$level=$_POST['level'];
$trial=$_POST['trial'];

$pdate=date("Y-m-d");
$email_existence=checkemailExistence($conn,$email);

if($email_existence==0)
{
	
	$query=mysqli_query($conn,"INSERT INTO `register`(`name`, `email`, `password`, `pdate`, `status`, `phone`, `lname`, `sid`, `location`,`trial`) VALUES ('','$email','$password','$pdate','1','','','$level','','$trial')");
	
	
	if($query)
	{
		
		$lastid=mysqli_insert_id($conn);
		 $_SESSION['userid']=$lastid;
			$arr = array('status' =>1);
	
		
		
	}
	
	else
	{
		
				$arr = array('status' =>0);

		
	}
	
}

else
{

		$arr = array('status' =>2);
		
}
header('Content-type: application/json');

		echo json_encode($arr); 