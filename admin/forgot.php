<?php
ob_start();
session_start();
include('../db_class/dbconfig.php');
include('../db_class/message.php');
include('../db_class/hr_functions.php');
if(isset($_POST['submitbtn'])){

	$uname=$_POST['username'];
	$password=$_POST['password'];
	$query = "SELECT * FROM `nonexsubprojects` WHERE `username`='$uname' and `status`='1' and `view`='1'";
	$result = mysqli_query($conn,$query);
	$num_row = mysqli_num_rows($result);

if($num_row==0){
	header("location:".$builderbaseurl."/forgot.php?msg=uf");	
}else{
	//$fetchArr=mysqli_fetch_assoc($result);
	//$_SESSION['buid']=$fetchArr['id'];
	$arr=mysqli_fetch_assoc($result);
	$email=$arr['email'];
	$password=$arr['password'];
	$name=$arr['name'];
	
	$msg=builderforgotpwd($baseurl,$name,$password);
	sendElasticEmail($email,"support@acresninches.com","Password Recovery ! ",$msg);
	
	header("location:".$builderbaseurl."/forgot.php?msg=us");	
	
}

}


if(isset($_GET['msg']) && $_GET['msg']!=''){
$msg=$_GET['msg'];

if($msg=='uf'){
	$msgText="Username is wrong";	
	$color="red";
}else if($msg=='us'){
	$msgText="Password has been sent to your registered email id";	
	$color="green";
}else{
	
	$msgText="";	
	$color="";
	
}
	
	
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Acresninches | Bringing Clarity into Real Estate </title>

    <!-- Bootstrap -->
    <link href="<?php echo $builderbaseurl; ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $builderbaseurl; ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo $builderbaseurl; ?>/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo $builderbaseurl; ?>/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    
    <style>
	.bottom-img
	{
	    position: absolute;
    bottom: 0;
    width: 100%;
    margin: 0 auto;
	text-align:center;
	}
	
	.login_content form {
    margin: 20px 0;
    position: relative;
    background: #fff;
    padding: 12px;
	border:solid 1px #EAEAEA;
}
.login_wrapper {
    right: 0;
    margin: 0 auto;
    width: 350px;
    position: relative;
    clear: both;
    display: inherit;
}
	
	</style>
    
  </head>

  <body class="login" style="background:url(images/sc.png) no-repeat   bottom left;"   >
    <div >
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper"  >
        <div class="animate form login_form" >
          <section class="login_content"   >
            <p><img src="http://ani.acresninches.com/img/logo.png"></p>
            <form method="post" action="">
             
            
              <h3>Forgot Password </h3>
              <p style="color:<?php echo $color; ?>"><?php echo $msgText; ?></p>
              <div>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required />
              </div>
             
              <div><input type="submit" class="btn btn-default submit" name="submitbtn" value="Send Request" style="margin-left:0px;">
               
                <a class="reset_pass" href="index.php">Have a  account?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <!--<p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>-->

                <div class="clearfix"></div>
                <br />

                <div>
                <!--  <h1><i class="fa fa-building"></i> Welcome to Acres N Inches !</h1>-->
                  <p>©2018 All Rights Reserved. &nbsp;&nbsp; acresninches.com</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        
      </div>
      <div class="bottom-img">
      <img src="images/sc.png" style="width:63%; margin:0 auto">
      </div>
      
    </div>
  </body>
</html>
