<?php
require_once "../databaseEcom.php";
session_start();

if (empty($_SESSION["utilisateur"]["id_u"])) {
    header("location:index.php");
}
$id_u = $_SESSION["utilisateur"]["id_u"];



if (isset($_POST["vider"])) {

    $_SESSION["Panier"][$id_u] = [];
    header("location:panier.php");
    die;

}




$qtt = 0;
$tab_prod = [];
if (!empty($_SESSION["Panier"][$id_u])) {

    $lis_prod_ses = $_SESSION["Panier"][$id_u];
    $ids_prod = array_keys($_SESSION["Panier"][$id_u]);

    $ids_prod_strg = join(",", $ids_prod);

    $tab_prod = $pdo->query("SELECT * FROM `ec_prod` WHERE  id_p in ($ids_prod_strg)")->fetchAll(PDO::FETCH_ASSOC);
    echo "<hr/>";

    // echo "count Prodact " . count($tab_prod);

    // echo "<br><br><br>  idS Product  --------------<br>";
//   var_dump($tab_prod);
// echo "</pre>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier de | <?= $_SESSION["utilisateur"]["login_u"] ?></title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <?php include_once "nav_cline.php";

    if (isset($_POST["conferme"])) {
$total=0;
var_dump($tab_prod );

foreach($lis_prod_ses as $prod => $qttPro){

     $total= $qttPro["prix"] *  $qttPro["id_p"];

}
var_dump($total);


 
    }

    ?>

    <div class="Panier">

        <div class="list-cat-prod">


            <div class="container-global catgr">

                <h2>
                    <?php echo " Les  " . count($tab_prod) . "  Produits de Mr / Ms :" .
                        strtoupper($_SESSION["utilisateur"]["login_u"]) . "  -  " . $_SESSION["utilisateur"]["id_u"] ?>

                </h2>

                <hr />


                <?php
                if (count($tab_prod) == 0) {

                    ?>
                    <div class="label-info  ">
                        Pas De Produit Pour
                        <s><?= strtoupper($_SESSION["utilisateur"]["login_u"]) . "  -  " . $_SESSION["utilisateur"]["id_u"] ?><s>
                                !!!
                    </div>
                    <?php exit;
                }
                ?>
                <div class="porteur">


                    <div>
                        <table class="tab-panier">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Libelle</th>
                                    <th>Image</th>
                                    <th>Quqntite</th>
                                    <th>Prix Uni</th>
                                    <th>Prix Tot</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $prixTotal = 0;
                                foreach ($tab_prod as $prod) {

                                    $id_p = $prod["id_p"];
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $id_p ?>
                                        </td>
                                        <td>
                                            <?= "<i class='" . $prod["econ_c"] . "'></i>  <span>" . $prod["libelle"] . "</span>" ?>
                                        </td>
                                        <td>
                                            <img src="../<?= $prod['image_p'] ?> " alt="Img">
                                        </td>
                                        <td>
                                            <?php
                                            include "counter.php";
                                            ?>

                                        </td>
                                        <td>
                                            <?= $prod["prix"] ?> : MAD

                                        </td>
                                        <td>
                                            <?= $prod["prix"] * $lis_prod_ses[$id_p] ?> : MAD
                                        </td>
                                    </tr>

                                    <?php
                                    $prixTotal += $prod["prix"] * $lis_prod_ses[$id_p];
                                } ?>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Total </th>
                                    <th> <?php
                                    setlocale(LC_MONETARY, "");
                                    echo $prixTotal; ?> : MAD</th>
                                </tr>

                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td class="tr-last">


                                        <form method="post">
                                            <button name="conferme" class="btn ">Confirmer La Comande</button>
                                            <button name="vider" class="btn "
                                                onclick="return confirm('Vous Voulez Vider Le panier???')">Vider le
                                                Panier</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        </table>




                    </div>



                </div>

            </div>

        </div>

    </div>

    <script src="../JS/script.js" type="text/javascript"></script>

</body>

</html>