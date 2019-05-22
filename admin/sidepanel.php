   <?php
   $companyName=getAdminNameById($conn,$_SESSION['buid']);
   
   $key=$_SESSION['key'];
   ?>
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">

    <link href="build/css/custom.min.css" rel="stylesheet">
<style>
.profile_info {
    padding: 35px 15px 0px 17px;
    width: 65%;
    float: left;
}
</style>
<div class="col-md-3 left_col">

          <div class="left_col scroll-view">

            



            <div class="clearfix"></div>



            <!-- menu profile quick info -->

            <div class="profile clearfix">
  				<span style="font-family:Calibri; font-weight:600;font-size:24px;color:#FFF;margin-left:15px;">Bosh Education</span>
              <div class="profile_pic">
          			<!--  Bosh Education-->
              <!--  <img src="images/nologo.png" alt="..."  width="32" height="32">-->

              </div>

              <div class="profile_info">

                <span>Welcome,</span>

                <h2>Administrator</h2>

              </div>

              <div class="clearfix"></div>

            </div>

            <!-- /menu profile quick info -->



            <br />



            <!-- sidebar menu -->

            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

              <div class="menu_section">

              

                <ul class="nav side-menu">

                  <li><a href="<?php echo $builderbaseurl ?>/dashboard.php"><i class="fa fa-home"></i> Home <!--<span class="fa fa-chevron-down"></span>--></a>

                    <!--<ul class="nav child_menu">

                      <li><a href="#index.html">Dashboard</a></li>

                      <li><a href="#index2.html">Dashboard2</a></li>

                      <li><a href="#index3.html">Dashboard3</a></li>

                    </ul>-->

                  </li>

                  

                 <!-- <li><a href="<?php echo $builderbaseurl ?>/overview.php"><i class="fa fa-edit"></i> Project Overview <span class="fa fa-chevron-down"></span></a>

              

                  </li>-->

                  <!-- Project Overview -->

               



                 
                  <!-- Sitevisited Report -->

                   


                  <!-- end sitevisited report -->

                  <!-- Sales Report -->

                 

                  <!-- end sales report -->
                  
                  
             
                   <li><a ><i class="fa fa-cogs"></i>School Data  <span class="fa fa-chevron-down"></span> </a>
                      <ul class="nav child_menu">

                    <li><a href="country.php">Location Master</a></li>
                    <li><a href="schooldata.php">Manage School Data</a></li>
                 

                    </ul>
                   </li>
                   <li><a href="view_users.php"><i class="fa fa-user"></i>Registered Users </a></li>
                   
                 <!--  <li><a href="destination.php"><i class="fa fa-plane"></i>Destination Management </a></li>-->
                   
                   <li><a ><i class="fa fa-money"></i>Pricing  Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                    <li><a href="nqfeatures.php">Add Non Quantitative  Features </a></li>
                    <li><a href="qfeatures.php">Add Quantitative  Features</a></li>
                    <li><a href="viewlevels.php">Add Payment Plans</a></li>
                    
                    </ul>
                   
                   </li>
				   
                   <li><a><i class="fa fa-bar-chart-o"></i> Masters <span class="fa fa-chevron-down"></span></a>

                    <ul class="nav child_menu">

                    <!--<li><a href="aboutus.php">About Us Content</a></li>-->
                    <!--<li><a href="contactus.php">Contact Us</a></li>-->
                    <!--<li><a href="paymentterms.php">Payment Terms</a></li>-->
                   <!-- <li><a href="tourguide.php">Tour Guide</a></li>-->
                    <!--<li><a href="privacy.php">Privacy policy</a></li>-->

                     <!-- <li><a href="inclusions.php">Inclusions</a></li>
                        <li><a href="banner.php">Banner Management</a></li>-->
                        <li><a href="subjects.php">Subject Management</a></li>
                         <li><a href="addtimings.php">Level Subjects & Timings</a></li>

                    <!--  <li><a href="#morisjs.html">Moris JS</a></li>

                      <li><a href="#echarts.html">ECharts</a></li>

                      <li><a href="#other_charts.html">Other Charts</a></li>-->

                    </ul>

                  </li>
                 <li><a><i class="fa fa-bar-chart-o"></i> Question Management <span class="fa fa-chevron-down"></span></a>

                    <ul class="nav child_menu">

                    <li><a href="choose_level.php">Add Subtype</a></li>
                   
                    <li><a href="choose_subtype.php">Add Questions</a></li>
                    <li><a href="view_1.php">View Questions</a></li>

<li><a href="addminitest.php">Add Mini Test</a></li>
                    <!--  <li><a href="#morisjs.html">Moris JS</a></li>

                      <li><a href="#echarts.html">ECharts</a></li>

                      <li><a href="#other_charts.html">Other Charts</a></li>-->

                    </ul>

                  </li>
                  
                  
                  <li><a href="testimonials.php"><i class="fa fa-bar-chart-o"></i> Testimonials </a>
                  <li><a href="orders.php"><i class="fa fa-bar-chart-o"></i> Orders </a>

                    

                  </li>
                   	<!--<li><a><i class="fa fa-globe"></i> Package Management <span class="fa fa-chevron-down"></span></a>

                    <ul class="nav child_menu">

                      <li><a href="addpackages.php">Add Packages</a></li>

                      <li><a href="viewpackages.php">View Packages</a></li>

                   

                    </ul>

                  </li>
				    <li><a><i class="fa fa-mobile"></i> Bookings <span class="fa fa-chevron-down"></span></a>

                    <ul class="nav child_menu">

                      <li><a href="viewbookings.php">View Bookings</a></li>

                      <li><a href="viewcancellations.php">View Cancellations</a></li>

                   

                    </ul>

                  </li>
                    <li><a><i class="fa fa-mobile"></i> User Experience <span class="fa fa-chevron-down"></span></a>

                    <ul class="nav child_menu">

                      <li><a href="testimonial.php">Image Based</a></li>

                      <li><a href="vtestimonial.php">Video Based </a></li>

                  

                    </ul>

                  </li>
                    <li>

                      <a href="evaluations.php"><i class="fa fa-balance-scale"></i> Evaluations</a>

                    </li>-->
				


                </ul>

              </div>

            



            </div>

            <!-- /sidebar menu -->



            <!-- /menu footer buttons -->

            <!--<div class="sidebar-footer hidden-small">

              <a data-toggle="tooltip" data-placement="top" title="Settings">

                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>

              </a>

              <a data-toggle="tooltip" data-placement="top" title="FullScreen">

                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>

              </a>

              <a data-toggle="tooltip" data-placement="top" title="Lock">

                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>

              </a>

              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">

                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>

              </a>

            </div>-->

            <!-- /menu footer buttons -->

          </div>

        </div>