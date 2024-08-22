<?php

$title="Ajouter Une Nouvelle Voiture"; 
ob_start();
?>

<div class="container">
   <form method="post" action="index_1.php?action=store">

      <div class="inpt_add">
         <label for="model">Model :</label>
         <input type="text" name="model" value="Dacia 2024">
      </div>
  
      <div class="inpt_add">
         <label for="prix">Prix :</label>
         <input type="number"  name="prix" value="28">
      </div>  
      <input type="submit" class="btn btn-ok" value="Enregestre">

   </form>


</div>



<?php 
$content= ob_get_clean();

include "layout.php";

