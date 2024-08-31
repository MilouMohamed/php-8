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


    if (isset($_POST["ajouter"])) {
        $log = $_POST["login"];
        $pas = $_POST["pass"];

        if (empty($log) || empty($pas)) {
    ?>
            <div class="alert error">
                <h2>Tous les Champs sont Obligatoire </h2>
            </div>
            <?php 
        } else {

            require "./includee/model.php";
            // $date = date_format(date_create("now"), "Y-m-d H:i:s");
            $date = date("Y-m-d H:i:s");

            $sqlState = database()->prepare("INSERT INTO `ec_user` VALUES (null,?,?,? )");

            $rse =       $sqlState->execute([$log, $pas, $date]);
            if ($rse) {
                header("location:connection.php");
            } else {
            ?>
                <div class="alert error">
                    <h2>Probleme de Connection !!!</h2>
                </div>
    <?php
            }
        }
    }

    ?>

    <div class="container">
        <form method="post" class="center">

        <h1>Page Inscription :</h1> 
            <div class="row">
                <label for="login">Login : </label>
                <input type="text" name="login">
            </div>


            <div class="row">
                <label for="pass">Pass : </label>
                <input type="text" name="pass">
            </div>

            <div class="row">
                <input type="submit" name="ajouter" value="Ajouter">
            </div>


        </form>
        
    </div>
<script src="./script.js"></script> 
</body>

</html>

<?php

/*  Base De Donnees




create database if not EXISTS ecom_1_2eme_f;

use ecom_1_2eme_f;

CREATE TABLE ec_user(
id int primary key AUTO_INCREMENT,
    login varchar(100),
    pass varchar(100),
    date_c datetime
);
     
INSERT into ec_user values
(null,"111","0000",CURRENT_DATE),
(null,"000","0000",CURRENT_DATE),
(null,"222","0000",CURRENT_DATE);




create TABLE ec_categorie(
id int PRIMARY key AUTO_INCREMENT,
libelle varchar(100) ,
    description varchar(100),
    date_c datetime 
);
ALTER TABLE ec_categorie ADD icon_c varchar(250) DEFAULT  'fa-solid fa-layer-group'
INSERT into ec_categorie values (null,"fawakih","Pas de Descrip",CURRENT_TIME),
 (null,"khodar","Pas de Descrip 2",CURRENT_TIME),
  (null,"ajban","Pas de Descrip 3",CURRENT_TIME),
   (null,"7alawiyat","Pas de Descrip 4",CURRENT_TIME);






create table ec_produit(
id int PRIMARY key AUTO_INCREMENT,
    libelle varchar(100),
    prix  decimal,
    discount int,
    id_categorie int ,
date_c datetime ,
    constraint foreign key (id_categorie) REFERENCES ec_categorie(id)
    on DELETE CASCADE on UPDATE CASCADE

);

ALTER TABLE ec_produit ADD COLUMN img varchar(254);


insert into  ec_produit VALUES
(null,"danone 2",2.5,2,2,CURRENT_TIME,null),
(null,"banan",10.5,0,1,CURRENT_TIME,null),
(null,"Tomat",2.5,2,1,CURRENT_TIME,null),
(null,"voiture",12000,10,3,CURRENT_TIME,null);
 
UPDATE  ec_produit set img= "./uploads/no_Img.JPG";

 */
