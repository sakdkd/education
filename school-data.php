<?php ob_start();
session_start();

include('db_class/dbconfig.php');
include('db_class/hr_functions.php');

?>

<!DOCTYPE html>

<html lang="en" class="no-js">
<!--<![endif]-->


<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>
    <!-- Standard Favicon -->
<?php include_once("header.php");?>

    <!-- /.navbar -->
<section class="top-head">
    <h1>Here are some of the schools that our test-takers get into:</h1>
</section>
 
<section class="main-container">
   <div class="get_plan_sec">
   <div class="container">
       <div class="upper-line">
           <p>Test Innovators has helped over 70,000 students prepare for the ISEE and SSAT exams. In that process, we've gathered data on the test scores recommended to be admitted to specific schools. Below are the schools we track. Click on the school name to learn the test score range for successful applicants to your school of choice.</p>
       </div>
   </div>
    <!--get plan-->
    
    </div>
    
    
    <section class="white-wrapper">
        <div class="container">
            <div class="masonry">
            <?php
			$selquery=mysqli_query($conn,"select * from `country` where `status`='1' and `view`='1'");
			$numrows=mysqli_num_rows($selquery);
			if($numrows>0)
			{
				while($resultset=mysqli_fetch_array($selquery))
				{
					$countryid=$resultset['id'];
					$locationId=getLocationIdfromCountryId($conn,$countryid);
					foreach($locationId as $lid)
					{
						$tbname="location"; 
					$location_details=getTableDetailsById($conn,$tbname,$lid);	
				$location_count=getSchoollocationcount($conn,$lid);	
				if($location_count>0)
				{	
									$schoolids=getschoolsfromLocationId($conn,$lid);   
					$tbschool="schools";			

			?>
                <div class="item card">
                    <h3><?=$location_details['name'];?></h3>
                    <ul>
                    <?php 
                    foreach($schoolids as $scid)
					{
						
											$school_details=getTableDetailsById($conn,$tbschool,$scid);	
?>
						
                        <li><a href="school-detail.php?id=<?=base64_encode($school_details['id']);?>"><?=$school_details['name'];?></a></li>
                       <?php }?>
                    </ul>
                </div>
              
              <?php }  } } }?>  
              
                
            </div>
        </div>
    </section>
    
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