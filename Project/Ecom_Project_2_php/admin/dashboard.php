<?php

session_start();

if (!isset($_SESSION["UserName"])) {
    header("location: index.php");
    exit;
} else {
    
    $titlePage="Dashboard";
    include "init.php";
    echo " <div class='mydiv alert  alert-ripary'> Bonjour User Name=  ". $_SESSION['UserName']."; </div> ";
    echo " <div class='mydiv alert alert-danger'> Bonjour User Id=  ". $_SESSION['Id']."; </div> ";

    include($temp . "footerAdmin.php");
}

