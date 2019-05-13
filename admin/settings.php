<?php
ob_start();
session_start();
include('../db_class/dbconfig.php');
include('../db_class/message.php');
include('../db_class/hr_functions.php');
$buid=$_SESSION['buid'];
$projtype=$_SESSION['ptype'];

checkIntrusion($buid,$builderbaseurl);


$nonExArr=getAdminDetailById($conn,$buid);

$image=$nonExArr['logo'];
if($image==''){
	$image="noimage.png";
}

if(isset($_POST['submit'])){
		$name=mysqli_real_escape_string($conn,$_POST['name']);
		$rera=mysqli_real_escape_string($conn,$_POST['rera']);
		$pmobile=mysqli_real_escape_string($conn,$_POST['pmobile']);
		$smobile=mysqli_real_escape_string($conn,$_POST['smobile']);
		$email=mysqli_real_escape_string($conn,$_POST['email']);
		 $query = "Update `admin` set `name`='$name' ,`tin`='$rera',`primarycontact`='$pmobile' ,`secondarycontact`='$smobile' ,`email`='$email'  WHERE `id`='$buid'";
		
		$result = mysqli_query($conn,$query);
		$nwsimg=$_FILES['logo']['name'];
		if( $result)
		 {
			 
			
		
		if($nwsimg!=''){
		$newsimagename=cleanname(basename($_FILES['logo']['name']));
		$newsimagenamesrc=$_FILES['logo']['tmp_name'];
		$postednewsdate=base64_encode(date('Y-m-d h:i:s'));
		$imgName=$postednewsdate."_".$newsimagename;
		$moveimg=move_uploaded_file($newsimagenamesrc,'../docs/'.$imgName);
		if($moveimg){
				 $query = mysqli_query($conn,"Update `admin` set `logo`='$imgName'   WHERE `id`='$buid'");
				
		}else{
		//	$pdf='';	
		}
		}
			
			 
			 	
			 header("location:settings.php?msg=ups");
		 }else{
			 header("location:settings.php?msg=upf"); 
			 
		 }
	
}

if(isset($_GET['msg']) && $_GET['msg']!=''){
$msg=$_GET['msg'];
	if($msg=='ups'){
		$msgText="Data has been updated successfully!"	;
		$className="success";
	}
	elseif($msg=='upf'){
		$msgText="Data not updated successfully!"	;
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

    <title>Tour & Travel  | </title>

   
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
	<div class='btn-<?php echo $className ?>' style="text-align:center;padding:5px;"><?php echo $msgText ?> <span style="float:right;cursor:pointer;font-weight:bold;" onClick="window.location.href='settings.php'"> X </span></div>
<?php }?>
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Settings</h2>
                     
                    <div class="clearfix"></div>
                   
                  </div>
                  <div class="x_content">
                      <form action="" method="post" onSubmit="return validate()" enctype="multipart/form-data">
    <table width="100%" border="0" class="table table-striped table-bordered">
    
            <tr>
                <td><label style="color:#069;font-weight:bold;">Company Name*</label></td>
                <td width="28%"><input type="text" name="name" id="name" class="form-control" value="<?php echo htmlentities(stripslashes($nonExArr['name'])) ?>" required></td>
                <td width="45%"></td>
            </tr>
            <tr>
                <td><label style="color:#069;font-weight:bold;">Tin/GST Number</label></td>
                <td width="28%"><input type="text" name="rera" id="rera" class="form-control"  value="<?php echo htmlentities(stripslashes($nonExArr['tin'])) ?>" ></td>
                <td width="45%"></td>
            </tr>
            <tr>
                <td><label  style="color:#069;font-weight:bold;">Email*</label></td>
                <td><input type="text" class="form-control" name="email" id="email"  value="<?php echo htmlentities(stripslashes($nonExArr['email'])) ?>" required></td>
                <td width="45%"></td>
            </tr>
            <tr>
                <td><label  style="color:#069;font-weight:bold;">Primary Mobile*</label></td>
                <td><input type="text" class="form-control" name="pmobile" id="pmobile"  value="<?php echo htmlentities(stripslashes($nonExArr['primarycontact'])) ?>" required></td>
                <td width="45%"></td>
            </tr>
            <tr>
                <td><label  style="color:#069;font-weight:bold;">Secondary Mobile</label></td>
                <td><input type="text" class="form-control" name="smobile" id="smobile"  value="<?php echo htmlentities(stripslashes($nonExArr['secondarycontact'])) ?>" required></td>
                <td width="45%"></td>
            </tr>
            <tr>
                <td><label  style="color:#069;font-weight:bold;">Update Logo</label></td>
                <td><input type="file" class="form-control" name="logo" id="logo" ></td>
                <td width="45%"><img src="../docs/<?php echo $image ?>" width="80px" height="60px;"></td>
            </tr>
  
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><input type="submit" name="submit"  value="Proceed To Change" class="btn btn-success"> </td>
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
