<?php
ob_start();
session_start();
 header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 header ("Cache-Control: no-cache, must-revalidate");
 header ("Pragma: no-cache");
 include('../db_class/dbconfig.php');
include('../db_class/hr_functions.php');
$userid=$_SESSION['userid'];
$tbname="register";
$user_details=getTableDetailsById($conn,$tbname,$userid);  
$levelchoosen=$user_details['sid'];


$sub_arr=GetLevelSubjectmainidfromLevelid($conn,$levelchoosen);

    $imploded_sub_str=implode(",",$sub_arr);
$subjectid=$_GET['subject'];
 $subtypid=$_GET['subtypid'];
$pstatus=$_GET['status'];
$plevel=$_GET['level'];  
$searchtitle=$_GET['searchtitle'];  
 if($searchtitle!='')
 {
	 
	$extquery="and `topics` like '%$searchtitle%'";
	 
 }
 else
 {
	 
$extquery="";	 
	 
 }
 ?>

 <select  name="subtypid" id="subtypid" class="form-control" onChange="frontselecttopic('2',this.value)"   >
                <option value="">Select Subtype</option>
                
                <?php
				 
				$ds=mysqli_query($conn,"SELECT * FROM `subtype` where `attachedid`='$subjectid' and `status`='1' and `view`='1' order by `id` desc " ); 
				$numrows=mysqli_num_rows($ds);
				if( $numrows >0){
				while($fetch=mysqli_fetch_array($ds)){
					$sid=$fetch['subject_id'];
					$subname=getSubjectdetails($conn,$sid);
					$name=$fetch['name'];
				?>
                <option value="<?php echo $fetch['id'] ?>" <?php if($subtypid==$fetch['id']){?> selected <?php }?>><?php echo $name; ?></option>
				
				
				<?php }}?>
             
                
                </select> ## <div class="row" style="display: inline-block;width: 100%;">


<?php 
if($subjectid!='')
{
	
	if($subtypid=='')
	{
$selq="select * from `attachedtopics` where `attachedid` = '$subjectid' and `status`='1' and `view`='1' $extquery";
	}
	
	else
	{
		
	$selq="select * from `attachedtopics` where `attachedid` = '$subjectid' and `subtype_id`='$subtypid' and `status`='1' and `view`='1' $extquery";
	
		
	}
}

else if($subjectid=='')

{
	
$selq="select * from `attachedtopics` where `attachedid` in ($imploded_sub_str) and `status`='1' and `view`='1' $extquery";
	
	
}




$selquery=mysqli_query($conn,$selq);
$numrows=mysqli_num_rows($selquery);
if($numrows>0)
{
	while($resultset=mysqli_fetch_array($selquery))
	{    $topicid=$resultset['id'];
	
	
	$difficulty_arr=getlevelsfromquestionfromtid($conn,$topicid,$plevel);
	
	 
	//print_r($difficulty_arr);
	foreach($difficulty_arr as $difflevel)
	{
		
		

		
		
		
			$total_ques=noOfquestionfromtopicidandlevel($conn,$topicid,$difflevel);

		$exam_level_details=getTableDetailsById($conn,"examlevel",$difflevel);
$existence=practestExistencecount($conn,$userid,$topicid,$difflevel); 
if($existence>0)
{
	$testId=practestExistence($conn,$userid,$topicid,$difflevel); 

	$page_link="practice_view.php?test_id=".base64_encode($testId);
				  $comques=getPracAttemptedQuestionsfromTestId($conn,$testId);
				  
				  $prac_details=getTableDetailsById($conn,"practicetestgiven",$testId);
				  if($prac_details['button']==1)
				  {
					  $teststatus="Completed";
					  
					  
				  }
				  
				   if($prac_details['button']==3)
				  {
					  $teststatus=$comques."/".$total_ques." "."Completed";
					  
					  
				  }


}


else
{
		$page_link="practice_paper.php?topic_id=".base64_encode($topicid)."&level=".base64_encode($difflevel);
		$comques=0;
					  $teststatus=$comques."/".$total_ques." "."Completed";

	
}
   ?>

	
	<div class="col-md-4">
	<div class="inner-box">
	<div class="panel-ribbon">
		 <div class="ribbon"><span><?php echo $exam_level_details['name'];?></span></div>
	</div>
		<div class="panel-body">
			<strong class="ng-binding"><?php echo $resultset['topics'];?></strong>
		</div>
	<div class="panel-heading">
		<span class="ng-binding ng-scope"><i class="fa fa-check"></i>&nbsp;&nbsp; <?php echo $teststatus;?></span>
	</div>
	<div class="panel-body">
		<span class="small pull-left ng-binding">Completed On:<br>10/20/18 1:00:34</span>
		<a class="btn btn-primary pull-right ng-view" href="<?php echo $page_link;?>">View</a>
	</div>
	</div>
	</div>
    <?php } }} else {?>
    
    <p>No data found</p>
    <?php }?>
    
	

	</div>





