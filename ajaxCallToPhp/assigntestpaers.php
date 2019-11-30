<?php
ob_start();
session_start();
include_once('../db_class/dbconfig.php');
include_once('../db_class/hr_functions.php');

$quesid=$_GET['quesid'];
$planid=$_GET['planid'];
$qfeaturid=$_GET['qfeaturid'];
$topicid=$_GET['topicid'];
 $selectedItems=explode(',',$_GET['selectedItems']);
if(!empty($quesid))
{
$delSess=mysqli_query($conn,"delete from `assignquestion` where `qid`='$quesid' and `topic_id`='$topicid' and `planid`='$planid'");
	
if(count($selectedItems)>0){
	
	
$count=count($selectedItems);
	$countmain=0;
	foreach($selectedItems as $sessid)
	{
	
	
	$execqry=mysqli_query($conn,"INSERT INTO `assignquestion`(`qid`, `topic_id`,`planid`, `prid`, `status`) VALUES ('$quesid','$topicid','$planid','$sessid','1')");   
	if($execqry)
	{
		$countmain++;
		}
	}

	if($countmain==$count)
	{
		echo '1';
		}
		else{
				 echo '0';
			}
	
	
	}
	else{
			echo '0';
		}


	}
	else{
			echo '1';
		}