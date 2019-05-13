<?php
ob_start();
session_start();
include('../db_class/dbconfig.php');
include('../db_class/message.php');
include('../db_class/hr_functions.php');
$buid=$_SESSION['buid'];
$projtype=$_SESSION['ptype'];


$subcatArr=getNonExcSubProjDetailsById($conn,$buid);
$pid=$subcatArr['projectid'];
$subcat=$subcatArr['slug'];
$cat=getNonExcSlugById($conn,$pid);


session_destroy();
header('location:'.$builderbaseurl.'');

?>