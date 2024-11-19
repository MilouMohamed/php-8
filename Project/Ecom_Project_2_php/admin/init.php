<?php


$css="./layout/css/";
$js="./layout/js/"; 
$temp="./includes/templates/";
$lng="./includes/lang/";




  

include($temp . "headerAdmin.php");
include ($lng."en.php"); 

 
require("connect.php");

if(!isset($noNavbar)) {

    include $temp."navbar.php";
}