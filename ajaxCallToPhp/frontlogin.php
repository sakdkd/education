<?php
ob_start();
session_start();
include_once('../db_class/dbconfig.php');
include_once('../db_class/hr_functions.php');


//if(isset($_POST['submit']))
//{
	
	$pdate=date("Y-m-d");
	
		$rpassword=md5($_POST['password']);
		$username=$_POST['email']; 
			$insertquery=mysqli_query($conn,"select * from `register` where `email`='$username' and `password`='$rpassword'");
$numrows=mysqli_num_rows($insertquery);
	
	if($numrows>0)
	{ 
	$userresult=mysqli_fetch_row($insertquery);
		$insid=$userresult[0];
		 $_SESSION['userid']=$insid;
	//header("location:$pagelink");	
	$arr = array('status' =>1);  
		
	}
	else
	{ $_SESSION['userid']='';
			$arr = array('status' =>0);	

		
		
		
	}
		
		
	header('Content-type: application/json');

		echo json_encode($arr); 
		
	
	
	

	
	
	
	
	
	
	
	
	
	
//}