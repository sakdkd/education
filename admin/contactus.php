<?php

ob_start();

session_start();

include('../db_class/dbconfig.php');


include('../db_class/hr_functions.php');

$buid=$_SESSION['buid'];


$type=2;






$title="Contact Us";



checkIntrusion($buid,$builderbaseurl);



$title="Contact Us";



$page="contactus.php";





	$ds=mysqli_query($conn,"SELECT * FROM `contentpages` where `type` ='$type'  "); 

	$numrows=mysqli_num_rows($ds);



		while($fetch=mysqli_fetch_array($ds)){

		

			 $onforms=$fetch['content'];

		}

		

		

		


	





if(isset($_POST['update'])){

	

	extract($_POST);

	$id=$hidId;

	$answer=mysqli_real_escape_string($conn,$answer);

	$pdate=date("Y-m-d h:i a");
	
	$insQry=mysqli_query($conn,"UPDATE `contentpages` SET  `content` = '$answer'  where `type` = '$type' ");

	if($insQry){

		//updatelogs($conn,13,$buid,$buid,1,$projtype);

		header("location:".$page."?msg=ups");

	}else{

		header("location:".$page."?msg=upf");

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



    <title>Tour & Travels | </title>



   

    <style>

	.img-circle

   {

	border-radius:5%;   

   }

   .img-circle.profile_img{

	width:90%;   

   }

   table td {

	border:solid 1px #999;   

	padding:5px;

	font-size:12px;

   }

	</style>

    <script>



function validate(){

	var nicE = new nicEditors.findEditor('answer');

	question = nicE.getContent();	

	document.getElementById('answer').value=question

	

	
	

}

</script>



<script src="https://cdn.ckeditor.com/4.9.2/standard/ckeditor.js"></script>

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

                    <span style="float:right;"><a href="<?php echo $page; ?>?edit=1" style="color:#39C;">[ Edit Content ]</a></span>

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                     <?php if( isset($_GET['edit']) && ($_GET['edit']!='')){ ?>

                     <form action=""  method="Post"  onSubmit="return validate()"> 

                     <table width="100%" border="0" class="table table-bordered table-striped">

  <tr>

    <td width="8%"> Content</td>

    <td width="92%"><textarea class="form-control" name="answer" style="height:100px;" id="answer"><?php echo htmlentities(stripslashes($onforms)); ?></textarea></td>

  </tr>

  <tr>

    <td>&nbsp;</td>

    <td><input type="hidden" name="hidId" value="<?php echo $buid; ?>">

  

     <input type="submit" name="update" value="Update Content" class="btn btn-success" > &nbsp;&nbsp;<input type="button" class="btn btn-danger" value="Cancel" onClick="window.location.href='<?php echo $page; ?>'">

  

    

    </td>

  </tr>

</table>



                     </form>

                     

                     <?php }else{?>

					 

                     <table width="100%" border="0" class="table table-bordered table-striped">

  <tr>

   

    <td><?php echo stripslashes($onforms); ?></td>

  </tr>

   
  

</table>

                     

                     

					

                     

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

		CKEDITOR.replace( 'answer' );

	

		</script>

   

  </body>

</html>

