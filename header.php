<?php
ob_start();
session_start();
error_reporting(0);

include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
$userid=$_SESSION['userid'];
$tbname="register";
$user_details=getTableDetailsById($conn,$tbname,$userid);
$levelchoosen=$user_details['sid'];
//$levelchoosen=3;        
$trial_val=$user_details['trial'];
$allOids=getallOrderIDfromUserID($conn,$userid);   

foreach($allOids as $newoid)
{
	
	$query=mysqli_query($conn,"select `id` from `orderlist` where `orderid`='$newoid'");
	$n_rows=mysqli_num_rows($query);
}


$orderidcount=count($allOids);  
if(($orderidcount>1) || ($n_rows>1))
{
	
	$rpage="dashboard.php";
}

else
{
	
	$rpage="welcome.php";
	
}
$leveltable="edu_levels";
$level_details=getTableDetailsById($conn,$leveltable,$levelchoosen);

 $levelname=$level_details['name'];
  $cartcount=count($_SESSION["cart_array"]["bags"]);
if($cartcount==0)
{
	$cartcount='';
	
}



?>


    <link rel="icon" href="img/fav/favicon.png">
    <link rel="stylesheet" type="text/css" href="dist/notie.css">

    <!-- Touch Icons - iOS and Android 2.1+ -->
    <link rel="apple-touch-icon" href="img/fav/android-icon-48x48.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/fav/android-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="img/fav/apple-icon-114x114.png" />
      <!--<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>-->

    <!--bootstrap v4.0.0-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/material-kit.min.css">
    <!--animate-->
    <link rel="stylesheet" type="text/css" href="css/aos.css">
    <!--reset css-->
    <link rel="stylesheet" type="text/css" href="css/normalize.css">
    
    <!--owl-carousel-->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="css/owl.theme.default.min.css">
    <!--pop up css-->
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <!--swiper css-->
    <link rel="stylesheet" type="text/css" href="css/swiper.css">
    <!--fontawesome cdn-->
    <!--animation spin css-->
    <link rel="stylesheet" type="text/css" href="css/animation-spin.css">
 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!--main style-->
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link href="https://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,600,700,900" rel="stylesheet">

    <!--modernizr-->
    <script src="js/vendor/modernizr.js"></script>

    <!--[if lt IE 9]>
    <script src="js/html5/respond.min.js"></script>
    <![endif]-->
    
    <style>
    a.navbar-brand img {
    width: 190px;
    }
	
	.carts {position: absolute;
    top: -5%;
    right: 4%;
	}
    </style>
     <!--  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
	
		    google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
	
      function drawChart() {
		   for(var i=0;i<3;i++)
		   {
			 showchart(i)   
			   
		   }
	  }
	 function showchart(val) 
	 {
		 
		 
	var arr=document.getElementById('e_arr'+val).value;
			

	        var strArray = arr.split(",");
correct=parseInt(strArray[0]);
incorrect=parseInt(strArray[1]);
unattempt=parseInt(strArray[2]);
//unattempt=3;

        var data = google.visualization.arrayToDataTable([
           ['Task', 'Hours per Day'], 
          ['Correct', correct],
          ['incorrect',incorrect],
          ['Unanswered', unattempt], 
        ]);

        var options = {
          pieHole: 0.4,
		     pieSliceText: 'value-percentage',
         'width': 350,
         'height': 400,
         'chartArea': {'width': '100%', 'height': '80%'},
         'legend': {'position': 'bottom'}    
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'+val));
	 
        chart.draw(data, options);
	}
      
    </script>-->
    
   <!-- <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Correct',     11],
          ['incorrect',      2],
          ['Unanswered',  2],
        ]);

        var options = {
          pieHole: 0.4,
         'width': 350,
         'height': 400,
         'chartArea': {'width': '100%', 'height': '80%'},
         'legend': {'position': 'bottom'}    
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart2'));
        chart.draw(data, options);
      }
    </script>
    
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Correct',     11],
          ['incorrect',      2],
          ['Unanswered',  2],
        ]);

         var options = {
          pieHole: 0.4,
         'width': 350,
         'height': 400,
         'chartArea': {'width': '100%', 'height': '80%'},
         'legend': {'position': 'bottom'}    
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart3'));
        chart.draw(data, options);
      }
    </script>-->
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="60">
<!--    <div class="se-pre-con"></div>-->

    <!-- main nav start -->

    <nav class="navbar navbar-expand-lg navbar-transparent fixed-top center-brand static-nav">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="<?php echo $baseurl;?>">
                    <img src="img/logo.png" alt="logo" class="logo-default">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="xeronav">
              
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item drop_menu"> <a class="nav-link active" href="<?php echo $baseurl;?>">Home</a>
                       
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="how-it-works.php">How it works</a>
                    </li>
                    <li class="nav-item drop_menu"> <a class="nav-link" href="testimonials.php">Testimonials</a>
                        
                    </li>
                    <li class="nav-item drop_menu"> <a class="nav-link" href="school-data.php">School Data </a>
                        
                    </li>

                    <li class="nav-item drop_menu"> <a class="nav-link" href="pricing.php">Pricing <i class="fas fa-caret-down"></i></a>
                        <ul>
                        
                        <?php
						$selq=mysqli_query($conn,"select * from `edu_levels` where `status`='1' and `view`='1'");
			$numro=mysqli_num_rows($selq);
						if($numro>0)
						{ while($resultss=mysqli_fetch_array($selq))
						{
						?>
                            <li><a href="packages.php?slug=<?php echo $resultss['slug'];?>"><?php echo $resultss['name'];?></a></li>
                            <?php }}?>
                        </ul>
                    </li>
        <div style="position:relative">            
<li class="nav-item drop_menu"> <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart"></i><span id="cart_count" class="carts"><?php echo $cartcount;?></span></a>  </li>
</div>
<?php if($userid=="")
{?>
                    
                    <li class="nav-item btn_sign">
                       <a class="nav-link btn" href="#" data-toggle="modal" data-target="#exampleModalLongs">Log in</a>
                    </li>
                    <?php } else{?>
                    <li class="nav-item drop_menu"> <a class="nav-link"><i class="fa fa-user-circle"></i><i class="fas fa-caret-down"></i></a>
                        <ul>
                        <li><a href="<?php echo $rpage;?>">Dashboard</a></li>                              
                        <li><a href="logout.php">Log out</a></li>

                        </ul>
                    </li>
                    <!-- <li class="nav-item btn_sign">
                       <?php echo $user_details['email'];?>
                    </li>-->
                    <?php }?>

                </ul>
            </div>   
        </div>
        <!--/.CONTAINER-->
    </nav><input type="hidden" id="user_session" value="<?php echo $userid;?>">
    
    
 