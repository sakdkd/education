<?php
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
$userid=$_SESSION['userid'];
$tbname="orders";

$order_details=orderidbyUserid($conn,$userid);
 $order_id=$order_details['id'];
$package_arr=getBoughtPackagefromOid($conn,$order_id);
$user_details=getTableDetailsById($conn,$tbname,$userid);

$levelchoosen=$user_details['sid'];
$trial_val=$user_details['trial'];
$leveltable="edu_levels";
$level_details=getTableDetailsById($conn,$leveltable,$levelchoosen);
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
<div class="col-md-3">

<form action="#" class="form-action">
<div class="side-bar">
<h3 class="result">Results (172 exercises)</h3>
<div class="form-group">
<input type="text" placeholder="search by title" class="input-sm">
</div>
</div>
<div class="side-ba">
<div class="form-group">
<label>Subject</label>
<select id="input_subject" class="input-sm ">
<option value="" selected="selected" label=""></option>
	<option>Reading Comprehension</option>
	<option>Verbal Reasoning</option>
	<option>Math &amp; Quantitative</option>
</select>
    </div>
 <div class="form-group">
<label>Subtype</label>
<select id="input_subject" class="input-sm ">
<option value="" selected="selected" label=""></option>
	<option>Sentence Completion</option>
	<option>Synonyms</option>
	<option>Geometry</option>
	<option>Decimals, Percents, Fractions</option>
	<option>Whole Numbers</option>
	<option>Algebraic Concepts</option>
	<option>Measurement</option>
	<option>Data Analysis & Probability</option>
	<option>Number Properties</option>
	<option>Main Idea</option>
	<option>Inference</option>
	<option>Organization/Logic</option>
	<option>Supporting Idea</option>
	<option>Tone/Style/Figurative Language</option>
	<option>Vocabulary</option>
</select>
    </div>
<div class="form-group">
<label>Status</label>
<div class="radio">
      <label><input type="radio" name="optradio" checked>All</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="optradio">In Progress</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="optradio">Completed</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="optradio">Sort by Completion Date</label>
    </div>
 </div>
 <div class="form-group">
<label>Difficulty</label>
<div class="radio">
      <label><input type="radio" name="optradio" checked>All</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="optradio">Easy</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="optradio">Medium</label>
    </div>
    <div class="radio">
      <label><input type="radio" name="optradio">Hard</label>
    </div>
 </div>
</div>
</form>	
</div>
<div class="col-md-9">
<div class="row">
	<div class="col-md-4">
	<div class="inner-box">
	<div class="panel-ribbon">
		 <div class="ribbon"><span>Medium</span></div>
	</div>
		<div class="panel-body">
			<strong class="ng-binding">Complete Reading Passages</strong>
		</div>
	<div class="panel-heading">
		<span class="ng-binding ng-scope"><i class="fa fa-check"></i>&nbsp;&nbsp; 18 / 24 Completed</span>
	</div>
	<div class="panel-body">
		<span class="small pull-left ng-binding">Completed On:<br>10/20/18 1:00:34</span>
		<a class="btn btn-primary pull-right ng-view">View</a>
	</div>
	</div>
	</div>
	<div class="col-md-4">
	<div class="inner-box">
	<div class="panel-ribbon">
	<div class="ribbon"><span>Medium</span></div>
	</div>
		<div class="panel-body">
			<strong class="ng-binding">Inference</strong>
		</div>
	<div class="panel-heading">
		<span class="ng-binding ng-scope"><i class="fa fa-check"></i>&nbsp;&nbsp;6 / 28 Completed</span>
	</div>
	<div class="panel-body">
		<span class="small pull-left ng-binding">Completed On:<br>11/01/18 12:16:51</span>
		<a class="btn btn-primary pull-right ng-view">View</a>
	</div>
	</div>
	</div>
	<div class="col-md-4">
	<div class="inner-box">
	<div class="panel-ribbon">
		<div class="ribbon"><span>Medium</span></div>
	</div>
		<div class="panel-body">
			<strong class="ng-binding">Main Idea</strong>
		</div>
	<div class="panel-heading">
		<span class="ng-binding ng-scope"><i class="fa fa-check"></i>&nbsp;&nbsp;6 / 26 Completed</span>
	</div>
	<div class="panel-body">
		<span class="small pull-left ng-binding">Completed On:<br>10/29/18 7:07:45
</span>
		<a class="btn btn-primary pull-right ng-view">View</a>
	</div>
	</div>
	</div>
	<div class="col-md-4">
	<div class="inner-box">
	<div class="panel-ribbon">
	<div class="ribbon"><span>Medium</span></div>
	</div>
		<div class="panel-body">
			<strong class="ng-binding">Organization/Logic</strong>
		</div>
	<div class="panel-heading">
		<span class="ng-binding ng-scope"><i class="fa fa-check"></i>&nbsp;&nbsp; 12 / 27 Completed</span>
	</div>
	<div class="panel-body">
		<span class="small pull-left ng-binding">Completed On:<br>11/01/18 12:44:04</span>
		<a href="#" class="btn btn-primary pull-right ng-view">View</a>
	</div>
	</div>
	</div>
	<div class="col-md-4">
	<div class="inner-box">
	<div class="panel-ribbon">
		<div class="ribbon"><span>Medium</span></div>
	</div>
		<div class="panel-body">
			<strong class="ng-binding">Tone/Style/Figurative<br> Language</strong>
		</div>
	<div class="panel-heading">
		<span class="ng-binding ng-scope"><i class="fa fa-check"></i>&nbsp;&nbsp;6 / 17 Completed</span>
	</div>
	<div class="panel-body">
		<span class="small pull-left ng-binding">Completed On:<br>10/13/18 1:03:40
