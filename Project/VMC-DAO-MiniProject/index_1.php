<?php
use app\models\Voiture;

require "vendor/autoload.php"; 

echo "Test ";


$voitr=new Voiture("BMB",50000);

echo "<pre>";
print_r($voitr);




echo "</pre>";

/*


composer init ;


 composer dump-autoload











base de donness
use mvc_1_v3 ;

CREATE table Voiture (
id int PRIMARY key AUTO_INCREMENT ,
    modele varchar(100),
    prix double 
)


INSERT INTO `voiture`  VALUES 
( null,"Bmw 1",10000.2),
 ( null, "Mercides 1",7000),
 ( null, "toyota 1",99000),
 (  null, "toyota 2",90000),
 (  null,"jep 01",66600),
 (  null,"dacia 1",22200);
*/













