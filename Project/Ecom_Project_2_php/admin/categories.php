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
        $titlePage = "Page Manage Categories";
        global  $sort;
        $sort = "ASC";
        $itemSort = array("DESC", "ASC");
        if (isset($_GET["Sort"]) && in_array($_GET["Sort"], $itemSort)) {
          $sort = $_GET["Sort"];
        }
        


        $categoresAll = getAlllItemsWhere("categories", "1", "1", "=", " Order by OrderCat  $sort ");
        
        ?>
        <div class="container categores-manage mb-5 mt-5">
            <div class="card border-info mb-3  " style1="max-width: 18rem;">
                <div class="card-header d-flex justify-content-between">
                    <span>List Of Categores</span>
                    <span class="try-by   ">
                        Ordering :
                        <a class="<?= ($sort=="DESC") ? "text-primary":  "text-black";  ?>" href="?Sort=DESC">DESC</a> |
                        
                        <a class="<?=  ($sort =="ASC")? "text-primary":  "text-black";   ?>" href="?Sort=ASC">ASC</a> 


                    </span>
                </div>
                <?php foreach ($categoresAll as $cat): ?>
                    <div class="card-body position-relative border-info  border pt-0 pb-0">

                        <h5 class="card-title "><?= strtoupper($cat->NameCat) ?></h5>
                        <p class="card-text"><?= $cat->DescripCat ?></p>

                        <div class="  position-absolute    btns-hidden ">
                            <a class="btn btn-outline-primary  " href=""><i class="fa  fa-edit"></i> Edite</a>
                            <a class="btn btn-outline-danger " href=""><i class="fa fa-close"></i> Dellet</a>
                        </div>

                        <div class="  position-absolute    bg-transparent  div-date "><?= $cat->Create_At ?></div>

                        <div class="settings-cart">
                            <?php if ($cat->VisibiltyCat == 1) { ?>
                                <span class=" bg-info"> Hidden</span><?php } ?>
                            <?php if ($cat->AllowCmntCat == 1) { ?>
                                <span class=" bg-danger"> Comment Disabled</span><?php } ?>
                            <?php if ($cat->AllowAdsCAt == 1) { ?>
                                <span class=" bg-warning"> Ads Disabled</span><?php } ?>


                        </div>

                        <hr class="p-0 pb-3  m-0 mt-2" />
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
        <?php
        echo "Add Cetegore <a href='?do=Add'>Add<a>";





    } elseif ($action == "Insert") {

        $titlePage = "Page Insert Categorie";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $name = $_POST["name"];
            $desc = $_POST["descriptCat"];
            $ordring = $_POST["ordring"];
            $visible = $_POST["visibile"];
            $comment = $_POST["comment"];
            $ads = $_POST["ads"];

            if (empty($name) or strlen($name) < 4) {
                redirectToHome(" Name Is Empty Or less thans 4 Caracters  !!!", type: "alert-danger mt-5", url: "categories.php?do=Add");
            } elseif (checkItem("*", "NameCat", "categories", $name) > 0) {
                redirectToHome("This Categore ($name) Is Existed   !!!", type: "alert-danger mt-5", url: "categories.php?do=Add");

            } else {
                $stms2 = $cnx->prepare("INSERT INTO `categories`( `NameCat`, `DescripCat`, `OrderCat`, `VisibiltyCat`, `AllowCmntCat`, `AllowAdsCAt`) VALUES (?,?,?,?,?,?)");

                $stms2->execute([$name, $desc, $ordring, $visible, $comment, $ads]);
                redirectToHome("The Categorie $name Is Aded", 4, "alert-success mt-5", url: "categories.php");


            }




        } else {
            redirectToHome("Error You Cant Add Categore From This URL", 4, "alert-danger  mt-5", url: "categories.php?do=Add");

        }


    } elseif ($action == "Add") {
        ?>

        <h1 class="titre-page"><?= lang("TITRE_CATEGORIES_ADD") ?> </h1>
        <form class="form-group " action="?do=Insert" method="post">

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8 ">
                    <input type="text" class="form-control ps-4" value="viecul 1" name="name"
                        placeholder="Name Of The Categorie" required>
                    <label class="ps-4"><?= lang("NAME") ?>:</label>
                </div>
            </div>

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8  ">
                    <input type="text" class="form-control ps-4" value="Decsription 1" name="descriptCat"
                        placeholder="Desciption Of The Categorie ">
                    <label class="ps-4" for="pass-new-new"><?= lang("DESCRITPNIO") ?> : </label>
                </div>
            </div>

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8 ">
                    <input type="number" value="100" aria-valuemin="10" min="0" class="form-control ps-4" name="ordring"
                        placeholder="Ordre Of Categorie">
                    <label class="ps-4"><?= lang("ORDRING") ?> : </label>
                </div>
            </div>

            <div class="row g-3  ">
                <div
                    class=" form-control bg-light  mb-3  col-md-6  col-lg-6 mx-auto  w-50  align-items-center justify-content-center">
                    <div class=" m-1  d-flex align-items-center  ">
                        <label class="pe-5 fw-bold col-form-label "><?= lang("VISIBILTY") ?> : </label>
                        <input type="radio" name="visibile" id="vis-yes" value="1" checked />
                        <label class="pe-4 ps-1" for="vis-yes"><?= lang("YES") ?></label>
                        <div class="ms-4 me-4">|||</div>
                        <input type="radio" name="visibile" id="vis-non" value="0" />
                        <label class="pe-4  ps-1" for="vis-non"><?= lang("NO") ?></label>

                    </div>
                </div>
            </div>
            <div class="row g-3  ">
                <div
                    class=" form-control bg-light  mb-3  col-md-6  col-lg-6 mx-auto  w-50  align-items-center justify-content-center">
                    <div class=" m-1  d-flex align-items-center  ">
                        <label class="pe-5 fw-bold col-form-label "><?= lang("ALLOW_CMNT") ?> : </label>
                        <input type="radio" name="comment" value="1" id="cmnt-yes" checked />
                        <label class="pe-4 ps-1" for="cmnt-yes"><?= lang("YES") ?></label>
                        <div class="ms-4 me-4">|||</div>
                        <input type="radio" name="comment" value="0" id="cmnt-non" />
                        <label class="pe-4  ps-1" for="cmnt-non"><?= lang("NO") ?></label>

                    </div>
                </div>
            </div>
            <div class="row g-3  ">
                <div
                    class=" form-control bg-light  mb-3  col-md-6  col-lg-6 mx-auto  w-50  align-items-center justify-content-center">
                    <div class=" m-1  d-flex align-items-center  ">
                        <label class="pe-5 fw-bold col-form-label "><?= lang("ALLOW_ADS") ?> : </label>
                        <input type="radio" name="ads" value="1" id="ads-yes" checked />
                        <label class="pe-4 ps-1" for="ads-yes"><?= lang("YES") ?></label>
                        <div class="ms-4 me-4">|||</div>
                        <input type="radio" name="ads" value="0" id="ads-non" />
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

