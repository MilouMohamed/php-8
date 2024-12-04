<?php
// Project Start le  14-11-2024 
 

$titlePage = "Profile ";

include "init.php"; 

// $_SESSION["client"] = ["userName" => $userName, "noId" => 10000];

if(empty($_SESSION["client"])){
     header("location:login.php");
   exit; 
}


 echo  "<br>Page Profile <br>";
 echo "Welcome ". $_SESSION["client"] ["userName"];
?>
 


<?php include($temp . "footerAdmin.php"); ?>