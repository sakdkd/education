<?php
ob_start();
session_start();
		$packid=$_POST['packid'];
				$order_id=$_POST['oid'];

		 
 $_SESSION['orderid']=$order_id; 


 $_SESSION['packid']=$packid;

			$arr = array('status' =>1);	

	header('Content-type: application/json');

		echo json_encode($arr); 
