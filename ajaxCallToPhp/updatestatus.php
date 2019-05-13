<?php
 sleep(1);
 header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
 header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
 header ("Cache-Control: no-cache, must-revalidate");
 header ("Pragma: no-cache");
 include('../db_class/dbconfig.php');
include('../db_class/hr_functions.php');

 $id=$_GET['id'];
 $table=$_GET['table'];
 $status=$_GET['status'];
 
 $selQry=mysqli_fetch_row(mysqli_query($conn,"select * from `$table` where id='$id'"));
 $status=$selQry[$status];
 
 if($status==1){
 	$newStatus=0;
 }elseif($status==0){
	$newStatus=1;
 }
 // echo "UPDATE `$table` set status= '$newStatus' where `id`='$id' ";

 $textStatus=getStatus($newStatus);
  $sqlQry="UPDATE `$table` set status= '$newStatus' where `id`='$id' ";
 $execQry=mysqli_query($conn,$sqlQry);

 if($execQry){

 	echo $newStatus."###".$textStatus;
 }else{
 	echo "-1###Error";
 }
 
 ?>
