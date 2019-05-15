<?php 
ob_start();
session_start();
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');


 $fname=$_POST['fname'];
$lname=$_POST['lname'];
$company=$_POST['company'];
$streetadd=$_POST['streetadd'];
$city=$_POST['city'];
$country=$_POST['country'];
$province=$_POST['hidId'];
$postal=$_POST['postal'];
$phone=$_POST['phone'];
$userid=$_SESSION['userid'];

$pdate=date("Y-m-d");
$success='0';
mysqli_query($conn,"BEGIN");
$insertquery=mysqli_query($conn,"INSERT INTO `orders`(`userid`, `pdate`, `status`, `address`, `city`, `state`, `country`, `phone`,`postal`,`company`,`fname`,`lname`) VALUES ('$userid','$pdate','1','$streetadd','$city','$province','$country','$phone','$postal','$company','$fname','$lname')");
if($insertquery)
{
	
$success='1';

 $order_id=mysqli_insert_id($conn);
if(!count($_SESSION['cart_array']["bags"])<1){
        
         $prodArray=$_SESSION['cart_array']["bags"];
		 //print_r($prodArray);
		 $subtotal=0;
         foreach($prodArray as $product){ 
		 
		 $levelid=$product[0];
		 		 $packageid=$product[1];

$package_details=getTableDetailsById($conn,"edu_pricing",$packageid);
$package_details=getTableDetailsById($conn,"edu_pricing",$packageid);
$leveltable="edu_levels";
$level_details=getTableDetailsById($conn,$leveltable,$levelid);
 $levelname=$level_details['name'];
		 $qty=$product[2]; 
		 
		 $sub= $qty* $package_details['price'];
		 $subtotal=$subtotal+$sub;

$ins=mysqli_query($conn,"INSERT INTO `orderlist`(`orderid`, `planid`, `status`, `qty`) VALUES ('$order_id','$packageid','1','$qty')");

if($ins)
{
	
$success='1';	
	
}


		 }}
}


if($success==1)
{
	
	mysqli_query($conn,"COMMIT");
	$ordermessage= OrderMail($conn,$order_id,$baseurl); 
$user_details=getTableDetailsById($conn,"register",$userid);

$to=$user_details['email'];

$ordersubject="Order Confirmation";
sendgridmail($to,$ordermessage,$ordersubject);  
	$arr=array("status"=>"1");
	
}

else
{
		mysqli_query($conn,"REVOKE");  

$arr=array("status"=>"0"); 
	
	
}
	
	unset($_SESSION['cart_array']["bags"]);
	
header('Content-type: application/json');

		echo json_encode($arr); 
//print_r($_SESSION["cart_array"]["bags"]);


?>