<?php

session_start();

if (!isset($_SESSION["UserName"])) {
    header("location: index.php");
    exit;
} else {

    include "init.php";
    echo " <div class='mydiv'> Bonjour User Name=  ". $_SESSION['UserName']."; </div> ";

    include($temp . "footerAdmin.php");
}

