<?php
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
$userid=$_SESSION['userid'];
if(isset($_GET['test_id']))
{
	
$test_ids=base64_decode($_GET['test_id']); 
		$giventestdetails=getTableDetailsById($conn,"practicetestgiven",$test_ids);
		$topicid=$giventestdetails['subject_id'];
		$levelid=$giventestdetails['levelid'];
	$buttonval=$giventestdetails['button'];
	if($buttonval==1)
	{
		
		$button_text="Restart";
			$pagelink="practice_paper.php?topic_id=".base64_encode($topicid)."&level=".base64_encode($levelid);
	
	}
	
		if($buttonval==3)
	{
		
		$button_text="Continue";
		
		$pagelink="practice_paper.php?topic_id=".base64_encode($topicid)."&level=".base64_encode($levelid);
		
	}
	

			$topic_details=getTableDetailsById($conn,"attachedtopics",$topicid);
			
			//print_r($topic_details); 

}

?> 
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js"> 
<!--<![endif]--><head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>BOSH Education | ISEE</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Standard Favicon -->
    
<style>
	.top-head {
    display: inline-block;
    width: 100%;
}
.top-head {
    background: #6e6e6e;
    color: #fff;
    padding: 7px;
    border-radius: 3px;
}
.new-close {
    font-size: 20px;
    color: #fff;
    padding: 5px 15px;
    line-height: 20px;
	vertical-align: -webkit-baseline-middle;
}
.bottom-section {
    background: #f1f1f1;
    margin-top: 20px;
    border-radius: 3px;
    padding: 10px;
    min-height: 200px;
}
.headings-s h3 {
    font-size: 20px;
    font-weight: 500;
}
.restart-btn {
    background: #f47327;
    color: #fff;
    padding: 3px 14px;
    font-weight: 500;
    font-size: 15px;
    border-radius: 4px;
    box-shadow: 0px 1px 2px #5f5f5f;
}
.buttons-close .new-close {
    background: #f47327;
    padding: 0px 12px;
    border-radius: 3px;
    vertical-align: middle;
}
.buttons-close .new-close {
    background: #f47327; 
    padding: 0px 12px;
    font-size: 18px;
    border-radius: 3px;
    vertical-align: middle;
    margin-left: 5px;
    box-shadow: 0px 1px 2px #5f5f5f;
}
.buttons-close a:hover{ 
background: #e65500!important;
    color: #fff!important;
}
.report {
    display: inline-block;
    width: 100%;
    clear: both;
}
.lines-report h3 {
    font-size: 16px;
    margin-top: 25px;
    font-weight: 500;
	padding-left: 15px;
}
.loop-repeat {
    display: inline-block;
    width: 100%;
    border-bottom: 1px solid #ccc;
    padding-bottom: 5px;
	    margin-top: 10px;

}
.loop-repeat a {
    font-weight: 500;
    font-size: 16px;
}
.loop-repeat a:hover {
    color: #f47327;
} 

	</style>
 <!---<?php include_once("dheader.php");?>  -->

  
<section class="test-container" style="margin-top: 50px">

<div class="container">
<div class="row">
 <div class="col-md-12 back" style="
">
 <h2 class="practice">PRACTICE EXERCISES FOR <?php echo $levelname;?></h2>
</div>
</div>
</div>
</section>
<section class="practice-con">
   <div class="container background">
 <div class="row">
<div class="main-test col-md-12" style="">
  <div class="row">
<div class="col-md-10 col-sm-offset-1">
<div class="top-head">
<div class="row">
<div class="col-sm-10"><p><?php echo $topic_details['topics'];?></p></div> <div class="col-sm-2 text-right"></div>

</div>
</div>

<div class="bottom-section">
	<div class="">
    <div class="col-sm-9">
    <div class="headings-s"> <h3><?php echo $topic_details['topics'];?></h3></div>
    </div>
    <div class="col-sm-3 text-right">
    <div class="buttons-close"><a class="restart-btn" href="<?php echo $pagelink;?>"> <?php echo $button_text;?></a>  <a class="new-close" href="practice.php"><i class="fas fa-times"></i></a></div>
    </div>
    
    
    <div class="report">
    
   <div class="lines-report">
    <?php 
   $querys=mysqli_query($conn,"select * from `practicetestgiven` where `subject_id`='$topicid' and `levelid`='$levelid' and `button`='1'");
   $numrows=mysqli_num_rows($querys); 
    if($numrows>0)
   {?>
   <h3>Test Completion Date</h3>
   <?php }?> 
   <?php 
   $querys=mysqli_query($conn,"select * from `practicetestgiven` where `subject_id`='$topicid' and `levelid`='$levelid' and `button`='1'");
   $numrows=mysqli_num_rows($querys);
   if($numrows>0)
   {
   while($resultset=mysqli_fetch_array($querys))
   { $test_id=base64_encode($resultset['id']);
   $date=$resultset['pdate'];
   ?>
   
    <div class="loop-repeat">
    	<div class="col-sm-6"><a href="practice_results.php?testid=<?php echo $test_id;?>"><?php echo changeToStdDate($conn,$date);?></a> </div>
        <div class="col-sm-6"><a href="practice_results.php?testid=<?php echo $test_id;?>" style="color: #f47327;">Review Your Answers <i class="fas fa-arrow-right"></i></a> </div>
         
    </div>
    <?php } }?>
    </div>
    </div>
     </div>
</div> 

</div> 
  </div>
</div>
   	</div>
   </div>	
</section>    <!--get plan-->


<div class="modal fade" id="startexam" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title"><i data-feather="edit"></i>ISEE MIDDLE #6 <br>
<span>SECTION 1: VERBAL REASONING</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <h3>How do you want to take this section?</h3>

                <div class="row">
                    <div class="col-md-6 text-center"><a href="newexam.html"><img src="img/online.svg" alt=""></a><p>Online</p></div>
                    <div class="col-md-6 text-center"><a href="#"><img src="img/paper.svg" alt=""></a><p>On Paper</p></div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
    <!--footer widget-->
 <?php include_once("footer.php");?>