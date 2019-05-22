<?php
ob_start();
session_start();
include('../db_class/dbconfig.php');
include('../db_class/hr_functions.php');
$buid=$_SESSION['buid'];
checkIntrusion($buid,$builderbaseurl);

$title="Level Subjects & Timings";

$page="addsubjectandtimings.php";

$lid=$_GET['id'];
$level=base64_decode($_GET['id']);
$levelName=getColoumnNameById($conn,'name','edu_levels',$level);



if(isset($_POST['update'])){

	extract($_POST);
	$questions=mysqli_real_escape_string($conn,$questions);
	$timings=mysqli_real_escape_string($conn,$timings); 
	$id=$_POST['hidId'];

	$insQry=mysqli_query($conn,"UPDATE `levelsubjects` SET `questions` = '$questions', `timings` = '$timings', `subject_id` = '$subject' WHERE `levelsubjects`.`id` ='$id';");

	if($insQry){

		//	updatelogs($conn,3,$buid,$buid,1,$projtype);
		header("location:".$page."?msg=ups&id=$lid");
	}else{
		header("location:".$page."?msg=upf&id=$lid");
	}

	

	

}





if(isset($_GET['did'])){

	$did=base64_decode($_GET['did']);

		$insQry=mysqli_query($conn,"update  levelsubjects  set `view`='0' where`id` = '$did';");

	if($insQry){

		//	updatelogs($conn,3,$buid,$buid,1,$projtype);

		header("location:".$page."?msg=dls&id=$lid");

	}else{

		header("location:".$page."?msg=dlf&id=$lid");

	}



}



