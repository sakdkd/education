
<?php
ob_start();
session_start();
include('../db_class/dbconfig.php');
include('../db_class/hr_functions.php');

$buid=$_SESSION['buid'];
checkIntrusion($buid,$builderbaseurl); 

$title=""; 

$page="choose_type.php";



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



    <title><?php echo  getSiteName($conn); ?></title>



   

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
place=document.getElementById('place').value;
description=document.getElementById('description').value;
	description=description.trim();
	place=place.trim();

	if(name==''){

	

		alert("Please enter name ");

		return false;	

		}

	if(place==''){

	

		alert("Please enter a place ");

		return false;	

		}if(description==''){

	  

		alert("Please enter description ");

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

                    <h2><?php echo $title; ?> </h2>

                    

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                    
                     <?php if( isset($_GET['eid']) && ($_GET['eid']!='')){}else{?>

                     <form action="" id="choose_sub"  method="Post"  onSubmit="" enctype="multipart/form-data"> 

                     <table width="100%" border="0" class="table table-striped table-bordered">

    

            <tr>

                <td><label style="color:#069;font-weight:bold;"> Select Level *</label></td>

                <td width="28%"><select  name="level" id="level" class="form-control" onChange="choosesubject(this.value)"   >
                <option value="">Select ISEE Level</option>
                
                <?php 
				$ds=mysqli_query($conn,"SELECT * FROM `edu_levels` order by `id` desc " ); 
				$numrows=mysqli_num_rows($ds);
				if( $numrows >0){
				while($fetch=mysqli_fetch_array($ds)){
				?>
                <option value="<?php echo $fetch['id'] ?>"><?php echo $fetch['name'] ?></option>
				
				
				<?php }}?>
                
                
                </select></td>
<input type="hidden" value="" name="hiddenvalue" id="hiddenvalue">
                <td width="45%"></td>

            </tr>

          <tr>

                <td><label style="color:#069;font-weight:bold;"> Select Subject *</label></td>

                <td width="28%" id="selectsubject"><select  name="subjectid" id="subjectid" class="form-control"   >
                <option value="">Select Subject</option>
                
                <?php 
				$ds=mysqli_query($conn,"SELECT * FROM `levelsubjects` whereorder by `id` desc " ); 
				$numrows=mysqli_num_rows($ds);
				if( $numrows >0){
				while($fetch=mysqli_fetch_array($ds)){
				?>
                <option value="<?php echo $fetch['id'] ?>"><?php echo $fetch['name'] ?></option>
				
				
				<?php }}?>
             
                
                </select></td>

                <td width="45%"><span id="loaderid"></span></td>

            </tr>

            

         <tr>

                <td><label style="color:#069;font-weight:bold;"> Select Subtype </label></td>

                <td width="28%" id="selectsubtype"><select  name="subtypid" id="subtypid" class="form-control"   >
                <option value="">Select Subtype</option>
                
               
             
                
                </select></td>

                <td width="45%"><span id="topicloaderid"></span></td>

            </tr>

            
               

  

  

  <tr>

    <td></td>

    <td colspan="2"><input type="submit" name="submit"  id="submit"  value="Proceed To Start" class="btn btn-success"> </td>

  </tr>

</table>



                     </form>

                     

                     <?php }?>

                     

                     <div>

                     

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
	
	



	

	</script>



   

  </body>

</html>

