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
<style>
section.top-head {
    width: 100%;
    padding: 50px 0;
    background: #f47327!important;
    margin-top: 0px!important;
	    margin-bottom: 20px;
}

.card-body.home-well {
    background: whitesmoke;
}
</style>
    <title>Home</title>
    <!-- Standard Favicon -->
  <?php include_once("header.php"); 
  
  checkIntrusion($userid,$baseurl);

if(($orderidcount>1) || ($n_rows>1))
{
	
	$repage="dashboard.php";
}

else
{
	
	$repage="web-app.php";
	
}?>   
 
<div class="main-container" style="margin-top:50px">

    
    
<div class="gray-bg pt-50 pb-50">
        <div class="container">
        <div class="wraper-box">
        <section class="top-head">
    


<h1>Welcome! </h1>
</section>
        
 <div class="row section text-center welcome">
         <div class="col-md-2 pbm"></div>
        <div class="col-md-4 col-sm-6">
        <div class="card">
<!--        <h3>Primary Level</h3>-->
        <div class="card-body home-well">
        <h2 class="icon"><i class="fa fa-desktop"></i> </h2>
            <p>Access your online tests.</p>
                <a href="<?php echo $repage;?>" class="btn btn-start">View Dashboard</a>
        </div>
        </div>
        </div> 
        
        <div class="col-md-4 col-sm-6">
        <div class="card">
<!--        <h3>Lower Level</h3>-->
        <div class="card-body home-well">
        <h2 class="icon"><i class="fa fa-desktop"></i> </h2>
            <p>Access  practice papers.</p>
                <a href="practice.php" class="btn btn-start">Paper Tests & Vocab</a>
        </div>
        </div>
        </div>
        
        </div>
        
        <img src="images/call-to-action.png" class="call-to">
        </div>
        
        
        
        </div>
        </div>
    </div>
    
</div>    
    <!--get plan-->

 

    <!--footer widget-->
<?php include_once("footer.php");?>