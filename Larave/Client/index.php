<?php
require_once "../databaseEcom.php";
$donnes = $pdo->query("SELECT  * from  ec_catg ")->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Categories</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <?php include_once("nav_cline.php");  ?>
    <div class="container-global catgr">
        <h2><i class="fa-solid fa-rectangle-list fa-1x"></i>Liste Des Categories</h2>
        <hr />
        <div class=' liste-cat'>
            <h3><i class="fa-regular  fa-circle-question fa-1x"></i> Information</h3>
            <?php

            foreach ($donnes as $categ) {
            ?>
                <a href="categories.php?id=<?= $categ->id_cg  ?>">
                    <div class="btn btn-catg">
                        <span><i class="<?= $categ->econ_c ?>"></i>
                            <?= $categ->libelle ?> 
                        </span>
                    </div>
                </a>
            <?php
            }

            ?>

        </div>

    </div>
</body>

</html>