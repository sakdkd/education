<?php ob_start();
session_start();

include('db_class/dbconfig.php');
include('db_class/hr_functions.php');

?>

<!DOCTYPE html>

<html lang="en" class="no-js">
<!--<![endif]-->
<head>
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
    <h1>Contact Us</h1>
</section> 
     <section class="contact-us">
        <div class="container" style="max-width: 1170px;">
            <div class="row" style="margin-right: 0px;">
                
                <div class="w-100"></div>
                <div class="col-md-4 flex-display">
                	<div class="contact-blue">
                		<img src="images/message-icon.png">
                		<p>If you want to get in touch, use form below. We look forward  to hearing from you!</p>
                	</div>
                </div>
                <div class="col-md-8" id="myform">
                <div class="title text-center contact-heading">
                        <h3>Fill your Detail</h3>
                    </div><!--/.title-->
                <form action="#" method="post" id="contact_form">
                	<div class="row">
                		<div class="col-md-6">
                			<input type="text" name="contact_name" id="contact_name" class="form-control" placeholder="Name" >
                		</div>
                		<div class="col-md-6">
                			<input type="text" name="contact_mobile" id="contact_mobile" class="form-control" placeholder="Mobile No." >
                		</div>
                		<div class="col-md-12">
                			<input type="text" name="contact_email" id="contact_email" class="form-control" placeholder="Email" >
                		</div>
                		<div class="col-md-12">
                			<textarea name="contact_msg" id="contact_msg"  cols="3" rows="4"placeholder="Message" class="form-control"></textarea>
                		</div>
                		<div class="col-md-12">
                			<button type="Submit" class="contact-submit">Submit</button>
                		</div>
                	</div>
                </form>
                </div>
            </div>
        </div><!--/.container-->
    </section>
    <!--recent-blog-->

    <!--footer widget-->
 <?php include_once("footer.php");?>
 <div class="modal" tabindex="-1" role="dialog" id="enquirypopup" data-backdrop="static" data-keyboard="false" style="background: #0000003b;">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="border:none">
      <div class="modal-header head-contact">
        <h5 class="modal-title" style="margin: auto;font-size: 15px;
        letter-spacing: 0.5px;">Confirmation</h5>
        <button type="button" class="close close-contact" data-dismiss="modal" aria-label="Close" onClick="location.reload();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body query-modal">
      <p class="thank">Thankyou</p>
      <p class="thank-content">Your query has been submitted. Our team wil contact you soon.</p>
      </div>
      
    </div>
  </div>
</div>