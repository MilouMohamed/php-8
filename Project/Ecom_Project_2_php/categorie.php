<?php
// Project Start le  14-11-2024 

include "init.php";
$titlePage = "Categories";

$id_cat = isset($_GET["pageId"]) ? $_GET["pageId"] : "0";
// $name_cat = isset($_GET["pageName"]) ? $_GET["pageName"] : "";


$itemsOfCat = getAlllItemsWhere("items", "Cat_ID", $id_cat, "=", " and ApproveItm =1");
//    print_r($itemsOfCat);
 
// $name_cat = str_replace("-", " ", $name_cat);
$name_cat = getAlllItemsWhere("categories", "CatID", $id_cat, "=", "");
;
$name_cat=reset($name_cat)->NameCat;

// print_r($name_cat); 

?>
<div class="container">
    <h1 class="titre-page"><?= $name_cat . " id=" . $id_cat ?> </h1>

    <div class="row">

        <?php foreach ($itemsOfCat as $item): ?>

            <div class="col-sm-6 col-md-3 mb-1 mt-1">
                <div class="thumbnail box-item">
                    <div class="price-tag">
                    <?= $item->Price ?>
                    </div>
                    <img src="./doc/user-picture.png" alt="No Image" class="img-fluid img-thumbnail" />
                    <h3 class="title p-1"><a href="itemDetail.php?itemId=<?= $item->ItemID ?>"> <?= $item->Name ?> </a></h3>
                    <p class="p-2">
                        <?= $item->Description ?>
                    </p> 
                </div> 
            </div>

            <!-- Delete  -->
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail box-item">
                    <div class="price-tag">
                    <?= $item->Price ?>
                    </div>
                    <img src="./doc/user-picture.png" alt="No Image" class="img-fluid img-thumbnail" />
                    <h3 class="title p-1"><?= $item->Name ?></h3>
                    <p class="p-2">
                        <?= $item->Description ?>
                    </p> 
                </div> 
            </div>
            <!-- Delete  -->


        <?php endforeach; ?>  
    </div>




</div>

<?php include($temp . "footerAdmin.php"); ?>