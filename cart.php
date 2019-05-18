<?php
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
$userid=$_SESSION['userid'];  



	if(isset($_GET['cnt'])&& $_GET['cnt']!=''){
	//	print_r($_SESSION["cart_array"]["bags"]); die;


		$num=base64_decode($_GET['cnt'])-1;

		unset($_SESSION['cart_array']["bags"][$num]);

		$_SESSION['cart_array']["bags"] = array_values($_SESSION['cart_array']["bags"]);

		 header("location:$baseurl/cart.php");


	}
		
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
    


<h1>Shopping Cart</h1>
</section>
 
<section class="main-container">

                               <?php  if(!count($_SESSION['cart_array']["bags"])<1){?>


<div class="gray-bg pt-50 pb-50">
        <div class="container">
                <div class="row">
                    <div class="col-lg-8 padding-right-lg">
                        <div class="cart-table-container">
                            <table class="table table-cart">
                                <thead>
                                    <tr>
                                        <th class="product-col">Product</th>
                                        <th class="price-col">Price</th>
                                        <th class="qty-col">Qty</th>
                                        <th>Subtotal</th>
                                       <th>Delete</th>

                                    </tr>
                                </thead>
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
		//$qty=1;
 
		 $sub= $qty* $package_details['price'];
		 $subtotal=$subtotal+$sub;
$totalcount++;
		 ?>
                                    <tr class="product-row">
                                        <td class="product-col">
                                           
                                            <h2 class="product-title">
                                               <?php echo $levelname." ".$package_details['name'];?>
                                            </h2>
                                        </td>
                                        <td>$<?php echo $package_details['price'];?></td>
                                        <td>
                                            <div class="input-group  bootstrap-touchspin bootstrap-touchspin-injected"><input class="vertical-quantity form-control" type="text" value="<?php echo $qty;?>" id="P<?php echo $packageid;?>" readonly><span class="input-group-btn-vertical"><button class="btn btn-outline bootstrap-touchspin-up fa fa-caret-up" type="button" onclick="incrementqty(1,'<?php echo $packageid;?>','<?php echo $levelid;?>')"></button><button class="btn btn-outline bootstrap-touchspin-down fa fa-caret-down" type="button" onclick="incrementqty(2,'<?php echo $packageid;?>','<?php echo $levelid;?>')"></button></span></div>
                                        </td>
                                        <td id="sub<?php echo $packageid;?>">$<?php echo $sub;?></td>
                                         <!--<td id=""><a href="" onClick="deleteitem('<?php echo base64_encode($totalcount);?>')">Delete</a></td>-->
<td id=""><a href="cart.php?cnt=<?php echo base64_encode($totalcount);?>">Delete</a></td>
                                    </tr>
                                    
                                    <?php }}?> 

                                     
                                    
                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="clearfix">
                                            <div class="float-left">
                                                <a href="pricing.php" class="btn btn-outline-secondary">Continue Shopping</a>
                                            </div><!-- End .float-left -->

                                            <div class="float-right">
                                                <a href="#" class="btn btn-outline-secondary btn-clear-cart" onclick="clearcart()">Clear Shopping Cart</a>
                                                <!--<a href="#" class="btn btn-outline-secondary btn-update-cart orange">Update Shopping Cart</a>-->
                                            </div><!-- End .float-right -->
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- End .cart-table-container -->
 
                        <div class="cart-discount" style="display:none">
                            <h4>Apply Discount Code</h4>
                            <form action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="Enter discount code" required="">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-primary" type="submit">Apply Discount</button>
                                    </div>
                                </div><!-- End .input-group -->
                            </form>
                        </div><!-- End .cart-discount -->
                    </div><!-- End .col-lg-8 -->

                    <div class="col-lg-4">
                        <div class="cart-summary">
                            <h3>Summary</h3>

                            

                        

                            <table class="table table-totals">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td id="sub_total">$<?php echo $subtotal;?></td>
                                    </tr>

                                    <tr>
                                        <td>Tax</td>
                                        <td>$0.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Order Total</td>
                                        <td>$<?php echo $subtotal;?></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="checkout-methods">
                                <a href="#" class="btn btn-block btn-sm btn-primary" onclick="checkout()">Go to Checkout</a>
<!--                                <a href="#" class="btn btn-link btn-block">Check Out with Multiple Addresses</a>-->
                            </div><!-- End .checkout-methods -->
                        </div><!-- End .cart-summary -->
                    </div><!-- End .col-lg-4 -->
                </div><!-- End .row -->
            </div>
    </div>
  
  <?php } else {?>  <div class="gray-bg pt-50 pb-50">
        <div class="container">
             <div class="row">
              <div class="col-md-3"></div>
               <div class="col-md-6">
               <div class="no-cart">
               <img src="images/cart.png">
                <p class="item1">No items added in your cart</p>
                <p style="margin-bottom:30px;">Looks like You haven't made your choice yet...</p>
                <a href="#" class="c-shopping">Continue Shopping</a>
				   </div>
				</div>
			<div class="col-md-3"></div>
			</div>
         </div>
    </div>  <?php }?>
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