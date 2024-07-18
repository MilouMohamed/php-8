<?php
require_once "databaseEcom.php";

if (isset($_GET["id_cmd"])) {

    $id_cmd = $_GET["id_cmd"];
    // echo " <br>" . $_GET["id_cmd"] . "<br>";
    // echo "test <br>";

    // SELECT * FROM `ec_cmd` 
    $sql = $pdo->prepare("SELECT cm.*,u.login_u as 'name' FROM `ec_cmd` cm inner join ec_user u on cm.id_u=u.id_u where  cm.id = ? order by  cm.date_create desc ");

    $sql->execute([$id_cmd]);

    $donnes = $sql->fetch(PDO::FETCH_ASSOC);


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMD </title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once ("nav.php") ?>

    <div class="container-global">
        <h2>Ecom Projecy MILOU MED</h2>

        <div class='center-table'>
            <h4>Detaile De Produit </h4>
            <?php if (empty($donnes)) { ?>
                <h4>Pas De Produit </h4>

            <?php } ?>
            <div class="crat-ling-cmd">
                <?php if (empty($donnes)) {
                    ?>
                    <div class="label-info  ">
                        Pas De Detaile Pour Id = <?= $_GET["id_cmd"]; ?>
                    </div>
                    <?php
                } else { ?>
                    <!-- ["id"]=> int(59) ["id_u"]=> int(12) ["total"]=> float(72) ["date_create"] -->

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Client</th>
                                <th>Total</th>
                                <th>Date Creation</th>
                                <th>Operation</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td><?php echo $donnes["id"]; ?></td>
                                <td><?php echo strtoupper($donnes["name"]); ?></td>
                                <td><?php echo $donnes["total"] . " : MAD"; ?></td>
                                <td><?php echo $donnes["date_create"]; ?></td>

                                <td>
                                    <a class="btn btn-edit" href="commandes.php">List CMD</a>
                                    <?php
                                    if ($donnes["valid"]) {
                                        ?>
                                        <a class="btn btn-edit" href="anuller_valider_CMD.php?id_cmd=<?=$donnes["id"] ?>&etat=0">Anuller CMD</a>

                                    <?php
                                    } else {
                                        ?>
                                        <a class="btn btn-edit" href="anuller_valider_CMD.php?id_cmd=<?=$donnes["id"] ?>&etat=1">Valider CMD</a>
                                    
                                <?php } ?>

                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <br> <br>
                    <h4>Detaile De Produit Ligne Commande</h4>

                    <table>
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Produit</th>
                                <th>Image</th>
                                <th>Prix Unitaire</th>
                                <th>Quqntite</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = $pdo->prepare("SELECT l.*,p.image_p as 'img', p.libelle as lbl FROM `ec_ligne_cmd` l  inner join ec_prod p on l.id_p=p.id_p  where  l.id_cmd =? ");
                            $sql->execute([$id_cmd]);
                            $lign_cmds = $sql->fetchAll(PDO::FETCH_OBJ);
                            //id 	id_p 	prix 	qtt 	total 	id_cmd 	img 	lbl 	
                            foreach ($lign_cmds as $cmd):
                                ?>
                                <tr>
                                    <td><?php echo $cmd->id; ?></td>
                                    <td><?php echo $cmd->lbl; ?></td>
                                    <td><img src="<?php echo $cmd->img; ?>" alt="img prod"></td>
                                    <td><?php echo $cmd->prix . " MAD"; ?></td>
                                    <td><?php echo "X " . $cmd->qtt; ?></td>
                                    <td><?php echo $cmd->total . " MAD"; ?></td>

                                </tr>

                                <?php
                            endforeach;
                            ?>
                        </tbody>

                    </table>


                <?php } ?>

            </div>

        </div>

    </div>
</body>

</html>