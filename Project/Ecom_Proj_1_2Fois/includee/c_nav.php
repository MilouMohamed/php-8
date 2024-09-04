<?php
session_start();
$id_user = $_SESSION["user"]->id;
$count=0;
if(isset($_SESSION["panier"][$id_user]) and $_SESSION["panier"]){
 
$_SESSION["panier"][$id_user] = array_filter($_SESSION["panier"][$id_user], function ($vl) {
 /*   var_dump($vl["qtt"]);
    echo "----- ----";
    echo is_numeric($vl["qtt"]); */
    if (is_numeric($vl["qtt"])   > 0 and !empty($vl["qtt"]))
        return $vl;
});
$count= count($_SESSION["panier"][$id_user]);
// var_dump($_SESSION["panier"][$id_user]);
   
}
?>


<nav class="client-pan">
    <div class="logo">
        <li><a href="../index_.php">Milou MED</a></li>
    </div>

    <ul>
        <li><a href="./c_list_categ.php">Lt Catg</a></li>
        <li><a href="./c_panier.php"><i class="fa-solid fa-cart-shopping"></i>
                (<b><?=$count;?>) </b></b></a></li>
    </ul>

</nav>