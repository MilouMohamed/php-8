<?php

session_start();

$connecte = false;
if (isset($_SESSION["utilisateur"])) {
    $connecte = true;
}

?>


<script>

 
setTimeout(function(){

    var divToast =document.querySelector(".label-info");   

if(divToast != null){ 
      divToast.remove();
}
// console.log("IS Time");

},2000)


</script>
<link rel="stylesheet" href="css/style.css">

<nav class=" nav-bar">

    <span class="logo">
        Ecom 01
    </span>

    <li class="list-nav">
        <ul>
            <a href="index.php">Ajoter Utili</a>
        </ul>
        <?php
        if ($connecte) {
        ?>
            <ul>
                <a href="ajouter_prod.php">Ajouter Prod</a>
            </ul>
            <ul>
                <a href="ajouter_categore.php">Ajouter Catego</a>
            </ul>
            
        <ul>
            <a href="categorie.php">Lt Categores</a>
        </ul>
            <ul>
                <a href="deconexion.php">Deconecte</a>
            </ul>
        <?php
        } else {
        ?>
            <ul>
                <a href="connextion.php">Connection</a>
            </ul>
        <?php  } ?>

    </li>

</nav>