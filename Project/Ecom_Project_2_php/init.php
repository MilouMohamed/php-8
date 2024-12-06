<?php

ini_set("display_errors","on");
error_reporting(E_ALL);

$css="./admin/layout/css/";
$js="./admin/layout/js/"; 
$temp="./includes/templates/";
$func="./admin/includes/func/";
$lng="./admin/includes/lang/";


session_start(); 

$sessionUser="";
if(isset($_SESSION["client"])){
    $sessionUser =$_SESSION["client"]["userName"]; 

}
 

require("admin/connect.php");
  
include ($lng."en.php"); 
include ($func."function.php");
include($temp . "headerAdmin.php");

  