<?php
include('../../db_class/dbconfig.php');
include('../../db_class/message.php');
include('../../db_class/hr_functions.php');

if($_REQUEST["q"])
{
$sql2="SELECT * FROM `skyparktower`  where `name` like '%".$_REQUEST["q"]."%'";
}
else
{
$sql2="SELECT * FROM `skyparktower` ORDER BY `name`";
}
$result2 = $conn->query($sql2);
while($row=$result2->fetch_array())
{
	
	$json[]=['id'=>strtok($row['id'], " "),'text'=>$row['name']];
}

echo json_encode($json);



?>