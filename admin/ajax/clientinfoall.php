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
	$clientpan=trim($_POST["clientpan"]);
	$chequeno=trim($_POST["chequeno"]);
	$chequeamt=trim($_POST["chequeamt"]);
	$chequedate=trim($_POST["chequedate"]);
	$bankname=trim($_POST["bankname"]);
	$Sdkeyid=trim($_POST["Sdkeyid"]);
	$Sdkeystatus=trim($_POST["Sdkeystatus"]);

	$sql="UPDATE `non_invskypark_new` SET `invstatus`=".$Sdkeystatus." ,`operatedby`='$operateby',`operatedon`='$operateon',`operatedat`='$operateat',`clientname`='$clientname',`clientpan`='$clientpan',`chequeno`='$chequeno',`chequeamt`='$chequeamt',`chequedate`='$chequedate',`bankname`='$bankname',`holdstatus`=0,`soldstatus`=0  WHERE `id` =".$Sdkeyid." AND `soldstatus`=1";
	$result=$conn->query($sql);
	if(mysqli_affected_rows($conn)>0)
	{
		updateSkyParkInvStageall($conn,$Sdkeyid,3,$operateby,$clientname,$clientpan,$chequeno,$chequeamt,$chequedate,$bankname);
		if($operateby==2){
			$msg1="Inventory ".getSkyParkUnitAddressById($conn,$Sdkeyid)."has been sold by SKYPARK ";
		    postdata("8860813845",$msg1);
		    echo '<script>alert("Successfully You have Sold Inventory");location.reload();</script>';	
		}
		
	}
	else 
	{
		echo '<script>alert("please Click after page refresh");location.reload();</script>';
	}
}

?>