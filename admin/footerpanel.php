



<footer>

          <div class="pull-right">

           <!-- Gentelella - Bootstrap Admin Template by <a href="#https://colorlib.com">Colorlib</a>-->

          </div>

          <div class="clearfix"></div>

        </footer>

         <!-- jQuery -->

    <script src="../assets/js/jquery-1.12.4.min.js"></script>
   <script src="../assets/js/jquery.validate.min.js"></script>
    <script src="../javascript/scripts.js"></script>

    <!-- Bootstrap -->

    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- FastClick -->

    <script src="vendors/fastclick/lib/fastclick.js"></script>

    <!-- NProgress -->

    <script src="vendors/nprogress/nprogress.js"></script>

                <script src="../ckeditor/ckeditor.js"></script>
                <script src="../ckeditor/build-config.js"></script>

<!--<script src="//cdn.ckeditor.com/4.11.4/full/ckeditor.js"></script>-->
    <!-- Custom Theme Scripts -->

    <script src="build/js/custom.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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