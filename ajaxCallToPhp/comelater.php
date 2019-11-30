<?php
ob_start();
session_start();
include_once('../db_class/dbconfig.php');
include_once('../db_class/hr_functions.php');
		$level=$_POST['level'];
				$tid=$_POST['tid'];
				$div_id=$_POST['div_id'];

				$user_id=$_POST['uid'];

		 				$val=$_POST['val'];


$ques=mysqli_query($conn,"select * from `comeback` where `qid`='$div_id' and `levelid`='$level' and `testid`='$tid' and `uid`='$user_id'");
$numrows=mysqli_num_rows($ques);

		 if($numrows==0)
		 {
		$query=mysqli_query($conn,"insert into `comeback` set `qid`='$div_id', `levelid`='$level',`testid`='$tid',`uid`='$user_id'");	 
			 
			 
		 }
		 
		 else
		 {
					$query=mysqli_query($conn,"delete from `comeback` where `qid`='$div_id' and `levelid`='$level' and `testid`='$tid' and `uid`='$user_id'");	 
 
		//$query=mysqli_query($conn,"insert into `comeback` set `qid`='divid',`levelid`='$level',`tid`='$tid',`uid`='$user_id'");	 
			 
			 
		 }
		 
		 
//$query=mysqli_query($conn,"");
if($query)
{
	
		
				$arr = array('status' =>1);	

}
else
{
	
					$arr = array('status' =>1); 	

	
}

	header('Content-type: application/json');

		echo json_encode($arr); 
