<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Ecom Site</title>
</head>

<body>
    <?php

    include "./includee/nav.php";


    if (isset($_POST["connecter"])) {
        $log = $_POST["login"];
        $pas = $_POST["pass"];

        if (empty($log) || empty($pas)) {
    ?>
            <div class="alert error">
                <h2>Tous les Champs sont Obligatoire </h2>
            </div>
            <?php
        } else {

            require "./includee/model.php";
            // $date = date_format(date_create("now"), "Y-m-d H:i:s");
            $date = date("Y-m-d H:i:s");

            $sqlState = database()->prepare("select * from `ec_user` where  `login`=? and  `pass`=?  ");

            $sqlState->execute([$log, $pas]);
            $nbr =    $sqlState->rowCount();


            if ($nbr > 0) {

                session_start();

                $_SESSION["user"] = $sqlState->fetch(PDO::FETCH_OBJ);

                header("location:admin.php");
            } else {
            ?>
                <div class="alert error">
                    <h2>Mot de Passe Ou Login Incorect !!!</h2>
                </div>
    <?php
            }
        }
    }

    ?>
    <div class="container">
        <form method="post" class="center">

            <h1>Page connection</h1>
            <div class="row">
                <label for="login">Login : </label>
                <input type="text" name="login" value="t1">
            </div>


            <div class="row">
                <label for="pass">Pass : </label>
                <input type="text" name="pass" value="t123">
            </div>

            <div class="row">
                <input type="submit" name="connecter" value="Connecter">
            </div>


        </form>

    </div>

</body>

</html>