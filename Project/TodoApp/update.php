<?php
require_once "./include/database.php";
 

  $val="";
 $id_i=null;
if (isset($_POST["id_i"])) {
    $id_i = $_POST["id_i"]; 
    $sql = $pdo->prepare("select * from items where id_i = ?");
    $sql->execute([$id_i]);
    $item = $sql->fetch(PDO::FETCH_ASSOC);

    $val=$item["txt"]; 
}
else{
        header("location:totoApp.php");

}

if (isset($_POST["Edite"])) {
    
    $val=$_POST["txt_edit"];
    $id_i=$_POST["id_i"];
    if (!empty($_POST["txt_edit"]) && $id_i != null ) {

        $sql = $pdo->prepare("update items set txt = ? where id_i= ?");
        $sql->execute([$val, $id_i]);
         header("location:totoApp.php"); 

    } else {
        ?>
        <div class="toast">
            <h2>Pas de text Le Champ Est Vide !!!</h2>
        </div>
    <?php
    }



}

/*                                                                                                                MILOU MED 
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>TODO APP MODIFIE</title>
</head>

<body>


    <div class="contaner-P2">

        <form   method="post">

            <label for="txt"> Le Text :
                <input type="text" value="<?= $val ?>" name="txt_edit">
                <input type="text" value="<?= $id_i ?>" name="id_i" hidden>
            </label>

            <input type="submit" value="Edite" name="Edite">
 
        </form>



    </div>

</body>

</html>