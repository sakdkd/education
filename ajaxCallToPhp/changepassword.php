<?php
ob_start();
session_start();
include_once('../db_class/dbconfig.php');
include_once('../db_class/hr_functions.php');
	$chid=$_SESSION['chid'];  

//if(isset($_POST['register']))
//{
	
	extract($_POST);
	$pdate=date("Y-m-d");
	 $uid=$chid;
		 $password=$_POST['password'];
 $npassword=md5($password);
	 $selquery=mysqli_query($conn,"select * from `register` where `id`='$uid'");
	 
	  $numrows=mysqli_num_rows($selquery);
	 
	 if($numrows>0)
	 {
		 
		$query=mysqli_query($conn,"update `register` set `password`='$npassword' where `id`='$uid'");
if($query)
{
	echo '1';  
	 }
	 }else
		{
			
		echo '0';	
			
		}
		 
	 
	 
	