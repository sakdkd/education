<?php
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
$userid=$_SESSION['userid'];  
$my_orderid=base64_decode($_GET['oid']);
//print_r($_SESSION["cart_array"]["bags"]); 
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

<section class="main-container" style="margin-top:50px">
<div class="pt-50 pb-50"> 
        <div class="container">
          <div class="wraper-box">
                <div class="row">
 			<div class="col-sm-12" style="text-align:center; display:inline-block">
 				<img src="img/thank.png" style="text-align:center">
 			</div>
            
            <div class="col-sm-12" style="text-align:center; display:inline-block">
 				<p>Your Order ID is  "<b><?php echo $my_orderid;?></b>" Please Click <a href="<?php echo $baseurl;?>/welcome.php" style="text-decoration:underline">here</a> to view package</p>
 			</div>
 		</div>
        <img class="dashboard-img" src="images/dashboard-img.png">
        </div>
            </div>
    </div>
     
</section>    
    <!--get plan-->


    <!--footer widget-->
  <?php include_once("footer.php");?>