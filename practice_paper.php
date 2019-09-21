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

if(isset($_GET['topic_id']))
{
	
	 $topic_id=base64_decode($_GET['topic_id']);
	 	$level_id=base64_decode($_GET['level']); 
		
		 $tid=practestExistence($conn,$userid,$topic_id,$level_id);
				$topic_details=getTableDetailsById($conn,"attachedtopics",$topic_id);
$subb_id=$topic_details['subject_id'];

 			$sub_details_new=getTableDetailsById($conn,"subjects",$subb_id);

		$question_total=noOfquestionfromtopicidandlevel($conn,$topic_id,$level_id);
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
 <input type="hidden" id="timer" value="<?php echo $timer;?>"> 

<section class="main-container" style="margin-top: 100px">

	<?php 
	 $question_query=mysqli_query($conn,"select * from `questions` where `topic_id`='$topic_id'  and `difficulty`='$level_id' and `status`='1' and `view`='1' order by rand() limit 0,$question_total");
			$q_div=0;
		$numrows=mysqli_num_rows($question_query);
			if($numrows>0)
			{?>
                <form method="post" id="myForm" action="practice_action.php" name="myForm">
      				<input type="hidden" id="lastclicked" name="lastclicked" value="1">   
      				<input type="hidden" id="pastclickedval" name="pastclickedval" value="1">   

     
	 
	        
    
<div class="gray-bg pt-20 pb-50">
        <div class="container">
            <div class="wraper-box">
            
               <div class="upper-box-wrapper">
        <div class="row align-items-center">
            <div class="col-md-9">
                <div class="wrapper-title">
                    <h3><?php echo $levelname;?> </h3>    
                    <h1>SECTION : <?php echo $topic_details['topics'];?></h1>
                </div>
            </div>
           <div class="col-md-3">
                <div class="time-wrapper">
                      
                       
                    <div class="time-button">
                        <button class="btn" name="pause" type="submit" onclick="myformsubmit(0)"><i class="fa fa-pause" style="font-size: 12px"></i> Pause Section</button>
                        <button class="btn" type="submit" name="end" onclick="myformsubmit(1)" ><i class="fa fa fa-stop" style="font-size: 12px"></i> End Section</button>
                    </div>
                </div>
            </div> 
            
        </div>   
</div>
           
               <div class="pages">

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
            
            <div class="next-prev-question d-flex justify-content-end">
                    <button class="btn btn-default" onclick="pracquestionvisibility(1)" type="button" disabled id="prev_btn">Prev. Question</button>
                    <button type="button" class="btn btn-success" onclick="pracquestionvisibility(2)" id="next_btn" <?php echo $next_class;?>>Next Question</button>
                                        

                    <input type="hidden" name="question_value" id="question_value" value="1">
                </div> 
                
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
			
		
			$question_query=mysqli_query($conn,"select * from `questions` where `topic_id`=$topic_id and `difficulty`='$level_id' and `status`='1' and `view`='1' order by rand() limit 0,$question_total");
			
			$q_div=0;
			
		
		$numrows=mysqli_num_rows($question_query);
			if($numrows>0)
			{
				while($questionset=mysqli_fetch_array($question_query))
				{
					
					++$q_div;
					
				 $question_id=$questionset['id'];
					$user_attmpted_ques=GetUserPracticeCorrectAnsFromTidQid($conn,$question_id,$tid);
if($user_attmpted_ques['buttonval']!=1)
				{
				$user_ans=$user_attmpted_ques['answer'];
				}
				else
				{
					$user_ans='';
					
				}					if($q_div==1)
					{
						
					$added_class="active";	
						
					}
					else
					{
						
										$added_class="";	
	
						
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
                           <li><span class="click-btn"><input name="radio1<?php echo $question_id;?>" id="Q<?php echo $question_id;?>1" type="radio" value="1" class="" onclick="setanswer('1','<?php echo $question_id;?>')" <?php if($user_ans==1){?> checked <?php }?>></span> <span class="check"><?php echo $questionset['option1'];?></span></li>
                            <li><span class="click-btn"><input name="radio1<?php echo $question_id;?>" id="Q<?php echo $question_id;?>2" type="radio" value="2" onclick="setanswer('2','<?php echo $question_id;?>')"  <?php if($user_ans==2){?> checked <?php }?>></span> <span class="check"><?php echo $questionset['option2'];?></span></li>
                            <li><span class="click-btn"><input name="radio1<?php echo $question_id;?>" id="Q<?php echo $question_id;?>3" type="radio" value="3" onclick="setanswer('3','<?php echo $question_id;?>')"  <?php if($user_ans==3){?> checked <?php }?>></span> <span class="check"><?php echo $questionset['option3'];?></span></li>
                            <li><span class="click-btn"><input name="radio1<?php echo $question_id;?>" id="Q<?php echo $question_id;?>4" type="radio" value="4" onclick="setanswer('4','<?php echo $question_id;?>')"  <?php if($user_ans==4){?> checked <?php }?>></span> <span class="check"><?php echo $questionset['option4'];?></span></li>
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
                                           <input name="savedtime" id="savedtime" type="hidden" value="">    

<input name="mainActiveques" id="mainActiveques" type="hidden" value="<?php echo $mainActiveques;?>">   
                       <input name="test_name" id="" type="hidden" value="Practice">
                        
  
           </div>
           
         <?php } else {?>
         
        <div class="gray-bg pt-20 pb-50">
        <div class="container">
           
               <div class="esaay">
                   

                   <?php 
				   
          	$question_query=mysqli_query($conn,"select * from `questions` where `topic_id`=$topic_id and `difficulty`='$level_id' and `status`='1' and `view`='1' order by rand() limit 0,$question_total");
		
			
			$numrows=mysqli_num_rows($question_query);
			if($numrows>0)
			{
				while($questionset=mysqli_fetch_array($question_query))
				{
					
					++$q_div;
					
				 $question_id=$questionset['id'];
					
					$user_attmpted_ques=GetUserPracticeCorrectAnsFromTidQid($conn,$question_id,$tid);
if($user_attmpted_ques['buttonval']!=1)
				{
				$user_ans=$user_attmpted_ques['answer'];
				}
				else
				{
					$user_ans='';
					
				}					if($q_div==1)
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
             

              <textarea id="textbox<?php echo $question_id;?>"  placeholder="Use specific details and examples in your essay response."  class="essay ng-valid ng-touched ng-dirty ng-valid-parse" oninput="settextvalue('<?php echo $question_id;?>')"><?php echo $user_ans;?></textarea>
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
       
         
         <?php }?>
          
    </div>
    </div>
    
    
    
      <?php 
	  
	 
			$question_query=mysqli_query($conn,"select * from `questions` where `topic_id`=$topic_id and `difficulty`='$level_id' and `status`='1' and `view`='1' limit 0,$question_total");
			$q_div=0;
			$numrows=mysqli_num_rows($question_query);
			if($numrows>0)
			{
				while($questionset=mysqli_fetch_array($question_query))
				{

$q_div++;
			
					
				$question_ids=trim($questionset['id']);
				$user_attmpted_ques1=GetUserPracticeCorrectAnsFromTidQid($conn,$question_ids,$tid);
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


 <input name="topicid" id="" type="hidden" value="<?php echo $topic_id;?>">    
                                 <input name="levelid" id="" type="hidden" value="<?php echo $level_id;?>">   

   </form> 
   <?php }?>
     
</section>    

    <!--get plan-->

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