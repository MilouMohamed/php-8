<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Stagaires </title>
    <link rel="stylesheet" href="style.css">
</head>

<body> 

    <?php

    /*
    try {
        $pdo=new PDO("mysql:host=localhost;dbname=todolist","root","");
    } catch (PDOException $e) {
      die("Probleme de connection au bd  ". $e->getMessage());
    }  */

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=mvc_1_v3", "root", "");

        $list_stgr = $pdo->query("select * from  stagaires")->fetchAll(PDO::FETCH_OBJ);
        //    echo count($list_stgr);
    
    } catch (PDOException $ex) {
        die("Probleme de cennexion to base de donnees !! \n " . $ex->getMessage());
    }

    ?>
<div class="container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>AGE</th>
                <th>LOGIN</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list_stgr as $stg): ?>
                <tr>
                    <td> <?= $stg->id; ?></td>
                    <td> <?= $stg->nom; ?></td>
                    <td> <?= $stg->prenom; ?></td>
                    <td> <?= $stg->age; ?></td>
                    <td> <?= $stg->login; ?></td>
                </tr>
            <?php endforeach; ?>

        </tbody>

    </table>


    </div>
</body>

</html>