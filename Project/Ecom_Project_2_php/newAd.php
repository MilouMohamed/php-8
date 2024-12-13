<?php
// Project Start le  14-11-2024 

include "init.php";
$titlePage = "New Ad";



$categoresAll = getAlllItemsWhere("categories", "1", "1", "=", " ");
$membersAll = getAlllItemsWhere("users", "1", "1", "=", " ");
 

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Array ( [Name] => danon 1 [DescriptItem] => Bon Prodiot Of the Year 1 [Price] => $100 [Country] => China [Status] => 0 [CatID] => 0 ) 
    $errors = [];

    $name = filter_input(INPUT_POST, "Name", FILTER_SANITIZE_SPECIAL_CHARS);
    $desc = filter_input(INPUT_POST, "DescriptItem", FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, "Price", FILTER_SANITIZE_SPECIAL_CHARS);
    $country = filter_input(INPUT_POST, "Country", FILTER_SANITIZE_SPECIAL_CHARS);
    $tags = filter_input(INPUT_POST, "tags", FILTER_SANITIZE_SPECIAL_CHARS);
    $statu = filter_var($_POST["Status"], FILTER_SANITIZE_NUMBER_INT);
    $catId = filter_var($_POST["CatID"], FILTER_SANITIZE_NUMBER_INT);



    if (strlen($name) < 4) {
        $errors[] = "The Name Must Be At 4 Charas";
    }
    if (strlen($desc) < 10) {
        $errors[] = "The Description Must Be At 10 Charas";
    }
    if (empty($price)) {
        $errors[] = "The Price Can t  Be Empty";
    }
    if (empty($country)) {
        $errors[] = "The Country Can t  Be Empty";
    }
    if ($statu == 0) {
        $errors[] = "The Status Can t Be Empty";
    }
    if ($catId == 0) {
        $errors[] = "The Categorie Can t Be Empty";
    }

    if (empty($errors)) {
        // $_SESSION["client"] = ["userName" => $userName, "userId" => $etat->UserID];


        $qery = "INSERT INTO `items`( `Name`, `Description`, `Price`, `Add_Date`, `Country_Made` ,`tagsItem`, `Status`,     `Cat_ID`, `Member_ID`) VALUES (?,?,?,now(),?,?,?,?,?)";
        $stmnt = $cnx->prepare($qery);
        $stmnt->execute([$name, $desc, $price, $country,$tags, $statu, $catId, $_SESSION["client"]["userId"]]);


        if ($stmnt) {
            ?>
            <div class=" m-5 alert alert-success">
                This Item Has ben Added
            </div>
            <?php

        }
    }


}



?>
<div class="container">
    <h1 class="titre-page">Create New Ad</h1>

    <div class="card  mb-5">
        <div class="card-header  text-white bg-primary">
            <i class="fa-regular fa-pen-to-square"></i> New Ad
        </div>


        <div class="row p-2   mt-2 mb-1">

            <div class="col-md-8 live-input">
                <form class="form-group " action="<?= $_SERVER['PHP_SELF'] ?>" method="post">

                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="form-floating mb-3  ">
                            <input type="text" class="form-control ps-4" id="live-name" value="danon 1" name="Name"
                                placeholder="Name Of The Itame" required>
                            <label class="ps-4"><?= lang("NAME") ?>:</label>
                        </div>
                    </div>

                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="form-floating mb-3   ">
                            <textarea class="form-control ps-4 h-50" id="live-description" name="DescriptItem"
                                id="descripItem">Bon Prodiot Of the Year 1</textarea>
                            <label class="ps-4" for="descripItem"><?= lang("DESCRITPNIO") ?> : </label>
                        </div>
                    </div>

                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="form-floating mb-3  ">
                            <input type="text" value="$100" id="live-price" class="form-control ps-4" name="Price"
                                placeholder="Price MAD">
                            <label class="ps-4"><?= lang("PRICE") ?> : </label>
                        </div>
                    </div>

                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="form-floating mb-3  ">
                            <input type="text" value="China" class="form-control ps-4" name="Country"
                                placeholder="Contry Made">
                            <label class="ps-4"><?= lang("COUNTRY") ?> : </label>
                        </div>
                    </div>

                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="form-floating mb-3  ">
                            <input type="text" value="tag1 ,tag2,tag4" class="form-control ps-4" name="tags"
                                placeholder="Contry Made">
                            <label class="ps-4"><?= lang("TAGS") ?> : </label>
                        </div>
                    </div>

                    

                    <div class="row">

                        <div class="form-floating mb-3   col-md-6">
                            <select class="form-control" name="Status" id="statu">
                                <option value="0">...</option>
                                <option value="1">New</option>
                                <option value="2">Like New</option>
                                <option value="3">Used</option>
                                <option value="4">Old</option>
                            </select>
                            <label class="ps-4" for="statu"><?= lang("STATUS") ?> : </label>
                        </div>


                        <div class="form-floating mb-3 col-md-6 ">
                            <select class="form-control" name="CatID" id="catid">
                                <option value="0">...</option>
                                <?php
                                foreach ($categoresAll as $cat):
                                    if ($cat->ParentCat == 0) {
                                        echo "<option value='" . $cat->CatID . "'>" . $cat->NameCat . "</option>";
                                    } 
                                     
                                        foreach ($categoresAll as $c):
                                            if($cat->CatID == $c->ParentCat){ 
                                                echo "<option value='" . $c->CatID . "'>----" . $c->NameCat . "</option>";
                                            }

                                        endforeach;
                                    
                                endforeach;
                                ?>
                            </select>
                            <label class="ps-4" for="catid"><?= lang("CATEGORIES") ?> : </label>
                        </div>
                    </div>



                    <div class="row align-items-center justify-content-center ">
                        <div class="  text-center">
                            <input class="btn btn-primary btn-lg w-100  mb-1 " type="submit"
                                value="+<?= lang("ADD") ?>">
                        </div>
                    </div>

                </form>

            </div>



            <div class=" col-md-4 live-view">
                <div class="thumbnail box-item">
                    <div class="price-tag"> $100
                    </div>
                    <img src="./doc/user-picture.png" alt="No Image" class="img-fluid img-thumbnail" />
                    <h3 class="title p-1">Name </h3>
                    <p class="p-2">
                        Description
                    </p>
                </div>
            </div>

        </div>

        <?php if (isset($errors)) {
            foreach ($errors as $err): ?>
                <div class="alert alert-danger ms-5 me-5">
                    <?= $err ?>
                </div>
            <?php endforeach;
        } ?>

    </div>



</div>

<?php include($temp . "footerAdmin.php"); ?>