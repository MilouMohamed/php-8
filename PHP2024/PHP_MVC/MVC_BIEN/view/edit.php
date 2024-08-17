<?php
$title = "Modifier Un Stagaire";

// var_dump($stagaire);

ob_start();
?>

<div class="container">
   <form method="post" action="afficher_2.php?action=update">

   <input type="hidden" name="id" value="<?=$stagaire->id ?>" >

      <div class="inpt_add">
         <label for="nom">Name :</label>
         <input type="text" name="nom" value="<?=$stagaire->nom ?>">
      </div>

      <div class="inpt_add">
         <label for="prenom">Prenom :</label>
         <input type="text" name="prenom" value="<?=$stagaire->prenom ?>">
      </div>

      <div class="inpt_add">
         <label for="age">Age :</label>
         <input type="number" name="age" value="<?=$stagaire->age ?>">
      </div>
      <div class="inpt_add">
         <label for="login">Login :</label>
         <input type="text" name="login" value="<?=$stagaire->login ?>">
      </div>
      <div class="inpt_add">
         <label for="pass">Pass :</label>
         <input type="text" name="pass" value="<?=$stagaire->pass ?>">
      </div>
      <input type="submit" class="btn btn-ok" value="Enregestre Les Modifications  ">

   </form>


</div>



<?php $content = ob_get_clean(); ?>


<?php include_once "./view/layout.php"; ?>
<!-- MILOU MED  -->