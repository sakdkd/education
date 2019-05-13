<?php
ob_start();
session_start();
include('../db_class/dbconfig.php');
include('../db_class/hr_functions.php');

$buid=$_SESSION['buid'];
checkIntrusion($buid,$builderbaseurl);

$title="Company Management";

$page="categories.php";

//$colname='e_brochure_file';






if(isset($_POST['update'])){

	

	extract($_POST);

	$id=$_POST['hidId'];
	$catArr=getAdminDetailById($conn,$id);
	$logo=$catArr['logo'];
	$name=mysqli_real_escape_string($conn,$name);
	$address=mysqli_real_escape_string($conn,$address);
	$username=mysqli_real_escape_string($conn,$username);
	$primarycontact=mysqli_real_escape_string($conn,$primarycontact);
	$secondarycontact=mysqli_real_escape_string($conn,$secondarycontact);
	$tin=mysqli_real_escape_string($conn,$tin);

	$nwsimg=$_FILES['logo']['name'];
	
	if($nwsimg!=''){
		$newsimagename=cleanname(basename($_FILES['logo']['name']));
		$newsimagenamesrc=$_FILES['logo']['tmp_name'];
		$postednewsdate=base64_encode(date('Y-m-d h:i:s'));
		$imgName=$postednewsdate."_".$newsimagename;
		$moveimg=move_uploaded_file($newsimagenamesrc,'../docs/'.$imgName);
		if($moveimg){
			$logo=$imgName;
		}
	}
	



	$insQry=mysqli_query($conn,"UPDATE `admin` SET  `name` = '$name' , `address`='$address' ,`username`='$username' ,`logo`='$logo',`primarycontact`='$primarycontact'   ,`secondarycontact`='$secondarycontact' ,`tin`='$tin' where`id` = '$id';");

	if($insQry){

		//	updatelogs($conn,3,$buid,$buid,1,$projtype);
		header("location:".$page."?msg=ups");
	}else{
		header("location:".$page."?msg=upf");
	}

	

	

}





if(isset($_GET['did'])){

	$did=base64_decode($_GET['did']);

		$insQry=mysqli_query($conn,"update  admin  set `view`='0' where`id` = '$did';");

	if($insQry){

		//	updatelogs($conn,3,$buid,$buid,1,$projtype);

		header("location:".$page."?msg=dls");

	}else{

		header("location:".$page."?msg=dlf");

	}



}



if(isset($_POST['submit'])){

	extract($_POST);
	$name=mysqli_real_escape_string($conn,$name);
	$address=mysqli_real_escape_string($conn,$address);
	$username=mysqli_real_escape_string($conn,$username);
	$primarycontact=mysqli_real_escape_string($conn,$primarycontact);
	$secondarycontact=mysqli_real_escape_string($conn,$secondarycontact);
	$tin=mysqli_real_escape_string($conn,$tin);
	$password=md5(mysqli_real_escape_string($conn,$password));

	$nwsimg=$_FILES['logo']['name'];
	if($nwsimg!=''){
		$newsimagename=cleanname(basename($_FILES['logo']['name']));
		$newsimagenamesrc=$_FILES['logo']['tmp_name'];
		$postednewsdate=base64_encode(date('Y-m-d h:i:s'));
		$imgName=$postednewsdate."_".$newsimagename;
		$moveimg=move_uploaded_file($newsimagenamesrc,'../docs/'.$imgName);
		if($moveimg){
			$logo=$imgName;
		}else{
			$logo='';	
		}
	}
	
	


	$insQry=mysqli_query($conn,"INSERT INTO `admin` (`id`, `username`, `password`, `status`, `view`, `name`, `address`, `primarycontact`, `secondarycontact`, `tin`, `logo`, `key`) VALUES (NULL, '$username', '$password', '1', '1', '$name', '$address', '$primarycontact', '$secondarycontact', '$tin', '$logo', '0');");

	if($insQry){

			//updatelogs($conn,3,$buid,$buid,1,$projtype);

		header("location:".$page."?msg=ins");

	}else{

		header("location:".$page."?msg=ins");

	}

	

	

}