</span>
		<a href="#" class="btn btn-primary pull-right ng-view">View</a>
	</div>
	</div>
	</div>
	<div class="col-md-4">
	<div class="inner-box">
	<div class="panel-ribbon">
		<div class="ribbon"><span>Medium</span></div>
	</div>
		<div class="panel-body">
			<strong class="ng-binding">Main Idea</strong>
		</div>
	<div class="panel-heading">
		<span class="ng-binding ng-scope"><i class="fa fa-check"></i>&nbsp;&nbsp;6 / 26 Completed</span>
	</div>
	<div class="panel-body">
		<span class="small pull-left ng-binding">Completed On:<br>10/29/18 7:07:45
</span>
		<a href="#" class="btn btn-primary pull-right ng-view">View</a>
	</div>
	</div>
	</div>
	<div class="col-md-4">
	<div class="inner-box">
	<div class="panel-ribbon">
		<div class="ribbon"><span>Medium</span></div>
	</div>
		<div class="panel-body">
			<strong class="ng-binding">Vocabulary in Context</strong>
		</div>
	<div class="panel-heading">
		<span class="ng-binding ng-scope"><i class="fa fa-check"></i>&nbsp;&nbsp; 6 / 23 Completed</span>
	</div>
	<div class="panel-body">
		<span class="small pull-left ng-binding">Completed On:<br>10/18/18 1:01:42</span>
		<a href="#" class="btn btn-primary pull-right ng-view">View</a>
	</div>
	</div>
	</div>
	<div class="col-md-4">
	<div class="inner-box">
	<div class="panel-ribbon">
<div class="ribbon"><span>Medium</span></div>	</div>
		<div class="panel-body">
			<strong class="ng-binding">One-Blank Sentence Completion</strong>
		</div>
	<div class="panel-heading">
		<span class="ng-binding ng-scope"><i class="fa fa-check"></i>&nbsp;&nbsp;15 / 20 Completed</span>
	</div>
	<div class="panel-body">
		<span class="small pull-left ng-binding">Completed On:<br>10/18/18 12:35:53</span>
		<a href="#" class="btn btn-primary pull-right ng-view">View</a>
	</div>
	</div>
	</div>
	<div class="col-md-4">
	<div class="inner-box">
	<div class="panel-ribbon">
		<div class="ribbon"><span>Easy</span></div>
	</div>
		<div class="panel-body">
			<strong class="ng-binding">Synonym Bank: Easy</strong>
		</div>
	<div class="panel-heading">
		<span class="ng-binding ng-scope"><i class="fa fa-check"></i>&nbsp;&nbsp;120 Questions</span>
	</div>
	<div class="panel-body">
		<span class="small pull-left ng-binding">Completed On:<br>10/29/18 7:07:45
</span>
		<a href="#" class="btn btn-primary pull-right ng-view">View</a>
	</div>
	</div>
	</div>
	<div class="col-md-4">
	<div class="inner-box">
	<div class="panel-ribbon">
		<div class="ribbon"><span>Hard</span></div>
	</div>
		<div class="panel-body">
			<strong class="ng-binding">Synonym Bank: Hard</strong>
		</div>
	<div class="panel-heading">
		<span class="ng-binding ng-scope"><i class="fa fa-check"></i>&nbsp;&nbsp; 20 / 60 Completed</span>
	</div>
	<div class="panel-body">
		<span class="small pull-left ng-binding">Completed On:<br>10/24/18 8:29:45</span>
		<a href="#" class="btn btn-primary pull-right ng-view">View</a>
	</div>
	</div>
	</div>
	<div class="col-md-4">
	<div class="inner-box">
	<div class="panel-ribbon">
		<div class="ribbon"><span>Medium</span></div>
	</div>
		<div class="panel-body">
			<strong class="ng-binding">Synonym Bank: Medium</strong>
		</div>
	<div class="panel-heading">
		<span class="ng-binding ng-scope"><i class="fa fa-check"></i>&nbsp;&nbsp;20 / 120 Completed</span>
	</div>
	<div class="panel-body">
		<span class="small pull-left ng-binding">Completed On:<br>11/01/18 12:58:51</span>
		<a href="#" class="btn btn-primary pull-right ng-view">View</a>
	</div>
	</div>
	</div>
	<div class="col-md-4">
	<div class="inner-box">
	<div class="panel-ribbon">
		<div class="ribbon"><span>Hard</span></div>
	</div>
		<div class="panel-body">
			<strong class="ng-binding">"D" – Figures Not Necessarily Drawn To Scale</strong>
		</div>
	<div class="panel-heading">
		<span class="ng-binding ng-scope"><i class="fa fa-check"></i>&nbsp;&nbsp;5 Questions</span>
	</div>
	<div class="panel-body">
<!--
		<span class="small pull-left ng-binding">Completed On:<br>10/29/18 7:07:45
</span>
-->
		<a href="#" class="btn btn-primary pull-right ng-view">View</a>
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