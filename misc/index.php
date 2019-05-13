<?php
ob_start();
session_start();
include('db_class/dbconfig.php');
include('db_class/hr_functions.php');
$contentArr=getcontentpagesbyid($conn,5);

?>
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- FAVICON -->
        <link rel="icon" href="assets/img/favicon.png">
        <!-- TITLE -->
        <title>7 STARS</title>
        <!-- bootstrap.min.css -->
       
		<!-- Client Carousel-->
		
		
    </head>
    <body>
       <?php include_once('toppanel.php') ?>
    <?php include_once('header.php') ?>
<!--  header area end -->
<!--  hero area start -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
   
    <?php
  	$ds2=mysqli_query($conn,"SELECT `imagepath` from banner where `status`='1' order by id desc"); 

	while($fetch=mysqli_fetch_array($ds2)){
	$t++;
		?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $t; ?>" class="active"></li>
     <?php }?>  
   
   
  </ol>
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
  <?php
  	$ds2=mysqli_query($conn,"SELECT `imagepath` from banner where `status`='1' order by id desc"); 

	while($fetch=mysqli_fetch_array($ds2)){
		?>
        <div class="carousel-item">
        <img  class="d-block w-100" width="100%" src="docs/<?php echo $fetch['imagepath'] ?>" data-color="lightblue" alt="First Image">
        </div>
     <?php }?>   
      
  </div>
</div>

<div class="carousel-caption d-md-block">
		   <div class="col-lg-5 col-md-5 pull-left">
		       <div class="slider-content">
                    <h2>THE TRIP OF YOUR DREAM</h2>
                    <br>
                    <span style="float:left;"><img src="assets/img/waves.png"></span><br><br>
                    <p>Our travel egency is ready to offer you an exciting vacation that is designed to fit your own needs and wishes.
                    Whether it's an exotic cruise or a trip to your favourite resort, you will surely have the best experience.     </p><br>
                    <button class="btn btn-slider" style="float:left;"><a href="#" style="color:#fff;">LEARN MORE</a></button>
		       </div>
		   </div>
		   <div class="col-lg-2 col-md-2"></div>
			  <div class="col-lg-5 col-md-5 pull-right">
                <div class="hero-schdule">
                    <h4 style="color:#000;">FIND YOUR TOUR</h4>
							<form action="#">
                               
                           
                            <div class="row">
                                <div class="col-md-12">
                                    <span class="properties-top-select-right">
                                        <select name="select" id="select2">
                                            <option value="">FROM</option>
                                            <option value="">HYDERABAD</option>
                                            <option value="">DELHI</option>
                                            <option value="">MUMBAI</option>
                                        </select>
                                    </span>
                                </div>
                                <div class="col-md-12">
                                    <span class="properties-top-select-right">
                                        <select name="select" id="select3">
                                            <option value="">TO</option>
                                            <option value="">LONDON</option>
                                            <option value="">KASHMIR</option>
                                            <option value="">MALESIA</option>
                                        </select>
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <span class="properties-top-select-right cta">
                                        <select name="select5" id="select5">
                                            <option value="">DURATION</option>
                                            <option value="">10 DAYS</option>
                                            <option value="">1 MONTH</option>
                                            <option value="">45 DAYS</option>
                                        </select>
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <span class="properties-top-select-right cta2">
                                        <select name="select6" id="select6">
                                            <option value="">DEPART DATE</option>
                                            <option value="">DEPART DATE</option>
                                            <option value="">DEPART DATE</option>
                                            <option value="">DEPART DATE</option>
                                        </select>
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <span class="properties-top-select-right cta">
                                        <select name="select5" id="select5">
                                            <option value="">ADULTS</option>
                                            <option value="">ADULTS</option>
                                            <option value="">ADULTS</option>
                                            <option value="">ADULTS</option>
                                        </select>
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <span class="properties-top-select-right cta2">
                                        <select name="select6" id="select6">
                                            <option value="">CHILDREN</option>
                                            <option value="">CHILDREN</option>
                                            <option value="">CHILDREN</option>
                                            <option value="">CHILDREN</option>
                                        </select>
                                    </span>
                                </div>
                            </div>
                            <div class="properties-right-side-btns">
                                <a href="single-properties-v1.html" class="properties-sidebar-right-btns">Search Flights</a>
                            </div>
						</div>	
                </div>
            </div>
		</div>
	</div>	
