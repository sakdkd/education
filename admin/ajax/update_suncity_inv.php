<?php

include('../../db_class/dbconfig.php');

if(isset($_POST["keyid"]) && isset($_POST["keystatus"]))
{
$keystatus=trim($_POST["keystatus"]);
$keyid=trim($_POST["keyid"]);
echo $sql="UPDATE `non_invsuncity` SET `inventory_status`=".$keystatus." WHERE `id` =".$keyid." ";
$result=$conn->query($sql);
	if($result)
	{
		return true;
	}
}

if(isset($_POST["holdid"]) && isset($_POST["holdstatus"]))
{
$keystatus=trim($_POST["holdstatus"]);
$keyid=trim($_POST["holdid"]);
echo $sql="UPDATE `non_invsuncity` SET `inventory_status`=".$keystatus." WHERE `id` =".$keyid." ";
$result=$conn->query($sql);
	if($result)
	{
		return true;
	}
}

if(isset($_POST["soldid"]) && isset($_POST["soldstatus"]))
{
$keystatus=trim($_POST["soldstatus"]);
$keyid=trim($_POST["soldid"]);
echo $sql="UPDATE `non_invsuncity` SET `inventory_status`=".$keystatus." WHERE `id` =".$keyid." ";
$result=$conn->query($sql);
	if($result)
	{
		return true;
	}
}
?>
?>