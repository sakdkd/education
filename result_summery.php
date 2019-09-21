
<?php
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
$userid=$_SESSION['userid'];

if(isset($_GET['id']))
{
 $test_id=$_GET['test'];; 
		 $att_lid=$_GET['id'];

  $decodedid=base64_decode($_GET['id']);   
 
 							$level_details=getTableDetailsById($conn,"levelsubjects",$decodedid);


 			$sub_details_new=getTableDetailsById($conn,"subjects",$level_details['subject_id']);



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
				 $timetaken=$resultset['timetaken'];


$ques_string=$question_id."#".$timetaken;		
		$ques_array[]=$ques_string;
		
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
  
 
  				$test_given=getTableDetailsById($conn,"testgiven",$test_id);
				
 							$sub_details=getTableDetailsById($conn,"subjects",$test_given['subject_id']);

$savedlid=$test_given['levelid'];
if($decodedid==$savedlid)
{
$btn_val=$test_given['button'];
 $testname_id=$test_given['testname'];
}

else
{
	$btn_val=0;
	
	
}

}


//print_r($ques_array);       

$imstring_ques=implode(",",$ques_array);
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
    <style>
    .tab-content>div {
    display: none;
}   
    </style>
    <!-- Standard Favicon -->
    <?php 
	foreach($newarr as $key => $value)
	{
	?>
    <input type="hidden" id="e_arr<?php echo $key;?>" value="<?php  echo $value  ;?>">
    <?php } ?>
        <input type="hidden" id="qattempted" value="<?php  echo $imstring_ques  ;?>">

