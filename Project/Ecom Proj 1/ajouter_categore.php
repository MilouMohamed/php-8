<?php


if (isset($_POST["sendNc"])) {


    $descp = $_POST["description"];
    $libl = $_POST["Libelle"];
    $econ_c = $_POST["econ_c"];
    if (!empty($descp) || !empty($libl) || !empty($econ_c)) { 
        include_once("databaseEcom.php");
        $date = date("Y-m-d H:m:s"); 

        $sql = $pdo->prepare("INSERT INTO `ec_catg`( `libelle`, `descrip`,`econ_c`, `date_crate_c`) VALUES ( ?,?,?,? )");
        $sql->execute([$libl, $descp,$econ_c, $date]);

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
            
            <div class="libell">
                <label for="econ_c">Icon : </label>
                <input type="text" name="econ_c"  value="fa-solid fa-snowflake">

            </div>
            <button type="submit" name="sendNc">Ajouter Categore</button>

        </form>



    </div>
</body>

</html>