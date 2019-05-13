
<?php
ob_start();
session_start();
include_once('../db_class/dbconfig.php');
include_once('../db_class/hr_functions.php');
$userid=$_SESSION['userid'];

if(isset($_GET['id']))
{
	$test_id=$_GET['test'];;
  $decodedid=base64_decode($_GET['id']);   
 
 							$level_details=getTableDetailsById($conn,"levelsubjects",$decodedid);

$attachedlevelid=$level_details['level_id'];
								$subject_arr=GetSubjectsidsfromLevelid($conn,$attachedlevelid);
	
	$selects=mysqli_query($conn,"select * from `testattempted` where `testid`='$test_id'");
	 $numrows=mysqli_num_rows($selects);
	
	if($numrows>0)
	{
				 $toipc_arr=array();

	while($resultset=mysqli_fetch_array($selects))
	{
		
		 $question_id=$resultset['questionid'];
		$user_answer=$resultset['answer'];
		
		 $difficulty=getdifficultyfromQId($conn,$question_id);
		 $question_details=getTableDetailsById($conn,'questions',$question_id);
		  $topic_id=$question_details['topic_id']; 
		 if(!in_array($topic_id,$toipc_arr))  
		 {  
			 
			array_push($toipc_arr,$topic_id); 
			
		 }
		 
		if($difficulty=='1')
		{
			
			
			$easy_arr[$question_id]=$user_answer;
			
			
			
		}     
		
		
		else if($difficulty=='2')
		{
			
						$medium_arr[$question_id]=$user_answer;

			
			           
			
		}
		
		else if($difficulty=='3')
		{
			
			
						$high_arr[$question_id]=$user_answer;
  
			
			
		}
		
		
	}
	
	
	
}




//Easy Calculation
 


 $i=0; 
 for($s=1;$s<=3;$s++)
 {
	   $correct=0;
  $incorrect=0;
  $unattmpted=0; 
$easy_string="";
 
 if($s==1)
 {
	 
	$easy_arr=$easy_arr; 
	 
	 
 } if($s==2)
 {
	 
	$easy_arr=$medium_arr; 
	 
	 
 }
  if($s==3)
 {
	 
	$easy_arr=$high_arr; 
	 
	 
 }
   $e_arr=array();
   
   $totalc=count($easy_arr);
foreach($easy_arr as $easy_qid =>$easy_ans)
{  ++$i;

	
	$actual_ans=getAdminanswerfromquestionid($conn,$easy_qid);
	
if($easy_ans!=0)
{
if($actual_ans==$easy_ans)
{
	
  $correct++;
	
	    
	
}

else if($actual_ans!=$easy_ans)
{
	
	  $incorrect++;
	
	    
	
}
	
}
	else
	{
		
	$unattmpted++;	
		
	}

 
 
 
  } 
  
  array_push($e_arr,$correct,$incorrect,$unattmpted); 
  
 
 $easy_string=implode(",",$e_arr);
$newarr[]=$easy_string;



 }
  
}


?>



