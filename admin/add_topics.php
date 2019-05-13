<?php
ob_start();
session_start();
include('../db_class/dbconfig.php');
include('../db_class/hr_functions.php');
$buid=$_SESSION['buid'];
checkIntrusion($buid,$builderbaseurl);

$title="Question Management";

$page="add_topics.php";

//$colname='e_brochure_file';


if(isset($_GET['id']))
{
	
	 $encoded=$_GET['id'];
	$decode_id=base64_decode($encoded);
	$tbname="subject";
	$subject_details=getTableDetailsById($conn,$tbname,$decode_id);
	$titlename=$tbname['name'];
	$attach_id=$decode_id;
		
				$tb_attach=getTableDetailsById($conn,'levelsubjects',$decode_id);
				$subjectid=$tb_attach['subject_id'];

$subject_tb=getTableDetailsById($conn,'subjects',$subjectid);
		$subject_name=$subject_tb['name'];

}
         


if(isset($_POST['update'])){

	

	extract($_POST);

	$id=$_POST['hidId'];
	$enc_id=base64_encode($id);
	$name=mysqli_real_escape_string($conn,$name);
$attachedid=mysqli_real_escape_string($conn,$attachedid);
	$enc_id=base64_encode($attachedid);
   
	$insQry=mysqli_query($conn,"UPDATE `subtype` SET  `name` = '$name'  where`id` = '$id'");

	if($insQry){

		//	updatelogs($conn,3,$buid,$buid,1,$projtype);
		header("location:".$page."?msg=ups&id=$enc_id");
	}else{
		header("location:".$page."?msg=upf&id=$enc_id");
	}

	
 
	

}





if(isset($_GET['did'])){

	$did=base64_decode($_GET['did']);
	$encid=$_GET['id'];
		$insQry=mysqli_query($conn,"Update   `subtype` set `view`='0'  where`id` = '$did';");

	if($insQry){

		//	updatelogs($conn,3,$buid,$buid,1,$projtype);

		header("location:".$page."?msg=dls&id=$encid");

	}else{

		header("location:".$page."?msg=dlf&id=$encid");

	}



}



