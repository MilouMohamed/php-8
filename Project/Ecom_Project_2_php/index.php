<?php
// Project Start le  14-11-2024 
 

$titlePage = "Home";

include "init.php"; 

// $_SESSION["client"] = ["userName" => $userName, "noId" => 10000];

if(empty($sessionUser)){
     header("location:login.php");
   exit; 
}


 echo "is Client";

 $allUsers = getAlllItemsWhere("users", "UserID", "12", "=", "")[0];
 
  
 
 echo  $allUsers->UserName ."<br>";
 echo  $allUsers->UserName ."<br>";
 echo  $allUsers->UserName ."<br>";
 echo  $allUsers->UserName ."<br>";
?>
 


<?php include($temp . "footerAdmin.php"); ?>