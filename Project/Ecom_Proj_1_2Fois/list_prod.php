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

    $produits = database()->query("select  p.*,c.libelle as 'lib_cat'   from  ec_produit p inner join ec_categorie c on p.`id_categorie` = c.id  order by id desc ")->fetchAll(PDO::FETCH_OBJ);

    // var_dump($produits);

    if (count($produits) == 0) {
        ?>
        <div class="alert error">
            <h2>Pas De Produits</h2>
        </div>
        <?php die();
    }	
    ?>
    <div class="container">
        <div class="center-v">

            <h1>Liste Des Produits</h1>

            <hr>
            <div class="left"> 
                <a class="  btn  left" href="./ajouter_prod.php"> Ajouter Nouvel Produit</a>
            </div>
            <hr>
            <table  >
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Libille</th>
                        <th>Prix</th>
                        <th>Discount</th>
                        <th>Categorie</th>
                        <th>Date</th>
                        <th>Image</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    
<!-- // id 	libelle 	prix 	discount 	id_categorie 	date_c 	img  -->
                    <?php  
                    foreach($produits as $prod):
                    ?>
                    <tr>
                        <td><?= $prod->id  ; ?></td>
                        <td><?= $prod->libelle  ; ?></td>
                        <td><?= $prod->prix  ; ?> MAD</td>
                        <td><?= $prod->discount  ; ?></td>
                        <td><?= $prod->lib_cat  ; ?></td>
                        <td><?= $prod->date_c  ; ?></td>
                        <td><?= $prod->img  ; ?></td>
                        <td> 
                            <a class="btn btn-mdf btn1 " href="./modifier_prod.php?id=<?= $prod->id; ?>"  >Modf</a>
                            <a class="btn  btn-dlt btn1" href="./delete_prod.php?id=<?= $prod->id ?>"  onclick="return confirm('Vous Voullez Supprimer <?= $prod->libelle ?>')" >Supp</a>
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