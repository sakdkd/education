<?php
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
$userid=$_SESSION['userid'];
$tbname="register";
$user_details=getTableDetailsById($conn,$tbname,$userid);
$levelchoosen=$user_details['sid'];
 $start_time=time();
 
 $previousurl=$_SERVER['HTTP_REFERER'];
$showcommentboxval=1;//hidden field
if(isset($_GET['testid']))
{
	 $encodedtid=$_GET['testid'];
	  $testid=base64_decode($_GET['testid']); 
	  $encodedtype=$_GET['type'];
	 $anstype=base64_decode($_GET['type']);  
	 $testtype=$_GET['testtype'];
	 $entopicid=$_GET['topic'];
	  $topicid=base64_decode($_GET['topic']);  
$topic_details=getTableDetailsById($conn,"attachedtopics",$givenquesdetails['topic_id']);
		$giventestdetails=getTableDetailsById($conn,"practicetestgiven",$testid);
	$subid=$giventestdetails['subject_id'];
	
		$levelid=$giventestdetails['levelid'];
	
			$topic_details=getTableDetailsById($conn,"attachedtopics",$topicid);
			$subtypeid=$topic_details['subtype_id'];
			$subtype_details=getTableDetailsById($conn,"subtype",$subtypeid);
			$ques=getTotalquesfromTopicId($conn,$topicid);
			 $subb_id=$topic_details['subject_id']; 
			 			$sub_details_new=getTableDetailsById($conn,"subjects",$subb_id);
						if($testtype=="mini")
						{
		$ques_arr_arr=getQuesAttemptedforminiWithCorrectAnswer($conn,$testid,$anstype);   
						} 
						else
						{ 
							
								$ques_arr_arr=getMAINQuesAttemptedforminiWithCorrectAnswer($conn,$testid,$anstype);   
	
							
						}

						
						 $totalques1=array_intersect($ques_arr_arr,$ques);
$ques_arr=$totalques1;


if($anstype==1) 
{
	
	foreach($ques_arr as $qids)
	{
		
	 if($testtype=="mini")
						{
					$user_attmpted_ques=GetMiniUserCorrectAnsFromTidQid($conn,$qids,$testid);
						}
						
						else
						{
							$user_attmpted_ques=GetUserCorrectAnsFromTidQid($conn,$qids,$testid);
							
							
						}
						
							
					 			$ques_details_new=getTableDetailsById($conn,"questions",$qids);

		$correct=$ques_details_new['correct'];
		$answer=$user_attmpted_ques['answer'];
		
		if($correct==$answer)
		{
			
			$correct_arr[]=$qids;
			
			
		}
		
	}
$ques_arr=$correct_arr;
	
}

else if($anstype==3)

{
	foreach($ques_arr as $qids)
	{
		
	 if($testtype=="mini")
						{
					$user_attmpted_ques=GetMiniUserCorrectAnsFromTidQid($conn,$qids,$testid);
						}
						
						else
						{
							$user_attmpted_ques=GetUserCorrectAnsFromTidQid($conn,$qids,$testid);
							
							
						}
						
							
					 			$ques_details_new=getTableDetailsById($conn,"questions",$qids);

		$correct=$ques_details_new['correct'];
		$answer=$user_attmpted_ques['answer'];
		
		if(($correct!=$answer) && ($answer!=0))
		{
			
			$correct_arr[]=$qids;
			
			
		}
		
	}
	
$ques_arr=$correct_arr;
	
}


		 $ques_string=implode(",",$ques_arr); 
		$question_total=count($ques_arr);
		// $question_total=1;
		 $mainActiveques=$question_total;
		 if($question_total>1)
		 {
			 
			$next_class="";  
			 
			 
		 }
		 
		 
		 else
		 {
			 
			$next_class="disabled"; 
			 
			 
		 }

}
	

$time_taken=gettimeTakenQuesAttemptedforminiWithCorrectAnswer($conn,$testid,$ques_string); 

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

.roundedOne input[type=checkbox] {
	visibility: hidden;
}

