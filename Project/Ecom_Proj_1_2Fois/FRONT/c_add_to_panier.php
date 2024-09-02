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
            <h1>Page Pannier </h1>
              <br>


            <hr>
            <div class="flex-grid">

                <?php ?> 

                    <div class="img-div">
                       <h4>List ici </h4>
                    </div>

                    <div class="info ">
                       <h1>Les Info des pannier ICI</h1>
                        <hr/>
                        <p class="dispcpt"><?= $prod->discrip_p; ?></p>

                         
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