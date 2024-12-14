<?php
$titlePage = "Login/Signup";

include "init.php";
if (!empty($sessionUser)) {
    header("location:index.php");
    exit;
}

// $password = $userName = "8888";

// print_r($_POST);

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $listErrors = [];

    if (isset($_POST["LOGIN"])) {

        $userName = filter_var((isset($_POST["name"]) ? $_POST["name"] : null), FILTER_SANITIZE_SPECIAL_CHARS);

        if (strlen($userName) < 4) {
            $listErrors[] = "The Name Is Less Than 4 Characters !!!";
        } else {


            $password = filter_var((isset($_POST["password"]) ? $_POST["password"] : ""));
            $password = sha1($password);



            $etat = getAlllItemsWhere("users ", "UserName", $userName, "=", " and Password = '$password' ");


            if ($etat) {
                $etat = reset($etat);
                $img = $etat->Avatar;
                if (empty($img)) {
                    $img = "no_img.JPG";
                }
                $_SESSION["client"] = ["userName" => $userName, "userId" => $etat->UserID, "img" => $img];
                header("location:index.php");
                exit;
            } else {
                $listErrors[] = "The Name  Or Password  Incorect  !!!";

            }
        }

    } elseif (isset($_POST["SIGNUP"])) {


        $userName = filter_var((isset($_POST["name"]) ? $_POST["name"] : ""), FILTER_SANITIZE_SPECIAL_CHARS);

        $email = filter_var((isset($_POST["email"]) ? $_POST["email"] : ""), FILTER_SANITIZE_EMAIL);
        $emailValid = filter_var($email, FILTER_VALIDATE_EMAIL);

        $password = filter_var((isset($_POST["password"]) ? $_POST["password"] : ""));
        $passwordConfer = filter_var((isset($_POST["passwordConfer"]) ? $_POST["passwordConfer"] : ""));

        if (strlen($userName) < 4) {
            $listErrors[] = "The Name Is Less Than 4 Characters !!!";
        }

        if (strlen($password) < 4) {
            $listErrors[] = "The Password Is  Not Matsh !!!";
        }

        if (strlen($email) < 6) {
            $listErrors[] = "The Emial Is Less Than 6 Characters !!!";
        }
        if (!$emailValid) {
            $listErrors[] = "The Emial Is Not Valid !!!";
        }


        if ($password !== $passwordConfer) {
            $listErrors[] = "The Password Is  Not Equels !!!";
        }

        if (empty($listErrors)) {

            if (isExistName($userName, opre: "!=")) {
                $listErrors[] = "Sory The User Name Is Exist !!!";

            } else {

                global $cnx;
                $stmint_one = $cnx->prepare("INSERT INTO `users`(  `UserName`, `Email`, `Password`,  `RegStatus`, `CreateAt`) VALUES (?,?,?,0,now())");

                $stmint_one->execute([$userName, $email, sha1($password)]);

                $msgValid = "Your Acconet Has ben Created Successfly";

            }

        }

    }



}
$userName1 = "Yasssin";
$password1 = "0000";


?>

<div class="countainer page-login pb-2">

    <div class="title-login d-flex   justify-content-center align-items-center mb-1">
        <span>
            <h1 class="titre-page active" data-formId="LOGIN"> Login </h1>
        </span>
        <span class="mx-2"> | </span>
        <span>
            <h1 class="titre-page" data-formId="SIGNUP"> Signup </h1>
        </span>
    </div>



    <form id="LOGIN" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Name</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="name"
                value="<?= $userName1 ?>" aria-describedby="basic-addon1" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Password</span>
            <input type="text" class="form-control" placeholder="password" aria-label="password" name="password"
                value="<?= $password1 ?>" aria-describedby="basic-addon1">
        </div>

        <!-- Bouton de soumission -->
        <input type="submit" name="LOGIN" class="btn btn-success w-100" value="Login" />
    </form>





    <form id="SIGNUP" class="d-none" action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Name :</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="name"
                value="Name One" aria-describedby="basic-addon1" minlength="4" pattern=".{4,}"
                title="User Name Must Be at Least 4 Characters" required>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Password</span>
            <input type="text" class="form-control" placeholder="password" aria-label="password" name="password"
                value="0000" aria-describedby="basic-addon1">
        </div>


        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Psw Conf</span>
            <input type="text" class="form-control" placeholder="password Conferm" aria-label="password" value="0000"
                name="passwordConfer" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Email" aria-label="email"
                aria-describedby="basic-addon2" name="email" value="123456@example.com">
            <span class="input-group-text" id="basic-addon2">@example.com</span>
        </div>


        <input type="submit" name="SIGNUP" class="btn btn-primary w-100" value="Signup" />
    </form>





    <div class="container">

        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (!empty($listErrors)) {
                echo "<div class='alert alert-danger'><h3 class='fw-bbold border-bottom border-2 border-primary'>Errors</h3> ";
                foreach ($listErrors as $erro) { ?>
                    <div>
                        <p> <?= $erro ?></p>
                    </div>
                <?php }
                echo "<div>";
            }
        } ?>


        <?php if (isset($msgValid)): ?>
            <div class="alert alert-success ">
                <?= $msgValid ?>
            </div>
        <?php endif; ?>

    </div>
</div>
</div>





<?php include($temp . "footerAdmin.php"); ?>