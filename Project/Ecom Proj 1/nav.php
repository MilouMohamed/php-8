<?php

session_start();

$connecte = false;
if (isset($_SESSION["utilisateur"])) {
    $connecte = true;
}
if (!$connecte && pathinfo(__FILE__)["basename"] != "index.php") {
    //     echo"<br> -----------------";
// print_r(pathinfo(__FILE__));
// print_r(pathinfo(__FILE__)["basename"]);
// echo"<br> -----------------";

    // echo    basename("INDEXs.PHP");
//  header("location:connextion.php");  
}

?>


<script>
    /*
    // replace dans css
    @keyframes disp { 
        100%{ 
            visibility: hidden;
        }
        
    }
    
    
        setTimeout(function() {
    
            var divToast = document.querySelector(".label-info");
    
            if (divToast != null) {
                divToast.remove();
            }
            // console.log("IS Time");
    
        }, 2000)
    */
</script>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="fonts\fontawesome-free-6.5.2-web(1)\fontawesome-free-6.5.2-web\css\all.min.css">

<nav class=" nav-bar">

    <span class="logo">
        Ecom 01
    </span>

    <li class="list-nav">
        <?php


        if (isset($_SESSION["utilisateur"])) { ?>
            <ul class="<?= basename($_SERVER["PHP_SELF"]) == 'index.php' ? 'active' : ''; ?>">
                <a href="client/index.php"><i class="fa-solid fa-user-tie"></i>Client</a>
            </ul>
            <?php
        }

        ?>
        <ul class="<?= basename($_SERVER["PHP_SELF"]) == 'index.php' ? 'active' : ''; ?>">
            <a href="index.php"><i class="fa-solid fa-user-plus"></i>Aj Util</a>
        </ul>
        <?php
        if ($connecte) {
            ?>
            <ul class="<?= basename($_SERVER["PHP_SELF"]) == 'ajouter_prod.php' ? 'active' : ''; ?>">
                <a href="ajouter_prod.php"><i class="fa-solid fa-cart-arrow-down"></i>Aj Prod</a>
            </ul>

            <ul class="<?= basename($_SERVER["PHP_SELF"]) == 'ajouter_categore.php' ? 'active' : ''; ?>">
                <a href="ajouter_categore.php"><i class="fa-solid fa-cart-flatbed"></i>Aj Catego</a>
            </ul>

            <ul class="<?= basename($_SERVER["PHP_SELF"]) == 'categorie.php' ? 'active' : ''; ?>">
                <a href="categorie.php"><i class="fa-solid fa-icons"></i>Lt Catg</a>
            </ul>

            <ul class="<?= basename($_SERVER["PHP_SELF"]) == 'produit.php' ? 'active' : ''; ?>">
                <a href="produit.php"><i class="fa-solid fa-cubes-stacked"></i>Lt Prod</a>
            </ul>

            <ul class="<?= basename($_SERVER["PHP_SELF"]) == 'commandes.php' ? 'active' : ''; ?>">

                <a href="commandes.php"><i class="fa-solid fa-barcode"></i>Cmd</a>
            </ul>

            <ul class="<?= basename($_SERVER["PHP_SELF"]) == 'deconexion.php' ? 'active' : ''; ?>">
                <a href="deconexion.php"><i class="fa-solid fa-right-from-bracket"></i>Dec </a>
            </ul>

            <?php
        } else {
            ?>
            <ul>
                <a href="connextion.php"><i class="fa-solid fa-right-to-bracket"></i>Cnx</a>
            </ul>
        <?php } ?>

    </li>

</nav>