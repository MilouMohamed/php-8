<?php


if (isset($_POST["sendNc"])) {


    $descp = $_POST["description"];
    $libl = $_POST["Libelle"];
    if (!empty($descp) || !empty($libl)) {
        echo "<hr>";
        echo $descp  . "------- " . $libl;
        include_once("databaseEcom.php");
        $date = date("Y-m-d H:m:s");
        var_dump($date);
        $sql = $pdo->prepare("INSERT INTO `ec_catg`( `libelle`, `descrip`, `date_crate_c`) VALUES ( ?,?,? )");
        $sql->execute([$libl, $descp, $date]);

?>
        <div class="label-info label-info-bon ">
            Bien Ajouter <?php echo $libl  ?> Dans Les Categores
        </div>
<?php
    }
    else   {

?>
<div class="label-info  ">
    Libelle Et Description Son Obligatoir;
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
    <title>Ajouter Categore</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once("nav.php")   ?>

    <div class="container-global cont-categ">
        <h2>Ajoutre Categore</h2>
        
        <form action="" method="post" class="form-categ">
            <div class="libell">
                <label for="Libelle">Libelle : </label>
                <input type="text" name="Libelle" id="">
            </div>

            <div class="libell">
                <label for="description">Description : </label>
                <textarea name="description"></textarea>
            </div>
            <button type="submit" name="sendNc">Ajouter Categore</button>

        </form>



    </div>
</body>

</html>