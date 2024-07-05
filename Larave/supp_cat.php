<?php 
$id = $_GET["id"];
if(isset($_GET["id"])) {

    require_once("databaseEcom.php");
    $sql=$pdo->prepare("DELETE FROM `ec_catg` WHERE `id_cg` = ?;");
   $etst=   $sql->execute([ $id]);
 
   
   if($etst) { 
    header('location:categorie.php');

}else {
echo "<br>Non Supprimer <br>";

}

}


?>