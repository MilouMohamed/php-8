<?php
require_once "./include/database.php";

if (isset($_POST["update_item"])) {
    $id_i = $_POST["id_i"];
    require_once "./include/database.php";

    echo "<br>" . $id_i . "-----------" . $_POST["id_i"] . "<br>";
    // $sql = $pdo->prepare("delete from items where id_i = ?");
    // $sql->execute([$id_i]);
}
// header("location:totoApp.php");


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

        <form action="" method="post">

            <label for="txt"> Le Text :
                <input type="text" value="<?= "My txt" ?>">
            </label>

            <input type="submit" value="Edite">


        </form>



    </div>

</body>

</html>