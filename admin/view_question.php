<?php
ob_start();
session_start();
include('../db_class/dbconfig.php');
include('../db_class/hr_functions.php');

$buid=$_SESSION['buid'];
if($buid==1){
$status=1;
}else{
$status=0;
}
checkIntrusion($buid,$builderbaseurl);
 
$title="Question Management";

$page="addquestions.php";
$button='0';

$previousurl= $_SERVER['HTTP_REFERER'];
//$colname='e_brochure_file';
$previousurl="#";

if(isset($_GET['id']))
{
	
	
		$enquestion_id=$_GET['id'];;

		$question_id=base64_decode($_GET['id']);
		
		$tbname="questions";
		$colnames="topic_id";
			$en_topic_id=getColoumnNameByIdtableval($conn,$colnames,$tbname,$question_id);

		
		$tb_topic=getTableDetailsById($conn,'attachedtopics',$en_topic_id);
		$attach_id=$tb_topic['attachedid'];
		
				$tb_attach=getTableDetailsById($conn,'levelsubjects',$attach_id);
$subjectid=$tb_attach['subject_id'];
$subject_tb=getTableDetailsById($conn,'subjects',$subjectid);
$isprompt=$subject_tb['promptbased'];

		$sub_id=$tb_topic['subtype_id'];
		$tb_name="subtype";
		$colname='name';
		$sub_name=getColoumnNameByIdtableval($conn,$colname,$tb_name,$sub_id);
		$levelname;
		$subject_name=$subject_tb['name'];
		$topic_name=$tb_topic['topics'];



		$tb_questions=getTableDetailsById($conn,'questions',$question_id);


}



if(isset($_POST['update'])){

	

	extract($_POST);
$include=mysqli_real_escape_string($conn,$include);
	$exclude=mysqli_real_escape_string($conn,$exclude);
	$terms=mysqli_real_escape_string($conn,$terms);
	$payment=mysqli_real_escape_string($conn,$payment);
	$id=$_POST['hidId'];
	$catArr=getPackageDetailById($conn,$id);
	$logo=$catArr['logo'];
	$inclusionsall=array();
	$title=mysqli_real_escape_string($conn,$title);
	$days=mysqli_real_escape_string($conn,$days);
	$nights=mysqli_real_escape_string($conn,$nights);
	$cost=mysqli_real_escape_string($conn,$cost);
	$description=mysqli_real_escape_string($conn,$description);
	
	$inclusionsall=implode(",",$inclusions);
	
	
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
	
	
	$nwsimg1=$_FILES['logo1']['name'];
	if($nwsimg1!=''){
		$newsimagename1=cleanname(basename($_FILES['logo1']['name']));
		$newsimagenamesrc1=$_FILES['logo1']['tmp_name'];
		$postednewsdate1=base64_encode(date('Y-m-d h:i:s'));
		$imgName1=$postednewsdate1."_".$newsimagename1;
		$moveimg1=move_uploaded_file($newsimagenamesrc1,'../docs/'.$imgName1);
		if($moveimg1){
			$logo1=$imgName1;
		}
	}
	
	
$nwsimg2=$_FILES['logo2']['name'];
	if($nwsimg2!=''){
		$newsimagename2=cleanname(basename($_FILES['logo2']['name']));
		$newsimagenamesrc2=$_FILES['logo2']['tmp_name'];
		$postednewsdate2=base64_encode(date('Y-m-d h:i:s'));
		$imgName2=$postednewsdate2."_".$newsimagename2;
		$moveimg2=move_uploaded_file($newsimagenamesrc2,'../docs/'.$imgName2);
		if($moveimg2){
			$logo2=$imgName2;
		}
	}
	


	$insQry=mysqli_query($conn,"UPDATE `packages` SET  `title` = '$title' , `days`='$days' ,`nights`='$nights' ,`bannerpath`='$logo',`cost`='$cost' ,`description`='$description'  ,`location`='$location' ,`tin`='$tin' ,`include`='$include' ,`exclude`='$exclude' ,`terms`='$terms',`payment`='$payment' ,`bannerpath1`='$logo1' ,`bannerpath2`='$logo2' where`id` = '$id';");

	if($insQry){

		//	updatelogs($conn,3,$buid,$buid,1,$projtype);
		header("location:".$page."?msg=ups&id=$countryId");
	}else{
		header("location:".$page."?msg=upf&id=$countryId");
	}

	

	

}





if(isset($_GET['did'])){

	$did=base64_decode($_GET['did']);

		$insQry=mysqli_query($conn,"update  packages  set `view`='0' where`id` = '$did';");

	if($insQry){

		//	updatelogs($conn,3,$buid,$buid,1,$projtype);

		header("location:".$page."?msg=dls&id=$countryId");

	}else{

		header("location:".$page."?msg=dlf&id=$countryId");

	}



}