<!--  hero area end -->
<!--  gallery -->		 
		 <div class="featured-area section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
						<img src="assets/img/new1.jpg" width="100%" height="auto">
					</div>
					<div class="col-md-3">
						<img src="assets/img/new2.jpg" width="100%" height="auto">
					</div>
					<div class="col-md-6">
						<img src="assets/img/new3.jpg" width="100%" height="268">
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-6">
						<img src="assets/img/new4.jpg" width="100%" height="268">
					</div>
					<div class="col-md-3">
						<img src="assets/img/new5.jpg" width="100%" height="auto">
					</div>
					<div class="col-md-3">
						<img src="assets/img/new6.jpg" width="100%" height="auto">
					</div>
				</div>
			</div>
		</div>	
<!--  gallery end -->	

<!--  Tour details -->	
		
		<div class="tour-area section-padding-1">
			<div class="container">
			<h2 style="color:#042274d1;font-size:24px;">LATEST TRENDING TOURS</h2><br>
				<div class="row tour">
					<div class="col-md-2 details-1">
						<img src="assets/img/tour.jpg"  width="100%">
					</div>
					<div class="col-md-7 details">
						<h5>Singapore South Special</h5>
						<p><span style="color:#808080d1;">4 Nights / 5 Days  </span> <span style="border:none; font-weight:bold;"> Seller :<span style="border:none; font-weight:bold; color:#0a98e9d9; margin:0px">Yatra.com</span></span> </p>
						<h6>Singapore [4N]</h6>
						
						   <p style="border:none;">
								<img src="assets/img/meals.png">
							    <img src="assets/img/flight.png">
                                <img src="assets/img/hotel.png">
                                <img src="assets/img/transfer.png">								
						   </p>
						
					</div>
					<div class="col-md-3 book">
						<p> <span style="color:#808080d1;padding:2px 8px;">EMI</span>  <span style="border:none; font-weight:bold;color:#808080d1; background:none;">Rs. 3,379 </span></p>
						<h3 style="font-weight:bold;padding:0px; margin:0px;">Rs. 54,990  </h3> <span style="border:none; color:#808080d1; background:none;font-size:14px; float:right; margin-bottom:10px">Per Person on twin sharing</span>
						
						<button class="btn btn-danger btn-md">View Details</button>
						
						<span style="border:none; color:#808080d1; background:none; float:right;margin-top:10px">Pay & Hold Rs. 5,000 </span>
						<span style="border:none; color:#808080d1; background:none; float:right;"> Earn eCash  <span style="border:none; color:red; background:none;"> Rs. 1,649 </span> </span>
					</div>
				</div><br>
				<div class="row tour">
					<div class="col-md-2 details-1">
						<img src="assets/img/tour.jpg"  width="100%">
					</div>
					<div class="col-md-7 details">
						<h5>Singapore South Special</h5>
						<p><span style="color:#808080d1;">4 Nights / 5 Days  </span> <span style="border:none; font-weight:bold;"> Seller :<span style="border:none; font-weight:bold; color:#0a98e9d9; margin:0px">Yatra.com</span></span> </p>
						<h6>Singapore [4N]</h6>
						
						   <p style="border:none;">
								<img src="assets/img/meals.png">
							    <img src="assets/img/flight.png">
                                <img src="assets/img/hotel.png">
                                <img src="assets/img/transfer.png">								
						   </p>
						
					</div>
					<div class="col-md-3 book">
						<p> <span style="color:#808080d1;padding:2px 8px;">EMI</span>  <span style="border:none; font-weight:bold;color:#808080d1; background:none;">Rs. 3,379 </span></p>
						<h3 style="font-weight:bold;padding:0px; margin:0px;">Rs. 54,990  </h3> <span style="border:none; color:#808080d1; background:none;font-size:14px; float:right; margin-bottom:10px">Per Person on twin sharing</span>
						
						<button class="btn btn-danger btn-md">View Details</button>
						
						<span style="border:none; color:#808080d1; background:none; float:right;margin-top:10px">Pay & Hold Rs. 5,000 </span>
						<span style="border:none; color:#808080d1; background:none; float:right;"> Earn eCash  <span style="border:none; color:red; background:none;"> Rs. 1,649 </span> </span>
					</div>
				</div><br>
				<div class="row tour">
					<div class="col-md-2 details-1">
						<img src="assets/img/tour.jpg"  width="100%">
					</div>
					<div class="col-md-7 details">
						<h5>Singapore South Special</h5>
						<p><span style="color:#808080d1;">4 Nights / 5 Days  </span> <span style="border:none; font-weight:bold;"> Seller :<span style="border:none; font-weight:bold; color:#0a98e9d9; margin:0px">Yatra.com</span></span> </p>
						<h6>Singapore [4N]</h6>
						
						   <p style="border:none;">
								<img src="assets/img/meals.png">
							    <img src="assets/img/flight.png">
                                <img src="assets/img/hotel.png">
                                <img src="assets/img/transfer.png">								
						   </p>
						
					</div>
					<div class="col-md-3 book">
						<p> <span style="color:#808080d1;padding:2px 8px;">EMI</span>  <span style="border:none; font-weight:bold;color:#808080d1; background:none;">Rs. 3,379 </span></p>
						<h3 style="font-weight:bold;padding:0px; margin:0px;">Rs. 54,990  </h3> <span style="border:none; color:#808080d1; background:none;font-size:14px; float:right; margin-bottom:10px">Per Person on twin sharing</span>
						
						<button class="btn btn-danger btn-md">View Details</button>
						
						<span style="border:none; color:#808080d1; background:none; float:right;margin-top:10px">Pay & Hold Rs. 5,000 </span>
						<span style="border:none; color:#808080d1; background:none; float:right;"> Earn eCash  <span style="border:none; color:red; background:none;"> Rs. 1,649 </span> </span>
					</div>
				</div><br>
				<div class="row tour">
					<div class="col-md-2 details-1">
						<img src="assets/img/tour.jpg"  width="100%">
					</div>
					<div class="col-md-7 details">
						<h5>Singapore South Special</h5>
						<p><span style="color:#808080d1;">4 Nights / 5 Days  </span> <span style="border:none; font-weight:bold;"> Seller :<span style="border:none; font-weight:bold; color:#0a98e9d9; margin:0px">Yatra.com</span></span> </p>
						<h6>Singapore [4N]</h6>
						
						   <p style="border:none;">
								<img src="assets/img/meals.png">
							    <img src="assets/img/flight.png">
                                <img src="assets/img/hotel.png">
                                <img src="assets/img/transfer.png">								
						   </p>
						
					</div>
					<div class="col-md-3 book">
						<p> <span style="color:#808080d1;padding:2px 8px;">EMI</span>  <span style="border:none; font-weight:bold;color:#808080d1; background:none;">Rs. 3,379 </span></p>
						<h3 style="font-weight:bold;padding:0px; margin:0px;">Rs. 54,990  </h3> <span style="border:none; color:#808080d1; background:none;font-size:14px; float:right; margin-bottom:10px">Per Person on twin sharing</span>
						
						<button class="btn btn-danger btn-md">View Details</button>
						
						<span style="border:none; color:#808080d1; background:none; float:right;margin-top:10px">Pay & Hold Rs. 5,000 </span>
						<span style="border:none; color:#808080d1; background:none; float:right;"> Earn eCash  <span style="border:none; color:red; background:none;"> Rs. 1,649 </span> </span>
					</div>
				</div><br>
			</div>
		</div>	
		
