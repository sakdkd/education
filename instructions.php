<?php
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
$userid=$_SESSION['userid'];
 $stime=$_SESSION['stime']; 

$tbname="register";
$user_details=getTableDetailsById($conn,$tbname,$userid);
$levelchoosen=$user_details['sid'];

$packages_id=$_SESSION['packid']; 
$appndstring= $_SERVER["QUERY_STRING"];

$levelchoosen=getLastItemBoughtFromUserId($conn,$userid); 
if($packages_id!='')
{
	$levelchoosen=getColoumnNameByIdtableval($conn,"level_id","edu_pricing",$packages_id);
	
	
	
}
 $start_time=time();
if(isset($_GET['id']))
{
	$test_names=base64_decode($_GET['test']);
	$mini_id=base64_decode($_GET['id']);
	
	$maintest_id=getExistenceofTestIdWithPracticeIdLidNew($conn,$test_names,$mini_id,$userid);
	
								$sub_details=getTableDetailsById($conn,"testgiven",$maintest_id);
//print_r($sub_details);
	if($sub_details['button']==3)
	{
		
		$button_text="Resume";

	}
	else
	{
				$button_text="Start";

		
	}
	

//$test_name1=getExistenceofTestIdWithPracticeIdLid($conn,$test_name,$mini_id,$userid);
//if($test_name=='')
//{
	//	$test_name=$_GET['test'];;

	
//}
		//$test_given_details=gettest_statusfromTestId($conn,$m_id,$userid,$subject_id,$minitestid,$test_name);	

//	$giventestdetails=getTableDetailsById($conn,"testgiven",$test_name);

$giventestdetails=gettestDetailsfromTestIduidandlid($conn,$userid,$mini_id,$test_names);
	

	//print_r($giventestdetails);  
//	$test_name=$giventestdetails['id'];
	$test_name=$test_names;
	if($test_name=="")
	{
		$test_name=$test_names;
		
	}
if($giventestdetails!='')
{
	if($giventestdetails['button']==3)
	{
	$setvalue='3';
	}
	else
	{
		
	$setvalue='0';	
	
	}
	
	$maintids=GetTest_idFromUIdTidforPause($conn,$userid,$test_name);
	$paused_qid=GetPausedquestionIdfromTestId($conn,$maintids);
		$paused_qid_string=implode(",",$paused_qid);

}    

else
{
$setvalue='0';	
	
}
		$testtype=$_GET['testtype'];
		if($testtype=="mini")
		{
	$tbname="minitest";
		}
		
		else
		{
			
			$tbname="levelsubjects";
	
			
		}
	$mini_id=base64_decode($_GET['id']);
	$levelids=$mini_id;
	$mini_details=getTableDetailsById($conn,$tbname,$mini_id);
	
 $subject_id=$mini_details['subject_id']; 
 
 $sub_details=getTableDetailsById($conn,"subjects",$subject_id);
 $promptbased=$sub_details['promptbased'];
 $subnames=$sub_details['name'];
	$question_total=$mini_details['questions'];
	if($giventestdetails['button']==3)
	{
	 $timer=$giventestdetails['savedtime'];	
	}
	else
	{
	 	$timer=$mini_details['timings']; 
	}
	
	
	$topicid_arr=getallAttachedIdwithSubId($conn,$subject_id,$levelchoosen);
	
	$topic_imploded_string=implode(",",$topicid_arr);
	$mainActiveques=GetActiveQuesFromTopicId($conn,$topic_imploded_string);
	
	if($setvalue==3)
	{
		
		$paused_qid=GetPausedquestionIdfromTestId($conn,$test_name);
	$mainActiveques=count($paused_qid);
		
	}
	
	$question_query=mysqli_query($conn,"select * from `assignquestion` where `topic_id` in ($topic_imploded_string) and `prid`='$test_name' and `status`='1'");
			while($questionset=mysqli_fetch_array($question_query))
				{
					$main_table_qids[]=$questionset['qid'];
				}
				$countassignedques=count($main_table_qids);
			$assignedquesid=implode(',',$main_table_qids);	
			
			
			
			$mainActiveques=mysqli_num_rows(mysqli_query($conn,"select * from `questions` where `id` in ($assignedquesid) and `status`='1' and `view`='1'"));
}


//$mainActiveques=$displayques; 
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
    
    <style>
    .tab-content>div {
    display: none;
}  
ul#myTabs1 { 
    margin: 0;
} 
        
        
  
    </style>
 
    <title>BOSH Education | ISEE</title>
    <!-- Standard Favicon -->
   <?php include_once("dheader.php");?>
    <!-- /.navbar -->
 <input type="hidden" id="timers" value="<?php echo $timer;?>"> 

