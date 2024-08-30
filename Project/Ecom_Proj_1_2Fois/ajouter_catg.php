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

    if (!isset($_SESSION["user"]))
        header("location:connection.php");


    if (isset($_POST["ajouter_cat"])) {
        $libel = $_POST["libel"];
        $descpt = $_POST["descpt"];
        $icon_c = $_POST["icon_c"];

        if (empty($libel) || empty($descpt) || empty($icon_c)) {
            ?>
            <div class="alert error">
                <h2>Tous les Champs sont Obligatoire </h2>
            </div>
            <?php
        } else {

            require "./includee/model.php";
            $date = date("Y-m-d H:i:s");
            $sqlState = database()->prepare("INSERT INTO `ec_categorie` VALUES (null,?,?,?,?)  ");

            $etat = $sqlState->execute([$libel, $descpt, $date, $icon_c]);


            if ($etat) {
                header("location:list_categ.php");
            } else {
                ?>
                <div class="alert error">
                    <h2>Probleme de Connection !!!</h2>
                </div>
                <?php
            }
        }
    }

    ?>
    <div class="container">
        <form method="post" class="center">

            <h1>Page Ajouter Categorie</h1>
            <div class="row">
                <label for="libel">Libelle : </label>
                <input type="text" name="libel" value="Home 5">
            </div>


            <div class="row">
                <label for="descpt">Descr : </label>
                <textarea name="descpt">Best Home 1</textarea>
            </div>

            <div class="row">
                <label for="icon_c">Icon : </label>
                <input type="text" name="icon_c" value="fa-solid fa-table" />
            </div>

            <div class="row">
                <input type="submit" name="ajouter_cat" value="Ajouter">
            </div>


        </form>

    </div>

</body>

</html>