<!--  Tour Details End-->	
<div class="recent-properties" style="padding:20px 0px">
</div>
<!--  recent project area start -->
<div class="tour-area recent-properties">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center wow fadeInUp">
                <div class="section-title">
                    <h2 style="color:#042274d1;">Evaluation Of Company</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="recent-properties-slide">
                    <div class="featured-single-slide">
                        <div class="recent-properties-img">
							<h4>A Trip to Tradi...</h4>
                            <img src="assets/img/recent-properties-img-1.jpg" alt="">
                        </div>
                        <div class="featured-slide-text cta">
                           <!-- <p style="color:green;"><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i>5 Reviews</p> -->
                        </div>
                    </div>
                    <div class="featured-single-slide">
                        <div class="recent-properties-img">
						<h4>A Trip to Tradi...</h4>
                            <img src="assets/img/recent-properties-img-2.jpg" alt="">
                        </div>
                       <div class="featured-slide-text cta">
                           <!-- <p style="color:green;"><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i>5 Reviews</p> -->
                        </div>
                    </div>
                    <div class="featured-single-slide">
                        <div class="recent-properties-img">
						<h4>A Trip to Tradi...</h4>
                            <img src="assets/img/recent-properties-img-3.jpg" alt="">
                        </div>
                         <div class="featured-slide-text cta">
                           <!-- <p style="color:green;"><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i>5 Reviews</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  recent project area end -->