if(isset($_GET['msg'])){

	$msg=$_GET['msg'];

	switch($msg){

	case 'ins':

		$msgText="New Company has been added successfully";

		$className="success";

	break;

	

	case 'inf':

		$msgText="New Company was not added successfully";

		$className="danger";

	break;

	

	

	case 'ups':

		$msgText="Content has been updated successfully";

		$className="success";

	break;

	

	case 'upf':

		$msgText="Content was not updated successfully";

		$className="danger";

	break;

	

	case 'dls':

		$msgText="Content has been deleted successfully";

		$className="success";

	break;

	

	case 'dlf':

		$msgText="Content was not deleted successfully";

		$className="danger";

	break;

	

	

	default:

	    $msgText="";

		$className="";

	break;

		

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



    <title>Tour & Travels</title>



   

    <style>

	.img-circle

   {

	border-radius:5%;   

   }

   .img-circle.profile_img{

	width:90%;   

   }

	</style>

  



<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

<script src="<?php echo $baseurl ?>/js/builder.js"></script>



  <script>



function validate(){

	

	if(document.getElementById('type').value!='3'){

		if(document.getElementById('image').value==''){

		alert("Please select a pdf ");

		return false;	

		}

	}else{

	//alert('dasd')	

	var nicE = new nicEditors.findEditor('answers');

	alert('dasd')	

	question = nicE.getContent();	



	document.getElementById('answers').value=question	

	

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

	<div class='btn-<?php echo $className ?>' style="text-align:center;padding:5px;"><?php echo $msgText ?> <span style="float:right;cursor:pointer;font-weight:bold;" onClick="window.location.href='<?php echo $page; ?>'"> X </span></div>

<?php }?>

                <div class="x_panel">

                  <div class="x_title">

                    <h2><?php echo $title; ?> </h2>

                    

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    
                     <?php if( isset($_GET['eid']) && ($_GET['eid']!='')){

						$eid= base64_decode($_GET['eid']);

						$categoryArr=getAdminDetailById($conn,$eid);
                        $logo=$categoryArr['logo'];
						
						if($logo==''){
							$logo="noimage.jpg";
						}
						
						

						 

					  ?>

                     

                     <form action=""  method="Post"  onSubmit="return validate()" enctype="multipart/form-data"> 

                     <table width="100%" border="0" class="table table-striped table-bordered">

    

            <tr>

                <td><label style="color:#069;font-weight:bold;">Company Name</label></td>

                <td width="28%"><input type="text" name="name" id="name" class="form-control" value="<?php echo htmlentities(stripslashes($categoryArr['name'])) ?>" required></td>

                <td width="45%"></td>

            </tr>

            <tr>

                <td><label style="color:#069;font-weight:bold;">Official Address</label></td>

                <td width="28%"><input type="text" name="address" id="address" class="form-control"  value="<?php echo htmlentities(stripslashes($categoryArr['address'])) ?>" ></td>

                <td width="45%"></td>

            </tr>


            <tr>

                <td><label  style="color:#069;font-weight:bold;">Official Email</label></td>

                <td><input type="text" class="form-control" name="username" id="username"  value="<?php echo htmlentities(stripslashes($categoryArr['username'])) ?>" ></td>

                <td width="45%">* This will be the Username</td>

            </tr>
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Primary Contact No</label></td>

                <td><input type="text" class="form-control" name="primarycontact" id="primarycontact"  value="<?php echo htmlentities(stripslashes($categoryArr['primarycontact'])) ?>" ></td>

                <td width="45%"></td>

            </tr>
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Secondary Contact No</label></td>

                <td><input type="text" class="form-control" name="secondarycontact" id="secondarycontact"  value="<?php echo htmlentities(stripslashes($categoryArr['secondarycontact'])) ?>" ></td>

                <td width="45%"></td>

            </tr>
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Tin/Tax No</label></td>

                <td><input type="text" class="form-control" name="tin" id="tin"  value="<?php echo htmlentities(stripslashes($categoryArr['tin'])) ?>" ></td>

                <td width="45%"></td>

            </tr>


           

            <tr>

                <td><label  style="color:#069;font-weight:bold;">Update Logo</label></td>

                <td><input type="file" class="form-control" name="logo" id="logo" ></td>

                <td width="45%"><img src="../docs/<?php echo $logo ?>" width="80px" height="60px;"></td>

            </tr>
            
               

  

  

  <tr>

    <td>&nbsp;</td>

    <td colspan="2"><input type="hidden" name="hidId" id="hidId" value="<?php echo $eid; ?>"><input type="submit" name="update"  value="Proceed To Change" class="btn btn-success"> </td>

  </tr>

</table>



                     </form>

                     <?php }else{?>

                     <form action=""  method="Post"  onSubmit="return validate()" enctype="multipart/form-data"> 

                     <table width="100%" border="0" class="table table-striped table-bordered">

    

            <tr>

                <td><label style="color:#069;font-weight:bold;">Company Name*</label></td>

                <td width="28%"><input type="text" name="name" id="name" class="form-control" value="" required></td>

                <td width="45%"></td>

            </tr>

            <tr>

                <td><label style="color:#069;font-weight:bold;">Official Address *</label></td>

                <td width="28%"><input type="text" name="address" id="address" class="form-control"  value=""  required></td>

                <td width="45%"> </td>

            </tr>

            <tr>

                <td><label  style="color:#069;font-weight:bold;">Official Email</label></td>

                <td><input type="text" class="form-control" name="username" id="username"  value="" ></td>

                <td width="45%">* <span style="color:#0066CC;">This will be the Username</span></td>

            </tr>
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Primary Contact No</label></td>

                <td><input type="text" class="form-control" name="primarycontact" id="primarycontact"  value="" ></td>

                <td width="45%"></td>

            </tr>
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Secondary Contact No</label></td>

                <td><input type="text" class="form-control" name="secondarycontact" id="secondarycontact"  value="" ></td>

                <td width="45%"></td>

            </tr>
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Tin/Tax No</label></td>

                <td><input type="text" class="form-control" name="tin" id="tin"  value="" ></td>

                <td width="45%"></td>

            </tr>

         

            <tr>

                <td><label  style="color:#069;font-weight:bold;">Add Logo </label></td>

                <td><input type="file" class="form-control" name="logo" id="logo" ></td>

                <td width="45%"></td>

            </tr>
            
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Password</label></td>

                <td><input type="password" class="form-control" name="password" id="password"  value="" ></td>

                <td width="45%"></td>

            </tr>
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Confirm Password</label></td>

                <td><input type="text" class="form-control" name="cpassword" id="cpassword"  value="" ></td>

                <td width="45%"></td>

            </tr>
             <!--  <tr>

                <td><label  style="color:#069;font-weight:bold;">Add Banner</label></td>

                <td><input type="file" class="form-control" name="banner" id="banner" ></td>

                <td width="45%"></td>

            </tr>-->

  

  

  <tr>

    <td>&nbsp;</td>

    <td colspan="2"><input type="submit" name="submit"  value="Proceed To Add" class="btn btn-success"> </td>

  </tr>

</table>



                     </form>

                     

                     <?php }?>

                     

                     <div>

                     <table width="100%" border="0" class="table table-bordered table">

  

  <tr>

            <th width="5%">Sno</th>
            <th width="8%">Logo</th>
            <th width="15%">Company Name</th>
            <th width="10%">Email</th>
            <th width="10%">Contact</th>
             <th width="25%">Address</th>
             <th width="5%">Password</th>
            <th width="12%" style="text-align:center;">Action</th>
             <th width="12%" style="text-align:center;">Approval</th>

  </tr>

  <?php

  //echo "SELECT * FROM $table where `projid`='$buid' and `whichcontent`='2' order by id asc ";

    $ds=mysqli_query($conn,"SELECT * FROM admin where `view`='1' and `key`='0'  order by `id` desc " ); 

	$numrows=mysqli_num_rows($ds);

	

	if(  $numrows >0){

		while($fetch=mysqli_fetch_array($ds)){

			$id=$fetch['id'];

			$i++;

			$name=$fetch['name'];
			$address=$fetch['address'];
			$email=$fetch['username'];
			$imagepath=$fetch['logo'];
			$primarycontact=$fetch['primarycontact'];

			if($imagepath==""){
				$imagepath="noimage.jpg";
			}

			

			

			?>

			

		    <tr>

                <td><?php echo $i; ?></td>
                <td>
						<img src="<?php echo $baseurl ?>/docs/<?php echo $imagepath; ?>" width="50" height="50">
                </td>
                 
                <td><b><?php echo $name; ?></b></td>
                
                   <td><?php echo $email; ?></td>
                     <td><?php echo $primarycontact; ?></td>
                     
 <td><?php echo $address; ?></td>
 <td style="text-align:center;"><a href="changepasscode.php?id=<?php echo base64_encode($fetch['id']); ?>"><img src="<?php echo $baseurl ?>/images/cp.png" width="24" ></a></td>
                <td style="text-align:center;">&nbsp;&nbsp;<a href="<?php echo $page ?>?eid=<?php echo base64_encode($id); ?>" style="color:#06F;">Edit</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a onclick="return confirm('Are you sure you want to delete!')" href="<?php echo $page ?>?did=<?php echo base64_encode($id); ?>" style="color:#F00;">Delete</a> 

                

             

                </th>

                <td><table width="100%" border="0" class="table table-bordered table-striped">

  <tr>

   <td align="left" style="width:30px"  ><input class='uniform' type="checkbox" id="check<?php echo $fetch['id']  ?>" value="<?php echo $fetch['status']  ?>" onClick="updateStatus('<?php echo $fetch['id'];  ?>','admin',3)" <?php if($fetch['status']==1){echo 'checked';} ?>></td>

        

        <td align="left"  class="smalltext" width="50px"><div  style="width:50px" id="status<?php echo $fetch['id']  ?>" ><?php echo getStatus($fetch['status']);  ?></div></td>

  </tr>

</table></td>

                

 			 </tr> 

		    

			

			

		<?php }

		

		

		

	}

  

  ?>







 

  </table>

 					 </div>

                   

                     


					 

                     

					

                    

                    


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

    <script>

	function checkType(val){

		//alert(val)

		if(val==3){

			 $('#textonly').show('slow')	

			//CKEDITOR.replace( 'answers' );

			//alert('das')

			 $('#imgonly').hide()	

			 document.getElementById('cont').innerHTML=''

			 

			 $('#label').html('Update Content')	 

		}else{

			 $('#textonly').hide()

			 $('#imgonly').show('slow')	

			  $('#label').html('Browse (Image/PDF version only)') 	 

		}

	}

	</script>

 <script>

			CKEDITOR.replace( 'answers' );

		</script>

   

  </body>

</html>

