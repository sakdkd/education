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
if(isset($_POST['update']))
{
	
	
	extract($_POST);
	$newsid=mysqli_real_escape_string($conn,$newhiddensid);
$confirmfee=mysqli_real_escape_string($conn,$confirmfee);
$confirmfeedate=mysqli_real_escape_string($conn,$confirmfeedate);
$recurringfee=mysqli_real_escape_string($conn,$recurringfee);
$recurringfeedate=mysqli_real_escape_string($conn,$recurringfeedate);
$referral=mysqli_real_escape_string($conn,$referral);

$contractsentdate=mysqli_real_escape_string($conn,$contractsentdate);
$contractreceivedate=mysqli_real_escape_string($conn,$contractreceivedate);
$feereceivedate=mysqli_real_escape_string($conn,$feereceivedate);
$leadtimedate=mysqli_real_escape_string($conn,$leadtimedate);
$projectassigned=mysqli_real_escape_string($conn,$projectassigned);

$assigndate=mysqli_real_escape_string($conn,$assigndate);

$processdate=mysqli_real_escape_string($conn,$processdate);

$completiondate=mysqli_real_escape_string($conn,$completiondate);
$notes=mysqli_real_escape_string($conn,$notes);

$hiddensid=mysqli_real_escape_string($conn,$hiddensid);

$careprovider=mysqli_real_escape_string($conn,$careprovider);
	
	$insertquery="INSERT INTO `postreply`(`confirmedfeeamt`, `confirmeddate`, `recurringfees`, `recurringfeesdate`, `referral`, `contractsent`, `contractreceived`, `feereceived`, `leadtime`, `assignedproject`, `assignedprojectdate`, `proinprocessdate`, `prcompletion`, `adminnotes`, `service_id`,`requesttype`,`careprovider`) VALUES ('$confirmfee','$confirmfeedate','$recurringfee','$recurringfeedate','$referral','$contractsentdate','$contractreceivedate','$feereceivedate','$leadtimedate','$projectassigned','$assigndate','$processdate','$completiondate','$notes','$hiddensid','1','$careprovider')";
	
	$runquery=mysqli_query($conn,$insertquery);
	
	if($runquery)
	{
		
		$buttonval='1';

		header('location:requests.php?id='.$newsid.'&buttonval='.$buttonval);
		
		
		
	}
 	else
	{
		
		header('location:requests.php?id='.$newsid);

		
		
	}
	
	
}
?>

<!DOCTYPE html>

<html>

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tour &amp; Travel</title>

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

			  table.dataTable thead th

			  	{

				    padding: 10px 2px;

				    border-bottom: 1px solid #111;

				}

				table.dataTable tbody th, table.dataTable tbody td

				 {

			    	padding: 3px 6px;

			    	vertical-align: text-top;

				}

				table.dataTable thead th, table.dataTable thead td 

				{

			    padding: 10px 10px;

			    border-bottom: 1px solid #111;

			    color: white;

				}

				table.dataTable thead .sorting 

				{

			    background-image: none;

				}

				table.dataTable thead .sorting_asc

				 {

			    background-image: none;

				}

				.bg-white {

			    background-color: #d2f7cb!important;

				}

				.table-bordered td, .table-bordered th {

			    border: 1px solid #c1c1c1;

				}

				.thead-dark

				{

					background-color: #635f5f;

				}

				.table-bordered>tbody>tr>td

				{

					    color: black;

				}

