<?php
ob_start();
session_start();
include('db_class/dbconfig.php');
include('db_class/hr_functions.php');
$contentArr=getcontentpagesbyid($conn,4);

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
    <!-- bootstrap.min.css -->
   
		<!-- Client Carousel-->
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
                   
                         <h6><a href="index.php">Home</a> / Privacy policy  </h6>
                   
                </div>
            </div>
        </div>
    </div>
    <!--  bradcamp area end -->
     <div class="tour-area section-padding-1">
         <div class="container">
         
         
         
         
         
             <!-- Dynamic content start here  --> 
             <p><?php echo $contentArr['content'] ?></p>
             <!-- Dynamic content start here  --> 
             
             
             
             
             
             
             
         </div>
     </div>
 </div>
    <!--  properties sidebar area end -->
   <!--  footer widget area start -->
<?php include_once('footer.php') ?>

</body>


</html>