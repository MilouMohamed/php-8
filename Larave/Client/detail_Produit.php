<?php
require_once "../databaseEcom.php";


if (isset($_GET["id"])) {

    $id = $_GET["id"];


    $sql = $pdo->prepare("SELECT * from ec_prod where  id_p= ? ");

    $sql->execute([$id]);

    $tab_prod_One = $sql->fetch(PDO::FETCH_ASSOC);


    // echo "<pre>";
    //      var_dump($tab_prod_One);
    // echo "</pre>";

}


// echo "<pre>";
//      var_dump($tab_categ_one);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit | <?= $tab_prod_One["libelle"]   ?></title>
    <link rel="stylesheet" href="css/style.css">
     <script src="../JS/script.js"></script>
</head>

<body>
    <?php include_once("nav_cline.php");   ?>
    <?php
    if (empty($tab_prod_One)) {

    ?>
        <h2 class="badge_ warning ">
            Pas De Produit Pour Id = <s><?= $id ?><s> !!!
        </h2>
        <div class="label-info  ">
            Pas De Produit Pour Id = <s><?= $id ?><s> !!!
        </div>
    <?php
    }
    $dsc = empty($tab_prod_One["discont"]) ? 0 : $tab_prod_One["discont"];
    $prx = $tab_prod_One["prix"];
    $id_p=$tab_prod_One['id_p'] ;
    ?>

    <div class="catd-prod">


        <div class="container-global catgr">
            <h2>Info De Produit : <?php echo strtoupper($tab_prod_One["libelle"]);   ?>
            </h2>
            <hr />



            <div class="porteur">

                <div class='liste-cat card-prod'>
                    <div class="img-div">
                        <img src="../<?= ($tab_prod_One["image_p"] ? $tab_prod_One["image_p"]   : "Upload/no-Image.JPG");  ?>">
                    </div>

                    <div class="infor-div">

                        <h2>Libelle : <i class="<?php echo  $tab_prod_One['econ_c']; ?> "></i> <?php echo   " " . $tab_prod_One["libelle"] ?></h2>
                        <hr>
                        <div class=" badge_">Prix : <?php if ($dsc > 0) echo "<s>" . $prx . "</s> MAD ||| " . ($prx - ($dsc * $prx / 100)) . " MAD ";
                                                    else echo  $prx . "  MAD "  ?>
                        </div>



                        <div class=" badge_"> <?php echo  $dsc  ?>% </div>
                        <hr>
                        <span class=" badge_ date"><?= date_format(date_create($tab_prod_One["date_crate_p"]), "Y-m-d")  ?> Ago</span>
                    </div>

                    <div class="center-elm">
                    <?php 
                    session_start();
                    require("counter.php"); ?>
                    </div>
                 
                </div>


            </div>

        </div>

    </div>
</body>

</html>