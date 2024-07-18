<?php
session_start();

if(!isset($_SESSION["utilisateur"])){ 
    header("location:../connextion.php");   
 }

 $id_u=$_SESSION["utilisateur"]["id_u"];

if(isset($_POST["deleteProd"])) {

    var_dump($_POST["id_p"]);
    $id_p=$_POST["id_p"] ; 

    // $_SESSION["Panier"][$id_u][$id_p]=[]; Ou unset
    unset($_SESSION["Panier"][$id_u][$id_p]);

    header("location:".$_SERVER['HTTP_REFERER']);
    }
    
     



?>