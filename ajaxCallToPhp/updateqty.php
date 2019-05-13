<?php 
ob_start();
session_start();
include_once('../db_class/dbconfig.php');
include_once('../db_class/hr_functions.php');
	$prodDescArray=array();
//print_r($_SESSION["cart_array"]["bags"]);
 
 	 	  $lid=$_POST['levelid']; 
 	 	 	  $packageid=$_POST['packageid']; 
			  $cartvalue=$_POST['cartvalue'];
$type=$_POST['type'];




$package_details=getTableDetailsById($conn,"edu_pricing",$packageid);



$package_price=$package_details['price']*$cartvalue;
updatecart($conn,$lid,$packageid,$type);

//print_r($_SESSION["cart_array"]["bags"]);
 if(!count($_SESSION['cart_array']["bags"])<1){
        
         $prodArray=$_SESSION['cart_array']["bags"];
		 //print_r($prodArray);
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
		 }}


$arr=array("status"=>"1","price"=>$package_price,"subtotal"=>$subtotal);   
header('Content-type: application/json');

		echo json_encode($arr); 


?>