<?php

// require "./app/models/Stagaire.php";

$stagaire=new app\models\Stagaire();

$stagaire->setNom("Nom 20");
$stagaire->setPrenom("Prenon 20");
$stagaire->setAge(20);
$stagaire->setLogin("Log 20");
$stagaire->setPass("2222");

$stagaire->create();

 