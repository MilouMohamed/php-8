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


    require "./includee/model.php";

    $categors = database()->query("select  * from `ec_categorie`  order by id desc ")->fetchAll(PDO::FETCH_OBJ);

    // var_dump($categors);

    if (count($categors) == 0) {
    ?>
        <div class="alert error">
            <h2>Pas De Categories</h2>
        </div>
    <?php die();
    }

    ?>
    <div class="container">
        <div class="center-v">

            <h1>Liste Des Categories</h1>
            <hr>
            <div class="left"> 
                <a class="  btn  left" href="./ajouter_catg.php"> Ajouter Cathegorie</a>
            </div>
            <hr>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Libille</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($categors as $catgr):
                    ?>
                        <tr>
                            <td><?= $catgr->id; ?></td>
                            <td><?= $catgr->libelle; ?></td>
                            <td><?= $catgr->description; ?></td>
                            <td><?= $catgr->date_c; ?></td>
                            <td> 
                            <a class="btn btn-mdf btn1 " href="./modifer_categ.php?id=<?= $catgr->id; ?>">Modf</a>
                            <a class="btn  btn-dlt btn1  " href="./delete_catg.php?id=<?= $catgr->id; ?>">Supp</a>
                            
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>


        </div>

    </div>

</body>

</html>