<!--  Popular Videos -->
<div class="tour-area recent-properties">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center wow fadeInUp">
                <div class="section-title">
                    <h2 style="color:#042274d1;">Popular Videos</h2>
                    <p>Expression of modern scientific inquiry and exposition Its opening follows a series of setbacks
                    </p>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-lg-12">
                <div class="recent-properties-slide">
                    <div class="featured-single-slide">
                        <div class="recent-properties-img">
							
                            <img src="assets/img/recent-properties-img-1.jpg" alt="">
                        </div>
                        <div class="featured-slide-text cta">
                           <!-- <p style="color:green;"><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i>5 Reviews</p> -->
                        </div>
                    </div>
                    <div class="featured-single-slide">
                        <div class="recent-properties-img">
						
                            <img src="assets/img/recent-properties-img-2.jpg" alt="">
                        </div>
                       <div class="featured-slide-text cta">
                           <!-- <p style="color:green;"><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i>5 Reviews</p> -->
                        </div>
                    </div>
                    <div class="featured-single-slide">
                        <div class="recent-properties-img">
						
                            <img src="assets/img/recent-properties-img-3.jpg" alt="">
                        </div>
                         <div class="featured-slide-text cta">
                           <!-- <p style="color:green;"><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i>5 Reviews</p> -->
                        </div>
                    </div>
					<div class="featured-single-slide">
                        <div class="recent-properties-img">
						
                            <img src="assets/img/recent-properties-img-3.jpg" alt="">
                        </div>
                         <div class="featured-slide-text cta">
                           <!-- <p style="color:green;"><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i>5 Reviews</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Popular Videos end -->

<!--  Popular Images start -->

<div class="tour-area recent-properties">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center wow fadeInUp">
                <div class="section-title">
                    <h2 style="color:#042274d1;">Popular Images</h2>
                    <p>Expression of modern scientific inquiry and exposition Its opening follows a series of setbacks
                    </p>
                </div>
            </div>
        </div>
         <div class="row">
            <div class="col-lg-12">
                <div class="recent-properties-slide">
                    <div class="featured-single-slide">
                        <div class="recent-properties-img">
						
                            <img src="assets/img/recent-properties-img-1.jpg" alt="">
                        </div>
                        <div class="featured-slide-text cta">
                           <!-- <p style="color:green;"><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i>5 Reviews</p> -->
                        </div>
                    </div>
                    <div class="featured-single-slide">
                        <div class="recent-properties-img">
					
                            <img src="assets/img/recent-properties-img-2.jpg" alt="">
                        </div>
                       <div class="featured-slide-text cta">
                           <!-- <p style="color:green;"><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i>5 Reviews</p> -->
                        </div>
                    </div>
                    <div class="featured-single-slide">
                        <div class="recent-properties-img">
						
                            <img src="assets/img/recent-properties-img-3.jpg" alt="">
                        </div>
                         <div class="featured-slide-text cta">
                           <!-- <p style="color:green;"><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i>5 Reviews</p> -->
                        </div>
                    </div>
					<div class="featured-single-slide">
                        <div class="recent-properties-img">
						
                            <img src="assets/img/recent-properties-img-3.jpg" alt="">
                        </div>
                         <div class="featured-slide-text cta">
                           <!-- <p style="color:green;"><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i><i class="fa fa-circle"></i>5 Reviews</p> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Popular Images end -->

<!--  footer widget area start -->
<?php include_once('footer.php') ?>

<!--Main Slider-->
<script>
var $item = $('.carousel-item'); 
var $wHeight = $(window).height();
$item.eq(0).addClass('active');
$item.height($wHeight); 
$item.addClass('full-screen');

$('.carousel img').each(function() {
  var $src = $(this).attr('src');
  var $color = $(this).attr('data-color');
  $(this).parent().css({
    'background-image' : 'url(' + $src + ')',
    'background-color' : $color
  });
  $(this).remove();
});

$(window).on('resize', function (){
  $wHeight = $(window).height();
  $item.height($wHeight);
});

$('.carousel').carousel({
  interval: 6000,
  pause: "false"
});
</script>


<!--Client Carousel-->

</body>

</html>