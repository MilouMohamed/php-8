<?php

$title = "Supprimer Stagaire";

ob_start();
?>

<hr>
<h2>Vous Voullez Supprimer Ce Stagaire !!!</h2>
<div class="div-btns">
    <a href="./destroy.php?id=<?= $id_stg; ?>">Supprimer</a>
    <a href="./afficher_2.php">Anuller</a>

</div>


<?php

$content = ob_get_clean();


include_once "./view/layout.php";



