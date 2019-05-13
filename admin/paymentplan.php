<?php
ob_start();
session_start();
include('../db_class/dbconfig.php');
include('../db_class/message.php');
include('../db_class/hr_functions.php');
$buid=$_SESSION['buid'];
$projtype=$_SESSION['ptype'];

checkIntrusion($buid,$builderbaseurl);
$title="Payment Plan";
$page="paymentplan.php";
$colname='e_brochure_file';

if($projtype==2){
	$nonExArr=getNonExcSubProjDetailsById($conn,$buid);
	$tabName="nonexsubprojects";
	$table="nonexcdetail";
	$primarykey="id";
	$primary="id";
	$docs="docs";
}

if($projtype==1){
	$nonExArr=getExclusiveProjectDetailById($conn,$buid);
	$tabName="crm_inv_project";
	$primarykey="project_id";
	$table="excdetail";
	$primary="id";
	$docs="../docs";
}
$pdf=$nonExArr[$colname];

if($pdf==''){
	$pdf='comingsoon.pdf';	
}

if(isset($_POST['update'])){
	
	extract($_POST);
	$id=$_POST['hidId'];
	if($type==3){
		$answer=mysqli_real_escape_string($conn,$answers);
		$imgName=$answer;	
	}else{
	
	$nwsimg=$_FILES['image']['name'];
	$newsimagename=cleanname(basename($_FILES['image']['name']));
	$newsimagenamesrc=$_FILES['image']['tmp_name'];
	$postednewsdate=base64_encode(date('Y-m-d h:i:s'));
	$imgName=$postednewsdate."_".$newsimagename;
	$moveimg=move_uploaded_file($newsimagenamesrc,$docs.'/'.$imgName);
	if($moveimg){
		$pdf=$imgName;
	}else{
		$pdf='';	
	}
	
	}
	$insQry=mysqli_query($conn,"UPDATE $table SET  `contenttype` = '$type' , `content`='$imgName' where`id` = '$id';");
	if($insQry){
			updatelogs($conn,3,$buid,$buid,1,$projtype);
		header("location:".$page."?msg=ups&edit=1");
	}else{
		header("location:".$page."?msg=upf&edit=1");
	}
	
	
}


if(isset($_GET['did'])){
	$did=base64_decode($_GET['did']);
		$insQry=mysqli_query($conn,"delete from $table  where`id` = '$did';");
	if($insQry){
			updatelogs($conn,3,$buid,$buid,1,$projtype);
		header("location:".$page."?msg=dls&edit=1");
	}else{
		header("location:".$page."?msg=dlf&edit=1");
	}

}

