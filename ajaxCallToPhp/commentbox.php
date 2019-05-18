<?php
ob_start();
session_start();
include_once('../db_class/dbconfig.php');
include_once('../db_class/hr_functions.php');


$question_id=$_GET['question_id'];

		$givenquesdetails=getTableDetailsById($conn,"questions",$question_id);


$solution=$givenquesdetails['solution'];


?>

<div class="sol-Box">
           	<h4>Solution</h4>
           	<span><p class="scope"><?php  echo stripslashes($solution);?></p></span>
           </div>
           
           
           
           
      