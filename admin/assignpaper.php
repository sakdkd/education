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
 
 $button=0;
$title="Question Management";

$page="assignpaper.php";

//$colname='e_brochure_file';
if(isset($_GET['id']))
{
	
	$att_topic_id=$_GET['id'];
		$en_topic_id=base64_decode($_GET['id']);
		
		$tb_topic=getTableDetailsById($conn,'attachedtopics',$en_topic_id);
		$attach_id=$tb_topic['attachedid'];
		
				$tb_attach=getTableDetailsById($conn,'levelsubjects',$attach_id);
$subjectid=$tb_attach['subject_id'];



$subject_tb=getTableDetailsById($conn,'subjects',$subjectid);

		$sub_id=$tb_topic['subtype_id'];
		$tb_name="subtype";
		$colname='name';
		$sub_name=getColoumnNameByIdtableval($conn,$colname,$tb_name,$sub_id);
		 $levelid=$tb_attach['level_id'];
		$subject_name=$subject_tb['name'];
		$topic_name=$tb_topic['topics'];
		
$quesid=base64_decode($_GET['qid']);		

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

	<div class='btn-<?php echo $className ?>' style="text-align:center;padding:5px;"><?php echo $msgText ?> <span style="float:right;cursor:pointer;font-weight:bold;" onClick="window.location.href='<?php echo $page; ?>&id=<?php echo $att_topic_id ?>'"> X </span></div>

<?php }?>

                <div class="x_panel">

                  <div class="x_title">

                    <h2><span style="color:#666"><?php echo $subject_name;?></span> / <span style="color:#666"><?php echo $sub_name; ?></span> / <span style="color:#666;">  <?php echo $topic_name; ?></span> / <span style="color:#FF0000;"> Assign (Test Papers)</span> </h2>

                    

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    
                    

                    

                     

                     <div>



                  		<table class="table table-responsive table-bordered" id="ls-editable-table">

  				            <thead class="thead-dark text-center">

    
  <tr>

            <th width="3%">Sno</th>
            <th width=""><div align="center">Plans</div></th>
         <th width=""><div align="center">Papers</div></th>
         
         
             <th width="" style="text-align:center;">Assign</th>

  </tr>
  </thead>

  <?php
   
    $ds=mysqli_query($conn,"SELECT * FROM edu_pricing  where `level_id`='$levelid' and `id`!='6' and `view`='1' and `status`='1' order by `id` desc " ); 

	 $numrows=mysqli_num_rows($ds);

	 

	if(  $numrows >0){

		while($fetch=mysqli_fetch_array($ds)){

			$id=$fetch['id'];
			$planid=$fetch['id'];

			$i++;

			
$decid=base64_encode($id);
$date=$fetch['pdate'];			


$qfeaturid=getqfeaturedidfrompricingid($conn,$id);

$tespapersid=gettestpaperidwithquesid($conn,$quesid,$planid);
			?>

			

		    <tr>

                <td align="center"><?php echo $i; ?></td>
                <td align=""><?php echo $fetch['name']?> 
                </td>  
                 <td align="center">
				 
				 <?php 
                 $execQrymain=mysqli_query($conn,"select * from `full_test_created` where `eduqfeature_id`='$qfeaturid' and `status`='1' and `view`='1' order by `id` asc");
	$numRowsmain=mysqli_num_rows($execQrymain);
	if($numRowsmain>0){
		while($fetchmain=mysqli_fetch_array($execQrymain)){
			
			?>
                 
					  <div style="width:150px;margin:5px;padding:5px;border:dotted 1px #CCC;float:left;font-family:Calibri;font-size:13px;font-weight:bold;color:#264c8c;"><input type="checkbox" name="paper<?php echo $qfeaturid?>" value="<?php echo $fetchmain['id']; ?>" <?php if(in_array($fetchmain['id'],$tespapersid)) {?> checked <?php } ?>>&nbsp; <?php echo $fetchmain['name'] ?></div>
		<?php }}else{?>
        No Test Papers Available
        <?php }?>
                 
                 </td>
                                
                                 <td align="center">
                               <span id="loader<?php echo $qfeaturid?>" style="display:none">  <img src="<?php echo $baseurl?>/images/loader.gif"></span>
                               <span id="buttonid<?php echo $qfeaturid?>">
       <input type="button" value="Assign" style="color: white;background: #264c8c;font-size: 16px;" onClick="assigntestplanswithquestion(<?php echo $quesid?>,<?php echo $planid?>,<?php echo $qfeaturid?>,<?php echo $en_topic_id?>);">
                                 </span>
                                 </td>

                

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
    
    
  
 

   

  </body>

</html>

