<?php
// Project Start le  14-11-2024
session_start();

if (isset($_SESSION["UserName"])) {
    header("location: dashboard.php");
    exit;
}

$noNavbar = "";

include "init.php";




if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST["send"])) {

        $userName = filter_var($_POST["UserName"], FILTER_SANITIZE_STRING);
        $password = filter_var($_POST["Password"], FILTER_SANITIZE_STRING);
 
        $hasPass = sha1($password);
 
        $stmt = $cnx->prepare("SELECT UserID, UserName , Password FROM `users` WHERE UserName=? and Password=? and GroupID =1  limit 1");

        $stmt->execute([$userName, $hasPass]);
        $item = $stmt->fetch(PDO::FETCH_OBJ);
 
        $count = $stmt->rowCount();

        if ($count > 0) {
            $_SESSION["UserName"] = $item->UserName;
            $_SESSION["Id"] = $item->UserID;

            header("location: dashboard.php");
            exit();
        } else { ?>

            <div class=" m-5 alert alert-danger">
                Mos de Pass Incorect !!!
            </div>

        <?php }



    }



}



?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="login-admin mx-auto mt-5">
    <div class="container">
        <h2 class="text text-center text-black-50">
            <?= lang("PAGE_LOGIN_TITRE") ?>
        </h2>
        <input class="form-control text-black-50 mt-3" type="text" name="UserName" placeholder="Name Admin" value="med2">
        <input class="form-control text-black-50 mt-3" type="text" name="Password" placeholder="0000" value="1111">
        <input class="btn btn-primary w-100 mt-3 mb-3" name="send" type="submit" value="Connection">

    </div>
</form>



<?php include($temp . "footerAdmin.php"); ?>