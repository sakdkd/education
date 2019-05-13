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
    <title>7 Stars</title>
  
        
		<!-- Client Carousel-->
   
   
    <link href="style.css" rel="stylesheet">
    <link href="style-other.css" rel="stylesheet">
         <!-- signup page-->        
             <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
     <?php include_once('toppanel.php') ?>
    <?php include_once('header.php') ?>
    <!--  header area start -->
    
    <!--  header area end -->
	 <?php include_once('search.php') ?>
	
    <!--  bradcamp area start -->
    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   
                         <h6><a href="index.html">Home</a> / Sign Up  </h6>
                   
                </div>
            </div>
        </div>
    </div>
    <!--  bradcamp area end -->
     <div class="tour-area section-padding-1">
         <div class="container">
         
         
         
         
         
             <!-- Dynamic content start here  --> 
             
    
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h4 class="card-title mt-3 text-center">Create Account</h4>
	<p class="text-center">Get started with your free account</p>
	<p>
		<a href="" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i>   Login via Twitter</a>
		<a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i>   Login via facebook</a>
	</p>
	<p class="divider-text">
        <span class="bg-light">OR</span>
    </p>
	<form>
	 <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="" class="form-control" placeholder="Email address" type="email">
    </div> <!-- form-group// -->
     <!-- form-group// -->
     <!-- form-group end.// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Create password" type="password">
    </div> <!-- form-group// -->
     <!-- form-group// -->                                      
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block"> Sign In  </button>
    </div> <!-- form-group// -->      
    <p class="text-center">Dont Have an account? <a href="signup.php">Sign Up</a> </p>                                                                 
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->


                    
                    
                    
                    
             <!-- Dynamic content start here  --> 
             
             
             
             
             
             
             
         </div>
     </div>
 </div>
    <!--  properties sidebar area end -->
   <!--  footer widget area start -->
<?php include_once('footer.php') ?>
<!--  footer widget area end -->
  
	<script>
		$(document).ready(function() {
    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
	</script>
</body>


</html>