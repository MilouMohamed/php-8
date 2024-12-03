<?php
// Project Start le  14-11-2024 
 
include "init.php";



 echo "is Client";

 $allUsers = getAlllItemsWhere("users", "UserID", "12", "=", "")[0];
 
  
 
 echo  $allUsers->UserName ."<br>";
 echo  $allUsers->UserName ."<br>";
 echo  $allUsers->UserName ."<br>";
 echo  $allUsers->UserName ."<br>";
?>
 


<?php include($temp . "footerAdmin.php"); ?>