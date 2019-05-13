<?php 
ob_start();
session_start();


$key='20';
$value='1';

$collection[$key]=$value;

$_SESSION['cart'][] = $collection;


       

print_r($cart);


?>