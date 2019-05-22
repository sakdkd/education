


<?php 

 error_reporting(0); 

?>



<style>
.error {
	
	
	color:red;
	
	
	
}




</style>

<div class="top_nav">

          <div class="nav_menu">

            <nav>

              <div class="nav toggle">

                <a id="menu_toggle"><i class="fa fa-bars"></i></a>

              </div>



              <ul class="nav navbar-nav navbar-right">

                <li class="">

                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

                    <!--<img src="<?php echo $baseurl ?>/images/logo.png" alt="">--><?php echo $companyName; ?>

                    <span class=" fa fa-angle-down"></span>

                  </a>

                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                   <!-- <li><a href="javascript:;"> Profile</a></li>

                    <li>

                      <a href="javascript:;">

                        <span class="badge bg-red pull-right">50%</span>

                        <span>Settings</span>

                      </a>

                    </li>

                    -->

                    <li><a href="passcode.php"><i class="fa fa-lock pull-right"></i>Change Password</a></li>
                     <?php if($buid==1){ ?>
                     <li><a href="settings.php"><i class="fa fa-cogs pull-right"></i>Settings</a></li>
<?php }?>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>

                  </ul>

                </li>



                <li role="presentation" class="dropdown">

                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">

                    <i class="fa fa-envelope-o"></i>

                    <span class="badge bg-green">0</span>

                  </a>

                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

                    <li>

                      <a>

                        <!--<span class="image"><img src="images/logo/suncity.jpg" alt="Profile Image" /></span>-->

                        <span>

                          <span>Query</span>

                          <!--<span class="time">3 mins ago</span>-->

                        </span>

                        <span class="message">

                         No Notice Yet

                        </span>

                      </a>

                    </li>

                 

                    <li>

                      <div class="text-center">

                        <a>

                          <strong>See All Alerts</strong>

                          <i class="fa fa-angle-right"></i>

                        </a>

                      </div>

                    </li>

                  </ul>

                </li>

              </ul>

            </nav>

          </div>

        </div>
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

					background-color: #7b7777;

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