if(isset($_POST['submit'])){

	extract($_POST);
	$inclusionsall=array();
	$question=mysqli_real_escape_string($conn,$question);
		$question=mysqli_real_escape_string($conn,$question);
	$option1=mysqli_real_escape_string($conn,$option1);
	$option2=mysqli_real_escape_string($conn,$option2);
	$option3=mysqli_real_escape_string($conn,$option3);
	$option4=mysqli_real_escape_string($conn,$option4);
	$correctans=mysqli_real_escape_string($conn,$correctans);
	$fullsol=mysqli_real_escape_string($conn,$fullsol);


$en_tid=base64_encode($topicid);
$pdate=date("Y-m-d");
	

	$insQry=mysqli_query($conn,"INSERT INTO `questions`(`question`, `option1`, `option2`, `option3`, `option4`, `correct`, `solution`, `topic_id`, `status`, `view`, `pdate`,`difficulty`) VALUES ('$question','$option1','$option2','$option3','$option4','$correctans','$fullsol','$topicid','1','1','$pdate','$difficulty');");

	if($insQry){

			//updatelogs($conn,3,$buid,$buid,1,$projtype);

		header("location:".$page."?msg=ins&id=$en_tid");

	}else{

		header("location:".$page."?msg=inf&id=$en_tid");

	}

	

	

}





if(isset($_GET['msg'])){

	$msg=$_GET['msg'];

	switch($msg){

	case 'ins':

		$msgText="New Question has been added successfully";

		$className="success";

	break;

	

	case 'inf':

		$msgText="New Question was not added successfully";

		$className="danger";

	break;

	

	

	case 'ups':

		$msgText="Question has been updated successfully";

		$className="success";

	break;

	

	case 'upf':

		$msgText="Question was not updated successfully";

		$className="danger";

	break;

	

	case 'dls':

		$msgText="Question has been deleted successfully";

		$className="success";

	break;

	

	case 'dlf':

		$msgText="Question was not deleted successfully";

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

	<div class='btn-<?php echo $className ?>' style="text-align:center;padding:5px;"><?php echo $msgText ?> <span style="float:right;cursor:pointer;font-weight:bold;" onClick="window.location.href='<?php echo $page; ?>&id=<?php echo $countryId ?>'"> X </span></div>

<?php }?>

                <div class="x_panel">

                  <div class="x_title">

                    <h2><span style="color:#666"><?php echo $subject_name;?></span> / <span style="color:#666"><?php echo $sub_name; ?></span> / <span style="color:#FF0000;">  <?php echo $topic_name; ?></span> </h2>

                    

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    
                   

                    <form action=""  method="Post" id="question_form" enctype="multipart/form-data"> 

                     <table width="100%" border="0" class="table table-striped table-bordered">

    

              <!--<tr>
                <td width="19%"><label style="color:#069;font-weight:bold;">Level*</label></td>
                <td colspan="3"><?php echo $dd;?> </td>
              </tr>-->
            <tr>
              
              <td><label  style="color:#069;font-weight:bold;">Question</label></td>
              
              <td colspan="3"><?php echo  stripslashes($tb_questions['question']);?></td>
            </tr>
                
                
                <?php 
				if($isprompt=='0')
				{
				
				
				?>
                
                    <tr>

                <td><label  style="color:#069;font-weight:bold;">Option 1</label></td>

                <td colspan="3"><?php echo stripslashes($tb_questions['option1']) ?></td>
                </tr>
                
                <tr>

                <td><label  style="color:#069;font-weight:bold;">option 2</label></td>

                <td colspan="3"><?php echo stripslashes($tb_questions['option2']) ?></td>
                </tr>
                <tr>

                <td><label  style="color:#069;font-weight:bold;">option 3</label></td>

                <td colspan="3"><?php echo stripslashes($tb_questions['option3']) ?></td>
                </tr>
                <tr>

                <td><label  style="color:#069;font-weight:bold;">option 4</label></td>

                <td colspan="3"><?php echo stripslashes($tb_questions['option4']) ?></td>
                </tr> 
             <tr>

                <td><label  style="color:#069;font-weight:bold;">Correct Answer</label></td>

                <td colspan="3">
                <div>
                 <?php 
				$ds=mysqli_query($conn,"SELECT * FROM `answeroption` where `status`='1' order by `id`   " ); 
				$numrows=mysqli_num_rows($ds);
				if( $numrows >0){
					$correct=$tb_questions['correct'];
				while($fetch=mysqli_fetch_array($ds)){
				?>
               <div style="float:left;width:150px;padding:5px;border:solid 1px #CCCCCC;margin:5px;text-align:left;"><input <?php if($fetch['id']==$correct){ ?> checked <?php }?> type="radio" name="correctans" value="<?php echo $fetch['id'] ?>" readonly>&nbsp; &nbsp; <?php echo $fetch['name'] ?></div>
				
				
				<?php }}?>
                </div>                </td>
                </tr>
<?php }?>
         <tr>

                <td><label  style="color:#069;font-weight:bold;">Explained Solution</label></td>

                <td colspan="3"><?php echo html2text($categoryArr['solution'])?></td>
                </tr>

            

           

               
            
               
 
            
             
  

  

  <tr>

    <td>&nbsp;</td>

    <td colspan="2"><input type="hidden" name="hidId" id="hidId" value="<?php echo $eid; ?>"><input type="hidden" name="topicid" id="topicid" value="<?php echo $en_topic_id; ?>">
    
    
   <a href="<?php echo $previousurl;?>"> <input type="button" name="button"  value="Back" class="btn btn-success"></a>
    
    </td>
   
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
    
    
  
 <script>

			CKEDITOR.replace( 'question' );
			CKEDITOR.replace( 'option1' );
			CKEDITOR.replace( 'option2' );
			CKEDITOR.replace( 'option3' );
			CKEDITOR.replace( 'option4' );
			
			CKEDITOR.replace( 'fullsol' );

		</script>

   

  </body>

</html>

