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


    if (isset($_POST["modifier_cat"])) {
        $libel = $_POST["libel"];
        $descpt = $_POST["descpt"];
        $id = $_GET["id"];
        $icon_c = $_POST["icon_c"];

        if (empty($libel) || empty($descpt)  || empty($icon_c)   ) {
            ?>
            <div class="alert error">
                <h2>Tous les Champs sont Obligatoire </h2>
            </div>
            <?php
        } else {
            $date = date("Y-m-d H:i:s");
            $sqlState = database()->prepare("update `ec_categorie` set libelle=? , description=? ,icon_c=? where id = ?  ");

            $etat = $sqlState->execute([$libel, $descpt, $icon_c, $id]);


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


    if (isset($_GET["id"])) {

        $sqlState1 = database()->prepare("SELECT * FROM `ec_categorie` WHERE id =? ");
        $sqlState1->execute([$_GET["id"]]);
        $categs = $sqlState1->fetch(PDO::FETCH_OBJ);
    }

    ?>
    <div class="container">
        <form method="post" class="center">

            <h1>Page Ajouter Categorie</h1>
            <div class="row">
                <input type="hidden" value="<?= $categs->id ?>">
            </div>

            <div class="row">
                <label for="libel">Libelle : </label>
                <input type="text" name="libel" value="<?= $categs->libelle ?>">
            </div>

            <div class="row">
                <label for="descpt">Descr : </label>
                <textarea name="descpt"> <?= $categs->description ?></textarea>
            </div>

            <div class="row">
                <label for="date">Date : </label>
                <input type="dateTime" name="date" value="<?= $categs->date_c; ?>" disabled></input>
            </div>

            <div class="row">
                <label for="icon_c">Icon : </label>
                <input type="text" name="icon_c" value="<?= $categs->icon_c; ?>"></input>
            </div>

            <div class="row">
                <input type="submit" name="modifier_cat" value="Modifier">
            </div>


        </form>

    </div>

</body>

</html>