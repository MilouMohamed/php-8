<?php

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    echo "<br>" . $_GET["id"];
    include_once("databaseEcom.php");

    $sql = $pdo->prepare("SELECT * FROM `ec_prod` WHERE id_p= ? ");
    $sql->execute([$id]);
    $tab_prod = $sql->fetch(PDO::FETCH_ASSOC);
 



    $sql2 = $pdo->prepare("SELECT * FROM `ec_catg`");
    $sql2->execute();
    $tab_cat = $sql2->fetchAll(PDO::FETCH_ASSOC);
} else {
    
?>
<div class="label-info    ">
    Probleme dans la base  de donnees !!!
</div>
<?php
}


// var_dump($sqlState->errorInfo()); ne marche pas ici


// Button Modifier

if (isset($_POST["modifier"])) {

    $lib = $_POST["Libelle"];
    $prix = $_POST["prix"];
    $discont = $_POST["discont"];
    $catg = $_POST["id_categor"];
    $_POST[]=[];

    if (!empty($lib) && !empty($prix) && !empty($discont) && !empty($catg)) {

        $sql3 =   $pdo->prepare("UPDATE ec_prod set `libelle`=?, `prix`=?,`discont`=?, `id_cg`=? WHERE id_p =?;");
        $sql3->execute([$lib, $prix, $discont, $catg, $id]);

        header("location:produit.php");
?>
        <div class="label-info  label-info-bon  ">
            Modification Est fais Avce Succes de Produit <?= $lib  ?>
        </div>
    <?php

    } else {
    ?>
        <div class="label-info ">
            Probleme !!! (456000)
        </div>
<?php
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifeir Un Produite</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once("nav.php")   ?>

    <div class="container-global cont-categ">
        <h2>Modifier Un Produit</h2>

        <form action="" method="post" class="form-prod">
            <!--id_p  libelle 	prix 	discont 	id_cg 	  -->

            <div class="libell">
                <label for="Libelle">Libelle : </label>
                <input type="text" name="Libelle" value="<?= $tab_prod["libelle"] ?>">
            </div>

            <div class="libell">
                <label for="prix">Prix : </label>
                <input type="number" name="prix" min="1" step="0.5" value="<?= $tab_prod["prix"] ?>">
            </div>

            <div class="libell" id="myRangLab">
                <label for="discont">Discont : </label>
                <input type="range" name="discont" min="0" max="90" value="<?= $tab_prod["discont"] ?>">
            </div>

            <div class="libell">
                <label for="id_categor">Choisissez Une : </label>
                <select name="id_categor">
                    <option value="">Choisissez Une Categorie</option> 
                    <?php
                    //SELECT * FROM `ec_catg`  `id_cg`,`libelle`

                    foreach ($tab_cat  as   $value) {
                   $seleced = ( $tab_prod["id_cg"]== $value["id_cg"]) ? "selected" : "";

                        echo "<option value=' " . $value["id_cg"] . "'  $seleced> " . $value["libelle"] . "</option>";
                    }
                    ?>
                </select>
            </div>
   
            <button type="submit" name="modifier">Modifier Ce Produit</button>

        </form>

    </div>


    <script>
        var progres = document.getElementsByName("discont")[0];
        var label1 = document.querySelector("#myRangLab label");
        window.onload = function() {
            label1.innerHTML = "Discont :  " + <?= $tab_prod["discont"] ?> + " %";
        }

        progres.onchange = () => {
            var val = progres.value;
            label1.innerHTML = "Discont :  " + val + " %";

        }
    </script>

    <style>
        #myRangLab label {
            position: relative;
        }

        #myRangLab label::after {
            position: absolute;
            /* content: "***"; */
            width: 20px;
            height: 20px;
            border-radius: 40%;
            background-color: #ac9e9e;
            top: -12px;
            left: 120px;
        }
    </style>
</body>

</html>