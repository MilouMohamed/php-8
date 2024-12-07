<?php

$titlePage = "Item Detail";

include "init.php";

if (!isset($_SESSION["client"])) {
    header("location: index.php");
    exit;
} else {


    $itemId = isset($_GET["itemId"]) ? $_GET["itemId"] : 0;

    $itemId = isset($_GET["itemId"]) ? $_GET["itemId"] : 0;
    if (is_numeric($itemId)) {
        $itemId = intval($itemId);
        // echo "  ID Item =";
        // echo $itemId; 

    }




    echo '<div class="container">';



    $item = getTablesJointur("i.* , c.NameCat   ,u.UserName from users u inner join  items i on  u.UserID = i.Member_ID inner join categories c  on i.Cat_ID = c.CatID  and i.ItemID=$itemId");
    $item = reset( $item);


    /*
    stdClass Object ( [ItemID] => 18 [Name] => Paineau [Description] => Descp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paine paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paine [Price] => $100 [Add_Date] => 2024-12-05 [Country_Made] => Made In Moroci [Image] => no-img.jpg [Status] => New Product [ApproveItm] => 0 [Rating] => 0 [Cat_ID] => 10 [Member_ID] => 27 [NameCat] => Tools [UserName] => Yasssin ) 
    */
    // print_r($item);
    // echo "----------------";
    ?>
    <div class="manage ">
        
        <?php
        if (!empty($item)) { ?>
            <h1 class="titre-page"><?= $item->Name ?> </h1>

            <div class="row g-4  mb-4">
                <div class="col-md-3 text-center">
                    <img src="./doc/user-picture.png" alt="No Image" class=" img-thumbnail w-100" />
                </div>

                <div class="col-md-9 ">
                    <div class=" w-100 bg-white   p-3">
 
                        <h3 class="title p-1 fw-bold">
                            Name : <?= $item->Name ?>
                        </h3>

                        <p class="pt-2 p-0 mb-2">
                       <span class="fw-bold">  Description :</span>     <?= substr($item->Description, 0, 50) . "..." ?>
                        </p>
                        <div class="fw-bold mb-2">
                            Price : <?= $item->Price ?>
                        </div>

                        <div class="fw-bold mb-2">
                            Made In : <?= $item->Country_Made ?>
                        </div>

                        <div class="fw-bold mb-2">
                            Categorie : <?= $item->NameCat ?>
                        </div>
                        <div class=" fw-bold text-end">
                            Added By : <?= $item->UserName ?>
                        </div>
                        <div class=" text-end">
                            Added At : <?= $item->Add_Date ?>
                        </div>
                    </div>
                </div>

            </div>
 


        <?php } else {
            ?>
            <div class="text-center fw-bold p-5">
                <h2 class="text fw-bold"><i class="fa-regular fa-file"></i> Non item</h2>
            </div>

            <?php
        }
        ?>

    </div>

    <?php




    echo "</div>";//container

    include($temp . "footerAdmin.php");
}

// ob_end_flush();









