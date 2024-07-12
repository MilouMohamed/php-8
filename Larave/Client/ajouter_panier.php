<?php

session_start();

if (!isset($_SESSION["utilisateur"])) {
    header("location:../connextion.php");
}


$id_p = $_POST["id_p"];
$qtt =(int)( $_POST["qtt"]);
$id_u = $_SESSION["utilisateur"]["id_u"];

if ( !empty($id_p)  ) { 

    if (!isset($_SESSION["Panier"][$id_u])) {
        $_SESSION["Panier"][$id_u]  = [];
    }  
    if($qtt== 0)  
       unset($_SESSION["Panier"][$id_u][$id_p]); 
    else
        $_SESSION["Panier"][$id_u][$id_p] = $qtt; 
        
        // header("location: detail_Produit.php?id=$id_p");
        // header("location:".$_SERVER['REQUEST_URI']);
        header("location:".$_SERVER['HTTP_REFERER']); // return meme rerfreche
         
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
