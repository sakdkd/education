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
$trial_val=$user_details['trial'];
$leveltable="edu_levels";
$level_details=getTableDetailsById($conn,$leveltable,$levelchoosen);

 $levelname=$level_details['name'];
  $cartcount=count($_SESSION["cart_array"]["bags"]);
if($cartcount==0)
{
	$cartcount='';
	
}

$order_details=orderidbyUserid($conn,$userid);
 $order_id=$order_details['id'];
$package_arr=getBoughtPackagefromOid($conn,$order_id);
$count_of=0;         
foreach($package_arr as $pacid)
{
	//echo "select * from `edu_pricingqfeatures` where `qfeatureid`='4' and `pricingid`='$pacid'";
$mains_query=mysqli_query($conn,"select * from `edu_pricingqfeatures` where `qfeatureid`='4' and `pricingid`='$pacid'");
					$numrows=mysqli_num_rows($mains_query);
				if($numrows>0)
				{
					
				$count_of++;	
					
				}
						 
}

?>




<?php include_once("allcss.php");?>
    
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

                    <li class="nav-item drop_menu"> <a class="nav-link active" href="welcome.php">Dashboard</a>
                       
                    </li>
                        
                    </li>
                    <?php if($count_of>0)
					{?>
                    <li class="nav-item drop_menu"> <a class="nav-link" href="practice.php">Practice Excercise</a></li>
                    <?php }?>
                    
<li class="nav-item drop_menu"> <a class="nav-link" href=""><i class="fa fa-user-circle"></i><i class="fas fa-caret-down"></i></a>
                        <ul>
                                        <li class=" drop_menu"> <a class="nav-link" href="#"><?php echo strtolower($user_details['email']);?></a>
                       
                        <li><a href="logout.php">Log out</a></li>

                        </ul>
                    </li>
					<!--<li class="nav-item drop_menu"> <a class="nav-link" href="#">Analysis</a></li>
					<li class="nav-item drop_menu"> <a class="nav-link" href="#">Grit Store</a></li>-->
                </ul>
            </div>
        </div>
        <!--/.CONTAINER-->
    </nav><input type="hidden" id="user_session" value="<?php echo $userid;?>">
    
    
 