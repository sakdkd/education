<?php 

ob_start();
session_start();
include_once('../db_class/dbconfig.php');
include_once('../db_class/hr_functions.php');
	$prodDescArray=array();
//$_SESSION["cart_array"]["bags"][]="12";
 
 	 	  $lid=$_POST['levelid']; 
 	 	 	  $packageid=$_POST['packageid']; 



		 $prodDescArray[]=$lid;
		  $prodDescArray[]=$packageid;
		  		  $prodDescArray[]=1;

		  
		  //echo "fff".$sessionprices=getissuepricesfromissuetable($conn,$syear,$magtype,$s_id); die;
 


if($lid!="")
{
	
	
			
if(!checkCartproductexist($conn,$lid,$packageid)){
	
			$_SESSION["cart_array"]["bags"][]=$prodDescArray;
}

else 
{
	//1 for adding cart value(addition)
				updatecart($conn,$lid,$packageid,'1')	;
	
	
}

}

 $cartcount=count($_SESSION["cart_array"]["bags"]);
	 	 	
	$arr=array("cart"=>$cartcount);
header('Content-type: application/json');

		echo json_encode($arr); 
?>