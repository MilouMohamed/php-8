<?php

require "./app/models/Stagaire.php";


$stagaire=new Stagaire();
echo "<pre>";
 print_r(Stagaire::find(5));
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