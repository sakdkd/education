<?php
ob_start();
session_start();

include('../db_class/dbconfig.php');
include('../db_class/hr_functions.php');

$buid=$_SESSION['buid'];

checkIntrusion($buid,$builderbaseurl);

if(isset($_GET['id']))
{
	
	$subid=$_GET['id'];
		$aid=$_GET['aid'];

	  $decoded_sid=base64_decode($subid); 
	 	$decoded_aid=base64_decode($aid);

	if($subid!='')
	{
		
	$querystring="select * from `attachedtopics` where `subtype_id`='$decoded_sid' and `status`='1' and `view`='1'";	
		
	}
	else
	{
		
		$querystring="select * from `attachedtopics` where `attachedid`='$decoded_aid' and `status`='1' and `view`='1'";	
	
		
		
		
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



    <title>Bosh Education | </title>



   

    <style>
.topics-list
{
	
	width:150px;
	height:150px;
	border:1px  solid #2f1edd;
	border-radius: 6px;
	margin:26px;
	
	
}
.topic-font
{
	font-size:12px;
	font-weight:bold;
	padding-top:10px;
	
	
	
}
	.img-circle

   {

	border-radius:5%;   

   }

   .img-circle.profile_img{

	width:90%;   

   }

   .button-success,

        .button-error,

        .button-warning,

        .button-secondary 

    {

            color: white;

            border-radius: 4px;

            text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);

    }

    .button-success {

    background: rgb(184, 122, 28);

    float: right;

        }



    .button-error

     {

            background: rgb(202, 60, 60); /* this is a maroon */

            float: right;

    }





	</style>

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

                <div class="x_panel">

                  <div class="">

                  



                    

                    <div class="clearfix"></div>

                  </div>
<div class="row">
<?php
$listquery=mysqli_query($conn,$querystring);
 $numrows=mysqli_num_rows($listquery);
 if($numrows>0)
 {
while($resultset=mysqli_fetch_array($listquery))
{ 
	$ids=$resultset['id'];
	$decoded_sid=$resultset['subject_id'];
	$ques_count=getQuestionCountfromTopicId($conn,$ids);
			$tb_subject=getTableDetailsById($conn,'subjects',$decoded_sid);
			if($decoded_sid!="")
			{
$prompt=$tb_subject['promptbased']; 
  if($prompt=='0')
  {
	  $page_name="addquestions.php";
	  
	  
  }
  else
  {
	  
	 $page_name="questions_prompt.php";  
	  
  }
			}
			else if($decoded_aid!="")
			{ 
				$sub_ids=getsubjectIdfromAttachedId($conn,$decoded_aid);
				$tb_subject1=getTableDetailsById($conn,'subjects',$sub_ids);

$prompt=$tb_subject1['promptbased']; 
  if($prompt=='0')
  {
	  $page_name="addquestions.php";
	  
	  
  }
  else
  {
	  
	 $page_name="questions_prompt.php";  
	  
  }
						
				
				
				
				
			}
	
?>
<div class="col-md-2 topics-list">
<div class="topic-font"><?php echo $resultset['topics'];?></div>   
<div class="topic-font"><span><?php echo $ques_count;?> question(s)</span><a href="<?php echo $page_name;?>?id=<?php echo base64_encode($ids);?>"><button class="btn btn-primary">Add Questions</button></a></div> 




</div>

<?php } } else {?>

<div class="col-md-4">
<div class="topic-font">No Data Found!!</div>   
 





</div>

<?php }?>
 
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

