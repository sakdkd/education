<?php
ob_start();
session_start();
include('../db_class/dbconfig.php');
include('../db_class/message.php');
include('../db_class/hr_functions.php');
$buid=$_SESSION['buid'];
$sid=$_GET['id'];
$type='1';
$buttonval=$_GET['buttonval'];

?>

<!DOCTYPE html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<!-- Meta, title, CSS, favicons, etc. -->

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home</title>

<!-- css -->

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<!-- end css -->

</head>

<body class="nav-md">
<div class="container body">
  <div class="main_container">
    <?php include_once('sidepanel.php') ?>
    
    <!-- top navigation -->
    
    <?php include_once('toppanel.php') ?>
    
    <!-- /top navigation --> 
    
    <!-- style css -->
    
    <style>
@media (min-width: 576px)
.modal-dialog {
    max-width: 57%;
    margin: 1.75rem auto;
}
table.pro-table {
    margin: 10px;
}
.pro-table td {
    padding: 5px 11px;
}
</style>
    <input type="hidden" id="buttonval" name="buttonval" value="<?php echo $buttonval;?>">
    
    <!-- end style css --> 
    
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
              <div class="x_title">
                <h2>View Messages</h2>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <table class="table table-responsive table-bordered" id="ls-editable-table">
                  <thead class="thead-dark text-center">
                    <tr>
                      <th>S.No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Date</th>
                      <th>View Details</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">
                    
                    <!-- fetch data for inventory -->
                    
                    <?php
//echo "SELECT * FROM `services` WHERE `status` =1  and  `servicetype`='$sid'   order by `id` Desc";
					    $ds=$conn->query("SELECT * FROM `contactus` order by `pdate` Desc");  

						$numrows=$ds->num_rows;

						$si=0;

						if($numrows>0 ){

							while ($row=$ds->fetch_assoc()){
								++$si;
								
									$edulevel_details=getTableDetailsById($conn,"edu_levels",$edupricing_details['level_id']);
								$packname=$edupricing_details['name']." (".$edulevel_details['name'].")";  	
					?>
                    <tr>
                      <td><?php echo $si;?></td>
                      <td><?php echo ucfirst($row["name"])." ".ucfirst($row["lname"]);?></td>
                      <td><?php echo $row["email"];?></td>
                      <td><?php echo $row["mobile"];?></td>
                      <td><?php echo changeToStdDate($conn,$row["pdate"]);?></td>
                      <td><a data-toggle="modal" data-target="#exampleModalContent<?php echo $row["id"];?>">
                        <button name="view" class="btn btn-success">View</button>
                        </a></td>
                    </tr>
                    <?php

					$i++;

						}
						?>
                    <?php }



					?>
                    
                    <!-- end fetch data inventory -->
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- end container result --> 
    
    <!-- /page content --> 
    
    <!-- footer content -->
    
    <?php include_once('footerpanel.php') ?>
    
    <!-- /footer content --> 
    
  </div>
</div>

<!-- javascript --> 

<!--   <script src="https://code.jquery.com/jquery-3.3.1.js"></script> --> 

<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
--> 

<!-- end javascript --> 

<script>
function checkbuttonval(val){
	if(val=='1')
	{
		
	alert("Your reply has been submitted successfully");	
		
		
	}
	
	
	
	
}

</script>
<?php

  $selquery=mysqli_query($conn,"SELECT * FROM `contactus` order by `id` Desc");
while($resultset=mysqli_fetch_array($selquery))
{
	
		
		$message= ucfirst($resultset['message']);
 
?>
<div class="modal fade" id="exampleModalContent<?php echo $resultset['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalContentLabel">View Message</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <form>
          <p><strong>Message:</strong> <?php echo $message?></p>
        </form>
      </div>
    </div>
  </div>
</div>
<?php }?>
</body>
</html>