label{
	
	    font-family: calibri;
    font-weight: normal;
    font-size: larger;
    color: #337ab7;
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

                    <h2>Bookings</h2>

                    

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">



                  		<table class="table table-responsive table-bordered" id="ls-editable-table">

				            <thead class="thead-dark text-center">

				                <tr>

				                    <th>S.No</th>
									<th> Client Name</th>
                                    <th> Persons</th>
                                    <th> Travel date</th>
				                    <th>Company Name</th>
				                    <th width="40%">Package</th>
				                    <th>Booked Date</th>

			                    </tr>

				            </thead>

				             <tbody class="text-center">

                  	<!-- fetch data for inventory -->



                  	<?php
//echo "SELECT * FROM `services` WHERE `status` =1  and  `servicetype`='$sid'   order by `id` Desc";
					    $ds=$conn->query("SELECT * FROM `register` WHERE `status` =1 order by `id` Desc");  

						$numrows=$ds->num_rows;

						$i=1;

						if($numrows>0 ){

							while ($row=$ds->fetch_assoc()){

					?>

							<tr>

			                    <td><?php echo $i;?></td>
			                    <td><?php echo $row["lname"];?> </td>
<td><?php echo $row["location"];?></td>

	          					<td><?php echo $row["phone"];?></td>

	          					<td><?php echo $row["email"];?></td>


	          					<td>
	          					  
	          			  		  
	          					  <?php echo $row["pdate"];?>
	          					  
          					    </td>

							 
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

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
-->
   <script>

         $(document).ready(function() {

               $('#ls-editable-table').DataTable({

               	"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],

        		"iDisplayLength": 25,

            "createdRow": function( row, data, dataIndex ) {

            	switch(data[8])

            	{

            		case "Avaliable":

            		$(row).css( "background-color", "#fff" );

            		// $(row).find('td:eq(1)').css( "background-color", "rgb(230, 230, 230)" );

            		// $(row).find('td:eq(2)').css( "background-color", "rgb(230, 230, 230)" );

            		// $(row).find('td:eq(3)').css( "background-color", "rgb(230, 230, 230)" );

            		// $(row).find('td:eq(4)').css( "background-color", "rgb(230, 230, 230)" );

            		// $(row).find('td:eq(5)').css( "background-color", "rgb(230, 230, 230)" );

            		// $(row).find('td:eq(6)').css( "background-color", "rgb(230, 230, 230)" );

            		break;

            		case "Hold":

            		$(row).find('td:eq(0)').css( "background-color", "#ecec3bd4" );

            		$(row).find('td:eq(1)').css( "background-color", "#ecec3bd4" );

            		$(row).find('td:eq(2)').css( "background-color", "#ecec3bd4" );

            		$(row).find('td:eq(3)').css( "background-color", "#ecec3bd4" );

            		$(row).find('td:eq(4)').css( "background-color", "#ecec3bd4" );

            		$(row).find('td:eq(5)').css( "background-color", "#ecec3bd4" );

            		$(row).find('td:eq(6)').css( "background-color", "#ecec3bd4" );

            		$(row).find('td:eq(7)').css( "background-color", "#ecec3bd4" );

            		$(row).find('td:eq(8)').css( "background-color", "#ecec3bd4" );

            		break;

            		case "Sold":

            		$(row).find('td:eq(0)').css( "background-color", "#e08a8a" );

            		$(row).find('td:eq(1)').css( "background-color", "#e08a8a" );

            		$(row).find('td:eq(2)').css( "background-color", "#e08a8a" );

            		$(row).find('td:eq(3)').css( "background-color", "#e08a8a" );

            		$(row).find('td:eq(4)').css( "background-color", "#e08a8a" );

            		$(row).find('td:eq(5)').css( "background-color", "#e08a8a" );

            		$(row).find('td:eq(6)').css( "background-color", "#e08a8a" );

            		$(row).find('td:eq(7)').css( "background-color", "#e08a8a" );

            		$(row).find('td:eq(8)').css( "background-color", "#e08a8a" );



            		break;



            	}

            },

        });





              



        });



		function UpdateAva(id,val)

		{

			var keyid= id;

			var status=val;

			if(confirm("Are you sure you want Change Status Avaliable"))

              	{

              		$.ajax({

				    type: "POST",

				    url: 'ajax/update_suncity_inv.php',

				    data: {keyid:keyid,keystatus:status},

				    success: function(data){

				       alert('You successfully Updated');

				       location.reload(true);

				    }

			 		});

              	}

			

		}

		function UpdateHold(id,val)

		{

			var keyid= id;

			var status=val;

			if(confirm("Are you sure you want Change Status Hold"))


              	{

              		$.ajax({

				    type: "POST",

				    url: 'ajax/update_suncity_inv.php',

				    data: {holdid:keyid,holdstatus:status},

				    success: function(data){

				       alert('You successfully Updated');

				       location.reload(true);

				    }

			 		});

              	}

			

		}

		function UpdateSold(id,val)

		{

			var keyid= id;

			var status=val;

			if(confirm("Are you sure you want Change Status Sold"))

              	{

              		$.ajax({

				    type: "POST",

				    url: 'ajax/update_suncity_inv.php',

				    data: {soldid:keyid,soldstatus:status},

				    success: function(data){

				       alert('You successfully Updated');

				       location.reload(true);

				    }

			 		});

              	}

			

		}

		
function showpopup(v_al)
{
	
document.getElementById('hiddensid').value=v_al;
	
	$('#myModal').modal('show');
}

     </script>




   <!-- end javascript -->

<script>
function checkbuttonval(val){
	if(val=='1')
	{
		
	alert("Your reply has been submitted successfully");	
		
		
	}
	
	
	
	
}

</script>



</body>

</html>