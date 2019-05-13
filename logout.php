<?php
include_once('db_class/dbconfig.php');
include_once('db_class/hr_functions.php');
ob_start();
session_start();
session_destroy();

header("location:$baseurl");


?>