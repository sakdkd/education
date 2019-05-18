<?php
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
$userid=$_SESSION['userid'];  

$useraddress=getUserAddress($conn,$userid);
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
<section class="top-head">
    


<h1>Checkout </h1>
</section>
 <section class="customer-ins">
 	<div class="container">
 		<div class="row">
 			<div class="col-md-12 customer">
 				<h2 class="info">Customer information</h2>
 				<p>Order information will be sent to your account e-mail listed below.</p>
 				<p><b><?php echo $user_details['email'];?></b></p>
 			</div>
 		</div>
 	</div>
 </section>
<section class="main-container">
<div class="gray-bg pt-50 pb-50">
        <div class="container">
                <div class="row">
                    <div class="col-lg-8 padding-right-lg bill-info">
                    <form method="post" action="" id="checkout_form">
                    	<h2 class="billing">Billing information</h2>
                    	<div class="row">
                    		
							<div class="col-md-6">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" placeholder="First Name" name="fname" id="fname" value="<?php echo $useraddress['fname'];?>">
								</div>
							</div>
						<div class="col-md-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" placeholder="Last Name" name="lname" id="lname" value="<?php echo $useraddress['lname'];?>">
								</div>
							</div>
                   	<div class="col-md-6">
								<div class="form-group">
									<label>Company</label>
									<input type="text" placeholder="Company" name="company" id="company" value="<?php echo $useraddress['company'];?>">
								</div>
							</div>
                   	<div class="col-md-6">
								<div class="form-group">
									<label>Street address</label>
									<input type="text" placeholder="53 Sunset Hill Rd" name="streetadd" id="streetadd" value="<?php echo $useraddress['address'];?>">
								</div>
							</div>
                            
                            
                            <div class="col-md-6">
								<div class="form-group">
									<label>Country</label>
                                    <input type="hidden" name="hidId" id="hidId" value="0">
									<select id="country" name="country">
										<?php 
				$ds=mysqli_query($conn,"SELECT * FROM `country` where `view`='1' order by `id` desc " ); 
				$numrows=mysqli_num_rows($ds);
				if( $numrows >0){
				while($fetch=mysqli_fetch_array($ds)){?>
                <option value="<?php echo $fetch['id'] ?>" <?php if($fetch['id']==$useraddress['country']){?> checked <?php }?>><?php echo $fetch['name'] ?></option>
				
				
				<?php }}?>
										
									</select>
								</div>
							</div>
                            
                            
                            <div class="col-md-6">
								<div class="form-group">
									<label>State/Province</label>
                                    <div id="coutrydiv">
									<select id="province" name="province">
										<option value="">- Select -</option>
										<option>Alabama</option>
										
										
									</select>
                                    </div>
								</div>
							</div>
                            
							<div class="col-md-6">
								<div class="form-group">
									<label>City</label>
									<input type="text" placeholder="Boston" name="city" id="city" value="<?php echo $useraddress['city'];?>" >
								</div>
							</div>
							
							
							<div class="col-md-6">
								<div class="form-group">
									<label>Postal code</label>
									<input type="text" placeholder="02132" name="postal" id="postal" value="<?php echo $useraddress['postal'];?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Phone number</label>
									<input type="text" placeholder="" name="phone" id="phone" value="<?php echo $useraddress['phone'];?>">
								</div>
							</div>
						</div>
                        
                   <div class="col-md-12">
                   	<input type="submit" value="Place Order" class="order-p" id="checkbtn">
                   </div>
                    </form>
<!--
                        
-->
                    </div>
                         <div class="col-lg-4">
                        <div class="cart-summary">
                            <h3>Cart Contents</h3>

                            

                        

                            <table class="table table-totals">
                                <tbody>
                                <?php 
                                    if(!count($_SESSION['cart_array']["bags"])<1){
        
         $prodArray=$_SESSION['cart_array']["bags"];
		 //print_r($prodArray);
		 $totalcount=0;
		 $subtotal=0;
         foreach($prodArray as $product){ 
		 
		 $levelid=$product[0];
		 		 $packageid=$product[1];

$package_details=getTableDetailsById($conn,"edu_pricing",$packageid);
$package_details=getTableDetailsById($conn,"edu_pricing",$packageid);
$leveltable="edu_levels";
$level_details=getTableDetailsById($conn,$leveltable,$levelid);
 $levelname=$level_details['name'];
		 $qty=$product[2]; 
		 
		 $sub= $qty* $package_details['price'];
		 $subtotal=$subtotal+$sub;
$totalcount++;
?>
                                    <tr>
                                        <td><?php echo $qty;?> ×	  <?php echo $levelname." ".$package_details['name'];?></td>
                                        <td>$<?php echo $package_details['price'];?></td>
                                    </tr>
                                    <?php }}?> 
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Order Total</td>
                                        <td>$<?php echo $subtotal;?></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="checkout-methods">
<!--                                <a href="#" class="btn btn-block btn-sm btn-primary" onClick="checkout()">Go to Checkout</a>-->
<!--                                <a href="#" class="btn btn-link btn-block">Check Out with Multiple Addresses</a>-->
                            </div><!-- End .checkout-methods -->
                        </div><!-- End .cart-summary -->
                    </div><!-- End .col-lg-4 -->
                    
                </div><!-- End .row -->
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
  <?php include_once("footer.php");?>