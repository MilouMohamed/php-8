<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Ecom Site</title>
</head>

<body>
    <?php

    include "./includee/nav.php";

    require "./includee/model.php";

    if (!isset($_SESSION["user"]))
        header("location:connection.php");

    if (isset($_POST["ajou_prod"])) {
        $libelle = $_POST["libelle"];
        $prix = $_POST["prix"];
        $discount = $_POST["discount"];
        $id_categorie = $_POST["id_categorie"];

        var_dump($_FILES["image_p"]);



        $image_name = "no_Img.JPG";
        if ($_FILES["image_p"]["error"] == 0) {
            $image_name = $_FILES["image_p"]["name"];
        }
        $image_to = "uploads/$image_name";

        $image_from = $_FILES["image_p"]["tmp_name"];



        if (empty($libelle) || empty($prix) || empty($id_categorie) || empty($discount)) {
            ?>
            <div class="alert error">
                <h2>Tous les Champs sont Obligatoire </h2>
            </div>
            <?php
        } else {

            // $date = date_format(date_create("now"), "Y-m-d H:i:s");
            $date = date("Y-m-d H:i:s");
            $sqlState = database()->prepare("INSERT INTO `ec_produit`(  `libelle`, `prix`, `discount`, `id_categorie`,date_c,img  ) VALUES ( ?,?,?,?,?,?)");

            $sqlState->execute([$libelle, $prix, $discount, $id_categorie,  $date,$image_name]);
            
            move_uploaded_file($image_from, $image_to); 

            header("location:list_prod.php");
        }
    }
    ?>

    <div class="container">
        <form method="post" class="center" enctype="multipart/form-data">

            <h1>Page Ajouter Produits</h1>

            <div class="row">
                <label for="libelle">Libelle : </label>
                <input type="text" name="libelle" value="Non Prod 1">
            </div>


            <div class="row">
                <label for="prix">Prix : </label>
                <input type="number" name="prix" value="10" step=".5">
            </div>

            <div class="row">
                <label for="image_p">Image : </label>
                <input type="file" name="image_p">
            </div>


            <div class="row">
                <label for="discount">Discount : </label>
                <input type="range" name="discount" value="55">
            </div>


            <div class="row">
                <label for="id_categorie">Catego : </label>
                <select name="id_categorie">
                    <?php
                    $categs = database()->query("SELECT * FROM `ec_categorie`")->fetchAll(PDO::FETCH_OBJ);
                    foreach ($categs as $ctg) {
                        echo " <option value='" . $ctg->id . "'>" . $ctg->libelle . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="row">
                <input type="submit" name="ajou_prod" value="Ajuoter Produit">
            </div>


        </form>

    </div>

    <script src="./script.js"></script>
</body>

</html>