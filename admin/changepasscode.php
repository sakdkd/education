<?php

ob_start();

session_start();

include('../db_class/dbconfig.php');

include('../db_class/message.php');

include('../db_class/hr_functions.php');

$buid=$_SESSION['buid'];
$cid=base64_decode($_GET['id']);
$cname=getAdminNameById($conn,$cid);
checkIntrusion($buid,$builderbaseurl);



if(isset($_POST['submit'])){

$password=md5(mysqli_real_escape_string($conn,$_POST['newpassword']));
$hidCid=$_POST['hidCid'];




		 $query = "Update `admin` set `password`='$password' WHERE `id`='$hidCid'";

		 $result = mysqli_query($conn,$query);

		 

		  

		

		if( $result)

		 {	

			 header("location:changepasscode.php?msg=ups");

		 }else{

			 header("location:changepasscode.php?msg=upf"); 

			 

		 }

	

}



if(isset($_GET['msg']) && $_GET['msg']!=''){

$msg=$_GET['msg'];

	if($msg=='ups'){

		$msgText="Password has been updated successfully!"	;

		$className="success";

	}

	elseif($msg=='upf'){

		$msgText="Password not updated successfully!"	;

		$className="danger";

	}else{

		$msgText="";

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



    <title>Tour & Travel | </title>



   

    <style>

	.img-circle

   {

	border-radius:5%;   

   }

   .img-circle.profile_img{

	width:90%;   

   }

	</style>

    <script>

	function validate(){

		passpatn=/^[0-9a-zA-Z!@#$%^&*]+$/;

		if(document.getElementById('newpassword').value==''){

			alert("Please enter new password !");

			document.getElementById('newpassword').focus();

			return false;	

		}else{

			if( !(document.getElementById('newpassword').value.match(passpatn))){

				alert("Only Alphabets and numeric values and ! @ # $ % ^ & * symbols allowed !");

				document.getElementById('newpassword').focus();

				return false;

				

			}

			

			if( document.getElementById('newpassword').value.length<6){

				alert("Password should be atleast 6 characters  !");

				document.getElementById('newpassword').focus();

				return false;

				

			}

			

			

		}

		

		if(document.getElementById('cnewpassword').value==''){

			alert("Please enter confirm new password !");

			document.getElementById('cnewpassword').focus();

			return false;	

		}

		if( (document.getElementById('cnewpassword').value)!=(document.getElementById('newpassword').value) ){

			alert("Password and confirm password does not match! ");

			document.getElementById('cnewpassword').focus();

			return false;	

		}

		

	}

	</script>

  </head>



  <body class="nav-md">

    <div class="container body">

      <div class="main_container">

        <?php include_once('sidepanel.php') ?>



        <!-- top navigation -->

         <?php include_once('toppanel.php') ?>

        <!-- /top navigation -->



        <!-- page content -->

        <div class="right_col" role="main">

          <div class="">

            <div class="page-title">

              <!--<div class="title_left">

                <h3>Welcome</h3>

              </div>-->



              

            </div>



            <div class="clearfix"></div>



            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

              

                <?php if(isset($_GET['msg'])){?>	 

	<div class='btn-<?php echo $className ?>' style="text-align:center;padding:5px;"><?php echo $msgText ?> <span style="float:right;cursor:pointer;font-weight:bold;" onClick="window.location.href='passcode.php'"> X </span></div>

<?php }?>

                <div class="x_panel">

                  <div class="x_title">

                    <h2>Change Password [ <?php echo $cname; ?>]</h2>

                     

                    <div class="clearfix"></div>

                   

                  </div>

                  <div class="x_content">

                      <form action="" method="post" onSubmit="return validate()">

    <table width="100%" border="0" class="table table-striped table-bordered">

  <tr>

    <td><label style="color:#069;font-weight:bold;">Enter New Password</label></td>

    <td width="28%"><input type="password" name="newpassword" id="newpassword" class="form-control" required></td>

    <td width="45%">*Only Alphabets . numeric values and ! @ # $ % ^ &amp; * symbols allowed.Password should be atleast 6 Characters</td>

  </tr>

  <tr>

  <td><label  style="color:#069;font-weight:bold;">Confirm New Password</label></td>

    <td><input type="password" class="form-control" name="cnewpassword" id="cnewpassword" required></td>

     <td width="45%"></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td colspan="2"><input type="hidden" name="hidCid" value="<?php echo $cid; ?>"><input type="submit" name="submit"  value="Proceed To Change" class="btn btn-success"> <input type="button" name="back" onClick="window.location.href='categories.php'"  value="Go Back To Companies" class="btn btn-warning"> </td>

  </tr>

</table>

    </form>



                      

                      

                      

                  </div>

                </div>

              

              </div>

            </div>

          </div>

        </div>

        <!-- /page content -->



        <!-- footer content -->

        <?php include_once('footerpanel.php') ?>

        <!-- /footer content -->

      </div>

    </div>



   

  </body>

</html>

