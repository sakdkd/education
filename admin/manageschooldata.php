<?php
ob_start();
session_start();
include('../db_class/dbconfig.php');
include('../db_class/hr_functions.php');

$buid=$_SESSION['buid'];
checkIntrusion($buid,$builderbaseurl);

$title="School Data Management";

$page="manageschooldata.php";

//$colname='e_brochure_file';
$allLocations=0;
$locationId=$_GET['id'];
$locationName=getlocationNameById($conn,$locationId);

$countryId=getCountryIdBylocationId($conn,$locationId);
$countryName=getcountryNameById($conn,$countryId);




if(isset($_POST['update'])){

	

	extract($_POST);

	$id=$_POST['hidId'];
	$catArr=getSchoolsDetailById($conn,$id);
	$logo=$catArr['logo'];
	$name=mysqli_real_escape_string($conn,$name);
	$address=mysqli_real_escape_string($conn,$address);
	$email=mysqli_real_escape_string($conn,$email);
	$primarycontact=mysqli_real_escape_string($conn,$primarycontact);
	$secondarycontact=mysqli_real_escape_string($conn,$secondarycontact);
	$website=mysqli_real_escape_string($conn,$website);
	$schooltype=mysqli_real_escape_string($conn,$schooltype);
	$gradelevel=mysqli_real_escape_string($conn,$gradelevel);

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
	



	$insQry=mysqli_query($conn,"UPDATE `schools` SET  `name` = '$name' , `address`='$address' ,`email`='$email' ,`logo`='$logo',`primarycontact`='$primarycontact'   ,`secondarycontact`='$secondarycontact' ,`website`='$website' ,`schooltype` = '$schooltype', `gradelevel` = '$gradelevel', `competitiveness` = '$competitiveness', `studenttype` = '$studenttype', `admissiontype` = '$admissiontype', `graduates` = '$graduates' where`id` = '$id';");

	if($insQry){

		//	updatelogs($conn,3,$buid,$buid,1,$projtype);
		header("location:".$page."?msg=ups&id=$locationId");
	}else{
		header("location:".$page."?msg=upf&id=$locationId");
	}

	

	

}





if(isset($_GET['did'])){

	$did=base64_decode($_GET['did']);

		$insQry=mysqli_query($conn,"update  schools  set `view`='0' where`id` = '$did';");

	if($insQry){

		//	updatelogs($conn,3,$buid,$buid,1,$projtype);

		header("location:".$page."?msg=dls&id=$locationId");

	}else{

		header("location:".$page."?msg=dlf&id=$locationId");

	}



}



