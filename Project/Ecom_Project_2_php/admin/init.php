<?php


$css="./layout/css/";
$js="./layout/js/"; 
$temp="./includes/templates/";
$func="./includes/func/";
$lng="./includes/lang/";




  
include ($lng."en.php"); 
include ($func."function.php");
include($temp . "headerAdmin.php");

 
require("connect.php");

if(!isset($noNavbar)) {

    include $temp."navbar.php";
}