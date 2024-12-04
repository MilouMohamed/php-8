<?php
$titlePage = "Login/Signup";

include "init.php";
if(!empty( $_SESSION["client"]) and  $_SESSION["client"]){
      header("location:index.php");
   exit;
}

// $password = $userName = "8888";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $userName = filter_var(isset($_POST["name"]) ? $_POST["name"] : null, FILTER_SANITIZE_STRING);
    $password = filter_var(isset($_POST["password"]) ? $_POST["password"] : null, FILTER_SANITIZE_STRING);
    $password = sha1($password);

   

    $etat = getAlllItemsWhere("users ", "UserName", $userName, "=", " and Password = '$password' ");
    


    if ($etat) {
        $_SESSION["client"] = ["userName" => $userName, "noId" => 10000];
         header("location:index.php");
        exit;
    }
    
    
    
}

$password1 = $userName1 = "00005";


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
        <button type="submit" class="btn btn-success w-100">Login</button>
    </form>

    <form id="SIGNUP" class="d-none">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Name</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" name="name"
                aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Password</span>
            <input type="text" class="form-control" placeholder="password" aria-label="password" name="password"
                aria-describedby="basic-addon1">
        </div>


        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon2">Psw Conf</span>
            <input type="text" class="form-control" placeholder="password Conferm" aria-label="password"
                name="passwordConfer" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Email" aria-label="email"
                aria-describedby="basic-addon2" name="email" value="- -@123.com">
            <span class="input-group-text" id="basic-addon2">@example.com</span>
        </div>





        <!-- Bouton de soumission -->
        <button type="submit" class="btn btn-primary w-100">Signup</button>
    </form>


    
    <?php  //login
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (empty($etat) || is_null($etat)) { ?>
            <div class="alert alert-danger m-5">
                Error UserName Or Password
            </div>
        <?php }
    } ?>
</div>




<?php include($temp . "footerAdmin.php"); ?>