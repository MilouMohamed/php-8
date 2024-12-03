<?php
ob_start();

session_start();

if (!isset($_SESSION["UserName"])) {
    header("location: index.php");
    exit;
} else {

    $titlePage = "Categories";
    include "init.php";

    $action = isset($_GET["do"]) ? $_GET["do"] : "Manage";



    echo '<div class="container">';
    if ($action == "Manage") {
        echo "is Page Categories  name = ".$_SESSION["UserName"]."<br>";

    } elseif ($action == "Insert") {
        echo "Page Insert<br>"; 

    } elseif ($action == "Add") { 
        echo "Add ";

    } elseif ($action == "Edit") { 
        echo "Edit ";

    } elseif ($action == "Update") { 
        echo "Update ";
 
    } elseif ($action == "Delete") {
        echo "Delete ";

    } elseif ($action == "Active") {
        echo "Active ";
    } else {


        echo " <br><br>";
        redirectToHome(" Probleme Dans L URL !!!", 3,"alert-danger","categories.php");


    }



    echo "</div>";//container

    include($temp . "footerAdmin.php");
}
ob_end_flush();

