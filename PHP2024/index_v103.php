<?php
 
  
session_start();  

//  isset($_SESSION["views"]) ? $_SESSION["views"]++ :$_SESSION["views"]=1 ;
echo "<div style='border:2px solid black; padding:10px ; text-align:center'>";
echo "From Index V 103 . php<br>";
echo "Your Name is ".$_SESSION["name"]." Views Count Is ".$_SESSION["views"]."<br>";
echo "</div>";

