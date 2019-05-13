<?php
ob_start();
session_start();
include('../db_class/dbconfig.php');
include('../db_class/hr_functions.php');

$buid=$_SESSION['buid'];
checkIntrusion($buid,$builderbaseurl);

$destid=$_GET['id'];
$destination =getcountryNameById($conn,$destid);

$title="$destination - Location Management";

$page="location.php";

//$colname='e_brochure_file';






if(isset($_POST['update'])){

	

	extract($_POST);

	$id=$_POST['hidId'];
	
	$name=mysqli_real_escape_string($conn,$name);
	$description=mysqli_real_escape_string($conn,$description);


	$insQry=mysqli_query($conn,"UPDATE `location` SET  `name` = '$name' , `description`='$description'   where`id` = '$id'");

	if($insQry){

		//	updatelogs($conn,3,$buid,$buid,1,$projtype);
		header("location:".$page."?msg=ups&id=$destid");
	}else{
		header("location:".$page."?msg=upf&id=$destid");
	}

	

	

}





if(isset($_GET['did'])){

	$did=base64_decode($_GET['did']);

		$insQry=mysqli_query($conn,"delete  from   `location`  where`id` = '$did';");

	if($insQry){

		//	updatelogs($conn,3,$buid,$buid,1,$projtype);

		header("location:".$page."?msg=dls&id=$destid");

	}else{

		header("location:".$page."?msg=dlf&id=$destid");

	}



}



if(isset($_POST['submit'])){

	extract($_POST);
	$name=mysqli_real_escape_string($conn,$name);
	$description=mysqli_real_escape_string($conn,$description);
	$destid=$hidId;
	
	$insQry=mysqli_query($conn,"INSERT INTO `location` (`id`,  `description`, `name`,`countryid`) VALUES (NULL,  '$description', '$name','$destid');");

	if($insQry){

			//updatelogs($conn,3,$buid,$buid,1,$projtype);

		header("location:".$page."?msg=ins&id=$destid");

	}else{

		header("location:".$page."?msg=inf&id=$destid");

	}

	

	

}





if(isset($_GET['msg'])){

	$msg=$_GET['msg'];

	switch($msg){

	case 'ins':

		$msgText="Content has been added successfully";

		$className="success";

	break;

	

	case 'inf':

		$msgText="Content was not added successfully";

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



    <title>Bosh Education</title>



   

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

	var name=document.getElementById('name').value;
	name=name.trim();
description=document.getElementById('description').value;
	description=description.trim();

	if(name==''){

	

		alert("Please enter name ");

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

	<div class='btn-<?php echo $className ?>' style="text-align:center;padding:5px;"><?php echo $msgText ?> <span style="float:right;cursor:pointer;font-weight:bold;" onClick="window.location.href='<?php echo $page; ?>?id=<?php echo $destid ?>'"> X </span></div>

<?php }?>

                <div class="x_panel">
<span style="float:right;"><a href="country.php">Go Back To Countries</a></span>
                  <div class="x_title">

                    <h2><?php echo $title; ?> </h2>

                  

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    
                     <?php if( isset($_GET['eid']) && ($_GET['eid']!='')){

						$eid= base64_decode($_GET['eid']);

						$categoryArr=getlocationdetails($conn,$eid);
                     

						 

					  ?>

                     

                     <form action=""  method="Post"  onSubmit="return validate()" enctype="multipart/form-data"> 

                     <table width="100%" border="0" class="table table-striped table-bordered">

    

            <tr>

                <td><label style="color:#069;font-weight:bold;">Name</label></td>

                <td width="28%"><input type="text" name="name" id="name" class="form-control" value="<?php echo htmlentities(stripslashes($categoryArr['name'])) ?>" ></td>

                <td width="45%"></td>

            </tr>

            

           <!--<tr>

                <td><label style="color:#069;font-weight:bold;">Add Image *</label></td>

                <td width="28%"><input type="file" name="image" id="image" class="form-control"  value=""  ></td>

                <td width="45%"></td>

            </tr>--> 

           

            
            
               

  

  

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

                <td><label style="color:#069;font-weight:bold;"> Location Name*</label></td>

                <td width="28%"><input type="text" name="name" id="name" class="form-control" value="" ></td>

                <td width="45%"></td>

            </tr>


            
<!--<tr>

                <td><label style="color:#069;font-weight:bold;">Add Banner *</label></td>

                <td width="28%"><input type="file" name="image" id="image" class="form-control"  value=""  ></td>

                <td width="45%"></td>

            </tr>-->
         

            
               

  

  

  <tr>

    <td>&nbsp;</td>

    <td colspan="2"><input type="hidden" name="hidId" id="hidId" value="<?php echo $destid; ?>"><input type="submit" name="submit"  value="Proceed To Add" class="btn btn-success"> </td>

  </tr>

</table>



                     </form>

                     

                     <?php }?>

                     

                     <div>

                     <table width="100%" border="0" class="table table-bordered table">

  

  <tr>

            <th width="3%">Sno</th>
           
           
          
             <th width="50%"> Name</th>
         
           
            <th width="12%" style="text-align:center;">Action</th>
             <th width="10%" style="text-align:center;">Approval</th>

  </tr>

  <?php

  //echo "SELECT * FROM $table where `projid`='$buid' and `whichcontent`='2' order by id asc ";

    $ds=mysqli_query($conn,"SELECT * FROM `location`  where `countryid`='$destid' order by `id` desc " ); 

	$numrows=mysqli_num_rows($ds);

	

	if(  $numrows >0){

		while($fetch=mysqli_fetch_array($ds)){

			$id=$fetch['id'];

			$i++;

			$name=$fetch['name'];
			
		
           

			

			?>

			

		    <tr>

                <td><?php echo $i; ?></td>
               
                <td><b><?php echo $name; ?></b></td>
                
               
              
                 


                <td style="text-align:center;">&nbsp;&nbsp;<a href="<?php echo $page ?>?eid=<?php echo base64_encode($id); ?>&id=<?php echo $destid ?>" style="color:#06F;">Edit</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a onClick="return confirm('Are you sure you want to delete!')" href="<?php echo $page ?>?did=<?php echo base64_encode($id); ?>&id=<?php echo $destid ?>" style="color:#F00;">Delete</a>

                

             

                </th>
                <td><table width="100%" border="0" class="table table-bordered table-striped">

  <tr>

   <td align="left" style="width:30px"  ><input class='uniform' type="checkbox" id="check<?php echo $fetch['id']  ?>" value="<?php echo $fetch['status']  ?>" onClick="updateStatus('<?php echo $fetch['id'];  ?>','testimonial',4)" <?php if($fetch['status']==1){echo 'checked';} ?>></td>

        

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

