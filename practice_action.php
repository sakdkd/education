<?php
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
$userid=$_SESSION['userid'];
   		extract($_POST);
//print_r($_POST); die;

 if(isset($_GET['end']))
{
	
	


$getid=$_GET['end'];

	
	
	
	$resultset=$_SESSION['allresult'];
	
//print_r($resultset); 
	 $test_name=$resultset['test_name'];
	 $topicid=$resultset['topicid'];
	 	 $levelid=$resultset['levelid'];

	 $all=$resultset['all'];
	 
	 
	 
	 	 $savedtime=$resultset['savedtime'];

$existence=practestExistence($conn,$userid,$topicid,$levelid); 

		$pgiventestdetails=getTableDetailsById($conn,"practicetestgiven",$existence);

	$button=1;

	$pdate=date("Y-m-d");
	

			mysqli_query($conn,"BEGIN"); 


$success='0';

	$all=$resultset['allques'];
	
	$imploded=implode(",",$all);
			mysqli_query($conn,"BEGIN");
			
		//in db subject_id is topic id for practice paper	
			if(($existence>0) && ($pgiventestdetails['button']>1))
			{
				
$insquery=mysqli_query($conn,"UPDATE `practicetestgiven` set `pdate`='$pdate',`testname`='$test_name',`button`='$button' ,`savedtime`='$savedtime'where `id`='$existence'");
$lastid=$existence;

			}
			else
			{
				
			$insquery=mysqli_query($conn,"INSERT INTO `practicetestgiven`(`userid`, `pdate`, `testname`, `button`, `status`, `view`,`subject_id`,`levelid`) VALUES ('$userid','$pdate','$test_name','$button','1','1','$topicid','$levelid')");
		$lastid=mysqli_insert_id($conn);

			}
			
			
if($insquery)
{
	
			if(($existence>0) && ($pgiventestdetails['button']>1))
	{
		
	$delquery=mysqli_query($conn,"delete from `ptestattempted` where `testid`='$existence'");	
		
	}
	
	foreach($all as $qi)
	{
		 $answer=mysqli_real_escape_string($conn,$resultset['ans'.$qi]); 
		 if($answer=='')
		 {
			$answer=0; 
			 
		 }
		 
				 $timetaken=$resultset['effected'.$qi]; 
			
 
		//echo "INSERT INTO `ptestattempted`(`testid`, `questionid`, `answer`,`buttonval`) VALUES ('$lastid','$qi','$answer','$button')"; die;
				$insquery1=mysqli_query($conn,"INSERT INTO `ptestattempted`(`testid`, `questionid`, `answer`,`buttonval`) VALUES ('$lastid','$qi','$answer','$button')");

	
		if($insquery1)
		{
			
		$success='1';	
			
		}
		
		       
		 
	}

}
 
if($success=='1')
{
	
				mysqli_query($conn,"COMMIT");
		header("location:practice.php");

	
}

else
{
		header("location:welcome.php?1");

	
	
}
	


	
}
else if(isset($_GET['pause']))
{
	
	$lasturl=$_SESSION['lasturl'];


$pausevalue=$_GET['pause'];

	$resultset=$_SESSION['allresult'];
	
	 $test_name=$resultset['test_name'];
	 $topicid=$resultset['topicid'];
	 	 $levelid=$resultset['levelid'];
$subject_id=$resultset['subject_id'];
	 $all=$resultset['allques'];
	 
	 
	
	 	 $savedtime=$resultset['savedtime'];
$existence=practestExistence($conn,$userid,$topicid,$levelid); 

			$pgiventestdetails=getTableDetailsById($conn,"practicetestgiven",$existence);

$button=3;
	
	

	$pdate=date("Y-m-d");
	
	//echo "INSERT INTO `practicetestgiven`(`userid`, `pdate`, `testname`, `button`, `status`, `view`,`subject_id`,`levelid`) VALUES ('$userid','$pdate','$test_name','$button','1','1','$subject_id','$levelids')"; 
	
			mysqli_query($conn,"BEGIN"); 


$success='0';

	$all=$resultset['allques'];
	
	$imploded=implode(",",$all);
			mysqli_query($conn,"BEGIN");
			
			if(($existence>0) && ($pgiventestdetails['button']>1))
			{
$insquery=mysqli_query($conn,"UPDATE `practicetestgiven` set `pdate`='$pdate',`testname`='$test_name',`button`='$button' where `id`='$existence' ");
$lastid=$existence;

			}
			else
			{
				
			$insquery=mysqli_query($conn,"INSERT INTO `practicetestgiven`(`userid`, `pdate`, `testname`, `button`, `status`, `view`,`subject_id`,`levelid`) VALUES ('$userid','$pdate','$test_name','$button','1','1','$topicid','$levelid')");
		$lastid=mysqli_insert_id($conn);

			}		
			
		
if($insquery)
{ 
			if(($existence>0) && ($pgiventestdetails['button']>1))
	{
		
	$delquery=mysqli_query($conn,"delete from `ptestattempted` where `testid`='$existence'");	
		
	}
		foreach($all as $qi)
	{
		 $answer=mysqli_real_escape_string($conn,$resultset['ans'.$qi]); 
		 if($answer=='')
		 {
			$answer=0; 
			 
		 }
		 
	///	 echo "INSERT INTO `ptestattempted`(`testid`, `questionid`, `answer`,`buttonval`) VALUES ('$lastid','$qi','$answer','$button')"; die;
				$insquery1=mysqli_query($conn,"INSERT INTO `ptestattempted`(`testid`, `questionid`, `answer`,`buttonval`) VALUES ('$lastid','$qi','$answer','$button')");

	
		if($insquery1)
		{
			
		$success='1';	
			
		}
		
		       
		
	}

}


if($success=='1')
{
	
				mysqli_query($conn,"COMMIT");
				if($pausevalue==2)
				{
						header("location:practice.php");
	
				}
				
				else
				{
				
		header("location:$lasturl");
				}
	
}

else
{
		header("location:welcome.php?1");

	
	
}
	


	
}
else
{
	 $lasturl=$_SERVER['HTTP_REFERER'];; 
	$_SESSION['lasturl']=$lasturl;

	$_SESSION['allresult']=$_POST;
			extract($_POST);

//print_r($_POST); die;
if($btnclickval==0)
{$nbtnclickval=3;}
else
{
	$nbtnclickval=1;
	
}
$_SESSION['savebtn']=$nbtnclickval;
	$savebtn=$_SESSION['savebtn'];


}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Home</title>
<!-- Standard Favicon -->
<?php include_once("header.php");?>
<!-- /.navbar -->
<section style="padding-top: 92px;">
<div class="upper-box-wrapper">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="wrapper-title">
          <h3><?php echo $levelname;?> #6</h3>
          <h1>SECTION 1: VERBAL REASONING</h1>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<section class="end-sec">
  <div class="container">
    <div class="wraper-box">
      <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8 customer1">
          <h2 class="info-sect">Done with this section?</h2>
          <p>Please confirm that you would like to end this section.</p>
          <div class="row">
            <div class="col-md-1"></div>
            <?php if($savebtn==3)
				{?>
            <div class="col-md-5"> <a href="practice_action.php?pause=2">
              <input type="submit" class="end-section" value="Exit Section" name="submit">
              </a> </div>
            <?php } else{?>
            <div class="col-md-5"> <a href="practice_action.php?end=1">
              <input type="submit" class="end-section" value="End Section" name="submit">
              </a> </div>
            <?php }?>
            <div class="col-md-5"> <a href="practice_action.php?pause=1">
              <button type="button" class="end-section-gray">Return To Section</button>
              </a> </div>
            <div class="col-md-1"></div>
          </div>
        </div> 
      </div>
    </div>
  </div>
</section>

<!--footer widget-->
<?php include_once("footer.php");?>
