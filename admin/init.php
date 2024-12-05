<?php


$css="./layout/css/";
$js="./layout/js/"; 
$temp="./includes/templates/";
$func="./includes/func/";
$lng="./includes/lang/";




require("connect.php");
  
include ($lng."en.php"); 
include ($func."function.php");
include($temp . "headerAdmin.php");

 

if(!isset($noNavbar)) {

    include $temp."navbar.php";
}