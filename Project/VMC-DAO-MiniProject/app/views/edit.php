<?php

$title="Modifier Voiture"; 
 
ob_start();
?>

<div class="container">
   <form method="post" action="index_1.php?action=update">
 
         <input type="hidden" name="id" value="<?= $voitures->getId()?>" >
      

      <div class="inpt_add">
         <label for="model">Model :</label>
         <input type="text" name="model" value="<?= $voitures->getModel()?>">
      </div>
  
      <div class="inpt_add">
         <label for="prix">Prix :</label>
         <input type="number"  name="prix" value="<?= $voitures->getPrix()?>">
      </div>  
      <input type="submit" class="btn btn-ok" value="Modifer">

   </form>


</div>



<?php 
$content= ob_get_clean();

include "layout.php";

