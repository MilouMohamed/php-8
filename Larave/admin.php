<?php
  



include_once "nav.php";

session_start();
if(empty($_SESSION["utilisateur"])) header("location: connextion.php");


//    session_destroy();

var_dump( $_SESSION["utilisateur"]["login_u"]);

echo "<br>";
echo "<div  class='center-elem-to'>";
echo "<h4>Admin Page</h4>";


echo "</div>";



?>