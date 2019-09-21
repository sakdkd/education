<?php
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
$userid=$_SESSION['userid'];
$tbname="register";
$user_details=getTableDetailsById($conn,$tbname,$userid);
$levelchoosen=$user_details['sid'];
if(isset($_GET['id']))
{
	$test_name=$_GET['test'];;


	$giventestdetails=getTableDetailsById($conn,"testgiven",$test_name);

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
	$question_total=$mini_details['questions'];
	
		$timer=$mini_details['timings'];

	$topicid_arr=getallAttachedIdwithSubId($conn,$subject_id,$levelchoosen);
	
	$topic_imploded_string=implode(",",$topicid_arr);
	$mainActiveques=GetActiveQuesFromTopicId($conn,$topic_imploded_string);
	
}


if(isset($_POST['submit']))
{
	
	extract($_POST);
	$pdate=date("Y-m-d");
			mysqli_query($conn,"BEGIN"); 


$success='0';
$button='1';

	$all=$_POST['allques'];
	
	$imploded=implode(",",$all);
			mysqli_query($conn,"BEGIN");
//echo "INSERT INTO `testgiven`(`userid`, `pdate`, `testname`, `button`, `status`, `view`,`subject_id`) VALUES ('$userid','$pdate','$test_name','$button','1','1')"; die; 
$insquery=mysqli_query($conn,"INSERT INTO `testgiven`(`userid`, `pdate`, `testname`, `button`, `status`, `view`,`subject_id`,`levelid`) VALUES ('$userid','$pdate','$test_name','$button','1','1','$subject_id','$levelids')");

if($insquery)
{
	$lastid=mysqli_insert_id($conn);
	foreach($all as $qi)
	{
		 $answer=$_POST['ans'.$qi]; 
		 if($answer=='')
		 {
			$answer=0; 
			 
		 }
		
				$insquery1=mysqli_query($conn,"INSERT INTO `testattempted`(`testid`, `questionid`, `answer`) VALUES ('$lastid','$qi','$answer')");

	
		if($insquery1)
		{
			
		$success='1';	
			
		}
		
		       
		
	}

}

if($success=='1')
{
	
				mysqli_query($conn,"COMMIT");
		header("location:web-app.php");

	
}

else
{
		header("location:welcome.php?1");

	
	
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
   <?php include_once("dheader.php");?>
    <!-- /.navbar -->
 <input type="hidden" id="timer" value="<?php echo $timer;?>">

<section class="main-container" style="margin-top: 100px">

	<?php $question_query=mysqli_query($conn,"select * from `questions` where `topic_id` in ($topic_imploded_string) and `status`='1' and `view`='1' order by rand() limit 0,$question_total");
			$q_div=0;
			$numrows=mysqli_num_rows($question_query);
			if($numrows>0)
			{?>
                <form method="post" id="myForm" action="form_sub.php?id=3" name="myForm">



<div class="upper-box-wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-9">
                <div class="wrapper-title">
                    <h3>ISEE MIDDLE #6</h3>
                    <h1>SECTION 1: VERBAL REASONING</h1>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="time-wrapper">
                    <div class="time-bar">
                        <div class="time-title">TIME REMAINING</div>
                        <div class="time"><span id="timerss"></span></div>     
                    </div>

                       
                    <div class="time-button">
                        <button class="btn" name="pause" type="submit" onclick="myformsubmit(0)"><i class="fa fa-pause" style="font-size: 12px"></i> Pause Section</button>
                        <button class="btn" type="submit" name="end" onclick="myformsubmit(1)" ><i class="fa fa fa-stop" style="font-size: 12px"></i> End Section</button>
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
                   <ul  id="myTabs" role="tablist" data-tabs="tabs" class="d-flex pagination nav nav-pills">
                   <?php 
				   
				   //question_total
			 for($i=1;$i<=$mainActiveques;$i++)
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
				   
				   
                       <li class=" page-item nav nav-pills <?php echo $added_class_new;?>" id="li<?php echo $i;?>"><a href="#Q<?php echo $i;?>" data-toggle="tab"><?php echo $i;?></a></li>
                       <?php }?>
                   </ul>
               </div>
           </div>
      
              
    
<div class="gray-bg pt-20 pb-50">
        <div class="container">
            <div class="container"><div class="next-prev-question d-flex justify-content-end">
                    <button class="btn btn-default" onclick="questionvisibility(1)" type="button" disabled id="prev_btn">Prev. Question</button>
                    <button type="button" class="btn btn-success" onclick="questionvisibility(2)" id="">Next Question</button>
                    <input type="hidden" name="question_value" id="question_value" value="1">
                </div> </div>  
                
             <input type="hidden" name="btnclickval" value="1" id="btnclickval">
                
                 <div class="tab-content">
            <?php 
			$question_query=mysqli_query($conn,"select * from `questions` where `topic_id` in ($topic_imploded_string) and `status`='1' and `view`='1' order by rand() limit 0,$question_total");
			$q_div=0;
			$numrows=mysqli_num_rows($question_query);
			if($numrows>0)
			{
				while($questionset=mysqli_fetch_array($question_query))
				{
					
					++$q_div;
					
				$question_id=$questionset['id'];
					
					if($q_div==1)
					{
						
					$added_class="in active";	
						
					}
					else
					{
						
										$added_class="";	
	
						
					}
			?> 
           <div class="row tab-content clearfix tab-pane fade <?php echo $added_class;?>" id="Q<?php echo $q_div;?>" role="tabpanel" >
               <div class="col-md-12">
                  <div class="card question-side">
                   <div class="row " id="">
                       <div class="col-md-8">
                           <div class="qustion-box">
                             <p><?php echo $questionset['question'];?></p>
                               
                           </div>
                       </div>
                       <div class="col-md-4 orange-bg">
                           <div class="answer-gray-bg">
                       <ul>
                           <li>
                           <!--<span class="check"></span>-->
                           <label><input name="radio1" id="Q<?php echo $question_id;?>1" type="radio" value="1" class="" onclick="setanswer('1','<?php echo $question_id;?>')"><span>A</span> <?php echo $questionset['option1'];?></label>

                           </li>
                            <li>
                           <!-- <span class="check"></span>-->
                            <label><input name="radio1" id="Q<?php echo $question_id;?>2" type="radio" value="2" onclick="setanswer('2','<?php echo $question_id;?>')"><span>B</span> <?php echo $questionset['option2'];?></label>
                            </li>
                            <li>
                            
                         <!--   <span class="check"></span>-->
                            <label><input name="radio1" id="Q<?php echo $question_id;?>3" type="radio" value="3" onclick="setanswer('3','<?php echo $question_id;?>')"><span>C</span> <?php echo $questionset['option3'];?></label>
                            
                            </li>
                            <li>
                           <!-- <span class="check"></span>-->
                            
                            <label><input name="radio1" id="Q<?php echo $question_id;?>4" type="radio" value="4" onclick="setanswer('4','<?php echo $question_id;?>')"><span>D</span><?php echo $questionset['option4'];?> </label>
                            
                            </li>
                       </ul>
                                   <input name="option<?php echo $q_div;?>" id="option<?php echo $q_div;?>" type="hidden" value="<?php echo $question_id;?>">    

                                 <input name="allques[]" id="" type="hidden" value="<?php echo $question_id;?>">    


                   </div>
                       </div>
                   </div>
                   </div>
               </div>
               
           </div>
           
           <?php } } else{?> 
           
           
           
           <?php }?>
                         <input name="question_total" id="question_total" type="hidden" value="<?php echo $question_total;?>">    
        
                       <input name="test_name" id="" type="hidden" value="<?php echo $test_name;?>">
                        
    <input name="subject_id" id="" type="hidden" value="<?php echo $subject_id;?>">

    <input name="levelids" id="" type="hidden" value="<?php echo $levelids;?>">

           </div>
           
         
          
    </div>
    </div>
      <?php 
			$question_query=mysqli_query($conn,"select * from `questions` where `topic_id` in ($topic_imploded_string) and `status`='1' and `view`='1' limit 0,$question_total");
			$q_div=0;
			$numrows=mysqli_num_rows($question_query);
			if($numrows>0)
			{
				while($questionset=mysqli_fetch_array($question_query))
				{
					
			
					
				$question_ids=trim($questionset['id']);
					
					
			?>  
            
             <input name="ans<?php echo $question_ids;?>" id="Ans<?php echo $question_ids;?>" type="hidden" value="">     
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
	
	 
	 myformsubmit(0);

	
}


function myformsubmit(val)
{ 
	document.getElementById('btnclickval').value=val;
	window.location='form_sub.php?id='+val;
}
    </script>