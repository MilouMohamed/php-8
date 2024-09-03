<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./../css/all.min.css">

    <title>Ecom Site</title>
</head>

<body>
    <?php

    include "../includee/c_nav.php";



    require "../includee/model.php";

    if (is_null($_SESSION["user"]) or empty($_SESSION["user"])) {
        header("location:../connection.php");
    }


    $id_user = $_SESSION["user"]->id;


    if (isset($_SESSION["panier"]) && isset($_SESSION["panier"][$id_user])) {

        // var_dump($_SESSION["panier"][$id_user]);


    } else {
        ?>
        <div class="alert error">
            <h2>Pas De Produits Pour Client <?= $_SESSION["user"]->login ?> </h2>
        </div>
        <?php die();
    }

    $lst = array_column($_SESSION["panier"][$id_user], "id_p");
    if(count($lst) > 0)
    {

    $id_P_s = implode(",", $lst);

    $produits = database()->query("select * from ec_produit where id in ($id_P_s) order by id desc;  ")->fetchAll(PDO::FETCH_OBJ);
    /*
    echo"<br> -------------- <br>";
    var_dump($sqlState2);
    echo  $id_P_s;
    echo"<br> -------------- <br>";
    
    echo "<br>".count($produits)."----------------------<br>";
*/

} 
   else {
        ?>
        <div class="alert error">
            <h2>Pas De Produits Pour User <?= $_SESSION["user"]->login ?> </h2>
        </div>
        <?php die();
    } 

    ?>
    <div class="container">
        <div class="m-10">
            <h1>Liste Des Produits Dans Panier De
                <?php echo $_SESSION["user"]->login; ?>
            </h1>
            <br>


            <hr>

            <?php

            if (is_null($produits)) {
                die;
            }
            //if (isset($_SESSION["panier"][$id_user][$prod->id])) {
            echo "<h1>";
            foreach ($produits as $prod):
                echo " | -  ";
            endforeach;

            echo "</h1>";
            ?>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Libille</th>
                        <th>Qtt</th>
                        <th>Prix</th>
                        <th>Discount</th>
                        <th>Date</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>

                    <!-- // id 	libelle 	prix 	discount 	id_categorie 	date_c 	img  -->
                    <?php
                    foreach ($produits as $prod):
                        ?>
                        <tr>
                            <td><?= $prod->id; ?></td>
                            <td><?= $prod->libelle; ?></td>
                            <td><?= $_SESSION["panier"][$id_user][$prod->id]["qtt"]; ?></td>
                            <td><?= $prod->prix; ?> MAD</td>
                            <td><?= $prod->discount; ?></td>
                            <td><?= $prod->date_c; ?></td>
                            <td><img src="../uploads/<?= file_exists("../uploads/$prod->img") ? $prod->img : "no_Img.jpg"; ?>"
                                    alt="Image " class="mw-50px mh-60px"></td>

                        </tr>
                        <?php
                    endforeach;
                    ?>
                </tbody>
            </table>



        </div>

    </div>
    <script src="./../script.js"></script>
</body>

</html>