<?php
$nbrProd = 0;
 
 
 if (isset($_SESSION["utilisateur"]) &&  isset($_SESSION["Panier"] )) {
    
    $id_u = $_SESSION["utilisateur"]["id_u"];
    $nbrProd = count($_SESSION["Panier"][$id_u]);
 }
 

?>


<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../fonts/fontawesome-free-6.5.2-web(1)/fontawesome-free-6.5.2-web/css/all.min.css">

<nav class=" nav-bar">

    <span class="logo">
        Ecom 01
    </span>

    <li class="list-nav">

        <ul>
            <a href="../index.php">Admin</a>
        </ul>

        <ul>
            <a href="index.php">List Categories</a>
        </ul>
        <ul>
            <a href="panier.php" class="panier">
                <i class="fa-solid fa-cart-shopping"></i>
                (<?= $nbrProd; ?>)
            </a>
        </ul>
        <ul>
            <a href="vider_panier.php" class="panier">
                <i class="fa-solid fa-cart"></i> 
                V P
            </a>
        </ul>

    </li>

</nav>