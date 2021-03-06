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

    <title>BOSH Education | ISEE</title>
    <!-- Standard Favicon -->
  <?php include_once("header.php");?>
    <!-- /.navbar -->
<section class="top-head">
    
<?php 
if(isset($_GET['slug']))
{
	
	  $slug=$_GET['slug'];
	
	 $level_id=getlevelIdfromslug($conn,$slug);
	$table="edu_levels";
	$level_details=getTableDetailsById($conn,$table,$level_id);

}?>
<h1><?php echo $level_details['name'] ?></h1>
</section>
 
<section class="main-container">
   
    
    
<div class="pt-50 pb-50">
        <div class="container">
         <div class="wraper-box">
        <div class="get_plan_sec new-price">
        <div class="upper-line">
           
           <p><?=$level_details['description'];?></p>

   </div>
    <!--get plan-->
    


    </div>
        
            <div class="row section text-center">
        
        <!--<div class="offset-2">
        
        </div>-->
        
      <?php 
	 $selectquery=mysqli_query($conn,"select * from `edu_pricing` where `level_id`='$level_id' and `status`='1' and `view`='1'");
	    $numrows=mysqli_num_rows($selectquery);
	  if($numrows>0)
	  {
		  
		  while($packages=mysqli_fetch_array($selectquery))
		  {
			   $price_id=$packages['id'];
			  $features_list= getQfeaturessById($conn,$price_id);
			  $nonfeatures_list=getNQfeaturessById($conn,$price_id);
			   $cost=$packages['price'];
			    $button_text="Add to Cart";
								  $onclick_action="addtocart($level_id,$price_id)";

				$button_val="1";
			  $icon="$";
			  if($cost==0)
			  {
				 				$button_val="2";
 
				 $cost="Free"; 
				  $icon="";
				  $onclick_action="redirection_page()";
				  $button_text="Try Now";
				   
			  }
			  
	  ?>  
        
        <div class="col-md-4 col-sm-4 pbm">
        <div class="card price-table-data">
        <div class="card-body package-detail">
          <div class="package-detail">
          <img class="fees-icon" src="images/fees.png"> 
                <strong><?=$packages['name'];?></strong>
              <div class="testinfo"> <?php foreach ($features_list as $f_key => $f_pair)
                              { $q_table="qfeature"; $feature_d= getTableDetailsByIdwithstatus($conn,$q_table,$f_key);?>
                    <p><?php echo $f_pair." ".$feature_d['name'];?></p>
                    <?php }?></div>
                  <ul>
                   <?php foreach ($nonfeatures_list as $nfkey)
                          { $q_table="nqfeatures"; $feature_d= getTableDetailsByIdwithstatus($conn,$q_table,$nfkey);?> 
                      <li><?php echo $feature_d['name'];?></li>
                      <?php }?>
                      
                  </ul>
           </div>
               <div class="price-wrapper">
                   <div class="price"><strong><?php echo $icon.$cost;?></strong></div>
                    <button type="button" class="btn btn-start" onclick="<?php echo $onclick_action;?>"><?php echo $button_text;?></button>
               </div>
        </div>
        </div>
        </div>
        
        
        <?php } }   else {?>
        
        <div class="col-md-4 col-sm-4 pbm">
        <div class="card">
        <div class="card-body package-detail">
          
            <p><strong>No Packages are available</strong></p>  
               
        </div>
        </div>
        </div>
        
        <?php }?>
        
        
        
        </div>
        
        </div>
        </div>
    </div>
    
</section>    
    <!--get plan-->


    <!--footer-->
  <?php include_once("footer.php");?>

</html>