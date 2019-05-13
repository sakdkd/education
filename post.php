<?php
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
$userid=$_SESSION['userid'];

if(isset($_GET))
{
	
	echo $pdate=date("Y-m-d");
	extract($_GET);
	$button='1';
	
	
		mysqli_query($conn,"BEGIN");
		$allques=$_GET['allques'];
		print_r($allques);
				echo $ans1=$_GET['ans2'];

		
foreach($allques as $i)
		{
			$val="ans".$i;
		echo "---".$qid=$_GET["$val"];

		  
		//$insquery1=mysqli_query($conn,"INSERT INTO `testattempted`(`testid`, `questionid`, `answer`) VALUES ('$lastid',[value-3],[value-4])");
		
		
		
		
		}
		
		for ($i = 0; $i < 10; $i++) 
{
      //echo "shh".$data = $allques[$i];
   //	echo	$qid=$_POST['ans'.$data];

}
		for($i=1; $i<=7; $i++)

{
echo	$qid=$_POST['ans'.$i];
}
		die;
	$insquery=mysqli_query($conn,"INSERT INTO `testgiven`(`userid`, `pdate`, `testname`, `button`, `status`, `view`) VALUES ('$userid','$pdate','$test_name','$button','1','1')");
	
	
	if($insquery)
	{
		$lastid=mysqli_insert_id($conn);
		foreach($allques as $qids)
		{
		$insquery1=mysqli_query($conn,"INSERT INTO `testattempted`(`testid`, `questionid`, `answer`) VALUES ('$lastid',[value-3],[value-4])");
		
		
		}
	}

}

?> 