<?php include_once("dheader.php");?>
    <!-- /.navbar -->
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
	
		    google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
	
      function drawChart() {
		   for(var i=0;i<3;i++)
		   {
			 showchart(i)   
			   
		   }
	  }
	 function showchart(val) 
	 {
		 
		 
	var arr=document.getElementById('e_arr'+val).value;
			

	        var strArray = arr.split(",");
correct=parseInt(strArray[0]);
incorrect=parseInt(strArray[1]);
unattempt=parseInt(strArray[2]);
//unattempt=3;

        var data = google.visualization.arrayToDataTable([
           ['Task', 'Hours per Day'], 
          ['Correct', correct],
          ['incorrect',incorrect],
          ['Unanswered', unattempt], 
        ]);

        var options = {
          pieHole: 0.4,
		     pieSliceText: 'value-percentage',
         'width': 350,
         'height': 400,
         'chartArea': {'width': '100%', 'height': '80%'},
         'legend': {'position': 'bottom'} ,
		// 'color':{'#008000'}  
		  colors: ['#008000', '#CE1818', '#FDBC00', '#f3b49f', '#fd7e14']  
 
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'+val));
	 
        chart.draw(data, options);
	}
      
    </script>
       <script type = "text/javascript">
         google.charts.load('current', {packages: ['corechart']});     
      </script>
    <script language = "JavaScript">
         function drawChartnew() {
			 

var arr=document.getElementById('qattempted').value;
			

	        var strArray = arr.split(",");
		//	alert(strArray);
            // Define the chart to be drawn.
			 var datas=[];
			 var chartsdata=[];
 var Header= ['Year', 'Time'];
 datas.push(Header);
 count=0;
 for (var i = 0; i < strArray.length; i++) {
      var temp=[];
	  var count=count+1;
	  constring=strArray[i];
	  	        var cstring = constring.split("#");
	  qid=cstring[0];
	 // tid= Math.ceil(cstring[1]);
var tid = Math.round( cstring[1] * 10 ) / 10;

      temp.push(count);   
      temp.push(tid);  
     datas.push(temp);
  }
  var data = new google.visualization.arrayToDataTable(datas);

          /*  var data = google.visualization.arrayToDataTable([
               ['Year', 'Asia'],
               ['2012',  900],
               ['2013',  1000],
               ['2014',  1170],
               ['2015',  1250],
               ['2016',  2630]
            ]);*/

            var options = {title: 'Time Chart',vAxis: {
        title: 'Questions',
      
      },hAxis: {
        title: 'Time(sec)',
      
      }}; 

            // Instantiate and draw the chart.
            var chart = new google.visualization.BarChart(document.getElementById('container'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChartnew);
      </script>
<section class="top-head" style="padding:20px 0;">
    

<!--
<h1>Welcome!
</h1>-->
</section>
 
<section class="main-container">


    
           
           
      
              
    
<div class="gray-bg pt-20 pb-50">
        <div class="container">
           <div class="row">
               <div class="col-md-12">
                  <div class="card question-side">
                   <div class="row no-gutters">
                       <!--<div class="col-md-2">
                          <div class="tab  ">
                               <a href="#"><p class="small">SUMMARY</p>
                                   <p>Test <br>Overview</p></a>
                           </div>
                       </div>-->
                       <?php $tab=0;
					   
					   
					   foreach($subject_arr as $sid)
					   { 	$sub_details=getTableDetailsById($conn,"subjects",$sid);
					    
					    ++$tab;
					   
					   $saved_test_details=getdetailsfromUserIdandSubjectId($conn,$userid,$sid);
					   $names=$sub_details['name'];
					   $gtid=$saved_test_details['id'];
					   $level_id=$saved_test_details['levelid'];
				$test_given_details=getTableDetailsById($conn,"testgiven",$gtid);
				$saved_sub_id=$test_given_details['subject_id'];
				//print_r($saved_test_details);
				$buttonvalue=$test_given_details['button'];
				if($saved_sub_id==$sid)
				{
				$addclass="active";	
					
				}
				else
				{
					
					$addclass="";
				}
				
		$viewresult="Start";	
		
if($test_given_details=='')
{
	 
	
	
}

if($gtid!='')
{
	$enlid=base64_encode($level_id);
$urls="result_summery.php?id=$enlid&test=$gtid";
if($buttonvalue==1)
{

$viewresult="Completed";	
	
	
}
if($buttonvalue==3)
{

$viewresult="Continue";	
	
	
}
	
}else
{
 $isee_level=getmainLevelidfromId($conn,$decodedid);
$attache_level_id=getattachedMainLevelidfromSIdLecelId($conn,$sid,$isee_level); 
	$en_attache_level_id=base64_encode($attache_level_id);
//$urls="#";	
	
	$urls="result_summery.php?id=$en_attache_level_id&test=$test_id";
}
if($level_id==$decodedid)
{
	
	$addclass_="active";
	
	
}
else
{
	
	$addclass_="";
	
}
?>
                       <div class="col-md-2">
                           <div class="tab tabing-new <?php echo $addclass_;?>">
                               <a href="<?php echo $urls;?>"><p class="small"><?php echo $viewresult;?></p>
                                   <p><?php echo $tab."" ;?> <?php echo $names;?></p></a>
                           </div>
                       </div>
                       
                       <?php }?>
                    
                   </div>
                   </div>
                    <?php 
				   
				   if($btn_val==1) 
				   {
					 if($sub_details_new['promptbased']!=1)
					 {  
					   ?>
                   <div class="summery-detail">
                      <div class="row">
                          <div class="col-md-12 text-center"><h2>How you did, by difficulty</h2></div>
                      </div>
                       <div class="row">
                           <div class="col-md-4 text-center"><h3>Easy</h3><div id="donutchart0" style="width: 100%; "></div></div>
                           <div class="col-md-4 text-center"><h3>Medium</h3><div id="donutchart1" style="width: 100%; "></div></div>
                           <div class="col-md-4 text-center"><h3>Hard</h3><div id="donutchart2" style="width: 100%; "></div></div>
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
$savedq=GetPausedquestionIdfromTestId($conn,$test_id);

 $totalques1=array_intersect($savedq,$totalques);
 $total_qs=count($totalques1); 
foreach($totalques1 as $quesid)
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
			
			else if(($correct_val==0) && (($incorrect_val!=0)) && (($unanswered_val==0)))
{
	$left_radius3="border-top-left-radius: 10px;border-bottom-left-radius: 10px;";  

		$right_radius3="border-top-right-radius: 10px;border-bottom-right-radius: 10px;";
	
	
} 
			else if(($correct_val==0) && (($incorrect_val!=0)))
{ 
			//edited on 21-05-19//$left_radius3="border-top-left-radius: 10px;border-bottom-left-radius: 10px;";

			$right_radius3="border-top-right-radius: 10px;border-bottom-right-radius: 10px;";	

	
}  



			
			else
			{
						//$left_radius3="border-top-left-radius: 10px;border-bottom-left-radius: 10px;";  

		$right_radius3="border-top-right-radius: 10px;border-bottom-right-radius: 10px;";	
	
				
			}
			
			
			
		}
		
				else if(($correct_val==0) && (($incorrect_val!=0)))
{
			$left_radius3="border-top-left-radius: 10px;border-bottom-left-radius: 10px;";

			$right_radius3="border-top-right-radius: 10px;border-bottom-right-radius: 10px;";	

	
}
else if(($correct_val==0) && (($unanswered_val==0)))
{
			$left_radius3="border-top-left-radius: 10px;border-bottom-left-radius: 10px;";

			//$right_radius3="border-top-right-radius: 10px;border-bottom-right-radius: 10px;";	

	
}
						?>
                         
                         
                         
                         <div class="col-md-12">
                             <div class="meter"> 
                                   <div class="row">
                                         <div class="col-md-4 offset-1">
                                           <div class="text-right "><div class="sentence"><?php echo ucfirst($topic_name);?></div></div>
                                       </div>
                                       <div class="col-md-6" style="width:33%">
                                          <!-- <div class="yellow-bar" ></div>-->
               <div class="progress-bar" style="width: 100%;background: #999;height: 20px;display: inline-block;border-radius: 10px;">
                                        <a href="viewresult.php?testid=<?php echo base64_encode($test_id);?>&type=<?php echo base64_encode(1);?>&testtype=main&topic=<?php echo base64_encode($t_id);?>">  <?php if($correct_val>=1){?>  <div class="first" style="background:green; width:<?php echo $correct_width;?>%;float:left;height:20px;<?php echo $left_radius1.$right_radius1;?>"><?php echo $correct_val;?></div> <?php }?></a>
                                           <a href="viewresult.php?testid=<?php echo base64_encode($test_id);?>&type=<?php echo base64_encode(2);?>&testtype=main&topic=<?php echo base64_encode($t_id);?>"> <?php if($unanswered_val>=1){?> <div class="second" style="background:#fd7e14; width:<?php echo $unanswered_width;?>%;float:left;height:20px;<?php echo $left_radius2.$right_radius2;?>""><?php echo $unanswered_val;?></div> <?php }?></a>
                                          <a href="viewresult.php?testid=<?php echo base64_encode($test_id);?>&type=<?php echo base64_encode(3);?>&testtype=main&topic=<?php echo base64_encode($t_id);?>"> <?php if($incorrect_val>=1){?><div class="third" style="background:#dc3545; width:<?php echo $incorrect_val_width;?>%;float:left;height:20px;<?php echo $left_radius3.$right_radius3;?>""><?php echo $incorrect_val;?></div> <?php }?></a>   
                                           
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
                   
                   <?php }else {?> <div class="gray-bg pt-20 pb-50">
        <div class="container">
           
               <div class="esaay">
                   
                                <input type="hidden" name="btnclickval" value="5" id="btnclickval">

                   <?php 
				  
				  
				  
            $done_questions=GetPausedquestionIdfromTestId($conn,$test_id);
			$done_string=implode(",",$done_questions);
			$question_query=mysqli_query($conn,"select * from `questions` where `id` in ($done_string) and `status`='1' and `view`='1'");
			
		
			
			$numrows=mysqli_num_rows($question_query);
			if($numrows>0)
			{
				while($questionset=mysqli_fetch_array($question_query))
				{
					
					++$q_div;
					
				 $question_id=$questionset['id'];
					
					$user_attmpted_ques=GetUserCorrectAnsFromTidQid($conn,$question_id,$test_id);

				$user_ans=$user_attmpted_ques['answer'];
				
			?> 
                   <div class="essay-question">
</div >
            <hr>
             <h4>Essay</h4>
             

              <textarea id="textbox<?php echo $question_id;?>"  placeholder="Use specific details and examples in your essay response."  class="essay ng-valid ng-touched ng-dirty ng-valid-parse" oninput="settextvalue('<?php echo $question_id;?>')" readonly><?php echo $user_ans;?></textarea>
                                              <input name="allques[]" id="" type="hidden" value="<?php echo $question_id;?>">    
 
              <?php }}?> 
 
               </div>  
                
                
                
           
         
          
    </div>
</div> <?php }?><?php } else if($btn_val==0){?>
                   
                   <div class="summery-detail">
                      <div class="row">
                          <div class="col-md-4 col-sm-offset-4 text-center">
                       <div class="box-start">   
                          <h2>Get Started</h2>
                          
                          
                          <a href="web-app.php?id=<?php echo $att_lid;?>&test=<?php echo $test_id;?>&testtype=practice"><button class="btn btn-success"> Start</button></a></div>
                          </div>
                          
                      </div>
                       
                    
                       
                       
                   </div>
                   
                   <?php } else if($btn_val==3){?>
                   
                   <div class="summery-detail">
                      <div class="row">
                       <div class="col-md-4 col-sm-offset-4 text-center">
                       <div class="box-start">
                        <h2>Get Started</h2>
                        
                        <a href="web-app.php?id=<?php echo $att_lid;?>&test=<?php echo $gtid;?>&testtype=practice"><button class="btn btn-success"> Continue</button></a>
                        </div>
                          </div>
                      </div>
                       
 
                       
                   </div>
                   
                   <?php }?>
                   <?php  if($sub_details_new['promptbased']!=1) 
				   { if($btn_val==1){?> 
                   
                 <div id = "container" style = "width: 100%; height: 300px; margin: 0 auto">
</div>  
<?php } }?>
               </div>
               
           </div>
            
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
    <!--footer widget-->
   <?php include_once("footer.php");?>