<?php
 

require "AutoLoader.php";
AutoLoader::regester();

use app\models\Stagaire;

$stagaire=new     Stagaire();
$stagaire2=new    Stagaire();
$stagaire3=new    Stagaire();
 
/*
// Ou Place de app\models
$stagaire=new   app\models\Stagaire();
$stagaire2=new   app\models\Stagaire();
$stagaire3=new   app\models\Stagaire();
 
*/


$stagaire->delete(2);
 