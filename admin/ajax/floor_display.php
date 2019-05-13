<?php
include('../../db_class/dbconfig.php');
include('../../db_class/message.php');
include('../../db_class/hr_functions.php');

if($_REQUEST["q"])
{
$sql2="SELECT `floor` FROM `non_invskypark_new`  where `floor` like '%".$_REQUEST["q"]."%'";
}
else
{
$sql2="SELECT DISTINCT `floor` FROM `non_invskypark_new`";
}
$result2 = $conn->query($sql2);
while($row=$result2->fetch_array())
{
	
	$json[]=['id'=>strtok($row['floor'], " "),'text'=>$row['floor']];
}

echo json_encode($json);



?>