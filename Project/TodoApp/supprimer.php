<?php

//  ["id_i"]=> string(0) "" ["delete_item"]=> string(3) "✘" } 
$id_i=null;
var_dump($_POST);
if (isset($_POST["delete_item"])) {
    $id_i = $_POST["id_i"]; 
    require_once "./include/database.php";
 
echo"<br>".$id_i."-----------".$_POST["id_i"]."<br>";
    $sql = $pdo->prepare("delete from items where id_i = ?");
    $sql->execute([$id_i]); 
}
header("location:totoApp.php");





/*                                                                                                                MILOU MED 
 */
?>