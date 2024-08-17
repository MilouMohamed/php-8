<?php
$title = "Ajouter Des Stagaires";

ob_start();
?>

<div class="container">
   <form method="post" action="afficher_2.php?action=store">

      <div class="inpt_add">
         <label for="nom">Name :</label>
         <input type="text" name="nom" value="Nom 22">
      </div>

      <div class="inpt_add">
         <label for="prenom">Prenom :</label>
         <input type="text" name="prenom" value="Pronem 22">
      </div>

      <div class="inpt_add">
         <label for="age">Age :</label>
         <input type="number" name="age" value="28">
      </div>
      <div class="inpt_add">
         <label for="login">Login :</label>
         <input type="text" name="login" value="login1">
      </div>
      <div class="inpt_add">
         <label for="pass">Pass :</label>
         <input type="text" name="pass" value="000">
      </div>
      <input type="submit" class="btn btn-ok" value="Enregestre">

   </form>


</div>



<?php $content = ob_get_clean(); ?>


<?php include_once "./view/layout.php"; ?>