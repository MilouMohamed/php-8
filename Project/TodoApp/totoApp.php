<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    require_once "./include/database.php";

    // afficher de la base de donnees
    $tabl_items = $pdo->query("select *  from items")->fetchAll(PDO::FETCH_ASSOC);


    // var_dump($tabl_items);
    $titre = "";
    if (isset($_POST["ajouter"])) {

        if (!empty($_POST["titre"])) {
            $titre = htmlspecialchars($_POST["titre"]);
            echo "<br>" . $titre . "<br>";

            $sql = $pdo->prepare("insert into items(txt) values(?); ");
            $etat = $sql->execute([$titre]);
            if ($etat) { ?>
                <div class="toast toast-ok">
                    <h2>le Titre Est Bein ajouter a la base de donnees</h2>
                </div>
                <?php
                $tabl_items = $pdo->query("select *  from items")->fetchAll(PDO::FETCH_ASSOC);

            }


        } else {

            ?>
            <div class="toast">
                <h2>Pas de text Le Champ Est Vide !!!</h2>
            </div>

            <?php
        }
    }



    ?>

    <?php include_once "./include/nav-1.php" ?>

    <div class="container">

        <form method="POST" class="add">
            <input type="text" value="<?= $titre ?>" name="titre">
            <button name="ajouter">ajouter</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>#ID</th>
                    <th class="libe">Titre</th>
                    <th class="edit-btn"> Operation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tabl_items as $item): ?>
                    <li>
                        <tr>
                            <td> <span> <?= $item["id_i"] ?></span></td>
                            <td><?= $item["txt"] ?></td>
                            <td class="edit-btn">
                                <form  method="post"> 
                                    <input type="text" name="id_i" value="<?= $item['id_i'] ?>"  hidden>
                                    <input type="submit" value="&#9998;" name="update_item"  formaction="update.php">
                                    
                                    <input type="submit" value="&#10008;" name="delete_item" onclick="return confirm('Vous Voulllez Supprimer Cette Tache ???')"  formaction="supprimer.php">
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>



    </div>


</body>

</html>

<?php
/*
CREATE DATABASE todoList;
use todoList;

CREATE TABLE items (
id_i int PRIMARY key AUTO_INCREMENT NOT null,
    txt varchar(50)
);

SELECT * FROM items;
INSERT INTO items (txt) VALUES ("tache 1"),
("tache 2"),("tache 3"),
("tache 4"),("tache 5"),
("tache 6"),("tache 7");


                                                                                                                MILOU MED 
*/
?>