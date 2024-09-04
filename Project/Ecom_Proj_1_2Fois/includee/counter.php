<?php
$id_user = $_SESSION["user"]->id;
 
$id_prod = $prod->id;  
 $qtt_p = 0;
$txt =  "Ajouter"  ; 
 
if (isset($_SESSION["panier"][$id_user][$id_prod])) {
 
    $qtt_p = is_null($_SESSION["panier"][$id_user][$id_prod]["qtt"])? 0 :$_SESSION["panier"][$id_user][$id_prod]["qtt"]  ;

    $txt =  $qtt_p==0 ?  "Ajouter" :"Edit"; 
}

?>


<!-- action="c_add_to_panier.php" -->
<div class="btn-p-m counter">

    <form class="bg-transp" method="post" action="c_add_to_panier.php" >
        <input type="hidden" name="id" value="<?= $id_prod; ?>">
        <input type="button" value="+" class="plus plus_1">
        <input type="number" name="val" value="<?= $qtt_p; ?>" class="inpt-val">
        <input type="button" value="-" class="moin moin_1 ">
        <input type="submit" name="valider" class="btn-add" value="<?= $txt; ?> ">
        <?php  if( $qtt_p > -0) : ?>
        <input formaction="./c_remove_from_panier.php" type="submit" name="Efacer" class="btn-dlt" value="0">
        <?php  endif; ?>
    </form>
</div>