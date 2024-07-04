<?php
require_once "databaseEcom.php";

$donnes = $pdo->query("SELECT * FROM `ec_catg`")->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecom Med PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once("nav.php")   ?>

    <div class="container-global">
        <h2>Ecom Projecy</h2>

        <div class='center-table'>
            <h4>Liste Des Categories</h4>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Libelle</th>
                        <th>Description</th>
                        <th>Date Creation</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($donnes as   $value) {
                    ?>
                        <tr>
                            <td><?php echo  $value["id_cg"]; ?></td>
                            <td><?php echo  $value["libelle"]; ?></td>
                            <td><?php echo  $value["descrip"]; ?></td>
                            <td><?php echo  $value["date_crate_c"]; ?></td>
                            <td>
                            <button type="button" name="modifier" class="btn btn-edit">Modifier</button>
                            <button type="button" name="supprimer" class="btn btn-detele">Supprimer</button>
                        </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>

        </div>

    </div>
</body>

</html>