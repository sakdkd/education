<?php
ob_start();
session_start();

include('../db_class/dbconfig.php');
include('../db_class/hr_functions.php');

$buid=$_SESSION['buid'];

checkIntrusion($buid,$builderbaseurl);





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

                  <div class="x_title">

                    <h2>Dashboard</h2>



                    

                    <div class="clearfix"></div>

                  </div>

                  <div class="x_content">

                      <h4 style="font-size:16px;color:Green;">Welcome,  <?php echo $companyName; ?></h4>

                                  

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

