<style>
	.main-container
	{
		padding-top: 40px;
    padding-bottom: 40px;
	}
.tabs {
  max-width: 100%;
  margin: 0 auto;
  padding: 0 20px;
}
#tab-button {
  display: table;
  table-layout: fixed;
  width: 100%;
  margin: 0;
  padding: 0;
  list-style: none;
	    border-bottom: 1px solid gainsboro;
}
#tab-button li {
  display: table-cell;
  width: 20%;
}
#tab-button li a {
  display: block;
  padding: .5em;
  background: #000;
  border: 1px solid #ddd;
  text-align: center;
  color: #fff;
  text-decoration: none;
	min-height: 112px;
}
	#tab-button li a p {
    font-size: 16px;
}
#tab-button li:not(:first-child) a {
  border-left: none;
}
#tab-button li a:hover,
#tab-button .is-active a {
  border-bottom-color: transparent;
  background: #fff;
	color: #050505;
}
.tab-contents {
  padding: .5em 2em 1em;
  border: 1px solid #ddd;
	min-height: 220px;
}

.tab-contents h2 {
    margin-bottom: 35px;
}
	.start {
    color: #fff;
    background: #f58644;
    padding: 5px 20px;
    font-size: 18px;
    border-radius: 5px;
}

.tab-button-outer {
  display: none;
}
.tab-contents {
  margin-top: 20px;
}
	.tab-contents p {
    margin-bottom: 30px;
	}
@media screen and (min-width: 768px) {
  .tab-button-outer {
    position: relative;
    z-index: 2;
    display: block;
  }
  .tab-select-outer {
    display: none;
  }
  .tab-contents {
    position: relative;
    top: -1px;
    margin-top: 0;
  }
}
</style>
 
<?php
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');

if(isset($_GET['id']))
{
	$test_id=$_GET['test'];;
$decodedid=base64_decode($_GET['id']); 
		
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
    <?php 
	foreach($newarr as $key => $value)
	{
	?>
    <input type="text" id="e_arr<?php echo $key;?>" value="<?php  echo $value  ;?>">
    <?php } ?>
    
<?php include_once("header.php");?>
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
		     pieSliceText: 'value',
         'width': 350,
         'height': 400,
         'chartArea': {'width': '100%', 'height': '80%'},
         'legend': {'position': 'bottom'}  ,
		 colors: ['#28a745', '#dc3545', '#fd7e14']  
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'+val));
	 
        chart.draw(data, options);
	}
      
    </script>
<section class="top-head">
    


<h1>Welcome!
</h1>
</section>
 
<section class="main-container">

<div class="container-fluid">
              <div class="row">

           <div class="tabs">
  <div class="tab-button-outer">
    <ul id="tab-button">
      <li><a href="#tab01">Summary<p>Test Overview</p></a></li>
      <li><a href="#tab02">VIEW RESULTS<p> 1 VERBAL REASONING</p></a></li>
      <li><a href="#tab03">START <p>2 QUANTITATIVE REASONING</p></a></li>
      <li><a href="#tab04">CONTINUE <p>3 READING COMPREHENSION</p></a></li>
       <li><a href="#tab05">VIEW RESULTS<p> 4 MATHEMATICS ACHIEVEMENT</p></a></li>
      <li><a href="#tab06">START <p> 5 ESSAY</p></a></li>
    </ul>
  </div>
  <div class="tab-select-outer">
    <select id="tab-select">
      <option value="#tab01">Tab 1</option>
      <option value="#tab02">Tab 2</option>
      <option value="#tab03">Tab 3</option>
      <option value="#tab04">Tab 4</option>
      <option value="#tab05">Tab 5</option>
    </select>
  </div>

  <div id="tab01" class="tab-contents">
    <h2>How you did, by difficulty</h2>
     <div class="row">
     	<div class="col-md-4">
     		Easy
     	</div>
     	<div class="col-md-4">
     		Medium
     	</div>
     	<div class="col-md-4">
     		Hard
     	</div>
     </div>
     <h2>How you did, by subtype</h2>
  </div>
  <div id="tab02" class="tab-contents">
     <h2>Get started on Verbal Reasoning.</h2>
    <a href="#" class="start">Start</a>
  </div>
  <div id="tab03" class="tab-contents">
    <h2>Get started on Quantitative Reasoning.</h2>
      <a href="#" class="start">Start</a>
  </div>
  <div id="tab04" class="tab-contents">
    <h2>Get started on Reading Comprehension.</h2>
      <a href="#" class="start">Start</a>
  </div>
  <div id="tab05" class="tab-contents">
      <h2>Get started on Mathematics Achievement.</h2>
      <a href="#" class="start">Start</a>
  </div>
  <div id="tab06" class="tab-contents">
     <h2 style="margin-bottom:10px">Ready to continue your Essay?</h2>
      <p>Click below to keep going.
</p>
      <a href="#" class="start">Continue</a>
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
   <script type="text/javascript">
	$(function() {
  var $tabButtonItem = $('#tab-button li'),
      $tabSelect = $('#tab-select'),
      $tabContents = $('.tab-contents'),
      activeClass = 'is-active';

  $tabButtonItem.first().addClass(activeClass);
  $tabContents.not(':first').hide();

  $tabButtonItem.find('a').on('click', function(e) {
    var target = $(this).attr('href');

    $tabButtonItem.removeClass(activeClass);
    $(this).parent().addClass(activeClass);
    $tabSelect.val(target);
    $tabContents.hide();
    $(target).show();
    e.preventDefault();
  });

  $tabSelect.on('change', function() {
    var target = $(this).val(),
        targetSelectNum = $(this).prop('selectedIndex');

    $tabButtonItem.removeClass(activeClass);
    $tabButtonItem.eq(targetSelectNum).addClass(activeClass);
    $tabContents.hide();
    $(target).show();
  });
});
	</script>