<section class="main-container">

	<?php 
	
	
	//echo "select * from `questions` where `topic_id` in ($topic_imploded_string) and `status`='1' and `view`='1' order by rand() limit 0,$question_total";
	$question_query=mysqli_query($conn,"select * from `questions` where `topic_id` in ($topic_imploded_string) and `status`='1' and `view`='1' order by rand() limit 0,$question_total");
			$q_div=0;
			$numrows=mysqli_num_rows($question_query);
			if($numrows>0)
			{?>
                <form method="post" id="myForm" action="form_sub.php?id=3" name="myForm">
      				<input type="hidden" id="lastclicked" name="lastclicked" value="1">   
      				<input type="hidden" id="pastclickedval" name="pastclickedval" value="1">   

     
	 
	        
    
<div class="gray-bg pt-20 pb-50">
<div class="container">

    
<div class="wraper-box que-paper-a white-bg">
<div class="upper-box-wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-9">
                <div class="wrapper-title">
                    <h3><?php echo $levelname;?> </h3>    
                    <h1>SECTION 1: <?php echo $subnames;?></h1>
                </div>
            </div>
            
            
        </div>   
    </div>
</div>
           
        <div class="">
        
    
           
           <div class="pages">
<!--                              <ul  id="myTabs" role="tablist" data-tabs="tabs" class="d-flex pagination nav nav-pills">
-->
                   
               </div>
            
                
 <div class="section-instruction">
                 <h1>  Section Instructions</h1>
                    <p>For this section, read each question and choose the best answer from the four listed answer choices. You may write on scratch paper but you may not use a calculator. For each answer you choose, click the corresponding bubble on the right side of the screen.</p> 
                     </div>
                     
                 <div class="tab-content">
             
          
            
           <div class="active" id="Q<?php echo $q_div;?>"  >
               <div class="col-md-9">
                  <div class="card question-side">
                   <div class="row " id="">
                       <div class="col-md-8">
                           <div class="qustion-box">
                             <p>1. What is the value of the expression 2(4 + 1) ?</p>
                               

                           </div>
                       </div>
                       <div class="col-md-4 orange-bg">
                           <div class="answer-gray-bg">
                       <ul>
                       <li>
                       <label><input name="radio1" type="radio" value="1" class=""><span class="option-click">A</span> 10</label>
                         
                       </li>
                          <!-- <li ><span class="click-btn">
                                                    
                           </span></li>-->
                            <li>
                       <label><input name="radio1" type="radio" value="1" class=""><span class="option-click">B</span> 12</label>
                         
                       </li>
                            
                            <li>
                       <label><input name="radio1" type="radio" value="1" class=""><span class="option-click">C</span> 16</label>
                         
                       </li>
                            
                            
                            
                            <li>
                       <label><input name="radio1" type="radio" value="1" class=""><span class="option-click">D</span> 26</label>
                         
                       </li>
                       </ul>
                                  
             
 

                   </div>
                       </div>
                   </div>
                   </div>
               </div>
               
               
               <div class="col-md-3">
                   
                   <div class="right-bar">
                       <h2>Section is paused</h2>
                       <div class="time-left">
                           <h3>Remaining Time</h3>
                           <div class="times"><?php echo $timer;?>:00</div>
                       </div>
                         <a href="<?= $baseurl;?>/newexam.php?<?=$appndstring;?>"  ><button class="btn" type="button"><?=$button_text;?> section</button></a>
                           
                           <div class="instruction">
                               <p>To restart the section in a different mode, you must reset the section first.</p>
                           </div>
                           
                   </div>
                   
               </div>
               
               
           </div>
          
           
              <input name="question_total" id="question_total" type="hidden" value="<?php echo $question_total;?>">    
                                           <input name="savedtime" id="savedtime" type="hidden" value="">    

<input name="mainActiveques" id="mainActiveques" type="hidden" value="<?php echo $mainActiveques;?>">   
                       <input name="test_name" id="" type="hidden" value="<?php echo $test_name;?>">
                         
    <input name="subject_id" id="" type="hidden" value="<?php echo $subject_id;?>">

    <input name="levelids" id="" type="hidden" value="<?php echo $mini_id;?>">   
				                             <input type="hidden" id="testNameid" value="<?=$test_names;?>"> 

<input type="hidden" id="LEvel_ids" value="<?=$mini_id;?>"> 
           </div>
           
           
        <div class="instruction2">
                <div class="row">
                        <div class="col-md-12">
                       <h2>Platform Instructions:</h2>
                       <div class="row">
                           <div class="col-md-4">
                               <div class="instruction-box">
                                  <div class="instruction-box-img">
                                        <img src="https://iseepracticetest.com/web-app/images/icons/highlight1.png" alt="">
                                   </div>
                                   <div class="instruction-box-in">
                                       <h4>Highlight</h4>
                                       <p>Select portions of the question or passage to highlight them.</p>
                                   </div>
                               </div>
                           </div>
                           
                           <div class="col-md-4">
                              <div class="instruction-box">
                                    <div class="instruction-box-img">
                                        <img src="https://iseepracticetest.com/web-app/images/icons/eliminate2.png" alt="">
                                    </div>
                                   <div class="instruction-box-in">
                                       <h4>Eliminate</h4>
                                       <p>Select the 'x' next to an answer choice to eliminate it.</p>
                                   </div>
                               </div>
                           </div>
                           
                           <div class="col-md-4">
                               <div class="instruction-box">
                                   <div class="instruction-box-img">
                                       <img src="https://iseepracticetest.com/web-app/images/icons/flag2.png" alt="">
                                   </div>
                                   <div class="instruction-box-in">
                                       <h4>Flag</h4>
                                       <p>Mark the question labels with an orange dot to remember to review them later.</p>
                                   </div>
                               </div>
                           </div>
                       </div>
                                     </div>
                  </div>
           </div>
           
          
    </div>
    </div>
    </div>
 </div>    
    
    
      <?php 
	
	//echo "select * from `questions` where `topic_id` in ($topic_imploded_string) and `status`='1' and `view`='1' limit 0,$question_total";
			//$question_query=mysqli_query($conn,"select * from `questions` where `topic_id` in ($topic_imploded_string) and `status`='1' and `view`='1' limit 0,$question_total");
			if($setvalue==3)
			{
			
			$question_query=mysqli_query($conn,"select * from `questions` where `id` in ($paused_qid_string) and `status`='1' and `view`='1' order by field(`id`,$paused_qid_string)");	
			}
			else
			{
				
			
			$question_query=mysqli_query($conn,"select * from `questions` where `topic_id` in ($topic_imploded_string) and `status`='1' and `view`='1' order by rand() limit 0,$question_total");
			}
			$q_div=0;
			$numrows=mysqli_num_rows($question_query);
			if($numrows>0)
			{
				while($questionset=mysqli_fetch_array($question_query))
				{

$q_div++;
			
					
				$question_ids=trim($questionset['id']);
				$user_attmpted_ques1=GetUserCorrectAnsFromTidQid($conn,$question_ids,$test_name);
				if($user_attmpted_ques1['buttonval']!=1)
				{
				$user_ans1=$user_attmpted_ques1['answer'];
				if($user_ans1==0)
				{
										$user_ans1='';

					
				}
				}
				else
				{
					$user_ans1='';
					
				} 
					
					
			?>  
            
                                      
<?php }}?>   




   </form> 
   <?php }?>
     
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
                    <div class="col-md-6 text-center"><img src="img/online.svg" alt=""><p>Online</p></div>
                    <div class="col-md-6 text-center"><img src="img/paper.svg" alt=""><p>On Paper</p></div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        
       <section class="end-sec" >
 	<div class="container" id="endsection" style="display:none;">
 		<div class="row">
 			<div class="col-md-8 col-md-offset-2 customer1">
 				<h2 class="info-sect">Done with this section?</h2>
 				<p>Please confirm that you would like to end this section.</p>
 				<div class="row">
 				<div class="col-md-1"></div>
 					<div class="col-md-5">
 				<button type="button" class="end-section">End Section</button>
 			</div>
 			 <div class="col-md-5">
 				<button type="button" class="end-section-gray">Return To Section</button>
 			</div>
 			 <div class="col-md-1"></div>

 				</div>
 			</div>
 			

 		</div>
 	</div>
 </section>
   <?php include_once("footer.php");?><script>
      $(function () {
        $('#fetch').bind('submit', function () {
          $.ajax({
            type: 'get',
            url: 'post.php',
            data: $('#fetch').serialize(),
            success: function () {
              alert('form was submitted');
            }
          });
          return false;
        });
      });
	  
	  function submitform()
{
	
	alert("Your time is up!!!");
	document.getElementById('myForm').submit(); 
	// myformsubmit(0);

	
}

 var d = new Date();
  var ntime = d.getTime();
  	document.getElementById('start1').value=ntime; 

function myformsubmit(val)
{ 
    var d = new Date();
  var ntime = d.getTime(); 

 	var lcv=document.getElementById('lastclicked').value;
var getstart=document.getElementById('start'+lcv).value;
effected=(parseInt(ntime)-parseInt(getstart))*0.001;
document.getElementById('effected'+lcv).value=effected
	document.getElementById('btnclickval').value=val;   
//window.location='form_sub.php?id='+val;  

}

function setv(text)
 {alert();
	   confirm(text);

	 
	 
 }
    </script>