/* ROUNDED ONE */
.roundedOne {
    width: 20px;
    height: 20px;
    background: #fcfff4;
    background: -webkit-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
    background: -moz-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
    background: -o-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
    background: -ms-linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
    background: linear-gradient(top, #fcfff4 0%, #dfe5d7 40%, #b3bead 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fcfff4', endColorstr='#b3bead',GradientType=0 );
    /* margin: 20px auto; */
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
    -webkit-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
    -moz-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
    box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
    position: relative;
}

.roundedOne label {
	cursor: pointer;
	position: absolute;
	width: 20px;
	height: 20px;

	-webkit-border-radius: 50px;
	-moz-border-radius: 50px;
	border-radius: 50px;
	left: 2px;
	top: 2px;
/*
	-webkit-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,1);
	-moz-box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,1);
	box-shadow: inset 0px 1px 1px rgba(0,0,0,0.5), 0px 1px 0px rgba(255,255,255,1);

	background: -webkit-linear-gradient(top, #222 0%, #45484d 100%);
	background: -moz-linear-gradient(top, #222 0%, #45484d 100%);
	background: -o-linear-gradient(top, #222 0%, #45484d 100%);
	background: -ms-linear-gradient(top, #222 0%, #45484d 100%);
	background: linear-gradient(top, #222 0%, #45484d 100%);*/
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#222', endColorstr='#45484d',GradientType=0 );
}

.roundedOne label:after {
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    filter: alpha(opacity=0);
    opacity: 0;
    content: '';
    position: absolute;
    width: 16px;
    height: 16px;
    background: #565656;
    background: #424242;
    background: -moz-linear-gradient(top, #00bf00 0%, #009400 100%);
    background: -o-linear-gradient(top, #00bf00 0%, #009400 100%);
    background: -ms-linear-gradient(top, #00bf00 0%, #009400 100%);
    background: linear-gradient(top, #00bf00 0%, #009400 100%);
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
    top: 0px;
    left: 0px;
    /* -webkit-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5); */
    -moz-box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5);
    /* box-shadow: inset 0px 1px 1px white, 0px 1px 3px rgba(0,0,0,0.5); */
}
.roundedOne label:hover::after { 
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=30)";
	filter: alpha(opacity=30);
	opacity: 0.3;
}
 
.roundedOne input[type=checkbox]:checked + label:after {
	-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
	filter: alpha(opacity=100);
	opacity: 1; 
}    
 
.answer-gray-bg .roundedOne label {
    padding-left: 16px !important;
    font-size: 14px!important;
    color: #222 !important;
    line-height: 14px !important;
    width: 15px!important;
    height: 16px!important;
}
    </style>

    <title>Home</title>
    <!-- Standard Favicon -->
   <?php include_once("dheader.php");?>
    <!-- /.navbar -->
  

<section class="main-container" style="margin-top: 100px">

	<?php 
	
	 			$question_query=mysqli_query($conn,"select * from `questions` where `id` in ($ques_string) and `status`='1' and `view`='1' order by rand() limit 0,$question_total");

			$q_div=0;
	  $numrows=mysqli_num_rows($question_query);   
			if($numrows>0)
			{?>
                <form method="post" id="myForm" action="" name="myForm">



<div class="upper-box-wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-9">
                <div class="wrapper-title">
                    <h3><?php echo $levelname;?> </h3>    
                    <h1><?php echo ucfirst($topic_details['topics']);?></h1>
                </div>
            </div>
           <div class="col-md-3">
                <div class="time-wrapper">
                      
                       
                    <div class="loop-repeat">
                       <a href="<?php echo $previousurl;?>"><i class="fa fa-arrow-left"></i>Back</a>
                    </div>
                </div>
            </div> 
            
        </div>   
    </div>
</div>    
           
           <div class="container">
               <div class="pages">
<!--                              <ul  id="myTabs" role="tablist" data-tabs="tabs" class="d-flex pagination nav nav-pills">
-->
                   <ul  id="myTabs1" role="" data-tabs="" class="d-flex pagination nav nav-pills">
                   <?php 
				   
				   //question_total
			 for($i=1;$i<=$question_total;$i++)
				   				//   for($i=1;$i<=2;$i++)

				   {
					   
					   if($i==1)
					{
						
					$added_class_new="active";	
						
					}
					else
					{
						
										$added_class_new="";	
	
						
					}
				   ?>
				   
                       <li class=" page-item nav nav-pills <?php echo $added_class_new;?>" id="li<?php echo $i;?>" onclick="practiceQuestion('<?php echo $i;?>')"><a href="javascript:void(0)"><?php echo $i;?></a></li>
                       <?php }?>
                   </ul>
               </div>
           </div>
      				<input type="hidden" id="lastclicked" name="lastclicked" value="1">   
      				<input type="hidden" id="pastclickedval" name="pastclickedval" value="1">   

     
	 
	        
    
<div class="gray-bg pt-20 pb-50">
        <div class="container">
            <div class="container"><div class="next-prev-question d-flex justify-content-end">
                    <button class="btn btn-default" onclick="pracquestionvisibility(1)" type="button" disabled id="prev_btn">Prev. Question</button>
                    <button type="button" class="btn btn-success" onclick="pracquestionvisibility(2)" id="next_btn" <?php echo $next_class;?>>Next Question</button>
                                        

                    <input type="hidden" name="question_value" id="question_value" value="1">
                </div> </div>  
                
             <input type="hidden" name="btnclickval" value="5" id="btnclickval">
                 <?php 
			                      if($sub_details_new['promptbased']!=1)
 {?>
                 <div class="tab-content">
            <?php 
			
			//if($setvalue==3)
			//{
		//	echo "select * from `questions` where `id` in ($paused_qid_string) and `status`='1' and `view`='1' order by field(`id`,$paused_qid_string)";
		
			//$question_query=mysqli_query($conn,"select * from `questions` where `id` in ($paused_qid_string) and `status`='1' and `view`='1' order by field(`id`,$paused_qid_string)");	
			//
			
			$question_query=mysqli_query($conn,"select * from `questions` where `id` in ($ques_string) and `status`='1' and `view`='1' order by field(`id`,$ques_string)");
			
			$q_div=0;
			
		
		$numrows=mysqli_num_rows($question_query);
			if($numrows>0)
			{
				while($questionset=mysqli_fetch_array($question_query))
				{
					
					++$q_div;
					
					
					
				 $question_id=$questionset['id'];
				 
				 $correct_ans=$questionset['correct'];
				 if($q_div==1)
					{
						
						$firstqid=$question_id;
						
					}
				 if($testtype=="mini")
						{
					$user_attmpted_ques=GetMiniUserCorrectAnsFromTidQid($conn,$question_id,$testid);
						}
						
						else
						{
							$user_attmpted_ques=GetUserCorrectAnsFromTidQid($conn,$question_id,$testid);
							
							
						}
			$user_ans=$user_attmpted_ques['answer'];
		
									if($q_div==1)
					{
						
					$added_class="active";	
						
					}
					else
					{
						
										$added_class="";	
	
						
					}
				if($anstype==1)
				{
					
					
					
				}
				
				
				
				
				
				
				
					   
			?> 
           
           <div class="<?php echo $added_class;?>" id="Q<?php echo $q_div;?>"  >
               <div class="col-md-12">
                  <div class="card question-side">
                   <div class="row " id="">
                       <div class="col-md-8">
                           <div class="qustion-box">
                             <p><?php echo stripslashes($questionset['question']);?></p>
                               

                           </div>
                       </div>
                       <div class="col-md-4 orange-bg">
                           <div class="answer-gray-bg">
                       <ul>
<!--
  <div class="roundedOne">
	<input type="checkbox" value="None" id="roundedOne" name="check" />
	<label for="roundedOne"></label>
</div>

-->
<?php 


$show_query=mysqli_query($conn,"select * from `answeroption` where `status`='1'");

while($result=mysqli_fetch_array($show_query))
{

$optionid=$result['id'];
$showcolor=""; 

?>

                           <li>
                           <label class="checkmark">
                           <?php echo $questionset['option'.$optionid];?>
                           <input name="radio1<?php echo $question_id;?>" type="checkbox" value="1" <?php if($user_ans==$optionid){ if($user_ans==$correct_ans){$showcolor="green";?>  <?php } else {$showcolor="red";?> <?php } }   if($correct_ans==$optionid){$showcolor="green";?> <?php }?> disabled ><span class="check check1" style="background-color:<?php echo $showcolor;?>"></span>
							   </label>    
							</li>
                            
                            <?php }?>
						
                       </ul>
             
                         <input name="option<?php echo $q_div;?>" id="option<?php echo $q_div;?>" type="hidden" value="<?php echo $question_id;?>">                


                   </div>
                       </div>
                   </div>
                   </div>
               </div>
               
           </div>    
           
           <?php } } else{?> 
           
           
           
           <?php }?>
               <input name="question_total" id="question_total" type="hidden" value="<?php echo $question_total;?>">    
                                           <input name="savedtime" id="savedtime" type="hidden" value="">    

<input name="mainActiveques" id="mainActiveques" type="hidden" value="<?php echo $mainActiveques;?>">   
                       <input name="test_name" id="" type="hidden" value="Practice">          
  
           </div>
           
           <?php } else {    ?>
         
        <div class="gray-bg pt-20 pb-50">
        <div class="container">
           
               <div class="esaay">
                   

                   <?php 
				   
          $question_query=mysqli_query($conn,"select * from `questions` where `id` in ($ques_string) and `status`='1' and `view`='1' order by rand() limit 0,$question_total");
		
			
			$numrows=mysqli_num_rows($question_query);
			if($numrows>0)
			{
				while($questionset=mysqli_fetch_array($question_query))
				{
					
					++$q_div;
					
				 $question_id=$questionset['id'];
					
					$user_attmpted_ques=GetUserPracticeCorrectAnsFromTidQid($conn,$question_id,$testid);

				$user_ans=$user_attmpted_ques['answer'];
									if($q_div==1)
					{
						
					$added_class="active";	
						
					}
					else
					{
						
										$added_class="";	
	
						
					}
			?> 
                   <div class="essay-question"><?php echo stripslashes($questionset['question']);?>
</div >
            <hr>
             <h4>Essay</h4>
             

              <textarea id="textbox<?php echo $question_id;?>"  placeholder="Use specific details and examples in your essay response."  class="essay ng-valid ng-touched ng-dirty ng-valid-parse" oninput="settextvalue('<?php echo $question_id;?>')" readonly><?php echo $user_ans;?></textarea>
 <input name="option<?php echo $q_div;?>" id="option<?php echo $q_div;?>" type="hidden" value="<?php echo $question_id;?>">    
             
                                  <input name="allques[]" id="" type="hidden" value="<?php echo $question_id;?>">  
              <?php }}?> 
                  <input name="savedtime" id="savedtime" type="hidden" value="">    
    <input name="question_total" id="question_total" type="hidden" value="<?php echo $question_total;?>">    
                                           <input name="savedtime" id="savedtime" type="hidden" value="">    

<input name="mainActiveques" id="mainActiveques" type="hidden" value="<?php echo $mainActiveques;?>">   
                       <input name="test_name" id="" type="hidden" value="Practice">
                        
               </div>  
                
                
                
           
         
          
    </div>
    </div>
        <input name="topicid" id="" type="hidden" value="<?php echo $topic_id;?>">    
                                 <input name="levelid" id="" type="hidden" value="<?php echo $level_id;?>"> 
         
         <?php }?>
         
         <?php  
		 if($testtype!="mini")
						{ $givenquesdetails=getTableDetailsById($conn,"questions",$firstqid);


$solution=$givenquesdetails['solution'];
		 
		 ?>
         
            <div class="col-md-8" id="displaysolution">
           	<div class="sol-Box">
           	<h4>Solution</h4>
           	<span><p class="scope"><?php  echo stripslashes($solution);?></p></span>
           </div>
         </div>
         <div class="col-md-4" id="exercisediv">
         <a href="practice.php?topicid=<?php echo $entopicid;?>">
         	<div class="followup">
				<h4>Follow-Up Exercise</h4><span><?php echo $topic_details['topics'];?></span><i aria-hidden="true" class="fa fa-arrow-right"></i></div>
		</a>
         </div>
		<div class="col-md-6" id="clocktimer">
		  	<div class="tile-card icon-card">
		  	<div class="icon-tile">
		  	<i aria-hidden="true" class="fa fa-clock"></i>
		  	</div>
		  	<div class="text-tile">
		  	<div><p>Your Time:&nbsp; <strong class="ng-binding"><?php echo $time_taken;?> sec</strong></p>
		  	</div>
		  	
		  	</div>
		  	</div>
	   </div>
          <div class="col-md-6">
          	<div class="tile-card">
          	<div class="icon-tile"><i aria-hidden="true" class="fa fa-hashtag"></i>
          	</div>
          	<div class="text-tile">
          	<sup>Subtype</sup><strong class="ng-binding"><?php echo $subtype_details['name'];?></strong>
          	</div></div>
         </div>
         
         
         <?php }?>
    </div>
    </div>
    
    

      <?php 
			$question_query=mysqli_query($conn,"select * from `questions` where `id` in ($ques_string) and `status`='1' and `view`='1' order by rand() limit 0,$question_total");
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
             
             <input name="ans<?php echo $question_ids;?>" id="Ans<?php echo $question_ids;?>" type="hidden" value="<?php echo $user_ans1;?>">     <input name="start<?php echo $question_ids;?>" id="start<?php echo $q_div;?>" type="hidden" value=""><input name="end<?php echo $question_ids;?>" id="end<?php echo $q_div;?>" type="hidden" value="">
             <input name="effected<?php echo $question_ids;?>" id="effected<?php echo $q_div;?>" type="hidden" value="">                           
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
 
	document.getElementById('btnclickval').value=val;
//window.location='form_sub.php?id='+val;  

}


    </script>