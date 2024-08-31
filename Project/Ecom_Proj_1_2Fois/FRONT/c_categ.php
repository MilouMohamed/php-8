<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./../css/all.min.css">

    <title>Ecom Site</title>
</head>

<body>
    <?php

    include "../includee/c_nav.php";



    require "../includee/model.php";

    $sqlState2 = database()->prepare("select * from ec_produit where id_categorie =?   order by id desc ");
    $sqlState2->execute([$_GET["id"]]);

    $produits = $sqlState2->fetchAll(PDO::FETCH_OBJ);


    if (count($produits) == 0) {
        ?>
        <div class="alert error">
            <h2>Pas De Produits Pour Categorie <?= $_GET["libelle"] ?> </h2>
        </div>
        <?php die();
    }
    ?>
    <div class="container">
        <div class="m-10"> 
            <h1>Liste Des Produits Pous Categorie <?= $_GET["libelle"].'<i class='.$_GET["icon"].' ></i> '; ?></h1>
            <br> 


            <hr>
            <div class="flex-grid">

                 <?php
 
               
                foreach ($produits as $prod):
                       ?>
                    <div class="card-prod  hvr-w-r">
<a href="c_detail_Prod.php?id=<?=  $prod->id ?>" class="m-0 p-0">
                        <div class="img-div">
                            <img src="../uploads/<?= file_exists("../uploads/$prod->img")? $prod->img :"no_Img.jpg" ; ?>" alt="Image Produit"    >
                        </div>

                        <div class="info">
                            <h2><?= $prod->libelle; ?></h2>
                            <span> <?= $prod->prix; ?>:MAD </span>
                        </div>

                        <div class="date">
                            <span>Ajouter Le : <?= $prod->date_c; ?> </span>
                        </div>
                        </a>
                    </div>

                    <?php
                endforeach;
                ?>


            </div>
            <br><br><br><br>
        <i class="fa-solid fa-icons"></i>
------------------------------
        </div>

    </div>

</body>

</html>