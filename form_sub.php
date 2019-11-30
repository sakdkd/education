<?php
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
$userid=$_SESSION['userid'];

unset($_SESSION['stime']);
   		extract($_POST);
$btnvalues=$btnclickval; 
$endval=$_GET['end'];

if((isset($_GET['id']))  && ($btnvalues==5))
{  
		extract($_POST);

	$_SESSION['allresult']=$_POST;


$getid=$_GET['id'];

	


	$button=1;

	
	

	$existence=getExistenceofTestIdWithPracticeIdLid($conn,$test_name,$levelids,$userid);  

	 
	$pdate=date("Y-m-d");
//print_r($_POST);
	
	//echo "INSERT INTO `testgiven`(`userid`, `pdate`, `testname`, `button`, `status`, `view`,`subject_id`,`levelid`) VALUES ('$userid','$pdate','$test_name','$button','1','1','$subject_id','$levelids')"; die;
	
			mysqli_query($conn,"BEGIN"); 


$success='0';

	$all=$_POST['allques'];
	
	$imploded=implode(",",$all);
			mysqli_query($conn,"BEGIN");
			
			if($existence>0)
			{
$insquery=mysqli_query($conn,"UPDATE `testgiven` set `pdate`='$pdate',`testname`='$test_name',`button`='$button' where `id`='$existence' ");
$lastid=$existence;

			}
			else
			{
				
			$insquery=mysqli_query($conn,"INSERT INTO `testgiven`(`userid`, `pdate`, `testname`, `button`, `status`, `view`,`subject_id`,`levelid`) VALUES ('$userid','$pdate','$test_name','$button','1','1','$subject_id','$levelids')");
		$lastid=mysqli_insert_id($conn);

			}
//$insquery=mysqli_query($conn,"INSERT INTO `testgiven`(`userid`, `pdate`, `testname`, `button`, `status`, `view`,`subject_id`,`levelid`) VALUES ('$userid','$pdate','$test_name','$button','1','1','$subject_id','$levelids')");

if($insquery)
{
if($existence > 0)
	{
		
	$delquery=mysqli_query($conn,"delete from `testattempted` where `testid`='$existence'");	
		
	}	foreach($all as $qi)
	{
		 $answer=$_POST['ans'.$qi]; 
		 if($answer=='')
		 {
			$answer=0; 
			 
		 }
		 				 $timetaken=$_POST['effected'.$qi]; 

		
				$insquery1=mysqli_query($conn,"INSERT INTO `testattempted`(`testid`, `questionid`, `answer`,`buttonval`,`timetaken`) VALUES ('$lastid','$qi','$answer','$button','$timetaken')");

	
		if($insquery1)
		{
			
		$success='1';	
			
		}
		
		       
		 
	}

}

if($success=='1')
{
	
				mysqli_query($conn,"COMMIT");
		header("location:web-app.php");

	
}

else
{
		header("location:welcome.php?1");

	
	
}
	

}

