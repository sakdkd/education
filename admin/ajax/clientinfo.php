<?php
include('../../db_class/dbconfig.php');
include('../../db_class/message.php');
include('../../db_class/hr_functions.php');

if($_POST)
{
	$operateon=date("Y-m-d");
	$operateat=date("h:i a");
	$operateby=2;
	$clientname=trim($_POST["clientname"]);
	$Hdkeyid=trim($_POST["Hdkeyid"]);
	$Hdkeystatus=trim($_POST["Hdkeystatus"]);

	$sql="UPDATE `non_invskypark_new` SET `invstatus`=".$Hdkeystatus." ,`operatedby`='$operateby',`operatedon`='$operateon',`operatedat`='$operateat',`clientname`='$clientname',`clientpan`='',`chequeno`='',`chequeamt`='',`chequedate`='',`bankname`='',`holdstatus`=0 WHERE `id` =".$Hdkeyid." AND `holdstatus`=1";
	$result=$conn->query($sql);
	if(mysqli_affected_rows($conn)>0)
	{
		updateSkyParkInvStage($conn,$Hdkeyid,2,$operateby,$clientname);
		if($operateby==2){
			$msg1="Inventory ".getSkyParkUnitAddressById($conn,$Hdkeyid)."has been held by SKYPARK";
		    postdata("8860813845",$msg1);
		    echo '<script>alert("Successfully You have Hold Inventory");location.reload();</script>';
		}
		
		
	}
	else 
	{
		echo '<script>alert("please Click after page refresh");location.reload();</script>';
	}
}
?>