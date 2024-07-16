<?php
require_once "databaseEcom.php";

$donnes = $pdo->query("SELECT cm.*,u.login_u as 'name' FROM `ec_cmd` cm inner join ec_user u on cm.id_u=u.id_u order by  cm.date_create desc")->fetchAll(PDO::FETCH_ASSOC);


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
        <h2>Ecom Projecy MILOU MED</h2>

        <div class='center-table'>
            <h4>Liste Des Categories</h4>
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
                    <?php 
                    foreach ($donnes as   $value) {
                    ?>
                        <tr>
                            <td><?php echo  $value["id"]; ?></td>
                            <td><?php echo  strtoupper( $value["name"]); ?></td>
                            <td><?php echo  $value["total"]." : MAD"; ?></td> 
                            <td><?php echo  $value["date_create"]; ?></td>
                            <td>
                              </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>

        </div>

    </div>
</body>

</html>