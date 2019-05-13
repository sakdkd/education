<?php
ob_start();
session_start();
		$stime=$_POST['stime']; 


$_SESSION['stime']=$stime;
			$arr = array('status' =>1);	

	header('Content-type: application/json');

		echo json_encode($arr); 
