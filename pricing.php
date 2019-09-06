
<?php
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');

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
    <!-- Standard Favicon -->
  <?php include_once("header.php");?>
    <!-- /.navbar -->
<section class="top-head">
    
<style>
.pbm .card {
   
    min-height: 235px;
}


</style>

<h1>Choose your level for package options!</h1>
</section>
 
<section class="main-container">
<div class="gray-bg pt-50 pb-50">   
        <div class="container">
        <div class="wraper-box">
            <div class="row section text-center">
        <?php
						$selq=mysqli_query($conn,"select * from `edu_levels` where `status`='1' and `view`='1'");
			$numro=mysqli_num_rows($selq);
						if($numro>0)
						{ while($resultss=mysqli_fetch_array($selq))
						{
						?>
        <div class="col-md-3 col-sm-6 pbm">
        <div class="card">
        <h3><?=$resultss['name'];?></h3>
        <div class="card-body">
            <p><?=$resultss['description'];?></p>
                <a href="packages.php?slug=<?php echo $resultss['slug'];?>" class="btn btn-start">Start</a>
        </div>
        </div>
        </div>
        
       <?php }}?>
        
        </div>
        
        <img src="images/service1.png" class="dashboard-img">
        </div>
        </div>
    </div>
    
</section>    
    <!--get plan-->

    <!--footer widget-->
  <?php include_once("footer.php");?>