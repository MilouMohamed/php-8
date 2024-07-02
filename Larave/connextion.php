<?php


if (isset($_POST["send"])) {

    $un = $_POST["username"];
    $pwd = $_POST["password"];
    if (!empty($un) and !empty($pwd)) {

        include "databaseEcom.php";

        $sqlreq = $pdo->prepare("SELECT * FROM `ec_user` WHERE login_u=? and password_u=? ;");

        $res = $sqlreq->execute([$un, $pwd]);

        var_dump($res);
        print_r($res);

        echo  "<br>Us $un  |||   $pwd   |||| row " . $sqlreq->rowCount() . "<br> ";
        if ($sqlreq->rowCount() >= 1) {
            // var_dump($sqlreq->fetch()); 
            session_start();
            $_SESSION["utilisateur"] = $sqlreq->fetch();
              header("location:admin.php");

        } else {
?>
            <div class="label-info">
                Mot De passe Incorect
            </div>
        <?php
        }
    } else {
        ?>
        <div class="label-info">
            Mot De passe Est Null or Empty !!
        </div>
<?php

    }
}

include_once "nav.php";
echo "<div  class='center-elem'>";
echo "<h4>Connection</h4>";
include_once "login.php";
echo "</div>";



?>