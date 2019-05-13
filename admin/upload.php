<?php 
ob_start();
session_start();
include('../db_class/dbconfig.php');
include('../db_class/hr_functions.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){

 $img=$_FILES['upload']['name'];
		$pdate=date("Y-m-d");
	if($img!="")
	{ 
			 $imagename=basename($_FILES['upload']['name']);
			  $imagenamesrc=$_FILES['upload']['tmp_name'];
			 $postednewsdate=base64_encode(date('Y-m-d h:i:s'));
			 $imgName=$postednewsdate."_".$imagename;
			 $imgName=$imagename;
		$moveimg=move_uploaded_file($_FILES['upload']['tmp_name'],'../allphotos/'.$imgName);    
	}
	
	else
	{
		$imgName="noimage.png";
		
	}
	
	if($moveimg)
	{
			 $insertquery=mysqli_query($conn,"insert into `questionimages` set `pdate`='$pdate',`status`='1',`imagepath`='$imgName',`view`='1'");
 		 
		$arr = array('uploaded' =>1,'url'=>$baseurl.'/allphotos/'.$imgName,'fileName'=>$imgName);
	}
	
	else{
		
				$arr = array('uploaded' =>0,'url'=>$baseurl.'/allphotos/'.$imgName,'fileName'=>$imgName);

		
		
	}

header('Content-type: application/json');   

		echo json_encode($arr); 
}
?>





