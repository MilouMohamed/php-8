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


    var_dump($pdo);
    $titre="";
    if (isset($_POST["ajouter"])) {

        if (!empty($_POST["titre"])) {
            $titre= $_POST["titre"] ;
            echo "<br>".$titre."<br>";

           $sql= $pdo->prepare("insert into items(txt) values(?); ");
        $etat=   $sql->execute([$titre]);
if( $etat){?> 
<div class="toast toast-ok">
                <h2>le Titre Est Bein ajouter a la base de donnees</h2>
            </div>
<?php  
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

        <form method="POST">
            <input type="text" value="<?= $titre ?>" name="titre">
            <button name="ajouter">ajouter</button>
        </form>
        <ul>
            <li>
                <input type="checkbox" name="n1">
                <div class="libe">Mon text Ici</div>
                <div class="edit-btn">
                    <input type="button" value="Edit">
                    <input type="button" value="Dele">
                </div>
            </li>
            <li>
                <input type="checkbox" name="n1">
                <div class="libe">Mon text Ici</div>
                <div class="edit-btn">
                    <input type="button" value="Edit">
                    <input type="button" value="Dele">
                </div>
            </li>
            <li>
                <input type="checkbox" name="n1">
                <div class="libe">Mon text Ici</div>
                <div class="edit-btn">
                    <input type="button" value="Edit">
                    <input type="button" value="Dele">
                </div>
            </li>
        </ul>

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