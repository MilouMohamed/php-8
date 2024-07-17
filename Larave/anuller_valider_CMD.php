<?php
    $id_cmd=$_GET["id_cmd"];
//  var_dump($_GET);
if(isset($_GET["id_cmd"]) &&   isset($_GET["etat"]) ){
 
    $id_cmd=$_GET["id_cmd"];


require_once "databaseEcom.php";

$sql=$pdo->prepare("UPDATE ec_cmd set valid= ? WHERE id = ?"); 
 $sql->execute([$_GET["etat"],$id_cmd]); 
 
}
 header("location: commandeOne.php?id_cmd=".$id_cmd);

?>