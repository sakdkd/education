<?php
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
$page="web-app.php";
$userid=$_SESSION['userid'];
$tbname="orders";
$order_id=$_SESSION['orderid'];
$packages_id=$_SESSION['packid'];  
 $stime=$_SESSION['stime']; 
unset($_SESSION['stime']);
$order_details=orderidbyUserid($conn,$userid);

if($order_id=="")

{

  $order_id=$order_details['id'];
 $package_arr=getBoughtPackagefromOid($conn,$order_id);

}
else
{
	$package_arr[]=$packages_id;
	
	
}
 $order_list_details=getSingleBoughtPackagefromOid($conn,$order_id);
if(isset($_GET['did'])){      

	 $did=base64_decode($_GET['did']); 

$tab_details=getTableDetailsById($conn,$table,$id);
		$insQry=mysqli_query($conn,"Update   `testgiven` set `button`='0'  where`id` = '$did'");

	if($insQry){

		//	updatelogs($conn,3,$buid,$buid,1,$projtype);

		$insQry=mysqli_query($conn,"Update   `testattempted` set `button`='0'  where`testid` = '$did'");

		header("location:$page");

	}else{

		header("location:$page");

	}



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
    <!-- Standard Favicon -->
 <?php include_once("dheader.php");   ?>  

 
<section class="main-container">

 
<div class="gray-bg pt-50 pb-50">
        <div class="container">
            <div class="wraper-box"><div class="row">
                <div class="col-md-8">
                       <div class="section-left">
                           <h2>Your Tests</h2>
                           
                           
                           
                                               <!--<div class="card">
                                               <?php if($trial_val==1){ ?>
                            <div id="accordion">
                            
                            <?php 
							$mini_query=mysqli_query($conn,"select * from `minitestid` where `view`='1' and `status`='1'"); 
						 $numrows=mysqli_num_rows($mini_query);
							if($numrows>0)
							{ $created_id="collapse#".
							$fetch_mini=mysqli_fetch_assoc($mini_query);
							$created_id="collapse".$fetch_mini['id'];
							$m_id=$fetch_mini['id'];
      $test_name=$fetch_mini['name'];
	  $levelcount= count(Getmainrecordids($conn,$m_id));
	 $count_by_tid=getMinitestprogress($conn,$m_id,$userid);
	  if($count_by_tid < $levelcount)
	  {
		  
		$pstatus="Unfinished";  
		  
	  }
	  else
	  {
		$pstatus="Finished";    
		  
		  
	  }
	 
							?>
                             <div class="card">
                               <div class="card-header" id="headingOne">
                                 <h5 class="mb-0">
                                   <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $created_id;?>" aria-expanded="true" aria-controls="collapseOne">
                                     <div class="small-title"><?php echo $levelname;?></div>
                                     <div class="big-title"><?php echo $test_name;?> <span class="progress-status"><?php echo $pstatus;?></span></div>
                                     
                                   </button>
                                 </h5>
                               </div>
                           
                               <div id="collapse<?php echo $created_id;?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                 <div class="card-body">
                                 
                                <?php 
							$mini_query=mysqli_query($conn,"select * from `minitest` where `view`='1' and `status`='1' and `level_id`='$m_id'"); 
						  $numrows=mysqli_num_rows($mini_query);
							if($numrows>0)
							{ while($resultset=mysqli_fetch_array($mini_query))
							{     $subject_id=$resultset['subject_id'];
						$minitestid=$resultset['id'];  
							$subjecttab="subjects";
							
							
							$sub_details=getTableDetailsById($conn,$subjecttab,$subject_id);
						$timings=$resultset['timings'];	
						$questions=$resultset['questions'];	
						
						
						 $test_given_details=getminitest_statusfromTestId($conn,$minitestid,$userid,$subject_id);
				//print_r($test_given_details);
						
						$testgid=$test_given_details['id'];
	 $button_val=$test_given_details['button'];
	  $maintid=$test_given_details['id'];
	   
	
	 // $subject_existence=existenceofattachedsubjectfromlevelandSubject($conn,$levelchoosen,$subject_id);
	  $subject_existence=1;
	  if($subject_existence>0)
	  
					{		?> 
                                /// already <div class="rdx complete">
                                       <div class="row align-items-center">
                                               <!--<div class="col-md-2 text-center">
                                                   <div class="time-status"><img src="img/correct.svg" width="40" alt=""></div>
                                               </div>////already
                                               <div class="col-md-2 text-center">
                                                   <div class="time-status"><svg width="60" height="60" viewBox="0 0 66 66" class="circle-progress"><circle cx="32" cy="32" r="28" fill="none" stroke="#e3e3e3" stroke-width="5"></circle><circle cx="32" cy="32" r="28" fill="none" stroke="#3ca499" stroke-width="5" stroke-dasharray="175.929" stroke-dashoffset="176" class="progress__value"></circle></svg><small ng-if="sec.timeRemaining &amp;&amp; sec.status != 5" class="center ng-binding ng-scope"><?php echo $timings;?><br><span>min</span></small></div>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="section-title"><?php echo $sub_details['name'];?></div>
                                                   <sub>0 of <?php echo $questions;?> questions complete</sub>
                                               </div>
                                               <div class="col-md-2 text-center">
                                               <?php if($button_val=='1')
											   {?>
                                               <a href="minisummary.php?id=<?php echo base64_encode($minitestid);?>&test=<?php echo $testgid;?>" data-toggle=""> <div class="view-result"><img src="img/result.svg" width="30" alt=""></div> 
                                                       <sub>View Results</sub></a>
                                                   
                                                       <?php } else if($button_val=='3'){?>
                                                   

                                               <a href="minitest.php?id=<?php echo base64_encode($minitestid);?>&test=<?php echo $maintid;?>&testtype=mini"> <div class="view-result"><img src="img/icons8-play.png" width="30" alt=""></div> 
                                                       <sub>Continue</sub></a>
                                                       
                                                       <?php } else {?>
                                                       
                                                       <a href="minitest.php?id=<?php echo base64_encode($minitestid);?>&test=<?php echo $m_id;?>&testtype=mini" data-toggle=""> <div class="view-result"><img src="img/icons8-play.png" width="30" alt=""></div> 
                                                       <sub>Start</sub></a>
                                                       
                                                       <?php }?>
                                               </div>
                                               
                                                
                                         </div>
                                   </div>   
                                   <?php } } }?>  
                                     
                                     
                                      
                                     
                                       
                                     
                                    
                                 </div>
                               </div>
                             </div>
                             
                             <?php }?>
                             
                             
                           </div>
                           
                           <?php } else {}  ?>
                                               </div>-->
                                
                                
                                
                               <?php 

							   foreach($package_arr as $pack_id)
							   {
							   
							   
							   ?> 
                                
                                <div class="card no-shadow web-app">
                            <div id="accordion">
                            
                            <?php 
	$main_query=mysqli_query($conn,"select `sets` from `edu_pricingqfeatures` where `qfeatureid`='2' and `pricingid`='$pack_id'");
						  $numrows=mysqli_num_rows($main_query);
							if($numrows>0)
							{ 
							$setval_detail=mysqli_fetch_row($main_query);
							
							$setvals=$setval_detail[0];
							$setval=$order_list_details['qty']*$setvals;
							$edupricing_details=getTableDetailsById($conn,"edu_pricing",$pack_id);
$package_lid=$edupricing_details['level_id'];
$leveltable="edu_levels";

$level_details=getTableDetailsById($conn,$leveltable,$package_lid);  

 $levelname=$level_details['name'];
							for($loopval=1;$loopval<=$setval;$loopval++)
							{
							
							//$created_id="collapsenew#".
							$fetch_mini=mysqli_fetch_assoc($mini_query);
							//$created_id="collapse".$fetch_mini['id'];
														$created_id="collapsenew".$loopval;

							$m_id=$loopval;
      $test_name="Practice Test #".$loopval;
	  $level_att_ids=GetLevelSubjectmainidfromLevelid($conn,$package_lid);
							 $levelcount=count($level_att_ids);
	  $count_by_tids=getteststatusfromuseridandtestname($conn,$userid,$loopval);
	  
	  if($count_by_tids < $levelcount)
	  {
		  
		$pstatus="In progress";  
		  
	  }
	  else
	  {
		$pstatus="Finished";    
		  
		  
	  }
	  
	 
							?>
                             <div class="card">
                               <div class="card-header" id="headingOne">
                                 <h5 class="mb-0">
                                   <button class="btn btn-link" data-toggle="collapse" data-target="#collapsenew<?php echo $created_id;?>" aria-expanded="true" aria-controls="collapseOne">
                                     <div class="small-title"><?php echo $levelname;?></div>
                                     <div class="big-title"><?php echo $test_name;?> <span class="progress-status"><?php echo $pstatus;?></span></div>
                                     
                                   </button>
                                 </h5>
                               </div>
                           
                               <div id="collapsenew<?php echo $created_id;?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                 <div class="card-body">
                                 
                                <?php
							$mini_query=mysqli_query($conn,"select * from `levelsubjects` where `view`='1' and `status`='1' and `level_id`='$package_lid'");
						  $numrows=mysqli_num_rows($mini_query);
							if($numrows>0)
							{ while($resultset=mysqli_fetch_array($mini_query))
							{     $subject_id=$resultset['subject_id'];
							$minitestid=$resultset['id'];
							$subjecttab="subjects";
							$num_ques_attempt='0';
							
							
							$sub_details=getTableDetailsById($conn,$subjecttab,$subject_id);
 $promptbased=$sub_details['promptbased'];

						$timings=$resultset['timings'];	
						$questions=$resultset['questions'];	
						
						
						//$test_given_details=gettest_statusfromTestId($conn,$m_id,$userid,$subject_id,$minitestid);
		$test_given_details=gettest_statusfromTestId($conn,$m_id,$userid,$subject_id,$minitestid,$loopval);				 
			$tgid=	$test_given_details['id'];		 
					//print_r($test_given_details);
					$show_v='0';
					if($test_given_details=='')
					{
						$show_v='1';
						
					}
$button_val=$test_given_details['button'];
	 
	   	   $maintestid=$test_given_details['id'];

	   $testgivenid=$test_given_details['id'];
	 
	$num_ques_attempt=getAttemptedQuestionsfromTestId($conn,$testgivenid);
	  if(($button_val==0) || ($button_val==''))
	  {
		  $button_val='0';
		 $num_ques_attempt=0;
	  }
	  
	  $redirection_page="newexam.php";
	  if($promptbased==1)
	  {
		 $redirection_page ="essay.php";
		  
		  
	  }
	 if($sub_details['status']==1)
											   { ?>
							 
                                   <div class="rdx complete">
                                       <div class="row align-items-center">
                                               <!--<div class="col-md-2 text-center">
                                                   <div class="time-status"><img src="img/correct.svg" width="40" alt=""></div>
                                               </div>-->
                                              
                                               
                                               <div class="col-md-2 text-center">
                                                   <div class="time-status"><svg width="60" height="60" viewBox="0 0 66 66" class="circle-progress"><circle cx="32" cy="32" r="28" fill="none" stroke="#e3e3e3" stroke-width="5"></circle><circle cx="32" cy="32" r="28" fill="none" stroke="#3ca499" stroke-width="5" stroke-dasharray="175.929" stroke-dashoffset="176" class="progress__value"></circle></svg><small ng-if="sec.timeRemaining &amp;&amp; sec.status != 5" class="center ng-binding ng-scope"><?php echo $timings;?><br><span>min</span></small></div>
                                               </div>
                                               <div class="col-md-6">
                                                   <div class="section-title"><?php echo $sub_details['name'];?></div>
                                                  <?php if(($button_val=='0') || ($button_val=='3') || ($button_val==''))
											   {?>
                                                  <sub><?php echo $num_ques_attempt;?> of <?php echo $questions;?> questions complete</sub>   
                                                  <?php  } else{?> <sub>Completed</sub><?php }?>
                                               </div>
                                               <?php if($button_val=='1')
											   {?>
                                                                                              <div class="col-md-2 text-center">

                                               <a href="result_summery.php?id=<?php echo base64_encode($minitestid);?>&test=<?php echo $tgid;?>" data-toggle=""> <div class="view-result"><img src="img/result.svg" width="30" alt=""></div> 
                                                       <sub>View Results</sub></a>
                                                    </div> <div class="col-md-2 text-center">
                                                 <a onclick="return confirm('Are you sure you want to reset your test!')" href="<?php echo $page ?>?did=<?php echo base64_encode($maintestid); ?>">  <div class="reset"><img src="img/reset.png" width="35" alt=""></div></a>
                                                   <sub>Reset</sub>
                                               </div>
                                                       <?php } else if($button_val==3){?>
                                                       
                                                         <div class="col-md-2 text-center">

                                               <a href="<?php echo $redirection_page;?>?id=<?php echo base64_encode($minitestid);?>&test=<?php echo $tgid;?>&testtype=practice"> <div class="view-result"><img src="img/icons8-play.png" width="30" alt=""></div> 
                                                       <sub>Continue</sub></a>
                                                    </div> <div class="col-md-2 text-center">
                                                 <a onclick="return confirm('Are you sure you want to reset your test!')" href="<?php echo $page ?>?did=<?php echo base64_encode($maintestid); ?>">  <div class="reset"><img src="img/reset.png" width="35" alt=""></div></a>
                                                   <sub>Reset</sub>
                                               </div>
                                                       
                                                       
                                                       <?php } else {?>
                                                                                                                                                     <div class="col-md-2 text-center">

                                                       <a href="<?php echo $redirection_page;?>?id=<?php echo base64_encode($minitestid);?>&test=<?php echo $m_id;?>&testtype=practice"> <div class="view-result"><img src="img/icons8-play.png" width="30" alt=""></div> 
                                                       <sub>Start</sub></a>
                                                       </div>
                                                       <?php }?>
                                              
                                               
                                                
                                         </div>
                                   </div>   
                                   <?php  } } }?>  
                                     
                                     
                                      
                                     
                                       
                                     
                                    
                                 </div>
                               </div>
                             </div>
                             
                             <?php }}?>
                             
                             
                           </div>
                           
                     
                                               </div>               
                                
                                <?php }?>               
                       </div>     
                </div>
                
                  <?php 
				if($order_id>0)
				{
					if($numrows>0)
					{
					
					?>
                <div class="col-md-4">
                   <div class="summery">
                       <h2>Your Test Prep Timeline</h2>
                        <div class=" section-right card">
                            
                                                        <ul> 
                                                        
                                                        <?php 
														$pcount=count($package_arr);
														if($pcount>0)
														{ 
														foreach($package_arr as $pack_id)
							   { 
                                                        
                       $main_query=mysqli_query($conn,"select `sets` from `edu_pricingqfeatures` where `qfeatureid`='2' and `pricingid`='$pack_id'");
						  $numrows=mysqli_num_rows($main_query);
							if($numrows>0)
							{ 
							
							$level_att_ids=GetLevelSubjectmainidfromLevelid($conn,$package_lid);
							 $levelcount=count($level_att_ids);
							$setval_detail=mysqli_fetch_row($main_query);
							
							$setvals=$setval_detail[0];
							$setval=$order_list_details['qty']*$setvals;
							
							$edupricing_details=getTableDetailsById($conn,"edu_pricing",$pack_id);
$package_lid=$edupricing_details['level_id'];
							for($loopval=1;$loopval<=$setval;$loopval++)
							{
							
							//$created_id="collapsenew#".
							$fetch_mini=mysqli_fetch_assoc($mini_query);  
							//$created_id="collapse".$fetch_mini['id'];
														$created_id="collapsenew".$loopval;
 
							$m_id=$loopval;
      $test_name="#".$loopval;
	  
	  
	$count_by_tid=getteststatusfromuseridandtestname($conn,$userid,$loopval);
	  
	  if($count_by_tid < $levelcount)
	  {
		  
		$pstatus="Unfinished";  
		  
	  }
	  else
	  {
		$pstatus="Finished";    
		  
		  
	  }
	  
	  
	  ?>
                                                            <li>In Progress  <?php echo $levelname." ".$test_name;?>
                                                            <?php echo $pstatus;?></li>

                                                            
															<?php } }}}?>
                                                        </ul>                            
                        </div>
                   </div>
                </div>
                
                <?php } }else{?>
                <div class="col-md-4">
                   <div class="static-div">
                  <h2>UPGRADE YOUR ACCOUNT TO GET THE PRACTICE YOU NEED!</h2>
                  
                  <ul>
                  <li>Full-Length Tests: Online and Printable</li>
                  <li>Complete Score Report</li>
                  <li>Over 2200 Practice Exercises</li>
                  <li>Personalized Prep Plan</li>
                  <li>Premium Video Course</li>
                  <li>Tutor Consultation</li></ul>
                   </div>
                   </div>
                <?php }?>
              
            </div></div>
        </div>
    </div>
    
</section>    
    <!--get plan-->

    <!--recent-blog-->
    <section class="blog_sec" style="display: none">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title text-center">
                        <h3>Our Latest News</h3>
                    </div><!--/.title-->
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                    <div class="owl-carousel" id="blog_slider_owl">
                        <div>
                            <div class="single_blog_in">
                                <div class="card">
                                    <div class="images">
                                        <img src="img/blog1.jpg" alt=""/>
                                        <div class="dates">
                                            <p>Sep 2018</p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h2><a href="#">We design platform for all global customers</a></h2>
                                        <p>Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore.</p>
                                        <ul>
                                            <li>
                                                <p><img src="img/client2.jpg" alt=""/>by <a href="#">Tonmoy Khan</a></p>
                                            </li>
                                            <li><a href="#"><i class="fas fa-bell"></i> 15</a></li>
                                            <li>
                                                <a href="#"><i class="fas fa-comment-alt"></i> 30</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!--/.single_blog_in-->
                        </div>
                        <div>
                            <div class="single_blog_in">
                                <div class="card">
                                    <div class="images">
                                        <img src="img/blog2.jpg" alt=""/>
                                        <div class="dates">
                                            <p>Sep 2018</p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h2><a href="#">Far far away,behind the word mountains, far from</a></h2>
                                        <p>Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore.</p>
                                        <ul>
                                            <li>
                                                <p><img src="img/client2.jpg" alt=""/>by <a href="#">Tonmoy Khan</a></p>
                                            </li>
                                            <li><a href="#"><i class="fas fa-bell"></i> 15</a></li>
                                            <li>
                                                <a href="#"><i class="fas fa-comment-alt"></i> 30</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!--/.single_blog_in-->
                        </div>
                        <div>
                            <div class="single_blog_in">
                                <div class="card">
                                    <div class="images">
                                        <img src="img/blog3.jpg" alt=""/>
                                        <div class="dates">
                                            <p>Sep 2018</p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h2><a href="#">We design platform for all global customers</a></h2>
                                        <p>Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore.</p>
                                        <ul>
                                            <li>
                                                <p><img src="img/client2.jpg" alt=""/>by <a href="#">Tonmoy Khan</a></p>
                                            </li>
                                            <li><a href="#"><i class="fas fa-bell"></i> 15</a></li>
                                            <li>
                                                <a href="#"><i class="fas fa-comment-alt"></i> 30</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!--/.single_blog_in-->
                        </div>
                        <div>
                            <div class="single_blog_in">
                                <div class="card">
                                    <div class="images">
                                        <img src="img/blog2.jpg" alt=""/>
                                        <div class="dates">
                                            <p>Sep 2018</p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h2><a href="#">Far far away,behind the word mountains, far from</a></h2>
                                        <p>Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore.</p>
                                        <ul>
                                            <li>
                                                <p><img src="img/client2.jpg" alt=""/>by <a href="#">Tonmoy Khan</a></p>
                                            </li>
                                            <li><a href="#"><i class="fas fa-bell"></i> 15</a></li>
                                            <li>
                                                <a href="#"><i class="fas fa-comment-alt"></i> 30</a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div><!--/.single_blog_in-->
                        </div>

                    </div><!--/.blog_slider_owl-->
                </div>
            </div>
        </div><!--/.container-->
    </section>
    <!--recent-blog-->
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
 
 
 
 