if(isset($_POST['submits'])){

	extract($_POST);
	$name=mysqli_real_escape_string($conn,$name);
$attachedid=mysqli_real_escape_string($conn,$attachedid);

$encoded_aid=base64_encode($attachedid);
$total=mysqli_real_escape_string($conn,$rowvals);
	$insQry=mysqli_query($conn,"INSERT INTO `subtype`(`name`, `attachedid`, `status`, `view`) VALUES ('$name','$attachedid','1','1');");

	if($insQry){

$last_id=mysqli_insert_id($conn);
for($ii=1;$ii<=$total;$ii++)

{ 
	$topic=mysqli_real_escape_string($conn,$_POST['topic'.$ii]);

$insQry1=mysqli_query($conn,"INSERT INTO `attachedtopics`(`topics`, `subtype_id`, `status`, `view`,`attachedid`,`subject_id`) VALUES ('$topic','$last_id','1','1','$attachedid','$hidsubid');");


}

if($insQry1){
		header("location:".$page."?msg=ins&id=$encoded_aid");
}


else
{
		header("location:".$page."?msg=inf&id=$encoded_aid");
	
	
	
}

	}else{

		header("location:".$page."?msg=inf&id=$encoded_aid");

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

               <h2>Subject: <span style="color:#FF0000;">  <?php echo $subject_name; ?></span> </h2>

                    

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    
                     <?php if( isset($_GET['eid']) && ($_GET['eid']!='')){

						$eid= base64_decode($_GET['eid']);

						$categoryArr=getTableDetailsById($conn,'subtype',$eid);
                     

						 $att_id=$categoryArr['attachedid'];
						 $subid=$categoryArr['id'];
						 $subdetails=getTableDetailsById($conn,'subtype',$subid);
						 
						 $loopcount=getattachedtopiccount($conn,$subid);  
$topic_arr=getattachedtopicsids($conn,$subid);
					  ?>

                     

                     <form action=""  method="Post"  onSubmit="return validate()" enctype="multipart/form-data"> 

                     <table width="100%" border="0" class="table table-striped table-bordered">

    

            <tr>

                <td><label style="color:#069;font-weight:bold;">Subtype Name</label></td>

                <td><input type="text" name="name" id="name" required class="form-control" value="<?php echo htmlentities(stripslashes($categoryArr['name'])) ?>" ></td>

<!--<td width="45%"><a href="edit_topics.php?sub_id=<?php echo base64_encode($subid);?>"><input type="button" class="" value="Click to EDIT topics"></a></td>-->
            </tr>   
            
            
          
       <?php /*?>   <?php 
		  $sum=0;
		  foreach($topic_arr as $aids)
		  {
			  $sum++;
		  						 $tpdetails=getTableDetailsById($conn,'attachedtopics',$aids);

		  ?>  
            
<tr >

                <td><label style="color:#069;font-weight:bold;">Topic Name</label></td>

                <td width="28%"><input type="text" name="topic<?php echo $is;?>" id="topic<?php echo $is;?>" required class="form-control" value="<?php echo htmlentities(stripslashes($tpdetails['topics'])) ?>" ></td>



            </tr>
             
 <?php }?> <?php */?>
       

               
            
               

  
<tr id="firstdiv">
          </tr> 
  

  <tr>

    <td>&nbsp;</td>

    <td colspan="2"><input type="hidden" name="rowvals" id="rowvals" value="<?php echo $loopcount;?>"><input type="hidden" name="attachedid" id="attachedid" value="<?php echo $decode_id;?>"><input type="hidden" name="hidId" id="hidId" value="<?php echo $eid; ?>"><input type="submit" name="update"  value="Proceed To Update" class="btn btn-success"> </td>

  </tr> 

</table>  



                   </form>

                     <?php }else{?>

                     <form action=""  method="Post" id="topic_forms"  onSubmit="" enctype="multipart/form-data" class="topic_form">   

                     <table width="100%" border="0" class="table table-striped table-bordered">

    
            <tr>

                <td><label style="color:#069;font-weight:bold;">Subtype Name</label></td>

                <td width="28%"><input type="text" name="name" id="names" required class="form-control name" value="<?php echo htmlentities(stripslashes($categoryArr['name'])) ?>" ></td>

                <td  width="45%"></td>

            </tr>
            
            
<tr id="row1" >

                <td ><label style="color:#069;font-weight:bold;">Topic Name</label></td>

                <td width="28%"><input type="text" name="topic1" id="topic1" required class="form-control topic1" value="<?php echo htmlentities(stripslashes($categoryArr['name'])) ?>" ></td>

<td width="45%"><button class="btn btn-sm btn-primary add_more_button" type="button">Add More Fields</button></td>
            </tr>

          <tr id="firstdiv">
          
          </tr>  
               

  

  

  <tr>

    <td>&nbsp;</td>

    <td colspan="2"><input type="hidden" name="rowvals" id="rowvals" value="1"><input type="hidden" name="attachedid" id="attachedid" value="<?php echo $decode_id;?>"><input type="hidden" name="hidsubid" id="hidsubid" value="<?php echo $subjectid;?>"><input type="submit" name="submits"  value="Proceed To Add" class="btn btn-success"> </td>

  </tr>

</table>



                     </form>

                     

                     <?php }?>

                     

                     <div>

                     <table width="100%" border="0" class="table table-bordered table">

  

  <tr>

            <th width="3%">Sno</th>
           
           
         
             <th width="30%"> Name</th>
             <th width="12%" style="text-align:center;">No. of topics added</th>
             <th width="12%" style="text-align:center;">Edit Topics</th>
                <th width="12%" style="text-align:center;">Action</th>
             <th width="10%" style="text-align:center;">Approval</th>

  </tr>

  <?php


    $ds=mysqli_query($conn,"SELECT * FROM `subtype` where `view`='1' and `attachedid`='$decode_id' order by `id` desc " ); 

	$numrows=mysqli_num_rows($ds);

	

	if(  $numrows >0){
$i='0';
		while($fetch=mysqli_fetch_array($ds)){

			$id=$fetch['id'];

			$topics=$fetch['name'];
           $cid=$fetch['subtype_id'];
$subtype_details=getsubtypedetails($conn,$cid);  
			$i++;

$subtype=$subtype_details['name'];

$subid=$id;
			?>

			

		    <tr>

                <td><?php echo $i ?></td>
                <td><b><?php echo $topics; ; ?></b></td>
                <td style="text-align:center;"><?php echo getattachedtopiccount($conn,$id);?>     </td>
                <td style="text-align:center;"><a href="edit_topics.php?sub_id=<?php echo base64_encode($subid);?>"><input type="button" class="btn btn-sm btn-primary" value="Click here to EDIT topics"></a></td>                           
                <td style="text-align:center;">&nbsp;&nbsp;<a href="<?php echo $page ?>?eid=<?php echo base64_encode($id); ?>&id=<?php echo $encoded;?>" style="color:#06F;">Edit</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a onClick="return confirm('Are you sure you want to delete!')" href="<?php echo $page ?>?did=<?php echo base64_encode($id); ?>&id=<?php echo $encoded;?>" style="color:#F00;">Delete</a>
                  
                  
                  
                  
                  
                  </th>
                <td><table width="100%" border="0" class="table table-bordered table-striped">

  <tr> 

   <td align="left" style="width:30px"  ><input class='uniform' type="checkbox" id="check<?php echo $fetch['id']  ?>" value="<?php echo $fetch['status']  ?>" onClick="updateStatus('<?php echo $fetch['id'];  ?>','subtype',3)" <?php if($fetch['status']==1){echo 'checked';} ?>></td>

        

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
<script>
    $(document).ready(function() {
		
		
    var max_fields_limit      = 10; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(e){ 
	var rowvalue=$('#rowvals').val();
	newval=parseInt(rowvalue)+1;
	$('#rowvals').val(newval);
		var rowvalues=newval;

        e.preventDefault();  
     //check conditions
           
            $('#firstdiv').before('<tr id="row'+rowvalues+'" ><td ><label style="color:#069;font-weight:bold;">Topic Name</label></td><td width="28%"><input type="text" name="topic'+rowvalues+'" id="topic" required class="form-control topic" value=""></td><td ><button type="button" onclick="removeElementsnew('+rowvalues+')" >Remove</button></td></tr> '); //add input field
            });  
			
	
});

		function removeElementsnew(rowid){

	//alert('dasdas') 
	//alert("#row"+rowid);

		$("#row"+rowid).remove();

		return true;

			//alert('das')

	}
   
</script>
        <!-- /footer content -->

      </div>

    </div>

    

 <script>

			CKEDITOR.replace( 'answers' );

		</script>

   

  </body>

</html>

