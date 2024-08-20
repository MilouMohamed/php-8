<?php

// require "./app/models/Stagaire.php";
require "./app/models/autoLoad.php";

$stagaire = new Stagaire();
echo "<pre>";

$vtr= new Voiture();
$vtr->setColor("red");
print_r($vtr);


// print_r(Stagaire::where("nom","Nom 1"));

echo "<br>*----*********----*<br>";


print_r(Stagaire::where("age", 20));

echo "<br>*----*****find****----*<br>";

print_r(Stagaire::find(6));








//  print_r(Stagaire::find(2)); 
echo "</pre>";

/*
$stagaire=new Stagaire();
echo "<pre>";
  print_r(Stagaire::all());//func Static In class Stagaire
echo "<br>*----*********----*<br>";
     var_dump(Stagaire::find(5));
echo "</pre>";


foreach (Stagaire::all() as $stgr) {
    var_dump($stgr->getNom());
    echo " || ";
var_dump($stgr->getAge() );
echo "<br>";

}
echo "<br>-----------<br>";
 

      /*          */