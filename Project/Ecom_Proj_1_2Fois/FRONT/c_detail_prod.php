<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style.css">
    <link rel="stylesheet" href="../css/all.min.css">

    <title>Ecom Site</title>
</head>

<body>
    <?php

    include "../includee/c_nav.php";



    require "../includee/model.php";

    $sqlState2 = database()->prepare("select * from ec_produit where id =?");
    $sqlState2->execute([$_GET["id"]]);

    $prod = $sqlState2->fetch(PDO::FETCH_OBJ);


    if (is_null($prod)) {
        ?>
        <div class="alert error">
            <h2>Pas De prod </h2>
        </div>
        <?php die();
    }
    ?>


    <div class="container">
        <div class="m-10">
            <br>


            <hr>

            <?php ?>
            <h4 class="fs-32">Prod : <?= $prod->libelle; ?></h4>

            <div class="view-prod flex-grid">

                <div class="img-div">
                    <img src="<?= "./../uploads/" . $prod->img; ?>" alt="">
                </div>

                <div class="info ">
                    <div class="titre_remis">
                        <h1><?= $prod->libelle; ?></h1>
                        <h1>-<?= $prod->discount; ?> %</h1>
                    </div>

                    <div class="dispcpt">
                        <p class=""><?= $prod->discrip_p; ?></p>
                    </div>
                    <div class="prix_reduc ">
                        <span class="soligne"><?= $prod->prix; ?></span>
                        <span><?= ($prod->prix - ($prod->prix * $prod->discount / 100)); ?></span>
                    </div>
                    <?php  include "../includee/counter.php"  ?>

                    <a class="btn btns btn-mdf d-b " href="c_add_to_panier.php">Ajouter Au Pannier</a>
                </div>

            </div>

            <?php ?>


        </div>
        <br><br><br><br>
        <i class="fa-solid fa-icons"></i>
        ------------------------------


    </div>
<script src="../script.js" ></script>
</body>

</html>