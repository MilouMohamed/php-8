
<?php 
 

if(!isset($_SESSION["utilisateur"])){ 
   header("location:../connextion.php");   
}


$id_u=$_SESSION["utilisateur"]["id_u"];
 

$qtt=0;
if(!empty($_SESSION["Panier"][$id_u][$id_p])){
    $qtt=$_SESSION["Panier"][$id_u][$id_p] ;

    // var_dump($_SESSION["Panier"]); 
} 
 
// echo "<pre>";
// print_r($_SESSION["Panier"]);
// echo "</pre>";
 
?> 

<div class="center-elm cntr">
    <form method="post"  action="ajouter_panier.php" >
        <button   class="btn btn-catg btn-moins">-</button>
        <input type="hidden" name="id_p" value="<?= $id_p   ?>" >
        <input type="number" name="qtt" class="counter" min="0" value="<?php echo $qtt ;?>"  >
        <button   class="btn btn-catg  btn-plus"><?= $id_p   ?></button>
        <button   type="submit" class="btn btn-catg_sub "><?php  if($qtt > 0) echo "Modifer"; else echo "Ajouter";    ?></button>
    </form> 
</div>