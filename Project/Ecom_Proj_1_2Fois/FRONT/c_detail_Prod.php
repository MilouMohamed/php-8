<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
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
            <h1>Prod : <?= $prod->libelle; ?></h1>
            <br>


            <hr>
            <div class="flex-grid">

                <?php ?>
                <div class="view-prod  hvr-b-r">

                    <div class="img-div">
                        <img src="../uploads/<?= file_exists("../uploads/$prod->img") ? $prod->img : "no_Img.jpg"; ?>"
                            alt="Image Produit">
                    </div>

                    <div class="info">
                        <h2><?= $prod->libelle; ?></h2>
                        <span> <?= $prod->prix; ?>:MAD </span>
                    </div>

                    <div class="date">
                        <span>Ajouter Le : <?= $prod->date_c; ?> </span>
                    </div>

                </div>

                <?php ?>


            </div>
            <br><br><br><br>
            <i class="fa-solid fa-icons"></i>
            ------------------------------
        </div>

    </div>

</body>

</html>