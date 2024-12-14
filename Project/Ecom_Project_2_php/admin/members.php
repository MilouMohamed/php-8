<?php
ob_start();

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


        if (isset($_GET["Panding"]) and $_GET["Panding"] = "YES") {
            $items = getAllUsers(" and RegStatus = 0 ");
        } else {
            $items = getAllUsers();
        }
        // print_r($items);
        ?>
        <div class="manage table-responsive">
            <h1 class="titre-page"><?= lang("TITRE_MEMBERS_ITEMS") ?> </h1>

            <table class="table  table-bordered text-center">

                <tr>
                    <td>#ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Full Name</td>
                    <td>Register Date</td>
                    <td>Controle</td>
                </tr>
                <?php if (count($items) > 0) {
                    foreach ($items as $item) {
                        $img=" <img src='./Upload/Avatar/".$item->Avatar."' >";
                        if( empty($item->Avatar)){
                            $img=" <img src='./Upload/Avatar/no_img.JPG' >";
                        } ?>
                       
                        <tr>
                            <td class="fw-bold"> <?= $item->UserID ?></td>
                            <td>   <?= $img." ". $item->UserName ?></td>
                            <td><?= $item->Email ?></td>
                            <td><?= $item->FullName ?></td>
                            <td><?= date_format(date_create($item->CreateAt), "Y-m-d") ?></td>
                            <td>
                                <!-- ?do=Edit&UserId=".$userId -->
                                <a href="?do=Edit&UserId=<?= $item->UserID ?>" class="btn btn-success"><i
                                        class="fa-solid fa-user-pen"></i> Edite</a>
                                <a href="?do=Delete&UserId=<?= $item->UserID ?>"
                                    onclick="return confirm('Vous Voullez Supprimer <?= $item->FullName ?> ???')"
                                    class="btn btn-danger"><i class="fa-solid fa-user-xmark"></i> Delete</a>
                                <?php if ($item->RegStatus == 0): ?>
                                    <a href="?do=Active&UserId=<?= $item->UserID ?>" class="btn btn-info"><i class="fa-solid fa-key"></i>
                                        Activate</a>
                                <?php endif; ?>
                            </td>
                        </tr>

                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="6" class="text-center fw-bold p-5">
                            <h2 class="text fw-bold"><i class="fa-regular fa-file"></i> Non Items</h2>
                        </td>
                    </tr>
                <?php } ?>



            </table>
        </div>

        <a href='?do=Add' class="btn btn-primary"><i class="fa-solid fa-user-plus"></i> New Member </a>

        <?php


    } elseif ($action == "Insert") {
        // echo "Page Insert<br>";
        /* */
        if ($_SERVER['REQUEST_METHOD'] === "POST") {

 
                $img = $_FILES["image"]; 


            $nameImg = $img["name"];
            $pathImg = $img["full_path"];
            $nameTmpImg = $img["tmp_name"];
            $typeImg = $img["type"];
            $errorImg = $img["error"];
            $sizeImg = $img["size"];

            $listExtenImg = ["jpg", "png", "jpeg", "gif"];

            $typeImg = explode("/", strtolower($typeImg));
            $typeImg = end($typeImg);


            $userName = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
            $fullName = filter_var($_POST["full"], FILTER_SANITIZE_STRING);
            $email = $_POST["email"];

            $pass = htmlspecialchars($_POST["new_pass"]);
            $pass_hash = sha1(htmlspecialchars($_POST["new_pass"]));

            // echo "<br>|| userName " . $userName . "|| pass " . $pass . " ||fullName " . $fullName . " ||email " . $email;


            $errorsList = array();


            if (isExistName($userName)) {
                $errorsList[] = "The Name Is EXiste ";
            }
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
            if (!empty($nameImg) && !in_array($typeImg, $listExtenImg)) {
                $errorsList[] = "The Extention Is Not  Image";
            }
            if (empty($nameImg)) {
                $errorsList[] = "The Image Cant Be Empty";
            }
            if ($sizeImg >   4_194_304 ) {
                // 4Mo×1048576=4194304o
                $errorsList[] = "The Image Size  Cant Be > 4MB ";
            }
            if ($errorImg != 0 ) { 
                $errorsList[] = "The Image  Has Error ";
            }



            if (count($errorsList) == 0) {
                try {

                    $nameImg=rand(100,1000000000)."_$nameImg"; 
 

                       move_uploaded_file($nameTmpImg,"./Upload/Avatar/$nameImg");
                  
                    

                    $stmt = $cnx->prepare("INSERT INTO `users`(`UserName`, `Email`, `FullName`, `Password`,RegStatus,`Avatar`) VALUES (?, ?, ?, ?,1,?)");
                    $row = $stmt->execute([$userName, $email, $fullName, $pass_hash,$nameImg]);


                    redirectToHome("The Profile Has Added", 4, "alert-success", "?do=Manage");
  

                } catch (PDOException $exp) {

                    redirectToHome(" Error on Aded = " . $exp->getMessage(), 4);
                }
            } else {
                 
                $errorMsg = "<strong> Error</strong> <hr>" . implode("<br>", $errorsList);
                redirectToHome($errorMsg, 6, "alert-danger", "?do=Add");
 
            }




        } else {
            redirectToHome(" Vous N avez pas le Droit de Modifier !!!", 4);

            
        }


    } elseif ($action == "Add") {

        ?>

        <h1 class="titre-page"><?= lang("TITRE_MEMBERS_ADD") ?> </h1>
        <form class="form-group " action="?do=Insert" method="post" enctype="multipart/form-data">

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
                    <input type="text" class="form-control ps-4" name="full" id="email-new" placeholder="Full name"
                        value="<?php $_POST["full"] ?? "" ?>" required>
                    <label class="ps-4" for="email-new"><?= lang("FULLE_NAME") ?></label>
                </div>
            </div>
 
             

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-1 col-lg-8 ">
                    <input type="file" accept1=".png, .jpg, .jpeg, .gif" class="form-control ps-4 mb-3" name="image"
                        placeholder="Upload Image">
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

                <h1 class="titre-page"><?= lang("TITRE_MEMBERS") ?> </h1>
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

            } else {

                redirectToHome(lang("NO_PROFILE_ID") . " Dans DB ", 3);

                // ? >
                // <div class="alert alert-danger">
                // <h2>< ?= lang("NO_PROFILE_ID") ? > Dans DB </h2>
                // </div>
                // < ? php
            }

        } else {

            redirectToHome(lang("NO_PROFILE_ID") . "  Dans Url ", 3);

            //     ? >
            //     <div class="alert alert-danger">
            //         <h2><?= lang("NO_PROFILE_ID") ? > Dans Url </h2>
            //     </div>
            // < ? php 
        }
    } elseif ($action == "Update") {

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            echo "<h1>" . lang("TITRE_MEMBERS_UPDATE") . " </h1>";

            $UserID = $_POST["userId"];
            $userName = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
            $fullName = filter_var($_POST["full"], FILTER_SANITIZE_STRING);
            $email = $_POST["email"];



            $pass = (empty($_POST["new_pass"])) ? $_POST["old_pass"] : sha1($_POST["new_pass"]);

            $errorsList = array();

            if (isExistName($userName, $UserID, "!=")) {
                $errorsList[] = "The Name Existe In db";
            }
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

                    redirectToHome("The Profile Has Updated", 3, "alert-success", "?do=Edit&UserId=" . $UserID);

                    // ? >
                    // <div class="alert alert-success" role="alert">
                    //     <h2>The Profile Has Updated </h2>
                    // </div> < ? php


                } catch (PDOException $exp) {

                    redirectToHome(" Error on Modification" . $exp->getMessage(), 3);

                    // ? >
                    // <div class="alert alert-danger">
                    //     <h2><?= " Error on Modification" . $exp->getMessage(); ? > </h2>
                    // </div> < ?php
                }
            } else {
                echo '<ul class="alert alert-danger m-5 list-unstyled" role="alert"> <h2>Errors</h2>';

                foreach ($errorsList as $error) {
                    ?>
                    <li class="ps-4 mb-2"><?= $error ?> </li>
                    <?php
                }
                echo '</ul>';


            }




        } else {

            redirectToHome("Vous N avez pas le Droit de Modifier !!!", 3);

            // ? >
            // <div class="alert alert-danger">
            //     <h2> Vous N avez pas le Droit de Modifier !!!</h2>
            // </div>
            // < ?php
        }


    } elseif ($action == "Delete") {

        echo '  <h1 class="titre-page" >' . lang("TITRE_MEMBERS_DELETE") . ' </h1>';

        // echo "Page Edite ID = ". $_GET["UserId"] ;
        $userId = (isset($_GET["UserId"]) and intval($_GET["UserId"])) ? intval($_GET["UserId"]) : 0;


        if ($userId != 0 and isExistId($userId)) {

            $stmt = $cnx->prepare("delete   from users where UserID=?");
            $stmt->execute([$userId]);

            echo " <br><br>";
            redirectToHome("  The User Is Deleted", 4, "alert-success");

            // ? >
            // <!-- <br><br> --> 
            // <!-- <div class="alert alert-success text-center">
            //     The User Is Deleted
            // </div> -->
            // < ?php

        } else {


            echo " <br><br>";
            redirectToHome("  This ID Is Not Existed !!!", 4, "alert-danger");

            // ? >
            // <br><br>
            // <div class="alert alert-warning text-center">
            //     This ID Is Not Existed !!!
            // </div>
            // < ?php
        }
    } elseif ($action == "Active") {

        $userId = (isset($_GET["UserId"]) and intval($_GET["UserId"])) ? intval($_GET["UserId"]) : 0;


        if ($userId != 0 and isExistId($userId)) {

            $stmt = $cnx->prepare("Update users set RegStatus=1  where UserID=?");
            $stmt->execute([$userId]);

            echo " <br><br>";
            redirectToHome("  The User Is Activated ", 4, "alert-success");


        } else {

            echo " <br><br>";
            redirectToHome("  This ID Is Not Existed !!!", 4, "alert-danger");

        }
    } else {


        echo " <br><br>";
        redirectToHome(" Probleme Dans L URL !!!", 3);


    }



    echo "</div>";//container

    include($temp . "footerAdmin.php");
}
ob_end_flush();

