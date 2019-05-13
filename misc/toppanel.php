<?php
$adminArr=getAdminDetailById($conn,1);
?>
 <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- font-awesome.min.css -->
    <link href="assets/css/material-design-iconic-font.min.css" rel="stylesheet">
    <!-- slicknav.min.css -->
    <link href="assets/css/slicknav.min.css" rel="stylesheet">
    <!-- nice select -->
    <link href="assets/css/nice-select.css" rel="stylesheet">
    <!-- magnific popup.css -->
    <link href="assets/css/magnific-popup.css" rel="stylesheet">
    <!-- owl.css -->
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <!-- animate.min.css -->
    <link href="assets/css/animate.min.css" rel="stylesheet">
    <!-- style.css -->
    <link href="style.css" rel="stylesheet">
    <!-- responsive.css -->
    <link href="assets/css/responsive.css" rel="stylesheet">
	<!-- font awesome cdn-->
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
 <!-- Page preloader -->
    <div class="home-preloder">
        <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
    </div>
    <!-- preloader End -->
	<div class="top-row">
			 <div class="container">
                <div class="row">
					<div class="col-md-7 col-xs-12">
						<ul style="float:left;"> 
							<li> <img src="assets/img/icon1.png">  CALL US <?php echo $adminArr['primarycontact'] ?> , <?php echo $adminArr['secondarycontact'] ?> </li>
							<li> <img src="assets/img/icon2.png">  <?php echo $adminArr['email'] ?></li>
						</ul>
					</div>
					<div class="col-md-5 col-xs-12 pull-right">
						<ul style="float:right;">
							<li><a style="color:#000;" href="mybookings.php"> MY BOOKING </a></li>
							<li><a style="color:#000;" href="tourguide.php"> TOUR GUIDES </a></li>
							<li><a style="color:#000;" href="signup.php"> SIGNUP / LOGIN </a></li>
						</ul>
					</div>
				</div>
			 </div>	
		</div>