<?php
ob_start();
session_start();
include('../db_class/dbconfig.php');
include('../db_class/hr_functions.php');
$buid=$_SESSION['buid'];
checkIntrusion($buid,$builderbaseurl);
    

$title="Question Management";

$page="edit_topics.php";

//$colname='e_brochure_file';


if(isset($_GET['sub_id']))
{
	
	 $encoded=$_GET['sub_id'];
	 $decode_id=base64_decode($encoded);
	$tb_subtype=getTableDetailsById($conn,'subtype',$decode_id);
		$attach_id=$tb_subtype['attachedid'];
						$tb_attach=getTableDetailsById($conn,'levelsubjects',$attach_id);

	 	$subjectid=$tb_attach['subject_id'];
$subject_tb=getTableDetailsById($conn,'subjects',$subjectid);
		$subject_name=$subject_tb['name'];

				$topic_name=$tb_subtype['name'];

}



if(isset($_POST['update'])){

	

	extract($_POST);

	$encodesid=base64_encode($hidsubid);
	
	$topicname=mysqli_real_escape_string($conn,$_POST['topic']);
//echo "UPDATE `attachedtopics` SET  `topics` = '$topicname',`subject_id`='$hidsubjectid' where `subtype_id` = '$hidsubid' and `id`='$hideid'"; die;
$insQry=mysqli_query($conn,"UPDATE `attachedtopics` SET  `topics` = '$topicname',`subject_id`='$hidsubjectid' where `subtype_id` = '$hidsubid' and `id`='$hideid'");
	
	
	if($insQry){

		//	updatelogs($conn,3,$buid,$buid,1,$projtype);
		header("location:".$page."?msg=ups&sub_id=$encodesid");
	}else{
		header("location:".$page."?msg=upf&sub_id=$encodesid");
	}

	

	

}





if(isset($_GET['did'])){

	$did=base64_decode($_GET['did']);
		$sub_id=$_GET['sub_id'];

$tab_details=getTableDetailsById($conn,$table,$id);
		$insQry=mysqli_query($conn,"Update   `attachedtopics` set `view`='0'  where`id` = '$did';");

	if($insQry){

		//	updatelogs($conn,3,$buid,$buid,1,$projtype);

		header("location:".$page."?msg=dls&sub_id=$sub_id");

	}else{

		header("location:".$page."?msg=dlf&sub_id=$sub_id");

	}



}



