<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="./../css/all.min.css">

    <title>Ecom Site 00</title>
</head>

<body>
    <?php

    include "../includee/c_nav.php";
    require "../includee/model.php";

    if (is_null($_SESSION["user"]) or empty($_SESSION["user"])) {
        header("location:../connection.php");
    }


    $id_user = $_SESSION["user"]->id;


    // echo "<br>-------------<br>"; 

    if (!isset($_SESSION["panier"]) && !isset($_SESSION["panier"][$id_user])) {
    ?>
        <div class="alert error">
            <h2>Pas De Produits Pour Client <?= $_SESSION["user"]->login ?> </h2>
        </div>
    <?php die();
    }

    $lst = array_column($_SESSION["panier"][$id_user], "id_p");
   

    if (count($lst) > 0) {

        $id_P_s = implode(",", $lst);

        $produits = database()->query("select * from ec_produit where id in ($id_P_s) order by id desc;  ")->fetchAll(PDO::FETCH_OBJ);
 
    } else {
    ?>
        <div class="alert error">
            <h2>Pas De Produits Pour User <?= $_SESSION["user"]->login ?> </h2>
        </div>
    <?php die();
    }

    /*
 var_dump($lst);
    echo "<br>-------------<br>"; */
     

    ?>
    <div class="container">
        <div class="m-10">
            <h1>Liste Des Produits Dans Panier De 
                <?php echo $_SESSION["user"]->login ; echo " id_user ". $id_user; ?>
            </h1>
            <br>


            <hr>

            <?php

$id_user = $_SESSION["user"]->id;
            if (isset($_POST["valid_cmd"])) {
                $tabl_prod_qtt = array();
                $total_cmd = 0;


          /*      echo "<pre>";
                var_dump($produits[0]->discount);
                echo "<br>---<br>";

                var_dump($produits);
                echo "</pre>";
 */
                foreach ($produits as $prod_pan) { 
                    $totl_Prod = 0;
                    $qtt_p = (int) ($_SESSION["panier"][$id_user][$prod_pan->id]["qtt"]);
                    /* // $pri_red=$prod_pan->prix -($prod_pan->prix *  $discount / 100); */
                    $totl_Prod += (float)($qtt_p * (float)($prod_pan->prix - ($prod_pan->prix * $prod_pan->discount / 100 )));

                    // echo " $totl_Prod +=(float)( $qtt_p * (float) $prod_pan->prix);";
                    // echo " totl_Prod +=(float)(   qtt_p  * (float)  prod_pan->prix);<br>";
                    $total_cmd += (float)$totl_Prod;
                    
                    $id_pdoo= $prod_pan->id;
                    $tabl_prod_qtt[$id_pdoo]= [
                        "id" => $id_pdoo,
                        "prix" => $prod_pan->prix,
                        "qtt" => $qtt_p,
                        "total_p" => $totl_Prod 
                    ];
                }
           

 


                $sqlState8 = $pdo->prepare("INSERT INTO `ec_cmd` (id,`id_client`, `total` ) VALUE(null,?,?) ;");
                $sqlState8->execute([$id_user, $total_cmd]);

                $id_cmd_last = $pdo->lastInsertId();

                $sql = "INSERT INTO `ec_line_cmd`( id_p, id_cmd, prix, qtt, total)VALUES ";

                foreach ($produits as $prd) {
                    $id_p = $prd->id;
                    $sql .= " ( :id_p$id_p,:id_cmd$id_p,:prix$id_p,:qtt$id_p, :total$id_p   ) ,";
                }
                $sql = substr($sql, 0, -1);
                $sqlState_p = $pdo->prepare($sql);
 
              
                foreach ($tabl_prod_qtt as $prdt) {
                

                $id_p = $prdt["id"]; 
                    $sqlState_p->bindParam(":id_p$id_p", $prdt["id"]);

                    $sqlState_p->bindParam(":prix$id_p", $prdt["prix"]);
                    $sqlState_p->bindParam(":id_cmd$id_p", $id_cmd_last);
                    $sqlState_p->bindParam(":qtt$id_p", $prdt["qtt"]);
                    $sqlState_p->bindParam(":total$id_p", $prdt["total_p"]);    
                }
 
              /*  var_dump($sqlState_p->debugDumpParams());
                echo "<br>-----------<br>;";
                var_dump($pdo);*/

                $rs = $sqlState_p->execute();
                if ($rs) {
                    //   $_SESSION["panier"][$id_user]=[];
            ?>
                    <div class="alert bein">
                        <h2>La Commande Est Bien Ajouter </h2>
                    </div>
                <?php die;
                }
            }
 
            if (is_null($produits) || !isset($_SESSION["panier"][$id_user]) || is_null($_SESSION["panier"][$id_user])) {
                ?>
                <div class="alert error">
                    <h2>Pas De Produits Pour Client : <?= $_SESSION["user"]->login ?>  </h2>
                </div>
            <?php
            }

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

                    $total = 0;
                    foreach ($produits as $prod):
                        $prx = (int) $prod->prix;
                        $dict = $prod->discount;
                        $qtt = $_SESSION["panier"][$id_user][$prod->id]["qtt"];
                        $prix_ttc = $prx - ($prx * $dict / 100);
                        $tot_p = $qtt * $prix_ttc;
                        $total += $tot_p;
                    ?>
                        <tr>
                            <!-- <td><?= $prod->id; ?></td> -->
                            <td class="center-v"><?= $prod->id; ?> *** <img
                                    src="../uploads/<?= file_exists("../uploads/$prod->img") ? $prod->img : "no_Img.jpg"; ?>"
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
                        <td colspan="6" class="bg-trsnp"> </td>
                        <td>Total <?= $total ?> : MAD</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="bg-trsnp"> </td>
                        <td class="line">
                            <!-- <a class="btn-add" href="c_valider_cmd.php">Valider CMD</a> -->
                            <form method="post" class="normal">
                                <input type="submit" name="valid_cmd" value="Valider CMD">
                            </form>
                        </td>
                        <td class="line"><a class="btn-add" href="c_vidie_panier.php"
                                onclick="return confirm('Vous Voullez Supprimer ???')">Vider <i
                                    class="fa-solid fa-cart-shopping"></i> </a></td>
                    </tr>
                </tbody>
            </table>



        </div>

    </div>
    <script src="./../script.js"></script>
</body>

</html>