else if(isset($_GET['end']))
{
	
	


$getid=$_GET['end'];

	
	
	
	$resultset=$_SESSION['allresult'];
	
	 $levelids=$resultset['levelids'];
	 $test_name=$resultset['test_name'];
	 $btnclickval=$resultset['btnclickval'];
	 $subject_id=$resultset['subject_id'];
	 $all=$resultset['all'];
	 
	 
	 
	 	 $savedtime=$resultset['savedtime'];
$existence=getExistenceofTestIdWithPracticeIdLidNew($conn,$test_name,$levelids,$userid); 

	 	if($getid==2)
{
	
$button=3;
	
	
}

else
{
	$button=1;

	
	
}
	$button=1;

	$pdate=date("Y-m-d");
	
	//echo "INSERT INTO `testgiven`(`userid`, `pdate`, `testname`, `button`, `status`, `view`,`subject_id`,`levelid`) VALUES ('$userid','$pdate','$test_name','$button','1','1','$subject_id','$levelids')"; 
	
			mysqli_query($conn,"BEGIN"); 


$success='0';
 
	$all=$resultset['allques'];
	
	$imploded=implode(",",$all);
			mysqli_query($conn,"BEGIN");
			if($existence>0)
			{ 
			
			//"UPDATE `testgiven` set `pdate`='$pdate',`testname`='$test_name',`button`='$button' ,`savedtime`='$savedtime'where `id`='$existence'";
$insquery=mysqli_query($conn,"UPDATE `testgiven` set `pdate`='$pdate',`button`='$button' ,`savedtime`='$savedtime'where `id`='$existence'");
$lastid=$existence;

			}
			else
			{ 
				
			$insquery=mysqli_query($conn,"INSERT INTO `testgiven`(`userid`, `pdate`, `testname`, `button`, `status`, `view`,`subject_id`,`levelid`,`savedtime`) VALUES ('$userid','$pdate','$test_name','$button','1','1','$subject_id','$levelids','$savedtime')");
		$lastid=mysqli_insert_id($conn);

			} 
if($insquery)
{
	
	if($existence > 0)
	{
		
	$delquery=mysqli_query($conn,"delete from `testattempted` where `testid`='$existence'");	
		
	}
	
	foreach($all as $qi)
	{
		 $answer=mysqli_real_escape_string($conn,$resultset['ans'.$qi]);    
		 
		 if($answer=='')
		 {
			$answer=0; 
			 
		 }
		 
				 $timetaken=$resultset['effected'.$qi]; 
 
		//echo "INSERT INTO `testattempted`(`testid`, `questionid`, `answer`,`buttonval`) VALUES ('$lastid','$qi','$answer','$button')"; die;
				$insquery1=mysqli_query($conn,"INSERT INTO `testattempted`(`testid`, `questionid`, `answer`,`buttonval`,`timetaken`) VALUES ('$lastid','$qi','$answer','$button','$timetaken')");

	
		if($insquery1)
		{
			
		$success='1';	
			
		}
		
		       
		
	}

}

if($success=='1')
{
	
				mysqli_query($conn,"COMMIT");
		header("location:web-app.php");

	
}

else
{
		header("location:welcome.php?1");

	
	
}
	


	
}
else if(isset($_GET['pause']))
{
	
	$lasturl=$_SESSION['lasturl'];    


$pausevalue=$_GET['pause'];
	$resultset=$_SESSION['allresult'];

	
print_r($_SESSION['allresult']); 
	
	
	$resultset=$_SESSION['allresult'];
	 
	 $levelids=$resultset['levelids'];
	 $test_name=$resultset['test_name'];
	 $btnclickval=$resultset['btnclickval'];
	 $subject_id=$resultset['subject_id'];
	 $all=$resultset['all'];
	 		 $savedtime=$resultset['savedtime'];

$existence=getExistenceofTestIdWithPracticeIdLidNew($conn,$test_name,$levelids,$userid); 
	
$button=3;
	
	

	$pdate=date("Y-m-d");
	
	//echo "INSERT INTO `testgiven`(`userid`, `pdate`, `testname`, `button`, `status`, `view`,`subject_id`,`levelid`) VALUES ('$userid','$pdate','$test_name','$button','1','1','$subject_id','$levelids')"; 
	
			mysqli_query($conn,"BEGIN"); 


$success='0';

	$all=$resultset['allques'];
	
	$imploded=implode(",",$all);
			mysqli_query($conn,"BEGIN");
			
	if($existence>0)
			{ 
$insquery=mysqli_query($conn,"UPDATE `testgiven` set `pdate`='$pdate',`button`='$button',`savedtime`='$savedtime' where `id`='$existence' ");
$lastid=$existence;

			}
			else
			{ 
			$insquery=mysqli_query($conn,"INSERT INTO `testgiven`(`userid`, `pdate`, `testname`, `button`, `status`, `view`,`subject_id`,`levelid`,`savedtime`) VALUES ('$userid','$pdate','$test_name','$button','1','1','$subject_id','$levelids','$savedtime')");
		$lastid=mysqli_insert_id($conn);

			} 
			
			
			
			
//$insquery=mysqli_query($conn,"INSERT INTO `testgiven`(`userid`, `pdate`, `testname`, `button`, `status`, `view`,`subject_id`,`levelid`,`savedtime`) VALUES ('$userid','$pdate','$test_name','$button','1','1','$subject_id','$levelids','$savedtime')");

if($insquery)
{
if($existence > 0)
	{
		
	$delquery=mysqli_query($conn,"delete from `testattempted` where `testid`='$existence'");	
		
	}
		foreach($all as $qi)
	{
		 $answer=mysqli_real_escape_string($conn,$resultset['ans'.$qi]); 
		 				 $timetaken=$resultset['effected'.$qi]; 

		 if($answer=='')
		 {
			$answer=0; 
			 
		 }
		// echo "INSERT INTO `testattempted`(`testid`, `questionid`, `answer`,`buttonval`,`timetaken`) VALUES ('$lastid','$qi','$answer','$button','$timetaken')"; die;
				$insquery1=mysqli_query($conn,"INSERT INTO `testattempted`(`testid`, `questionid`, `answer`,`buttonval`,`timetaken`) VALUES ('$lastid','$qi','$answer','$button','$timetaken')"); 

	
		if($insquery1) 
		{
			
		$success='1';	
			
		}
		
		       
		
	}

}

if($success=='1')
{
	
				mysqli_query($conn,"COMMIT");
				if($pausevalue==2)
				{
						header("location:web-app.php");
	
				}
				
				else
				{
				
		header("location:$lasturl");
				}
	
}

else
{
		header("location:welcome.php?1");

	
	
}
	


	
}
else
{
	 $lasturl=$_SERVER['HTTP_REFERER'];; 
	$_SESSION['lasturl']=$lasturl;

	$_SESSION['allresult']=$_POST;
			extract($_POST);

if($btnclickval==0)
{$nbtnclickval=3;}
else
{
	$nbtnclickval=1;
	
}
$_SESSION['savebtn']=$nbtnclickval;
	$savebtn=$_SESSION['savebtn'];
$table="subjects";
$ssid=$subject_id;
$tab_details=getTableDetailsById($conn,$table,$ssid);
$Sub_names=$tab_details['name'];
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en" class="no-js">
<!--<![endif]--><head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>
    <!-- Standard Favicon -->
<?php include_once("header.php");?>  
    <!-- /.navbar -->
    <section style="    padding-top: 92px;">
<div class="upper-box-wrapper">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="wrapper-title">
                    <h3><?php echo $levelname;?></h3>
                    <h1>SECTION : <?php echo $Sub_names;?></h1>
                </div>
            </div>
            
            
        </div>
    </div>
</div> 
	</section>
 <section class="end-sec">
 
 	<div class="container">
 		<div class="row">
 			<div class="col-md-8 mx-auto customer1">
 				<h2 class="info-sect">Done with this section?</h2>
 				<p>Please confirm that you would like to end this section.</p>
 				<div class="row">
 				<div class="col-md-1"></div>
                <?php if($savebtn==3)
				{?>
 					<div class="col-md-5">
                    
 				<a href="form_sub.php?pause=2"><input type="submit" class="end-section" value="Exit Section" name="submit"></a>
 			</div>
            <?php } else{?>
            <div class="col-md-5">
             				<a href="form_sub.php?end=1"><input type="submit" class="end-section" value="End Section" name="submit"></a>

 			</div>
            <?php }?>
 			 <div class="col-md-5">
 				<a href="form_sub.php?pause=1"><button type="button" class="end-section-gray">Return To Section</button></a>
 			</div>
 			 <div class="col-md-1"></div>

 				</div>
 			</div>
 			

 		</div>
 	</div>
    
 </section>

    <!--recent-blog-->
    <section class="blog_sec" style="display: none">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title text-center">
                        <h3>Our Latest News</h3>
                    </div><!--/.title-->
                </div>
                <div class="w-100"></div>
                <div class="col-md-12">
                    <div class="owl-carousel" id="blog_slider_owl">
                        <div>
                            <div class="single_blog_in">
                                <div class="card">
                                    <div class="images">
                                        <img src="img/blog1.jpg" alt=""/>
                                        <div class="dates">
                                            <p>Sep 2018</p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h2><a href="#">We design platform for all global customers</a></h2>
                                        <p>Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore.</p>
                                        <ul>
                                            <li>
                                                <p><img src="img/client2.jpg" alt=""/>by <a href="#">Tonmoy Khan</a></p>
                                            </li>
                                            <li><a href="#"><i class="fas fa-bell"></i> 15</a></li>
                                            <li>
                                                <a href="#"><i class="fas fa-comment-alt"></i> 30</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!--/.single_blog_in-->
                        </div>
                        <div>
                            <div class="single_blog_in">
                                <div class="card">
                                    <div class="images">
                                        <img src="img/blog2.jpg" alt=""/>
                                        <div class="dates">
                                            <p>Sep 2018</p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h2><a href="#">Far far away,behind the word mountains, far from</a></h2>
                                        <p>Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore.</p>
                                        <ul>
                                            <li>
                                                <p><img src="img/client2.jpg" alt=""/>by <a href="#">Tonmoy Khan</a></p>
                                            </li>
                                            <li><a href="#"><i class="fas fa-bell"></i> 15</a></li>
                                            <li>
                                                <a href="#"><i class="fas fa-comment-alt"></i> 30</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!--/.single_blog_in-->
                        </div>
                        <div>
                            <div class="single_blog_in">
                                <div class="card">
                                    <div class="images">
                                        <img src="img/blog3.jpg" alt=""/>
                                        <div class="dates">
                                            <p>Sep 2018</p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h2><a href="#">We design platform for all global customers</a></h2>
                                        <p>Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore.</p>
                                        <ul>
                                            <li>
                                                <p><img src="img/client2.jpg" alt=""/>by <a href="#">Tonmoy Khan</a></p>
                                            </li>
                                            <li><a href="#"><i class="fas fa-bell"></i> 15</a></li>
                                            <li>
                                                <a href="#"><i class="fas fa-comment-alt"></i> 30</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!--/.single_blog_in-->
                        </div>
                        <div>
                            <div class="single_blog_in">
                                <div class="card">
                                    <div class="images">
                                        <img src="img/blog2.jpg" alt=""/>
                                        <div class="dates">
                                            <p>Sep 2018</p>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <h2><a href="#">Far far away,behind the word mountains, far from</a></h2>
                                        <p>Lorem ipsum dolor sit amet,sed diam nonumy eirmod tempor invidunt ut labore.</p>
                                        <ul>
                                            <li>
                                                <p><img src="img/client2.jpg" alt=""/>by <a href="#">Tonmoy Khan</a></p>
                                            </li>
                                            <li><a href="#"><i class="fas fa-bell"></i> 15</a></li>
                                            <li>
                                                <a href="#"><i class="fas fa-comment-alt"></i> 30</a>
                                            </li>
                                        </ul>
                                        
                                    </div>
                                </div>
                            </div><!--/.single_blog_in-->
                        </div>

                    </div><!--/.blog_slider_owl-->
                </div>
            </div>
        </div><!--/.container-->
    </section>
    <!--recent-blog-->

    <!--footer widget-->
  <?php include_once("footer.php");?>