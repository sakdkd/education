<?php
ob_start();
session_start();
//ini_set('display_errors',1);
include('../db_class/dbconfig.php');
include('../db_class/hr_functions.php');






if(isset($_POST['submitbtn'])){



	$uname=$_POST['username'];

	$password=md5($_POST['password']);

	

	 $query = "SELECT * FROM `admin` WHERE `username`='$uname' and `password`='$password'  and `status`='1' ";
	$result = mysqli_query($conn,$query);

	$num_row = mysqli_num_rows($result);



if($num_row>0){

	$fetchArr=mysqli_fetch_assoc($result);

	$_SESSION['buid']=$fetchArr['id'];
	if($_SESSION['buid']==1){
		$_SESSION['key']=1;
	
	}else{
	$_SESSION['key']=0;
	}

//	$_SESSION['ptype']=2;

	header("location:".$builderbaseurl."/dashboard.php");

	

}else{
	
	
	header("location:".$builderbaseurl."/index.php?msg=inf");
	}



}





if(isset($_GET['msg']) && $_GET['msg']!=''){

$msg=$_GET['msg'];



if($msg='inf'){

	$msgText="Username/Password combination is wrong";	

	$color="red";

}else{

	

	$msgText="";	

	$color="";

	

}

	

	

}
else{

	

	$msgText="";	

	$color="";

	

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



    <title>Bosh Education </title>



    <!-- Bootstrap -->

    <link href="<?php echo $builderbaseurl; ?>/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->

    <link href="<?php echo $builderbaseurl; ?>/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- NProgress -->

    <link href="<?php echo $builderbaseurl; ?>/vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Animate.css -->

    <link href="<?php echo $builderbaseurl; ?>/vendors/animate.css/animate.min.css" rel="stylesheet">



    <!-- Custom Theme Style -->

    <link href="<?php echo $builderbaseurl; ?>/build/css/custom.min.css" rel="stylesheet">

    

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

    background: #F1EFEF;

    padding: 12px;

	border:solid 1px #EAEAEA;

}

.login_wrapper {

    right: 0;

    margin: 60 auto;

    width: 350px;

    position: relative;

    clear: both;

    display: inherit;

}

	

	</style>

    

  </head>



  <body class="login"    >

    <div >

      <a class="hiddenanchor" id="signup"></a>

      <a class="hiddenanchor" id="signin"></a>



      <div class="login_wrapper"  >

        <div class="animate form login_form" >

          <section class="login_content"   >

            <p style="font-size:22px;"><!--<img src="<?php echo $baseurl ?>/images/logo.png">-->Bosh Education</p>

            <form method="post" action="" style="border-radius:3%;">

             

            

              <h2>Welcome Administrator !  </h2>

              <p style="color:<?php echo $color; ?>"><?php echo $msgText; ?></p>

              <div>

                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required />

              </div>

              <div>

                <input type="password" class="form-control"  name="password" id="password" placeholder="Password" required="" />

              </div>

              <div><input type="submit" class="btn btn-default submit" name="submitbtn" value="Sign In" style="margin-left:0px;">

               


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

                  <p>©2018 All Rights Reserved. &nbsp;&nbsp; </p>

                </div>

              </div>

            </form>

          </section>

        </div>



        

      </div>

      <div class="bottom-img">

      <img src="http://host.bestbargains.in/questioner/bosh-education/img/about-img.png" style="margin:0 auto">

      </div>

      

    </div>

  </body>

</html>