if(isset($_POST['submit'])){

	extract($_POST);
	$inclusionsall=array();
	$title=mysqli_real_escape_string($conn,$title);
	$days=mysqli_real_escape_string($conn,$days);
	$nights=mysqli_real_escape_string($conn,$nights);
	
	$pdate=date("Y-m-d");
	$ptime=date("h:i a");
	$insQry=mysqli_query($conn,"INSERT INTO `levelsubjects` (`id`, `level_id`, `questions`, `timings`, `status`, `view`, `pdate`, `ptime`, `postedby`, `subject_id`) VALUES (NULL, '$hidId', '$questions', '$timings', '1', '1', '$pdate', '$ptime', '$buid', '$subject');");

	if($insQry){

		

		header("location:".$page."?msg=ins&id=$lid");

	}else{

		header("location:".$page."?msg=ins&id=$lid");

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



    <title><?php echo getSiteName($conn)?></title>



   <script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

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

            <!--  <div class="title_left">

                <h3><?php echo $title; ?></h3>

              </div>-->



              

            </div>



            <div class="clearfix"></div>



            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">

         



<?php if(isset($_GET['msg'])){?>	

	<div class='btn-<?php echo $className ?>' style="text-align:center;padding:5px;"><?php echo $msgText ?> <span style="float:right;cursor:pointer;font-weight:bold;" onClick="window.location.href='<?php echo $page; ?>?id=<?php echo $lid ?>'"> X </span></div>

<?php }?>

                <div class="x_panel">

                  <div class="x_title">

                    <h2><span style="color:#C60;">Attach Subjects & Timings for Level </span> - <span style="color:#0066CC;"><?php echo $levelName; ?></span>  </h2>

                    

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    
                     <?php if( isset($_GET['eid']) && ($_GET['eid']!='')){

						$eid= base64_decode($_GET['eid']);

						$categoryArr=getTableDetailsById($conn,'levelsubjects',$eid);
                      
						 

					  ?>

                     

                     <form action=""  method="Post"  enctype="multipart/form-data" id="subandtime"> 

                     <table width="100%" border="0" class="table table-striped table-bordered">

    

              <tr>
              <td><label style="color:#069;font-weight:bold;">Attach Subject*</label></td>
              <td colspan="3"><select  name="subject" id="subject" class="form-control"  required >
                <option value="">Select Subject</option>
                
                <?php 
				$ds=mysqli_query($conn,"SELECT * FROM `subjects` where `view`='1' order by `id` desc " ); 
				$numrows=mysqli_num_rows($ds);
				if( $numrows >0){
				while($fetch=mysqli_fetch_array($ds)){
				?>
                <option value="<?php echo $fetch['id'] ?>" <?php if($categoryArr['subject_id']==$fetch['id']) {?> selected <?php }?>><?php echo $fetch['name'] ?></option>
				
				
				<?php }}?>
             
                
                </select></td>
            </tr>
           
    <tr>

                <td><label style="color:#069;font-weight:bold;">Add Timings (In Minutes)*</label></td>

                <td width="31%"><input type="text" name="timings" id="timings" class="form-control"  value="<?php echo htmlentities(stripslashes($categoryArr['timings'])) ?>"  required></td>

                <td width="16%"> <label style="color:#069;font-weight:bold;"> Add Questions*</label> </td>
                <td width="34%"><input type="text" class="form-control" name="questions" id="questions"  value="<?php echo htmlentities(stripslashes($categoryArr['questions'])) ?>"  required></td>
            </tr>


  

  <tr>

    <td>&nbsp;</td>

    <td colspan="3"><input type="hidden" name="hidId" id="hidId" value="<?php echo $eid; ?>"><input type="submit" name="update"  value="Proceed To Change" class="btn btn-success"> </td>

  </tr>

</table>



                     </form>

                     <?php }else{?>

                     <form action=""  method="Post" enctype="multipart/form-data"  id="subandtime"> 

                     <table width="100%" border="0" class="table table-striped table-bordered">

    

            <tr>
              <td><label style="color:#069;font-weight:bold;">Attach Subject*</label></td>
              <td colspan="3"><select  name="subject" id="subject" class="form-control"  required >
                <option value="">Select Subject</option>
                
                <?php 
				$ds=mysqli_query($conn,"SELECT * FROM `subjects` where `view`='1' order by `id` desc " ); 
				$numrows=mysqli_num_rows($ds);
				if( $numrows >0){
				while($fetch=mysqli_fetch_array($ds)){
				?>
                <option value="<?php echo $fetch['id'] ?>"><?php echo $fetch['name'] ?></option>
				
				
				<?php }}?>
             
                
                </select></td>
            </tr>
          <tr>

                <td><label style="color:#069;font-weight:bold;">Add Timings (In Minutes)*</label></td>

                <td width="31%"><input type="text" name="timings" id="timings" class="form-control"  value=""  required></td>

                <td width="16%"> <label style="color:#069;font-weight:bold;"> Add Questions*</label> </td>
                <td width="34%"><input type="text" class="form-control" name="questions" id="questions"  value=""  required></td>
            </tr>

           
           
  

  <tr>

    <td>&nbsp;</td>

    <td colspan="3"><input type="submit" name="submit"  value="Proceed To Add" class="btn btn-success"><input type="hidden" name="hidId" id="hidId" value="<?php echo $level; ?>"> </td>
  </tr>
</table>



                    </form>

                     

                     <?php }?>

                     

                     <div>

                   <table class="table table-responsive table-bordered" id="ls-editable-table">

  				            <thead class="thead-dark text-center">

  <tr>

            <th width="3%">Sno</th>
            <th width="36%">Subject</th>
            
            <th width="12%">Timings</th>
           <th width="12%">Questions</th>
            <th width="12%" style="text-align:center;">Action</th>
             <th width="16%" style="text-align:center;">Approval</th>

  </tr>
</thead>
  <?php

  //echo "SELECT * FROM $table where `projid`='$buid' and `whichcontent`='2' order by id asc ";
//echo "SELECT * FROM packages where `view`='1' and `countryid` IN ($allLocations)  order by `id` desc " ;
    $ds=mysqli_query($conn,"SELECT * FROM levelsubjects where `view`='1' and `level_id`='$level' order by `id` desc " ); 

	$numrows=mysqli_num_rows($ds);

	

	if(  $numrows >0){

		while($fetch=mysqli_fetch_array($ds)){

			$id=$fetch['id'];

			$i++;

			$name=$fetch['name'];
			
			

			

			?>

			

		    <tr>

                <td><?php echo $i; ?></td>
               
            
                
                   <td><?php echo getColoumnNameById($conn,'name','subjects',$fetch['subject_id']); ?></td>
                  
                    
                   
                      <td><?php echo $fetch['timings']; ?> minutes</td>
                        <td><?php echo $fetch['questions']; ?> Questions</td>

                <td style="text-align:center;">&nbsp;&nbsp;<a href="<?php echo $page ?>?eid=<?php echo base64_encode($id); ?>&id=<?php echo $lid ?>" style="color:#06F;">Edit</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a onClick="return confirm('Are you sure you want to delete!')" href="<?php echo $page ?>?did=<?php echo base64_encode($id); ?>&id=<?php echo $lid ?>" style="color:#F00;">Delete</a> 

                

             

                </th>

                <td><table width="100%" border="0" class="table table-bordered table-striped">

  <tr>

   <td align="left" style="width:30px"  ><input class='uniform' type="checkbox" id="check<?php echo $fetch['id']  ?>" value="<?php echo $fetch['status']  ?>" onClick="updateStatus('<?php echo $fetch['id'];  ?>','levelsubjects',4)" <?php if($fetch['status']==1){echo 'checked';} ?>></td>

        

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

			CKEDITOR.replace( 'answer' );
			CKEDITOR.replace( 'include' );
			CKEDITOR.replace( 'exclude' );
			CKEDITOR.replace( 'terms' );
			CKEDITOR.replace( 'payment' );

		</script>

   

  </body>

</html>

