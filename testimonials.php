<?php
ob_start();
session_start();
include('db_class/dbconfig.php');
include('db_class/hr_functions.php');

?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
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
<section class="top-head">
    <h1>Testimonials</h1>
</section>
 
<section class="main-container">
   <div class="get_plan_sec">
   <div class="upper-line">
       <h2>We've helped tens of thousands of students get into the most selective schools.</h2>
   </div>
    <!--get plan-->
    <div class="schoools owl-carousel">
        <div class="school-logo"><img src="https://iseepracticetest.com/sites/all/themes/custom/test_innovators/images/trinity.png" alt=""></div>
        <div class="school-logo"><img src="https://iseepracticetest.com/sites/all/themes/custom/test_innovators/images/harvard.png" alt=""></div>
        <div class="school-logo"><img src="https://iseepracticetest.com/sites/all/themes/custom/test_innovators/images/boston_latin.png" alt=""></div>
        <div class="school-logo"><img src="https://iseepracticetest.com/sites/all/themes/custom/test_innovators/images/latin.png" alt=""></div>
        <div class="school-logo"><img src="https://iseepracticetest.com/sites/all/themes/custom/test_innovators/images/st.png" alt=""></div>
        <div class="school-logo"><img src="https://iseepracticetest.com/sites/all/themes/custom/test_innovators/images/trinity.png" alt=""></div>
        <div class="school-logo"><img src="https://iseepracticetest.com/sites/all/themes/custom/test_innovators/images/harvard.png" alt=""></div>
        <div class="school-logo"><img src="https://iseepracticetest.com/sites/all/themes/custom/test_innovators/images/boston_latin.png" alt=""></div>
        <div class="school-logo"><img src="https://iseepracticetest.com/sites/all/themes/custom/test_innovators/images/latin.png" alt=""></div>
        <div class="school-logo"><img src="https://iseepracticetest.com/sites/all/themes/custom/test_innovators/images/st.png" alt=""></div>
        <div class="school-logo"><img src="https://iseepracticetest.com/sites/all/themes/custom/test_innovators/images/trinity.png" alt=""></div>
        <div class="school-logo"><img src="https://iseepracticetest.com/sites/all/themes/custom/test_innovators/images/harvard.png" alt=""></div>
        <div class="school-logo"><img src="https://iseepracticetest.com/sites/all/themes/custom/test_innovators/images/boston_latin.png" alt=""></div>
        <div class="school-logo"><img src="https://iseepracticetest.com/sites/all/themes/custom/test_innovators/images/latin.png" alt=""></div>
        <div class="school-logo"><img src="https://iseepracticetest.com/sites/all/themes/custom/test_innovators/images/st.png" alt=""></div>
        
    </div>
    </div>
    
    
    <div class="testimonials">
        
        <div class="container">
        <?php 
		
		$selquery=mysqli_query($conn,"select * from `testimonial` where `status`='1' order by `id` desc");
		$ii=1;
$numrows=mysqli_num_rows($selquery);
		while($resultset=mysqli_fetch_array($selquery))
		{  $ii++;
		
		$testi=$resultset['testimonial'];
				$postedby=$resultset['postedby'];

			if($ii%2=='0')
			
			{
				 $direction="left";
				
			}
			else
			{
						 	$direction="right";
	
				
			}
		
		
		?>
		
		
		
            <div class="testimonial-<?php echo $direction;?> text-<?php echo $direction;?>">
                <div class="testimonial-box card">
                    <p>"<?php echo html2text($testi);?>"</p>
                    <div class="testimonial-name">—<?php echo $postedby;?></div>
                </div>
            </div>
            
            <?php }?>
           
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
    <section class="footer_x_widger">
        <div class="container">
            <div class="row">
                
                <div class="w-100"></div>
                <div class="col-md-3">
                    <div class="widget widget_info">
                        <img src="img/logo-footer.png" alt="" width="200px">
                        <p>Lorem ipsum dolor sit amet, Lorem ipsum dolor amet sed diam nonumy eirmod tempor.</p>
                        
                    </div><!--/.widget_info-->
                </div>
                <div class="col-md-3">
                    <div class="widget widget_links">
                        <h3>About</h3>
                        <ul>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i> About Company</a></li>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i> Shop</a></li>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i> Service</a></li>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i> Features</a></li>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i> Case Studies</a></li>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i> News &amp; Blog</a></li>
                        </ul>
                    </div><!--/.widget_links-->
                </div>
                 <div class="col-md-3">
                    <div class="widget widget_links">
                        <h3>About</h3>
                         <ul>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i> Tips</a></li>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i> SSAT</a></li>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i> ACT</a></li>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i> SAT</a></li>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i> Tutoring</a></li>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i> For Schools</a></li>
                            <li><a href="#"><i class="fas fa-angle-double-right"></i> Scholarships</a></li>
                        </ul>
                    </div><!--/.widget_links-->
                </div>
                <div class="col-md-3">
                    <div class="widget widget_address">
                        <h3>Connect</h3>
                                           <div class="footer_social">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fas fa-rss"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                                           
                                            </div><!--/.widget_address-->
                </div>
            </div>
        </div>
    </section>
    <!--footer widget-->

   <?php include_once("footer.php");?>s