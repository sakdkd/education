<?php
ob_start();
session_start();
include_once('../db_class/dbconfig.php');
include_once('../db_class/hr_functions.php');
		$packid=$_POST['packid'];
				$user_id=$_POST['uid'];

		 $allOids=getallOrderIDfromUserID($conn,$user_id) ;
		 
		 		$all_p_ids_string=implode(",",$allOids);

		 $query=mysqli_query($conn,"select * from `orderlist` where `id` in ($all_p_ids_string) and `planid`='$packid'");
		 $numrows=mysqli_num_rows($query);
//$query=mysqli_query($conn,"");
if($numrows>0)
{
	
			 $resultset=mysqli_fetch_row($query);
$rset=$resultset[1];
				$arr = array('status' =>1,"oid"=>$rset);	

}
else
{
	
					$arr = array('status' =>0); 	

	
}

	header('Content-type: application/json');

		echo json_encode($arr); 