<div class="summery-detail">
                      <div class="row">
                          <div class="col-md-12 text-center"><h2>How you did, by difficulty</h2></div>
                      </div>
                       <div class="row">
                           <div class="col-md-4">Easy<div id="donutchart0" style="width: 100%; "></div></div>
                           <div class="col-md-4">Medium<div id="donutchart1" style="width: 100%; "></div></div>
                           <div class="col-md-4">Hard<div id="donutchart2" style="width: 100%; "></div></div>
                       </div>
                       
                       <div class="row">
                           <div class="col-md-12">
                               <div class="text-center"><h2 class="title">How you did, by subtype</h2></div>
                           </div>
                           
                            <?php 
									
						  foreach($toipc_arr as $t_id)
						  {  $correct_val=0; 
$incorrect_val=0;
$unanswered_val=0;
						  		 $topics_details=getTableDetailsById($conn,'attachedtopics',$t_id);
$topic_name=$topics_details['topics'];
		
$totalques=getTotalquesfromTopicId($conn,$t_id);
$total_qs=count($totalques);
foreach($totalques as $quesid)
{
$test_attempt_details=GetUserCorrectAnsFromTidQid($conn,$quesid,$test_id);
			 $question_details=getTableDetailsById($conn,'questions',$quesid);
			 			$userans=$test_attempt_details['answer'];			   

			 $correctans=$question_details['correct'];
			 
			 if($userans!=0)
			 { 
			  if($correctans==$userans)
			 {
				
			 	$correct_val++; 
				 
				 
			 }
		
			 
			else  if($correctans!=$userans)
			 {
				
			 	$incorrect_val++; 
				 
				 
			 }
			 }
			 
			 else
			 {
				
			   $unanswered_val++;
			 
			 }
                        
                         
                         }  
						 
						 //green-correct_val
						 //yellow-unanswered_val
						 //red-incorrect_val
						 $main=100/$total_qs;
						

										$incorrect_val_width=$incorrect_val*$main; 
											$correct_width=$correct_val*$main; 
										$unanswered_width=$unanswered_val*$main; 
$left_radius1='';
$left_radius2='';$left_radius3='';
$right_radius1='';$right_radius2='';$right_radius3='';
						if(($correct_val!=0) && (($unanswered_val==0) && ($incorrect_val==0)))
						{
							
							
						$left_radius1="border-top-left-radius: 10px;border-bottom-left-radius: 10px;";
						$right_radius1="border-top-right-radius: 10px;border-bottom-right-radius: 10px;";	
							
						}    
						
						else if(($correct_val!=0) && (($incorrect_val!=0) || ($unanswered_val!=0)))
						{ 
							
							$left_radius1="border-top-left-radius: 10px;border-bottom-left-radius: 10px;";

							if(($unanswered_val!=0) &&($incorrect_val==0))
							{
								
								$left_radius2="";
								$right_radius2="border-top-right-radius: 10px;border-bottom-right-radius: 10px;";	

								
								
							}
							if($incorrect_val!=0)
							{								

								
								$left_radius3="";
								$right_radius3="border-top-right-radius: 10px;border-bottom-right-radius: 10px;";	

								
								
							}
							
							
						}
						
		else if(($correct_val==0) && (($unanswered_val!=0) || ($incorrect_val!=0)))
		{ 
			$left_radius1="";
			$right_radius1="";
		$left_radius2="border-top-left-radius: 10px;border-bottom-left-radius: 10px;";
			if(($unanswered_val!=0) &&($incorrect_val==0))
			{ 
				
									$right_radius2="border-top-right-radius: 10px;border-bottom-right-radius: 10px;";	

				
			}   
			else
			{
				
		$right_radius3="border-top-right-radius: 10px;border-bottom-right-radius: 10px;";	
	
				
			}
			
			
			
		}
		
				else if(($correct_val==0) && (($incorrect_val!=0)))
{
			$left_radius3="border-top-left-radius: 10px;border-bottom-left-radius: 10px;";

			$right_radius3="border-top-right-radius: 10px;border-bottom-right-radius: 10px;";	

	
}
						?>
                         
                         
                         
                         <div class="col-md-12">
                             <div class="meter"> 
                                   <div class="row">
                                         <div class="col-md-4 offset-1">
                                           <div class="text-right "><div class="sentence"><?php echo $topic_name;?></div></div>
                                       </div>
                                       <div class="col-md-6" style="width:33%">
                                          <!-- <div class="yellow-bar" ></div>-->
                             <div class="progress-bar" style="width: 100%;background: #999;height: 20px;display: inline-block;border-radius: 10px;">
                                           <div class="first" style="background:green; width:<?php echo $correct_width;?>%;float:left;height:20px;<?php echo $left_radius1.$right_radius1;?>"><?php echo $correct_val;?></div>
                                           <div class="second" style="background:#fd7e14; width:<?php echo $unanswered_width;?>%;float:left;height:20px;<?php echo $left_radius2.$right_radius2;?>""><?php echo $unanswered_val;?></div>
                                           <div class="third" style="background:red; width:<?php echo $incorrect_val_width;?>%;float:left;height:20px;<?php echo $left_radius3.$right_radius3;?>""><?php echo $incorrect_val;?></div> 
                                           
                                           </div>
                                           
                                       </div>
                                   </div>
                              </div>
                         </div>
                         <?php 
                         
                         }
						 
						 ?>   
                           
                                 
                           
                           
                       </div>
                       
                   </div>
                   
                   
                   
                   
                   
                   
                   
                   <?php 
				   
				   
				   
		$arr = array('status' =>1);
		

header('Content-type: application/json');

		echo json_encode($arr); 
				   ?>