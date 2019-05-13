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

$page="addquestions.php";

//$colname='e_brochure_file';

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




  </head>



  <body class="nav-md">

    <div class="container body">

      <div class="main_container">




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

                   <?php 
				   
				   $select=mysqli_query($conn,"select * from `questionimages`");
				   while($resultset=mysqli_fetch_array($select))
				   {
				   $id=$resultset['id'];
				  				   $imagepath=$resultset['imagepath'];
 
				   ?> 
                   
                    <img src="../allphotos/<?php echo $imagepath;?>"> <button onclick="returnFileUrl('<?php echo $imagepath;?>')">Select File</button>
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
        // Helper function to get parameters from the query string.
        function getUrlParam( paramName ) {
            var reParam = new RegExp( '(?:[\?&]|&)' + paramName + '=([^&]+)', 'i' );
            var match = window.location.search.match( reParam );

            return ( match && match.length > 1 ) ? match[1] : null;
        }
        // Simulate user action of selecting a file to be returned to CKEditor.
        function returnFileUrl(paths) {

            var funcNum = getUrlParam( 'CKEditorFuncNum' );
            var fileUrl = '../allphotos/'+paths;
            window.opener.CKEDITOR.tools.callFunction( funcNum, fileUrl, function() {
                // Get the reference to a dialog window.
                var dialog = this.getDialog();
                // Check if this is the Image Properties dialog window.
                if ( dialog.getName() == 'image' ) {
                    // Get the reference to a text field that stores the "alt" attribute.
                    var element = dialog.getContentElement( 'info', 'txtAlt' );
                    // Assign the new value.
                    if ( element )
                        element.setValue( 'alt text' );
                }
                // Return "false" to stop further execution. In such case CKEditor will ignore the second argument ("fileUrl")
                // and the "onSelect" function assigned to the button that called the file manager (if defined).
                // return false;
            } );
            window.close();
        }
    </script>

   

  </body>

</html>

