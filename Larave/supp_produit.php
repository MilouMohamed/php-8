<?php
 
if (isset($_GET["id"])) {

    $id = $_GET["id"]; 

    require_once("databaseEcom.php");

    $sql = $pdo->prepare("delete from ec_prod where id_p = ?; ");
     $etat = $sql->execute([$id]);
 

    if ($etat) {
        header("location:produit.php");// il ne faus pas mettre l espace 
    } else {
?>

        <div class="label-info  ">
            Probleme Dans la Base de donnees !!!
        </div>

<?php



    }
}




?>