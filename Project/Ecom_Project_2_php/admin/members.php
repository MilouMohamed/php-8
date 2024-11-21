<?php
session_start();

if (!isset($_SESSION["UserName"])) {
    header("location: index.php");
    exit;
} else {

    $titlePage = "Members";
    include "init.php";

    $action = isset($_GET["do"]) ? $_GET["do"] : "Manage";


    echo '<div class="container">';
    if ($action == "Manage") {
        echo "Page Manage<br>";
        echo "<a href='?do=Add'>Ajouter Nouvel Copmte </a><br>";
    } elseif ($action == "Insert") {
        echo "Page Insert<br>";
        /* */
        if ($_SERVER['REQUEST_METHOD'] === "POST") {


            $userName = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
            $fullName = filter_var($_POST["full"], FILTER_SANITIZE_STRING);
            $email = $_POST["email"];
         
            $pass = htmlspecialchars($_POST["new_pass"]);
            $pass_hash = sha1(htmlspecialchars($_POST["new_pass"]));

            // echo "<br>|| userName " . $userName . "|| pass " . $pass . " ||fullName " . $fullName . " ||email " . $email;
 

            $errorsList = array();

            if (empty($userName)) {
                $errorsList[] = "The Name Cant Be Empty";
            }
            if (strlen($userName) < 4) {
                $errorsList[] = "The Name Cant Be Less Than 4 Caracter";
            }

            if (empty($pass)) {
                $errorsList[] = "The Password Cant Be Empty";
            } 
            if (strlen($pass) < 4) {
                $errorsList[] = "The Password Cant Be Less Than 4 Caracter";
            }
            if (empty($fullName)) {
                $errorsList[] = "The Fullname Cant Be Empty";
            }
            if (strlen($fullName) < 4) {
                $errorsList[] = "The Fullname Cant Be Less Than 4 Caracter";
            }
            if (empty($email)) {
                $errorsList[] = "The Email Cant Be Empty";
            }
            if (strlen($email) < 4) {
                $errorsList[] = "The Email Cant Be Less Than 4 Caracter";
            }



            // echo "id " . $UserID . " userName " . $userName . "pass " . $pass . "fullName " . $fullName . "email " . $email;
            if (count($errorsList) == 0) {
                try {
 
                    $stmt = $cnx->prepare("INSERT INTO `users`(`UserName`, `Email`, `FullName`, `Password`) VALUES (?, ?, ?, ?)");
                    $row = $stmt->execute([$userName, $email, $fullName, $pass_hash]);
                    ?>
                    <div class="alert alert-success" role="alert">
                        <h2>The Profile Has Added </h2>
                    </div> <?php


                } catch (PDOException $exp) {
                    ?>
                    <div class="alert alert-danger">
                        <h2><?= " Error on Aded = " . $exp->getMessage(); ?> </h2>
                    </div> <?php
                }
            } else {
                echo '<ul class="alert alert-danger m-5 list-unstyled" role="alert"> <h2>Errors</h2>';

                foreach ($errorsList as $error) {
                    ?>
                    <li class="ps-4 mb-2"><?= $error ?> </li>
                    <?php
                }
                echo '</ul>';
                //   header("location:?do=Edite&UserId=".$userId);
                //   exit(); 
            }




        } else {
            ?>
            <div class="alert alert-danger">
                <h2> Vous N avez pas le Droit de Modifier !!!</h2>
            </div>
            <?php
        }

        
    } elseif ($action == "Add") {
        echo "Page Add<br>";
        ?>

        <h1><?= lang("TITRE_MEMBERS_ADD") ?> </h1>
        <form class="form-group " action="?do=Insert" method="post">

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8 ">
                    <input type="text" class="form-control ps-4" name="username" id="username-new"
                        placeholder="Name to login and Shop" value="<?php $_POST["username"] ?? "" ?>" required>
                    <label class="ps-4" for="username-new"><?= lang("NAME") ?></label>
                </div>
            </div>

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8  password">
                    <input type="password" class="form-control ps-4" id="pass-new-new" value="<?php $_POST["new_pass"] ?? "" ?>"
                        name="new_pass" placeholder="Password ">
                    <label class="ps-4" for="pass-new-new"><?= lang("PASSWORD") ?></label>
                     <i class="fa-regular fa-eye password-show"></i>
                </div>
            </div>

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8 ">
                    <input type="text" class="form-control ps-4" name="email" id="email-new" placeholder="email@emaol.com"
                        value="<?php $_POST["email"] ?? "" ?>" required>
                    <label class="ps-4" for="email-new"><?= lang("EMAIL") ?></label>
                </div>
            </div>

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8 ">
                    <input type="text" class="form-control ps-4" name="full" value="<?php $_POST["full"] ?? "" ?>" id="full-new"
                        placeholder="Fullname">
                    <label class="ps-4" for="full-new"><?= lang("FULLE_NAME") ?></label>
                </div>
            </div>

            <div class="row align-items-center justify-content-center">
                <div class="col-lg-8  text-center">
                    <input class="btn btn-primary btn-lg w-100  " type="submit" value="<?= lang("ADD") ?>">
                </div>
            </div>

        </form>


        <?php



    } elseif ($action == "Edit") {
        // echo "Page Edite ID = ". $_GET["UserId"] ;
        $userId = (isset($_GET["UserId"]) and intval($_GET["UserId"])) ? intval($_GET["UserId"]) : 0;


        if ($userId != 0) {

            $stmt = $cnx->prepare("select *  from users where UserID=?");
            $stmt->execute([$userId]);
            $item = $stmt->fetch(PDO::FETCH_OBJ);

            // print_r($item);
            if ($stmt->rowCount() > 0) {

                ?>

                <h1><?= lang("TITRE_MEMBERS") ?> </h1>
                <form class="form-group " action="?do=Update" method="post">
                    <input type="hidden" class="form-control ps-4" id="userId" name="userId" value="<?= $item->UserID ?>">

                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="form-floating mb-3 col-lg-8 ">
                            <input type="text" class="form-control ps-4" name="username" id="username" value="<?= $item->UserName ?>"
                                placeholder="Name" required>
                            <label class="ps-4" for="username"><?= lang("NAME") ?></label>
                        </div>
                    </div>

                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="form-floating mb-3 col-lg-8 ">
                            <input type="hidden" class="form-control ps-4" id="pass-old" name="old_pass" value="<?= $item->Password ?>">
                            <input type="text" class="form-control ps-4" id="pass-new" name="new_pass" placeholder="pass">
                            <label class="ps-4" for="pass-new"><?= lang("PASSWORD") ?></label>
                        </div>
                    </div>

                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="form-floating mb-3 col-lg-8 ">
                            <input type="text" class="form-control ps-4" name="email" value="<?= $item->Email ?>" id="email"
                                placeholder="email@emaol.com" required>
                            <label class="ps-4" for="email"><?= lang("EMAIL") ?></label>
                        </div>
                    </div>

                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="form-floating mb-3 col-lg-8 ">
                            <input type="text" class="form-control ps-4" name="full" value="<?= $item->FullName ?>" id="full"
                                placeholder="Fullname">
                            <label class="ps-4" for="full"><?= lang("FULLE_NAME") ?></label>
                        </div>
                    </div>

                    <div class="row align-items-center justify-content-center">
                        <div class="col-lg-8  text-center">
                            <input class="btn btn-primary btn-lg w-100  " type="submit" value="<?= lang("SAVE") ?>">
                        </div>
                    </div>

                </form>


                <?php

            } else { ?>
                <div class="alert alert-danger">
                    <h2><?= lang("NO_PROFILE_ID") ?> Dans DB </h2>
                </div>
            <?php }

        } else { ?>
            <div class="alert alert-danger">
                <h2><?= lang("NO_PROFILE_ID") ?> Dans Url </h2>
            </div>
        <?php }
    } elseif ($action == "Update") {

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            echo "<h1>" . lang("TITRE_MEMBERS_UPDATE") . " </h1>";

            $UserID = $_POST["userId"];
            $userName = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
            $fullName = filter_var($_POST["full"], FILTER_SANITIZE_STRING);
            $email = $_POST["email"];


            $pass = (empty($_POST["new_pass"])) ? $_POST["old_pass"] : sha1($_POST["new_pass"]);

            $errorsList = array();

            if (empty($userName)) {
                $errorsList[] = "The Name Cant Be Empty";
            }
            if (strlen($userName) < 4) {
                $errorsList[] = "The Name Cant Be Less Than 4 Caracter";
            }

            if (empty($fullName)) {
                $errorsList[] = "The Fullname Cant Be Empty";
            }
            if (strlen($fullName) < 4) {
                $errorsList[] = "The Fullname Cant Be Less Than 4 Caracter";
            }
            if (empty($email)) {
                $errorsList[] = "The Email Cant Be Empty";
            }
            if (strlen($email) < 4) {
                $errorsList[] = "The Email Cant Be Less Than 4 Caracter";
            }



            // echo "id " . $UserID . " userName " . $userName . "pass " . $pass . "fullName " . $fullName . "email " . $email;
            if (count($errorsList) == 0) {
                try {


                    $stmt = $cnx->prepare("Update Users set UserName=?, Email=?, FullName=?, Password=? where UserID=?");
                    $row = $stmt->execute([$userName, $email, $fullName, $pass, $UserID]);
                    ?>
                    <div class="alert alert-success" role="alert">
                        <h2>The Profile Has Updated </h2>
                    </div> <?php


                } catch (PDOException $exp) {
                    ?>
                    <div class="alert alert-danger">
                        <h2><?= " Error on Modification" . $exp->getMessage(); ?> </h2>
                    </div> <?php
                }
            } else {
                echo '<ul class="alert alert-danger m-5 list-unstyled" role="alert"> <h2>Errors</h2>';

                foreach ($errorsList as $error) {
                    ?>
                    <li class="ps-4 mb-2"><?= $error ?> </li>
                    <?php
                }
                echo '</ul>';

                /*  header("location:?do=Edite&UserId=".$userId);
                  exit();*/

            }




        } else {
            ?>
            <div class="alert alert-danger">
                <h2> Vous N avez pas le Droit de Modifier !!!</h2>
            </div>
            <?php
        }


    }



    echo "</div>";//container

    include($temp . "footerAdmin.php");
}

