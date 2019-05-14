<?php
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
$userid=$_SESSION['userid'];
$tbname="register";

$order_details=orderidbyUserid($conn,$userid);
 $order_id=$order_details['id'];
$package_arr=getBoughtPackagefromOid($conn,$order_id);
$user_details=getTableDetailsById($conn,$tbname,$userid);
//print_r($user_details);
$levelchoosen=$user_details['sid']; 
$trial_val=$user_details['trial'];
$leveltable="edu_levels";
$level_details=getTableDetailsById($conn,$leveltable,$levelchoosen);

$sub_arr=GetLevelSubjectmainidfromLevelid($conn,$levelchoosen);
   $imploded_sub_str=implode(",",$sub_arr);
 
 $subtype_arr=getSubidfromAttid($conn,$imploded_sub_str);
    $imploded_subtype_str=implode(",",$subtype_arr);

 
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

    <title>Home</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Standard Favicon -->
 <?php include_once("dheader.php");?>  
 

  
<section class="test-container" style="margin-top:50px">
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
<?php include_once("sidebar.php");?>

<div class="col-md-9">
<div class="result-data">
<div id="loaders"></div> 

<div class="row" id="all_topic_div">

<?php 

$selq=mysqli_query($conn,"select * from `attachedtopics` where `attachedid` in ($imploded_sub_str) and `status`='1' and `view`='1'");

$numrows=mysqli_num_rows($selq);
if($numrows>0)
{
	
	while($resultset=mysqli_fetch_array($selq))
	{    $topicid=$resultset['id'];
	
	
	$difficulty_arr=getlevelsfromquestionfromtid($conn,$topicid);
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
		<!--<span class="small pull-left ng-binding">Completed On:<br>10/20/18 1:00:34</span>-->
		<a class="btn btn-primary pull-right ng-view" href="<?php echo $page_link;?>">View</a>
	</div>
	</div>
	</div>
    <?php } }}?>
    
	

	</div>

</div>
</div>
  </div>
</div>
   	</div>
   </div>	
</section>    <!--get plan-->

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