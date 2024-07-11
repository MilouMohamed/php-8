<?php

session_start();

if (!isset($_SESSION["utilisateur"])) {
    header("location:../connextion.php");
}


$id_p = $_POST["id_p"];
$qtt = $_POST["qtt"];
$id_u = $_SESSION["utilisateur"]["id_u"];

if ( !empty($id_p) && !empty($qtt)) { 
    if (!isset($_SESSION["Panier"][$id_u])) {
        $_SESSION["Panier"][$id_u]  = [];
    }  
        $_SESSION["Panier"][$id_u][ $id_p] = $qtt; 
        
        header("location: detail_Produit.php?id=$id_p");
         
}else {
    echo "<h1>Probleme Dans id De produit</h1>";
}

/*
echo "Bonjour " . $_SESSION["utilisateur"]["login_u"] . "<br>";

echo "<pre>";
var_dump( $_SESSION["Panier"]);
echo "<pre>"; 

/***  
session_destroy();
session_unset();
/*** */