if(isset($_POST['submit'])){
	
	extract($_POST);
	
	if($type==3){
		$answer=mysqli_real_escape_string($conn,$answers);
		 $pdf=$answer;	
		//die;
	}else{
		$nwsimg=$_FILES['image']['name'];
		$newsimagename=cleanname(basename($_FILES['image']['name']));
		$newsimagenamesrc=$_FILES['image']['tmp_name'];
		$postednewsdate=base64_encode(date('Y-m-d h:i:s'));
		$imgName=$postednewsdate."_".$newsimagename;
		$moveimg=move_uploaded_file($newsimagenamesrc,$docs.'/'.$imgName);
		if($moveimg){
			$pdf=$imgName;
		}else{
			$pdf='';	
		}
	
	}
	$insQry=mysqli_query($conn,"INSERT INTO $table (`id`, `projid`, `contenttype`, `content`, `whichcontent`, `status`) VALUES (NULL, '$buid', '$type', '$pdf', '2', '1');");
	if($insQry){
			updatelogs($conn,3,$buid,$buid,1,$projtype);
		header("location:".$page."?msg=ins&edit=1");
	}else{
		header("location:".$page."?msg=ins&edit=1");
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
		$msgText="Brochure has been updated successfully";
		$className="success";
	break;
	
	case 'upf':
		$msgText="Brochure was not updated successfully";
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

    <title>Acres N Inches </title>

   
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
                    <span style="float:right;"><a href="<?php echo $page; ?>?edit=1">[ Edit Content ]</a></span>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                     <?php if( isset($_GET['edit']) && ($_GET['edit']!='')){ ?>
                     <?php if( isset($_GET['eid']) && ($_GET['eid']!='')){
						$eid= base64_decode($_GET['eid']);
						$nonProjDocArr=getNonExcDocumentDetailsById($conn,$eid);
						//echo $nonProjDocArr['contenttype'];
						 
					  ?>
                     
                     <form action=""  method="Post"  onSubmit="return validate()" enctype="multipart/form-data"> 
                     <table width="100%" border="0" class="table table-bordered table-striped">
  <tr>
    <td width="30%">Content Type</td>
    <td><select class="form-control" name="type" id="type" onChange="checkType(this.value)">
            <option value="1" <?php if($nonProjDocArr['contenttype']==1) { ?> selected <?php }?>>Image</option>
            <option value="2" <?php if($nonProjDocArr['contenttype']==2) { ?> selected <?php }?>>Pdf</option>
            <option value="3" <?php if($nonProjDocArr['contenttype']==3) { ?> selected <?php }?>>Text Only</option>
    </select></td>
    <td>&nbsp;</td>
  </tr>
  
 
  
  
  
  <tr>
    <td><span id="label"> <?php if($nonProjDocArr['contenttype']!=3) { ?>Browse (Image/PDF version only)<?php }else{?> Update Content<?php }?></span></td>
    <td width="60%"><div id="textonly" style="display:<?php if($nonProjDocArr['contenttype']==3) { ?>block<?php }else{?>none<?php }?>;"><textarea  name="answers" id="answers" ><?php  echo $nonProjDocArr['content']?></textarea></div>  <div id="imgonly" style="display:<?php if($nonProjDocArr['contenttype']==3) { ?>none<?php }else{?>block<?php }?>;" ><input type="file" name="image" id="image" ></div></td>
    <td width="10%" id="cont">
    <?php
				if($nonProjDocArr['contenttype']==1){?>
				<img src="<?php echo $docs ?>/<?php echo $nonProjDocArr['content']; ?>" width="200" height="120">
				
			<?php }
			if($nonProjDocArr['contenttype']==2){?>
				<embed src="<?php echo $docs ?>/<?php echo $nonProjDocArr['content']; ?>" width="200" height="120" type='application/pdf'>
			<?php }
		
				
				?>
    
    </td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><input type="hidden" name="MAX_FILE_SIZE" value="10194304" /><input type="hidden" name="hidId" value="<?php echo $eid ?>"> <input type="submit" name="update" value="Update Content" class="btn btn-success" > &nbsp;&nbsp;<input type="button" class="btn btn-danger" value="Cancel" onClick="window.location.href='<?php echo $page; ?>'"></td>
  </tr>
</table>

                     </form>
                     <?php }else{?>
                     <form action=""  method="Post"  onSubmit="return validate()" enctype="multipart/form-data"> 
                     <table width="100%" border="0" class="table table-bordered table-striped">
  <tr>
    <td>Content Type</td>
    <td><select class="form-control"  name="type" id="type" onChange="checkType(this.value)">
            <option value="1">Image</option>
            <option value="2">Pdf</option>
            <option value="3">Text Only</option>
    </select></td>
  </tr>
  
 
  
  
  
  <tr>
    <td><span id="label">Browse (Image/PDF version only)</span></td>
    <td><div id="textonly" style="display:none;"><textarea  name="answers" id="answers" ></textarea></div>  <div id="imgonly" style="display:block;"><input type="file" name="image" id="image" ></div></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
    <td><input type="hidden" name="MAX_FILE_SIZE" value="10194304" /> <input type="submit" name="submit" value="Add Content" class="btn btn-success" > &nbsp;&nbsp;<input type="button" class="btn btn-danger" value="Cancel" onClick="window.location.href='<?php echo $page; ?>'"></td>
  </tr>
</table>

                     </form>
                     
                     <?php }?>
                     
                     <div>
                     <table width="100%" border="0" class="table table-bordered table">
  
  <tr>
            <th width="5%">Sno</th>
            <th width="15%">Type</th>
            <th width="35%">Details</th>
           
            <th width="12%" style="text-align:center;">Action</th>
             <th width="12%" style="text-align:center;">Approval</th>
  </tr>
  <?php
  //echo "SELECT * FROM $table where `projid`='$buid' and `whichcontent`='2' order by id asc ";
    $ds=mysqli_query($conn,"SELECT * FROM $table where `projid`='$buid' and `whichcontent`='2' order by id asc " ); 
	$numrows=mysqli_num_rows($ds);
	
	if(  $numrows >0){
		while($fetch=mysqli_fetch_array($ds)){
			$id=$fetch['id'];
			$i++;
			$content=$fetch['contenttype'];
			if($content==1){
				$contentText="Image";
				
			}
			if($content==2){
				$contentText="Pdf";
			}
			if($content==3){
				$contentText="Text";
			}
			?>
			
		    <tr>
                <td><?php echo $i; ?></td>
                <td><b><?php echo $contentText; ?></b></td>
                <td>
				<?php
				if($content==1){?>
				<img src="<?php echo $docs ?>/<?php echo $fetch['content']; ?>" width="200" height="120">
				
			<?php }
			if($content==2){?>
				<embed src="<?php echo $docs ?>/<?php echo $fetch['content']; ?>" width="200" height="120" type='application/pdf'>
			<?php }
			if($content==3){
				echo $fetch['content'];
			}
				
				?>
                
                </td>
               
                <td style="text-align:center;">&nbsp;&nbsp;<a href="<?php echo $page ?>?eid=<?php echo base64_encode($id); ?>&edit=1" style="color:#06F;">Edit</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a onclick="return confirm('Are you sure you want to delete!')" href="<?php echo $page ?>?did=<?php echo base64_encode($id); ?>&edit=1" style="color:#F00;">Delete</a>
                
             
                </th>
                <td><table width="100%" border="0" class="table table-bordered table-striped">
  <tr>
   <td align="left" style="width:30px"  ><input class='uniform' type="checkbox" id="check<?php echo $fetch['id']  ?>" value="<?php echo $fetch['status']  ?>" onClick="updateBuilderStatus('<?php echo $fetch['id'];  ?>','<?php echo $table; ?>',5)" <?php if($fetch['status']==1){echo 'checked';} ?>></td>
        
        <td align="left"  class="smalltext" width="50px"><div  style="width:50px" id="status<?php echo $fetch['id']  ?>" ><?php echo getStatus($fetch['status']);  ?></div></td>
  </tr>
</table></td>
                
 			 </tr> 
		    
			
			
		<?php }
		
		
		
	}
  
  ?>



 
  </table>
 					 </div>
                     <div>
                     
                     </div>
                     
                     <?php }else{?>
					 
                     
					
                    
                    
  <?php
    $ds=mysqli_query($conn,"SELECT * FROM $table where `projid`='$buid' and `whichcontent`='2' order by id asc " ); 
	$numrows=mysqli_num_rows($ds);
	
	if(  $numrows >0){
		while($fetch=mysqli_fetch_array($ds)){
			$id=$fetch['id'];
			$i++;
			$content=$fetch['contenttype'];
			if($content==1){
				$contentText="Image";
				
			}
			if($content==2){
				$contentText="Pdf";
			}
			if($content==3){
				$contentText="Text";
			}
			?>
			
		 <div style="padding:5px;margin-bottom:50px;">
				<?php
				if($content==1){?>
				<img src="<?php echo $docs ?>/<?php echo $fetch['content']; ?>" width="100%" height="100%">
				
			<?php }
			if($content==2){?>
				<embed src="<?php echo $docs ?>/<?php echo $fetch['content']; ?>" width="100%" height="300" type='application/pdf'>
			<?php }
			if($content==3){
				echo $fetch['content'];
			}
				
				?>
                
                </div>
             
		    
			
			
		<?php }
		
		
		
	}else{
	echo "No Content Uploaded Yet !";	
		
	}
  
  ?>



 

                    
                    
                     
                     <?php } ?>
                     
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
