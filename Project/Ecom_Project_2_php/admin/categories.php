<?php
ob_start();

session_start();

if (!isset($_SESSION["UserName"])) {
    header("location: index.php");
    exit;
} else {

    $titlePage = "Categories";
    include "init.php";

    $action = isset($_GET["do"]) ? $_GET["do"] : "Manage";



    echo '<div class="container">';
    if ($action == "Manage") {
        echo "is Page Categories  name = " . $_SESSION["UserName"] . "<br>";

    } elseif ($action == "Insert") {
        echo "Page Insert<br>";

    } elseif ($action == "Add") {
        ?>

        <h1 class="titre-page"><?= lang("TITRE_CATEGORIES_ADD") ?> </h1>
        <form class="form-group " action="?do=Insert" method="post">

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8 ">
                    <input type="text" class="form-control ps-4" name="name" placeholder="Name Of The Categorie" required>
                    <label class="ps-4"><?= lang("NAME") ?>:</label>
                </div>
            </div>

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8  ">
                    <input type="text" class="form-control ps-4" name="descriptCat" placeholder="Desciption Of The Categorie ">
                    <label class="ps-4" for="pass-new-new"><?= lang("DESCRITPNIO") ?> : </label>
                </div>
            </div>

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8 ">
                    <input type="text" class="form-control ps-4" name="ordring" placeholder="Ordre Of Categorie">
                    <label class="ps-4"><?= lang("ORDRING") ?> : </label>
                </div>
            </div>

            <div class="row g-3  ">
                <div
                    class=" form-control bg-light  mb-3  col-md-6  col-lg-6 mx-auto  w-50  align-items-center justify-content-center">
                    <div class=" m-1  d-flex align-items-center  "> 
                        <label class="pe-5 fw-bold col-form-label "><?= lang("VISIBILTY") ?> : </label> 
                        <input type="radio" name="visibile" id="vis-yes"  checked/>
                        <label class="pe-4 ps-1" for="vis-yes"><?= lang("YES") ?></label>
                        <div class="ms-4 me-4">|||</div>
                        <input type="radio" name="visibile" id="vis-non" />
                        <label class="pe-4  ps-1" for="vis-non"><?= lang("NO") ?></label>

                    </div>
                </div>
            </div>
            <div class="row g-3  ">
                <div
                    class=" form-control bg-light  mb-3  col-md-6  col-lg-6 mx-auto  w-50  align-items-center justify-content-center">
                    <div class=" m-1  d-flex align-items-center  "> 
                        <label class="pe-5 fw-bold col-form-label "><?= lang("ALLOW_CMNT") ?> : </label> 
                        <input type="radio" name="comment" id="cmnt-yes" checked />
                        <label class="pe-4 ps-1" for="cmnt-yes"><?= lang("YES") ?></label>
                        <div class="ms-4 me-4">|||</div>
                        <input type="radio" name="comment" id="cmnt-non" />
                        <label class="pe-4  ps-1" for="cmnt-non"><?= lang("NO") ?></label>

                    </div>
                </div>
            </div>
            <div class="row g-3  ">
                <div
                    class=" form-control bg-light  mb-3  col-md-6  col-lg-6 mx-auto  w-50  align-items-center justify-content-center">
                    <div class=" m-1  d-flex align-items-center  "> 
                        <label class="pe-5 fw-bold col-form-label "><?= lang("ALLOW_ADS") ?> : </label> 
                        <input type="radio" name="ads" id="ads-yes" checked />
                        <label class="pe-4 ps-1" for="ads-yes"><?= lang("YES") ?></label>
                        <div class="ms-4 me-4">|||</div>
                        <input type="radio" name="ads" id="ads-non" />
                        <label class="pe-4  ps-1" for="ads-non"><?= lang("NO") ?></label>

                    </div>
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
        echo "Edit ";

    } elseif ($action == "Update") {
        echo "Update ";

    } elseif ($action == "Delete") {
        echo "Delete ";

    } elseif ($action == "Active") {
        echo "Active ";
    } else {


        echo " <br><br>";
        redirectToHome(" Probleme Dans L URL !!!", 3, "alert-danger", "categories.php");


    }



    echo "</div>";//container

    include($temp . "footerAdmin.php");
}
ob_end_flush();

