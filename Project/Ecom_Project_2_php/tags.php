<?php
// Project Start le  14-11-2024 

include "init.php";
$titlePage = "Categories";


if(isset($_GET["name"])){

$tag_item =    $_GET["name"]  ; 


$itemsOfTag = getAlllItemsWhere("items", "tagsItem", '%' . $tag_item . '%', " like ", " and ApproveItm=1 ");
  

?>
<div class="container">
    <h1 class="titre-page">Tag Name : <?= $tag_item    ?> </h1>

    <div class="row">

        <?php
        if (empty($itemsOfTag)) {
            echo "<div class='text-center alert alert-danger'> No Items Or pending Approve 🤗🤗🤗</div>";

        } else {

            foreach ($itemsOfTag as $item): ?>

                <div class="col-sm-4 col-md-3 mb-1 mt-1">
                    <div class="thumbnail box-item">
                        <div class="price-tag">
                            <?= $item->Price ?>
                        </div>
                        <img src="./doc/user-picture.png" alt="No Image" class="img-fluid img-thumbnail" />
                        <h4 class="title p-1 "><a href="itemDetail.php?itemId=<?= $item->ItemID ?>"> <?= $item->Name ?> </a>
                        </h4>
                        <p class="p-2 pb-0">
                            <?= $item->Description ?>
                        </p>
                        <div class="date text-end">
                            <?= $item->Add_Date ?>
                        </div>
                    </div>
                </div>

                <!-- <Double > -->
                <div class="col-sm-4 col-md-3 mb-1 mt-1">
                    <div class="thumbnail box-item">
                        <div class="price-tag">
                            <?= $item->Price ?>
                        </div>
                        <img src="./doc/user-picture.png" alt="No Image" class="img-fluid img-thumbnail" />
                        <h4 class="title p-1"><a href="itemDetail.php?itemId=<?= $item->ItemID ?>"> <?= $item->Name ?> </a></h4>
                        <p class="p-2">
                            <?= $item->Description ?>
                        </p>
                        <div class="date text-end">
                        <?= $item->Add_Date ?>
                        </div>
                    </div>
                </div>
                <!-- Double -->



            <?php endforeach;
        } ?>
    </div>




</div>

<?php 
}else{

    echo "<br/><br/><br/><div class='text-center alert alert-danger  m-5'> No Items Or pending Approve 🤗🤗🤗</div><br/><br/>";
}

include($temp . "footerAdmin.php"); ?>