if(isset($_POST['submit'])){

	extract($_POST);
		$encodesid=base64_encode($hidsubid1);

	$name=mysqli_real_escape_string($conn,$topic);

$subdetails=getsubtypedetails($conn,$hidsubid1);   
$attachedid=$subdetails['attachedid'];

$count=getattachedtopiccountwithsubid($conn,$name,$hidsubid1);
if($count==0)
{
	$insQry=mysqli_query($conn,"INSERT INTO `attachedtopics`(`topics`, `subtype_id`, `status`, `view`,`attachedid`,`subject_id`) VALUES ('$name','$hidsubid1','1','1','$attachedid','$hidsubjectid');");     

	if($insQry){

$last_id=mysqli_insert_id($conn);

  
		header("location:".$page."?msg=ins&sub_id=$encodesid");





	}else{

		header("location:".$page."?msg=inf&sub_id=$encodesid");

	}

}

	else{

		header("location:".$page."?msg=exist&sub_id=$encodesid");

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



   


  






  <script>



function validate(){

	var name=document.getElementById('name').value;
	name=name.trim();


	if(name==''){

	

		alert("Please enter subjects name ");

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

	<div class='btn-<?php echo $className ?>' style="text-align:center;padding:5px;"><?php echo $msgText ?> <span style="float:right;cursor:pointer;font-weight:bold;" onClick="window.location.href='<?php echo $page; ?>'"> X </span></div>

<?php }?>

                <div class="x_panel">

                  <div class="x_title">

<h2>  <span style="color:#666"><?php echo $subject_name; ?></span> / <span style="color:#FF0000;">  <?php echo $topic_name; ?></span> </h2>
                    

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                 <?php if( isset($_GET['eid']) && ($_GET['eid']!='')){

						$eid= base64_decode($_GET['eid']);

						
						 $subid=$decode_id;
						 $attached_details=getTableDetailsById($conn,'attachedtopics',$eid);
						 
					  ?>

                     

                     <form action=""  method="Post"  onSubmit="return validate()" enctype="multipart/form-data" id="toform"> 

                     <table width="100%" border="0" class="table table-striped table-bordered">

       <tr >

                <td><label style="color:#069;font-weight:bold;">Add Topic Name:<?php echo $sum;?></label></td>

                <td width="28%"><input type="text" name="topic<?php echo $sum;?>" id="topic<?php echo $is;?>" required class="form-control" value="<?php echo htmlentities(stripslashes($attached_details['topics'])) ?>" ></td>

<td width="45%"></td>       
<input type="hidden" name="hidsubid" id="hidsubid" value="<?php echo $subid;?>">
 <input type="hidden" name="hideid" id="hideid" value="<?php echo $eid;?>">

            </tr>
             
 
        <!--   <tr>

                <td><label style="color:#069;font-weight:bold;">Add Image *</label></td>

                <td width="28%"><input type="file" name="image" id="image" class="form-control"  value=""  ></td>

                <td width="45%"></td>

            </tr> 
-->
           

               
            
               

  
<tr id="firstdiv">
          </tr> 
  

  <tr>

    <td>&nbsp;</td>

    <td colspan="2"><input type="hidden" name="rowvals" id="rowvals" value="<?php echo $loopcount;?>"><input type="hidden" name="attachedid" id="attachedid" value="<?php echo $decode_id;?>"><input type="hidden" name="hidId" id="hidId" value="<?php echo $eid; ?>"><input type="hidden" name="hidsubjectid" id="hidsubid" value="<?php echo $subjectid;?>"><input type="submit" name="update"  value="Proceed To Update" class="btn btn-success"> </td>

  </tr> 

</table>



                     </form>

                    <?php } else {?> <form action=""  method="Post"  onSubmit="return validate()" id="toform" enctype="multipart/form-data"> 

                     <table width="100%" border="0" class="table table-striped table-bordered">

    

    
            
<tr >

                <td><label style="color:#069;font-weight:bold;"> Topic Name:<?php echo $sum;?></label></td>

                <td width="28%"><input type="text" name="topic" id="topic" required class="form-control" value="<?php echo htmlentities(stripslashes($attached_details['topics'])) ?>" ></td>

<td width="45%"></td>       
<input type="hidden" name="hidsubid1" id="hidsubid1" value="<?php echo $decode_id;?>">

            </tr>
             

        <!--   <tr>

                <td><label style="color:#069;font-weight:bold;">Add Image *</label></td>

                <td width="28%"><input type="file" name="image" id="image" class="form-control"  value=""  ></td>

                <td width="45%"></td>

            </tr> 
-->
           

               
            
               

  
<tr id="firstdiv">
          </tr> 
  

  <tr>

    <td>&nbsp;</td>

    <td colspan="2"><input type="hidden" name="rowvals" id="rowvals" value="<?php echo $loopcount;?>"><input type="hidden" name="attachedid" id="attachedid" value="<?php echo $decode_id;?>"><input type="hidden" name="hidId" id="hidId" value="<?php echo $eid; ?>"><input type="hidden" name="hidsubjectid" id="hidsubid" value="<?php echo $subjectid;?>"><input type="submit" name="submit"  value="Proceed To Add" class="btn btn-success"> </td>

  </tr> 

</table>



                     </form> <?php }?>

                     

                     <div>

                     <table width="100%" border="0" class="table table-bordered table">

  

  <tr>

            <th width="3%">Sno</th>
           
           
         
             <th width="30%"> Name</th>
                <th width="12%" style="text-align:center;">Subtype</th>
                   <th width="12%" style="text-align:center;">Action</th>
             <th width="10%" style="text-align:center;">Approval</th>

  </tr>

  <?php   
    $ds=mysqli_query($conn,"SELECT * FROM `attachedtopics` where `subtype_id`='$decode_id' and `view`='1' order by `id` desc " ); 

	 $numrows=mysqli_num_rows($ds);     

	

	if(  $numrows >0){
$i='0';
		while($fetch=mysqli_fetch_array($ds)){

			$id=$fetch['id'];

			$topics=$fetch['topics'];
           $cid=$fetch['subtype_id'];
$subtype_details=getsubtypedetails($conn,$cid);  
			$i++;

$subtype=$subtype_details['name'];
			?>

			

		    <tr>

                <td><?php echo $i ?></td>
                <td><b><?php echo $topics; ; ?></b></td>
                <td style="text-align:center;"><?php echo $subtype; ?></td>
                <td style="text-align:center;">&nbsp;&nbsp;<a href="<?php echo $page ?>?eid=<?php echo base64_encode($id); ?>&sub_id=<?php echo $encoded;?>" style="color:#06F;">Edit</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a onClick="return confirm('Are you sure you want to delete!')" href="<?php echo $page ?>?did=<?php echo base64_encode($id); ?>&sub_id=<?php echo $encoded;?>" style="color:#F00;">Delete</a>
                  
                  
                  
                  
                  
                  </th>
                <td><table width="100%" border="0" class="table table-bordered table-striped">

  <tr>

   <td align="left" style="width:30px"  ><input class='uniform' type="checkbox" id="check<?php echo $fetch['id']  ?>" value="<?php echo $fetch['status']  ?>" onClick="updateStatus('<?php echo $fetch['id'];  ?>','attachedtopics',3)" <?php if($fetch['status']==1){echo 'checked';} ?>></td>

        

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

			CKEDITOR.replace( 'answers' );

		</script>

   

  </body>

</html>

