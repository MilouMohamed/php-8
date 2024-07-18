<?php


if (isset($_POST["send"])) {

    $un = $_POST["username"];
    $pwd = $_POST["password"];
    if (!empty($un) and !empty($pwd)) { 

        $dt = date("Y-m-d H:m:s");
        var_dump($dt);

        require_once "databaseEcom.php";
        $req = "INSERT INTO `ec_user`  VALUES (null,?,?,?)";
        $sqlStat = $pdo->prepare($req);
        $sqlStat->execute([$un, $pwd, $dt]);


        header("location: connextion.php");
    } else {
?>
        <div class="label-info">
            Mot De passe Est Null or Empty !!
        </div>
<?php

    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecom Med PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once("nav.php")   ?>

    <div class="container-global">
        <h2>Ecom Projecy</h2> 
 
        <div class='center-elem' >
            <h4>Ajouter Un Nouveau Utilisateur</h4>

            <?php include_once "login.php"; ?>

        </div>

    </div>
</body>

</html>