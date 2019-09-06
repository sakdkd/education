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

                    <h2>View Orders</h2>

                    

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">



                  		<table class="table table-responsive table-bordered" id="ls-editable-table">

				            <thead class="thead-dark text-center">

				                <tr>

				                    <th>Order ID</th>
<th>Name</th>
<th>Package</th>

				                    <th>Date</th>
				                    <th>Action</th>

			                    </tr>

				            </thead>

				             <tbody class="text-center">

                  	<!-- fetch data for inventory -->



                  	<?php
//echo "SELECT * FROM `services` WHERE `status` =1  and  `servicetype`='$sid'   order by `id` Desc";
					    $ds=$conn->query("SELECT * FROM `orders` order by `id` Desc");  

						$numrows=$ds->num_rows;

						$i=1;

						if($numrows>0 ){

							while ($row=$ds->fetch_assoc()){
								
								$userid=$row['userid'];
									 $allOids=getallOrderIDfromUserID($conn,$userid);  
	
							$oid=$row["id"]	;
$plandetails=getSingleBoughtPackagefromOid($conn,$oid);
 $packid=$plandetails['planid'];
 $edupricing_details=getTableDetailsById($conn,"edu_pricing",$packid);
									
									$edulevel_details=getTableDetailsById($conn,"edu_levels",$edupricing_details['level_id']);
								$packname=$edupricing_details['name']." (".$edulevel_details['name'].")";  	
					?>
    
							<tr>

			                    <td><?php echo getOrderCode($conn,$oid);?></td>
		                      <td><?php echo $row["fname"]." ".$row["lname"];?></td>
		                      <td><?php echo $packname;?></td>


	          					<td>
	          					  
	          			  		  
	          					  <?php echo changeToStdDate($conn,$row["pdate"]);?>
	          					  

          					    </td>
	          					<td><a data-toggle="modal" data-target="#exampleModalContent<?php echo $row["id"];?>">View</a></td>

							 
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


<?php

  $selquery=mysqli_query($conn,"SELECT * FROM `orders` order by `id` Desc");
while($resultset=mysqli_fetch_array($selquery))
{
	$OrderIds=$resultset['id'];
    	$pdetails=getSingleBoughtPackagefromOid($conn,$resultset['id']); 
		
		$all_p_ids= getBoughtPackagefromOid($conn,$OrderIds) ;
		$all_p_ids_string=implode(",",$all_p_ids); 
		
		  
?>
<div class="modal fade" id="exampleModalContent<?php echo $resultset['id'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalContentLabel">ORDER ID <span><strong><?php echo getOrderCode($conn,$resultset['id'])?></strong></span></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form>
                                            
                                                <?php
												$subtotal=0;
				$selquerys=mysqli_query($conn,"select * from `edu_pricing` where `id` in ($all_p_ids_string)");
    while($resultset=mysqli_fetch_array($selquerys))
	{   
	
	$leveltable="edu_levels";
$level_details=getTableDetailsById($conn,$leveltable,$resultset['level_id']);

 $levelname_new="(".$level_details['name'].")";

	$subtotal+=$resultset['price'];	
?>
                                                <div class="form-group">
                                                    <label for="recipient-name" class="col-form-label" style="font-weight:bold;">Package :Name:</label>
                                                    <label for="recipient-name" class="col-form-label"><?php echo $resultset['name'].$levelname_new;?></label>  
                                                </div>
                                                
                                                
                                                <div class="form-group">
                                                    <label for="message-text" class="col-form-label" style="font-weight:bold;"> Price:</label>
                                                    <label for="recipient-name" class="col-form-label">$<?php echo $resultset['price']?></label>  
                                                </div>
                                                <?php }?><div class="form-group">
                                                    <label for="message-text" class="col-form-label" style="font-weight:bold;">Total Price:</label>
                                                    <label for="recipient-name" class="col-form-label">$<?php echo $subtotal;?></label>  
                                                </div>
                                                
                                                
                                                
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <?php }?>
</body>

</html>