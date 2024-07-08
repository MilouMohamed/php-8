<?php
require_once "../databaseEcom.php";


if (isset($_GET["id"])) {

    $id = $_GET["id"];


    $sql = $pdo->prepare("SELECT * from ec_prod where  id_cg= ? ");

    $sql->execute([$id]);

    $tab_prod = $sql->fetchAll(PDO::FETCH_ASSOC);

   
// echo "<pre>";
//      var_dump($tab_prod);
// echo "</pre>";

}
/////// Categore Bay ID //////////////////////////////////////////
$sql =$pdo->prepare("SELECT * FROM `ec_catg` WHERE  `id_cg` = ?;");
 
$sql->execute([$id]) ;
$tab_categ_one=$sql->fetch(PDO::FETCH_OBJ);


// echo "<pre>";
//      var_dump($tab_categ_one);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorie | <?= $tab_categ_one->libelle   ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once("nav_cline.php");   ?>
    <div class="list-cat-prod">

        <div class="container-global catgr">
            <h2>Info De Categorie :
            <!-- <i class="fa-solid fa-rectangle-list fa-1x"></i> -->
            <i class="<?php echo  $tab_categ_one->econ_c ; ?> "></i>

                        <?php echo strtoupper($tab_categ_one->libelle);
                        echo "  ||  Count = " . count($tab_prod);  ?>
            </h2>
            <hr />
           
            
    <?php  
    if (count($tab_prod) == 0) {
           
        ?>
        <div class="label-info  ">
            Pas De Produit Pour <s><?= $tab_categ_one->libelle  ?><s>  !!!
        </div>
    <?php  
    }
        ?>
            <div class="porteur">

                <?php
                foreach ($tab_prod as $prod) {
                ?>
                    <div class=' liste-cat card-prod'>
                        <div class="img-div">
                            <img src="../<?= ($prod["image_p"] ? $prod["image_p"]   : "Upload/no-Image.JPG" );  ?>" >
                        </div>
                        <div class="infor-div">
                            <h2>Libelle : <i class="<?php echo  $prod['econ_c'] ; ?> "></i> <?php echo   " ". $prod["libelle"] ?></h2> 
                            <div>Prix : <?= $prod["prix"] ?> : MAD</div>
                            <span><?= date_format(date_create($prod["date_crate_p"]), "Y-m-d")  ?> Ago</span>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>

        </div>

    </div>

</body>

</html>