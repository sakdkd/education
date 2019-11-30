<?php
ob_start();
session_start();
include_once('../db_class/dbconfig.php');
include_once('../db_class/hr_functions.php');


 $myclass=$_POST['myclass'];
$my_testId=$_POST['my_testId'];

//echo "select * from `testattempted` where `testid`='$my_testId'"; 
	$saved[]=1;	

$query=mysqli_query($conn,"select * from `testattempted` where `testid`='$my_testId'");
mysqli_num_rows($query);
while($resultset=mysqli_fetch_array($query))
{
	$my_ques_id=$resultset['questionid'];
	$s++;
	$dlevel=getColoumnNameById($conn,"difficulty","questions",$my_ques_id)	;
$levelname=getColoumnNameById($conn,"name","examlevel",$dlevel);
	if($myclass=="correct")
{
	
	$user_attmpted_ques=GetUserCorrectAnsFromTidQid($conn,$my_ques_id,$my_testId);
$u_ans=$user_attmpted_ques['answer']; 
$actual_ans=getColoumnNameById($conn,"correct","questions",$my_ques_id);
if($actual_ans==$u_ans)
	{
		
		  
	$saved[]=$s;	
		
	}
}

		if($myclass=="incorrect")
{
	
	$user_attmpted_ques=GetUserCorrectAnsFromTidQid($conn,$my_ques_id,$my_testId);
$u_ans=$user_attmpted_ques['answer']; 
$actual_ans=getColoumnNameById($conn,"correct","questions",$my_ques_id);
if($actual_ans!=$u_ans)
	{
		
		  
	$saved[]=$s;	
		
	}
}
	
	
			if($myclass=="less30") 
{
	
	if($resultset['timetaken']<30.0)
{ 
	$saved[]=$s;	


}

	
	}
	
			if($myclass=="Easy") 
{ 
if($levelname=="Easy")
{
$saved[]=$s;

   }
         }
		 
		 	if($myclass=="Medium") 
{ 
if($levelname=="Medium")
{
$saved[]=$s;

   }
         }
		 
		 if($myclass=="Hard") 
{ 
if($levelname=="Hard")
{
$saved[]=$s;

   }
         }

}
$saved=array_unique($saved);
$arr=array("status"=>1,"m_string"=>implode(",",$saved));

	header('Content-type: application/json');

		echo json_encode($arr); 