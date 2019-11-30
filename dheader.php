<?php
ob_start();
session_start();
error_reporting(0);
  $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']; 
   $apage_link = $_SERVER['PHP_SELF']; 

include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
$userid=$_SESSION['userid'];
$order_id=$_SESSION['orderid'];
$packages_id=$_SESSION['packid']; 
$test_analysis_details=GetLastTestAttemptedBy_User($conn,$userid);
if($test_analysis_details!='')
{
	$ID=base64_encode($test_analysis_details['levelid']);
		$TESTID=$test_analysis_details['id'];

	$pageurl="result_summery.php?id=".$ID."&test=".$TESTID."&type=MQ==";
	
}
else
{
	$pageurl="";
	
}
$tbname="register";
$user_details=getTableDetailsById($conn,$tbname,$userid);
$savedsid=$user_details['sid'];
$order_mands=getallOrderIDfromUserID($conn,$userid);   
foreach($order_mands as $oidss)
{
	
	$result[]=getBoughtPackagefromOid($conn,$oidss);
	
}
foreach($result as $resultids)
{
	
 //	print_r($resultids); 
	foreach($resultids as $rids)
	{
		
		$all_ids[]=$rids;
		
		
	}
	
} 
$all_ids=array_unique($all_ids); 
$levelids1=array();
foreach($all_ids as $planids)
{
	
	$levelids_ids[]=getColoumnNameByIdtableval($conn,"level_id","edu_pricing",$planids);
array_push($levelids1,$levelids_ids);
}
foreach($levelids1 as $ulevel)
{ 

}
//$levelchoosen=$user_details['sid'];
foreach($levelids1 as $ulevel)
{/*foreach($ulevel as $lids)
	{ echo "lids".$lids;
	$levelids[]=$lids;
	}*/
	
	
}

//print_r($levelids); die;

$levelids=array_unique($levelids); 
$newlevelids=array_slice($levelids,0,1);
foreach($newlevelids as $mainid)
{
	
	$main_level_name=getDataFromTable($conn,$mainid,"edu_levels");
}
$other_lids=array_slice($levelids,1);

$levelchoosen=getLastItemBoughtFromUserId($conn,$userid);
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

$count_of=0;  


$order_details=orderidbyUserid($conn,$userid);

if($order_id=="")

{

  $order_id=$order_details['id'];
 $package_arr=getBoughtPackagefromOid($conn,$order_id);

}
else
{ 
	$package_arr[]=$packages_id;
	
	$package_arr=array_unique($package_arr);
}  
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
if($packages_id!='')
{
	
	 $level_id=getColoumnNameByIdtableval($conn,"level_id","edu_pricing",$packages_id)	; 
	$level_details_new=getTableDetailsById($conn,"edu_levels",$level_id);

 $levelname=$level_details_new['name'];
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
                    
                    <?php if(count($order_mands)>0)
					{?>
                    <li class="lavelselect">
                         <?php $allOids=getallOrderIDfromUserID($conn,$userid); 
					   if($actual_link!="http://78.46.117.226/education/newexam.php")
					   {
?>					   
					    <select onChange="getpackid(this.value,'<?php echo $userid;?>')"> 
                        <?php
		 foreach($allOids as $OrderIds)
		 { 
		 
		$all_p_ids= getBoughtPackagefromOid($conn,$OrderIds) ;
		$all_p_ids_string=implode(",",$all_p_ids);
		 
		 $index=0;
		$selquerys=mysqli_query($conn,"select * from `edu_pricing` where `id` in ($all_p_ids_string)");
    while($resultset=mysqli_fetch_array($selquerys))
	{  
	
	$index++; 
	$leveltable="edu_levels";
$level_details=getTableDetailsById($conn,$leveltable,$resultset['level_id']);

 $levelname_new="(".$level_details['name'].")";
		
?>
		
                
                
                
                <option value="<?php echo $resultset['id'];?>" <?php if($packages_id==$resultset['id']){?>selected<?php }?>><?=$levelname_new;?></option>
                
                <?php }}?>
                </select>      
                
                <?php }?> 
                    </li>

<?php }?>
                    <li class="nav-item drop_menu"> <a class="nav-link active" href="welcome.php">Dashboard</a>
                       
                    </li>
                        
                    
                    <?php if($count_of>0)
					{?>
                    <li class="nav-item drop_menu"> <a class="nav-link" href="practice.php">Practice Excercise</a></li>
                    <?php }?>
                    
<li class="nav-item drop_menu login-user"> <a class="nav-link" ><i class="fa fa-user-circle"></i><i class="fas fa-caret-down"></i></a>
                        <ul>
                                        <li class=" drop_menu"> <a class="nav-link" href="#"><?php echo strtolower($user_details['email']);?></a></li>
                       
                        <li><a href="logout.php">Log out</a></li>

                        </ul>
                       </li> 
                       
                       <!--<li class="nav-item drop_menu"> <a class="nav-link" ><?=$main_level_name;?></i>  <?php if(count($other_lids)>0){?><i class="fas fa-caret-down"></i><?php }?></a>
                        <?php $other_lids; if(count($other_lids)>0)
					   { ?>
                        <ul>
                                        
                       <?php
						   foreach($levelids as $o_lids)
						   {
							   $level_drop_name=getDataFromTable($conn,$o_lids,"edu_levels");

						   ?>
                        <li onclick="setboughtpackage('<?php echo $resultset['id'];?>','<?php echo $OrderIds;?>')"><a href=""><?=$level_drop_name;?></a></li>
<?php } ?>
                        </ul>
                        <?php }?>
                       </li>-->
                       
                      
					<!--<li class="nav-item drop_menu"> <a class="nav-link" href="#">Analysis</a></li>
					<li class="nav-item drop_menu"> <a class="nav-link" href="#">Grit Store</a></li>-->
                </ul>
            </div>
        </div>
	</nav><input type="hidden" id="user_session" value="<?php echo $userid;?>">
    <div class="header-d">
    	<div class="container">
		<nav>
			<ul>
				<li><a href="<?=$baseurl;?>/welcome.php" <?php  if($pageno==1){?> class="active"<?php }?>>Dashboard</a></li>
				<li><a href="<?=$baseurl;?>/practice.php"<?php  if($pageno==2){?> class="active"<?php }?>>Practice Exercise</a></li>
                <?php if($pageurl!='')
				{?>
				<li><a href="<?=$baseurl."/".$pageurl;?>">Analysis</a></li>
                <?php }?>
			</ul>
		</nav>
	</div>
    </div>
    
 