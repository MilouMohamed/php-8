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


echo "is Valider ";
    die;
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
    var_dump($sqlState->debugDumpParams());
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
                        <!-- <th>ID</th> -->
                        <th>Image</th>
                        <th>Libille</th>
                        <th>Qtt</th>
                        <th>Prix</th>
                        <th>Discount</th>
                        <th>Prix TTC</th>
                        <th>Total </th>
                    </tr>
                </thead>
                <tbody>

                    <!-- // id 	libelle 	prix 	discount 	id_categorie 	date_c 	img  -->
                    <?php
                    $total=0;
                    foreach ($produits as $prod):
                        $prx=(int)$prod->prix;
                        $dict=$prod->discount;
                        $qtt=(int)$_SESSION["panier"][$id_user][$prod->id];
                        $prix_ttc=$prx - ($prx *$dict/100 );
                        $tot_p=$qtt * $prix_ttc;
                        $total+=$tot_p;
                        ?>
                        <tr>
                            <!-- <td><?= $prod->id; ?></td> -->
                            <td class="center-v"><img src="../uploads/<?= file_exists("../uploads/$prod->img") ? $prod->img : "no_Img.jpg"; ?>"
                                    alt="Image " class="mw-50px mh-60px"></td>
                            <td><?= $prod->libelle; ?></td>
                            <td class="big-val"><?php
                            include "../includee/counter.php";
                            ?></td>
                            <td><?= $prx; ?> MAD</td>
                            <td><?= $prod->discount; ?></td>
                            <td><?= $prix_ttc ?></td>
                            <td><?= $tot_p ?></td>

                        </tr>
                        <?php
                    endforeach;
                    ?>
                    <tr>
                    <td colspan="6" class="bg-trsnp" > </td>    
                    <td>Total <?= $total ?> : MAD</td></tr>
                    <tr>
                    <td colspan="5" class="bg-trsnp" > </td>    
                    <td><a href="">Valider CMD</a></td>
                    <td><a href="c_valider_cmd.php">Vider <i class="fa-solid fa-cart-shopping"></i> </a></td>
                </tr>
                </tbody>
            </table>



        </div>

    </div>
    <script src="./../script.js"></script>
</body>

</html>