if(isset($_POST['submit'])){

	extract($_POST);
	$name=mysqli_real_escape_string($conn,$name);
	$address=mysqli_real_escape_string($conn,$address);
	$email=mysqli_real_escape_string($conn,$email);
	$primarycontact=mysqli_real_escape_string($conn,$primarycontact);
	$secondarycontact=mysqli_real_escape_string($conn,$secondarycontact);
	$website=mysqli_real_escape_string($conn,$website);
	$schooltype=mysqli_real_escape_string($conn,$schooltype);
	$gradelevel=mysqli_real_escape_string($conn,$gradelevel);
	
	//$password=md5(mysqli_real_escape_string($conn,$password));

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
	
	


	$insQry=mysqli_query($conn,"INSERT INTO `schools` (`id`, `status`, `view`, `name`, `address`, `primarycontact`, `secondarycontact`, `website`, `logo`, `locationid`, `email`, `schooltype`, `gradelevel`, `competitiveness`, `studenttype`, `admissiontype`, `graduates`) VALUES (NULL, '1', '1', '$name', '$address', '$primarycontact', '$secondarycontact', '$website', '$logo', '$hidId', '$email', '$schooltype', '$gradelevel', '$competitiveness', '$studenttype', '$admissiontype', '$graduates');");

	if($insQry){

			//updatelogs($conn,3,$buid,$buid,1,$projtype);

		header("location:".$page."?msg=ins&id=$hidId");

	}else{

		header("location:".$page."?msg=ins&id=$hidId");

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



    <title><?php echo getSiteName($conn)?></title>



   

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

	<div class='btn-<?php echo $className ?>' style="text-align:center;padding:5px;"><?php echo $msgText ?> <span style="float:right;cursor:pointer;font-weight:bold;" onClick="window.location.href='<?php echo $page; ?>?id=<?php echo $locationId; ?>'"> X </span></div>

<?php }?>

                <div class="x_panel">

                  <div class="x_title">

                   <h2><span style="color:#FF0000;"><?php echo $countryName; ?></span> / <span style="color:#0066CC;"><?php echo $locationName; ?></span> / <?php echo $title; ?> </h2>

                    

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    
                     <?php if( isset($_GET['eid']) && ($_GET['eid']!='')){

						$eid= base64_decode($_GET['eid']);

						$categoryArr=getSchoolsDetailById($conn,$eid);
                        $logo=$categoryArr['logo'];
						
						if($logo==''){
							$logo="noimage.jpg";
						}
						
						

						 

					  ?>

                     

                     <form action=""  method="Post"  onSubmit="return validate()" enctype="multipart/form-data"> 

                     <table width="100%" border="0" class="table table-striped table-bordered">

    

            <tr>

                <td><label style="color:#069;font-weight:bold;">School Name</label></td>

                <td width="28%"><input type="text" name="name" id="name" class="form-control" value="<?php echo htmlentities(stripslashes($categoryArr['name'])) ?>" required></td>

                <td width="45%"></td>

            </tr>

            <tr>

                <td><label style="color:#069;font-weight:bold;">Official Address</label></td>

                <td width="28%"><input type="text" name="address" id="address" class="form-control"  value="<?php echo htmlentities(stripslashes($categoryArr['address'])) ?>" ></td>

                <td width="45%"></td>

            </tr>


            <tr>

                <td><label  style="color:#069;font-weight:bold;">Admission Email</label></td>

                <td><input type="text" class="form-control" name="email" id="email"  value="<?php echo htmlentities(stripslashes($categoryArr['email'])) ?>" ></td>

                <td width="45%"></td>

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

                <td><label  style="color:#069;font-weight:bold;">Website</label></td>

                <td><input type="text" class="form-control" name="website" id="website"  value="<?php echo htmlentities(stripslashes($categoryArr['website'])) ?>" ></td>

                <td width="45%"></td>

            </tr>

 <tr>

                <td><label  style="color:#069;font-weight:bold;">School Type </label></td>

                <td><input type="text" class="form-control" name="schooltype" id="schooltype" value="<?php echo htmlentities(stripslashes($categoryArr['schooltype'])) ?>" ></td>

                <td width="45%"></td>

            </tr>
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Grade Levels</label></td>

                <td><input type="text" class="form-control" name="gradelevel" id="gradelevel"  value="<?php echo htmlentities(stripslashes($categoryArr['gradelevel'])) ?>" ></td>

                <td width="45%"></td>

            </tr>
            <tr>
                <td><label  style="color:#069;font-weight:bold;">Competitiveness</label></td>
                <td colspan="2">  <div>
                 <?php 
				$ds=mysqli_query($conn,"SELECT * FROM `competitiveness` where `status`='1' and `view`='1' order by `id`   " ); 
				$numrows=mysqli_num_rows($ds);
				if( $numrows >0){
				while($fetch=mysqli_fetch_array($ds)){
					$a++;
				?>
               <div style="float:left;width:150px;padding:5px;border:solid 1px #CCCCCC;margin:5px;text-align:left;"><input <?php if($categoryArr['competitiveness']==$fetch['id']){ ?> checked <?php }?>  type="radio" name="competitiveness" value="<?php echo $fetch['id'] ?>">&nbsp; &nbsp; <?php echo $fetch['name'] ?></div>
				
				
				<?php }}?>
                </div>   </td>
                
            </tr>
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Student Types</label></td>

                <td colspan="2"><div>
                 <?php 
				$ds=mysqli_query($conn,"SELECT * FROM `studenttype` where `status`='1' and `view`='1' order by `id`   " ); 
				$numrows=mysqli_num_rows($ds);
				if( $numrows >0){
				while($fetch=mysqli_fetch_array($ds)){
					$b++;
				?>
               <div style="float:left;width:150px;padding:5px;border:solid 1px #CCCCCC;margin:5px;text-align:left;"><input type="radio"  <?php if($categoryArr['studenttype']==$fetch['id']){ ?> checked <?php }?> name="studenttype" value="<?php echo $fetch['id'] ?>">&nbsp; &nbsp; <?php echo $fetch['name'] ?></div>
				
				
				<?php }}?>
                </div></td>

            
            </tr>
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Admission Type</label></td>

                <td colspan="2"><div>
                 <?php 
				$ds=mysqli_query($conn,"SELECT * FROM `admissiontype` where `status`='1' and `view`='1' order by `id`   " ); 
				$numrows=mysqli_num_rows($ds);
				if( $numrows >0){
				while($fetch=mysqli_fetch_array($ds)){
					$c++;
				?>
               <div style="float:left;width:150px;padding:5px;border:solid 1px #CCCCCC;margin:5px;text-align:left;"><input  <?php if($categoryArr['admissiontype']==$fetch['id']){ ?> checked <?php }?> type="radio" name="admissiontype" value="<?php echo $fetch['id'] ?>">&nbsp; &nbsp; <?php echo $fetch['name'] ?></div>
				
				
				<?php }}?>
                </div></td>

               

            </tr>
            
            
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Graduates</label></td>

                <td colspan="2"><input type="text" class="form-control" name="graduates" id="graduates" value="<?php echo htmlentities(stripslashes($categoryArr['graduates'])) ?>" ></td>

               

            </tr>
           

            <tr>

                <td><label  style="color:#069;font-weight:bold;">Update Logo</label></td>

                <td><input type="file" class="form-control" name="logo" id="logo" ></td>

                <td width="45%"><img src="../docs/<?php echo $logo ?>" width="80px" height="60px;"></td>

            </tr>
            
               

  

  

  <tr>

    <td>&nbsp;</td>

    <td colspan="2"><input type="hidden" name="hidId" id="hidId" value="<?php echo $eid; ?>"><input type="hidden" name="hidcity" id="hidcity" value="<?php echo $locationId; ?>"><input type="submit" name="update"  value="Proceed To Change" class="btn btn-success"> </td>

  </tr>

</table>



                     </form>

                     <?php }else{?>

                     <form action=""  method="Post"  onSubmit="return validate()" enctype="multipart/form-data"> 

                     <table width="100%" border="0" class="table table-striped table-bordered">

    

            <tr>

                <td><label style="color:#069;font-weight:bold;">School Name* </label></td>

                <td width="28%"><input type="text" name="name" id="name" class="form-control" value="" required></td>

                <td width="45%"></td>

            </tr>

            <tr>

                <td><label style="color:#069;font-weight:bold;">Official Address *</label></td>

                <td width="28%"><input type="text" name="address" id="address" class="form-control"  value=""  required></td>

                <td width="45%"> </td>

            </tr>

            <tr>

                <td><label  style="color:#069;font-weight:bold;">Admission Email</label></td>

                <td><input type="text" class="form-control" name="email" id="email"  value="" ></td>

                <td width="45%"></td>

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

                <td><label  style="color:#069;font-weight:bold;">Website </label></td>

                <td><input type="text" class="form-control" name="website" id="website"  value="" ></td>

                <td width="45%"></td>

            </tr>

         

            
            
             <tr>

                <td><label  style="color:#069;font-weight:bold;">School Type </label></td>

                <td><input type="text" class="form-control" name="schooltype" id="schooltype"  value="" ></td>

                <td width="45%"></td>

            </tr>
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Grade Levels</label></td>

                <td><input type="text" class="form-control" name="gradelevel" id="gradelevel"  value="" ></td>

                <td width="45%"></td>

            </tr>
            <tr>
                <td><label  style="color:#069;font-weight:bold;">Competitiveness</label></td>
                <td colspan="2">  <div>
                 <?php 
				$ds=mysqli_query($conn,"SELECT * FROM `competitiveness` where `status`='1' and `view`='1' order by `id`   " ); 
				$numrows=mysqli_num_rows($ds);
				if( $numrows >0){
				while($fetch=mysqli_fetch_array($ds)){
					$a++;
				?>
               <div style="float:left;width:150px;padding:5px;border:solid 1px #CCCCCC;margin:5px;text-align:left;"><input  type="radio" name="competitiveness" value="<?php echo $fetch['id'] ?>">&nbsp; &nbsp; <?php echo $fetch['name'] ?></div>
				
				
				<?php }}?>
                </div>   </td>
                
            </tr>
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Student Types</label></td>

                <td colspan="2"><div>
                 <?php 
				$ds=mysqli_query($conn,"SELECT * FROM `studenttype` where `status`='1' and `view`='1' order by `id`   " ); 
				$numrows=mysqli_num_rows($ds);
				if( $numrows >0){
				while($fetch=mysqli_fetch_array($ds)){
					$b++;
				?>
               <div style="float:left;width:150px;padding:5px;border:solid 1px #CCCCCC;margin:5px;text-align:left;"><input type="radio" name="studenttype" value="<?php echo $fetch['id'] ?>">&nbsp; &nbsp; <?php echo $fetch['name'] ?></div>
				
				
				<?php }}?>
                </div></td>

            
            </tr>
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Admission Type</label></td>

                <td colspan="2"><div>
                 <?php 
				$ds=mysqli_query($conn,"SELECT * FROM `admissiontype` where `status`='1' and `view`='1' order by `id`   " ); 
				$numrows=mysqli_num_rows($ds);
				if( $numrows >0){
				while($fetch=mysqli_fetch_array($ds)){
					$c++;
				?>
               <div style="float:left;width:150px;padding:5px;border:solid 1px #CCCCCC;margin:5px;text-align:left;"><input  type="radio" name="admissiontype" value="<?php echo $fetch['id'] ?>">&nbsp; &nbsp; <?php echo $fetch['name'] ?></div>
				
				
				<?php }}?>
                </div></td>

               

            </tr>
            
            
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Graduates</label></td>

                <td colspan="2"><input type="text" class="form-control" name="graduates" id="graduates" ></td>

               

            </tr>

  
<tr>

                <td><label  style="color:#069;font-weight:bold;">Add Logo </label></td>

                <td><input type="file" class="form-control" name="logo" id="logo" ></td>

                <td width="45%"></td>

            </tr>
  

  <tr>

    <td>&nbsp;</td>

    <td colspan="2"><input type="submit" name="submit"  value="Proceed To Add" class="btn btn-success"><input type="hidden" name="hidId" id="hidId" value="<?php echo $locationId; ?>"> </td>

  </tr>

</table>



                     </form>

                     

                     <?php }?>

                     

                     <div>

                     <table width="100%" border="0" class="table table-bordered table">

  

  <tr>

            <th width="5%">Sno</th>
            <th width="8%">Logo</th>
            <th width="15%">School Name</th>
            <th width="10%">Email</th>
            <th width="10%">Contact</th>
             <th width="25%">Address</th>
             <th width="12%" style="text-align:center;">Action</th>
             <th width="12%" style="text-align:center;">Approval</th>

  </tr>

  <?php

  //echo "SELECT * FROM $table where `projid`='$buid' and `whichcontent`='2' order by id asc ";

    $ds=mysqli_query($conn,"SELECT * FROM schools where `view`='1' and `locationid`='$locationId'  order by `id` desc " ); 

	$numrows=mysqli_num_rows($ds);

	

	if(  $numrows >0){

		while($fetch=mysqli_fetch_array($ds)){

			$id=$fetch['id'];

			$i++;

			$name=$fetch['name'];
			$address=$fetch['address'];
			$email=$fetch['email'];
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
 <td style="text-align:center;">&nbsp;&nbsp;<a href="<?php echo $page ?>?eid=<?php echo base64_encode($id); ?>&id=<?php echo $locationId; ?>" style="color:#06F;">Edit</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a onclick="return confirm('Are you sure you want to delete!')" href="<?php echo $page ?>?did=<?php echo base64_encode($id); ?>&id=<?php echo $locationId; ?>" style="color:#F00;">Delete</a> 
   
   
   
   
   
   </th>
   
 <td><table width="100%" border="0" class="table table-bordered table-striped">

  <tr>

   <td align="left" style="width:30px"  ><input class='uniform' type="checkbox" id="check<?php echo $fetch['id']  ?>" value="<?php echo $fetch['status']  ?>" onClick="updateStatus('<?php echo $fetch['id'];  ?>','schools',1)" <?php if($fetch['status']==1){echo 'checked';} ?>></td>

        

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

