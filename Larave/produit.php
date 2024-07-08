<?php
require_once "databaseEcom.php";

$donnes = $pdo->query("SELECT  p.*, c.libelle as lb_cat FROM `ec_prod` p left JOIN ec_catg c on  p.id_cg=c.id_cg ")->fetchAll(PDO::FETCH_OBJ);
  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Produits</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once("nav.php")   ?>

    <div class="container-global">
        <h2>Ecom Projecy</h2>

        <div class='center-table'>
            <h4>Liste Des Produits</h4>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Libelle</th>
                        <th>Prix</th>
                        <th>Icon</th>
                        <th>Image</th>
                        <th>Discount</th>
                        <th>Libelle Cat</th>
                        <th>Date Creation</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($donnes as   $value) {
                    ?>
                        <!-- (`id_p`, `libelle`, `prix`, `discont`, `id_cg`, `date_crate_p`) -->
                        <tr>
                            <td><?= $value->id_p; ?></td>
                            <td><?= strtoupper($value->libelle); ?></td>
                            <td><?php echo  $value->prix . " mad"; ?></td>
                            <td>
                                <i class="<?php echo  $value->econ_c . " %"; ?>"></i>    
                            </td> 
                            <td><img src="<?php echo ( $value->image_p ?  $value->image_p : "upload/no-Image.JPG"   )   ; ?>" alt="Image Prod" height="80px" ></td>
                            <td><?php echo  $value->discont   ; ?></td>
                            <td><?= strtoupper($value->lb_cat); ?></td>
                            <td><?= $value->date_crate_p; ?></td>
                            <td>
                                <a href="modif_produit.php?id=<?= $value->id_p; ?>" name="modifier" class="btn btn-edit">Modifier</a>
                                <a href="supp_produit.php?id=<?= $value->id_p; ?>" onclick="return confirm('Vous Voullez  supprimer Le Prodiot <?=$value->libelle ?> ???')" name="supprimer" class="btn btn-detele">Supprimer</a>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>

        </div>

    </div>
</body>

</html>