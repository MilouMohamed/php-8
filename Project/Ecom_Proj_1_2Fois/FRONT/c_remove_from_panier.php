<?php 
 session_start();

    if (!isset($_SESSION["user"]))
        header("location:../connection.php");

// var_dump($_POST);
 
if( isset( $_POST["id"]) &&  isset( $_POST["val"])  ){
    $id_user = $_SESSION["user"]->id;
 
    if (isset($_SESSION["panier"][$id_user][$_POST["id"]])) {
        $_SESSION["panier"][$id_user][$_POST["id"]]["qtt"]=0;
    } 

     
} 
header("location:".$_SERVER['HTTP_REFERER']);



/*
    echo "<pre>";
    // print_r($_SESSION["user"]);
    echo "<br>** SESSION[panier] **<br>";
    print_r($_SESSION["panier"]); 
     
    echo "</pre>";
*/ 