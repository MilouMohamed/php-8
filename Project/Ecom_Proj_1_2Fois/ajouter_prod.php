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

        if (empty($libelle) || empty($prix) || empty($id_categorie) || empty($discount)) {
    ?>
            <div class="alert error">
                <h2>Tous les Champs sont Obligatoire </h2>
            </div>
    <?php
        } else {

            // $date = date_format(date_create("now"), "Y-m-d H:i:s");
            // $date = date("Y-m-d H:i:s");

            $sqlState = database()->prepare("INSERT INTO `ec_produit`(  `libelle`, `prix`, `discount`, `id_categorie`  ) VALUES ( ?,?,?,?)");

            $sqlState->execute([$libelle, $prix, $discount, $id_categorie]);
            header("location:list_prod.php");
        }
    }
    ?>

    <div class="container">
        <form method="post" class="center">

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