<?php

$titlePage = "Item Detail";

include "init.php";

if (!isset($_SESSION["client"])) {
    // header("location: index.php");
    // exit;
}


$itemId = isset($_GET["itemId"]) ? $_GET["itemId"] : 0;

$itemId = isset($_GET["itemId"]) ? $_GET["itemId"] : 0;
if (is_numeric($itemId)) {
    $itemId = intval($itemId); 

} 




echo '<div class="container">';

$item = getTablesJointur("i.* , c.NameCat   ,u.UserName from users u inner join  items i on  u.UserID = i.Member_ID inner join categories c  on i.Cat_ID = c.CatID  where i.ItemID=$itemId   AND  ApproveItm=1 ");

$item = reset($item);


/*
stdClass Object ( [ItemID] => 18 [Name] => Paineau [Description] => Descp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paine paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paineDescp paine [Price] => $100 [Add_Date] => 2024-12-05 [Country_Made] => Made In Moroci [Image] => no-img.jpg [Status] => New Product [ApproveItm] => 0 [Rating] => 0 [Cat_ID] => 10 [Member_ID] => 27 [NameCat] => Tools [UserName] => Yasssin ) 
*/
$tagsList=[];
if (!empty($item) &&  !empty(trim($item->tagsItem)) )  {
    $tagsList = explode(",", trim($item->tagsItem));

    print_r($tagsList);
}
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
                <div class="detai_item w-100 bg-white   p-3">

                    <div>
                        <h3 class="title p-1 fw-bold">
                            <i class="fa-solid fa-hospital-user"></i> Name : <?= $item->Name ?>
                        </h3>
                    </div>

                    <div>
                        <label class="fw-bold"> <i class="fa-solid fa-money-check"></i> Description :</label>
                        <p> <?= substr($item->Description, 0, 500) . " ..." ?>
                        </p>
                    </div>

                    <div class="fw-bold mb-2">
                        <label> <i class="fa-regular fa-money-bill-1"></i> Price : </label><?= $item->Price ?>
                    </div>

                    <div class="fw-bold mb-2">
                        <label> <i class="fa-regular fa-paper-plane"></i> Made In :</label> <?= $item->Country_Made ?>
                    </div>

                    <div class="fw-bold mb-2">
                        <label> <i class="fa-regular fa-star"></i> Categorie :</label> <a
                            href="categorie.php?pageId=<?= $item->Cat_ID ?>"> <?= $item->NameCat ?></a>
                    </div>

                    <div class=" fw-bold">
                        <label> <i class="fa-solid fa-user"></i> Added By :</label><a href="#proifle">
                            <?= $item->UserName ?></a>
                    </div>

                    <div class=" fw-bold">
                        <label> <i class="fa-solid fa-user"></i> <?= lang("TAGS") ?> :</label>

                        <?php   
                        if (empty($tagsList)) { ?>
                            <span class="text-center fw-bold  p-1">
                                <span class="text fw-bold m-1"><i class="fa-solid fa-server"></i> Non Tags ...</span>
                            </span>
                        <?php } else
                            foreach ($tagsList as $tag) {  ?> 
                                <a href="<?="tags.php?name=$tag"   ?>" class="btn btn-outline-dark btn-sm"><?= $tag ?> </a>
                            <?php } ?>
                    </div>

                    <div class=" text-end">
                        <label> <i class="fa-solid fa-calendar-days"></i> Added At :</label> <?= $item->Add_Date ?>
                    </div>
                </div>
            </div>

        </div>
        <hr />

        <div class="row mt-4  ">
            <div class=" col-md-9 ms-auto">
                <?php if (isset($_SESSION["client"])) { ?>
                    <div class="detaia-comment-add bg-white p-3">
                        <h3>Add Your Comment</h3>
                        <form class="form-group " action="<?= $_SERVER['PHP_SELF'] . '?itemId=' . $itemId ?>" method="post">
                            <textarea rows="4" class="form-control" name="comment" placeholder="Your Comment Here"></textarea>
                            <input class="btn btn-success mt-2" type="submit" name="add-com" value="Add Comment">

                        </form>

                        <?php if ($_SERVER['REQUEST_METHOD'] == "POST") {
                            if (isset($_POST["add-com"])) {
                                $txt = filter_input(INPUT_POST, "comment");

                                if (!empty($txt)) {

                                    $stmnt = $cnx->prepare("INSERT INTO `comments`(  `Cmnt_Txt`, `Cmnt_Stat`, `Cmnt_Date`, `Item_id_cmnt`, `User_id_cmnt`) VALUES (?,0,now(),?,?)");
                                    $stmnt->execute([$txt, $itemId, $_SESSION["client"]["userId"]]);


                                    if ($stmnt) {
                                        ?>
                                        <div class="alert alert-success">
                                            This Comment Is Added successfly
                                        </div>
                                        <?php
                                    }

                                }


                            } ?>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <h4><a href="login.php">Login </a> Or <a href="login.php"> Regester </a> For Add Comment</h4>

                <?php } ?>



            </div>
        <?php } else {
        ?>
            <div class="text-center fw-bold p-5">
                <h2 class="text fw-bold"><i class="fa-regular fa-file"></i> Non item Or Pending Approve</h2>
            </div>

            <?php
    }
    ?>
    </div>

    <hr class="mt-4 mb-4" />

    <?php
    $comntsItem = getTablesJointur(" c.*,u.UserName as member FROM `comments` c INNER JOIN users u on c.User_id_cmnt=u.UserID  WHERE c.Item_id_cmnt=$itemId   and  Cmnt_Stat=1  ORDER BY Cmnt_ID DESC");
    // SELECT c.*,u.UserName as member FROM `comments` c INNER JOIN users u on c.User_id_cmnt=u.UserID  WHERE c.Item_id_cmnt=? and c.User_id_cmnt=? 
    
    //  print_r($comntsItem);
    // echo "itemId $itemId";
    // echo "item->UserID $item->UserID";
    


    if (!empty($comntsItem)) {
        foreach ($comntsItem as $comt) { ?>
            <div class="row box-coment bg-white p-3  rounded-3">

                <div class="col-md-3 border-left-2-black">
                    <div class=" fw-bold text-center  ">
                        <img src="./doc/user-picture.png" alt="No Image"
                            class="d-block  border-3 mx-auto img-thumbnail rounded-circle" width="100px" />
                        <div>
                            <?= $comt->member ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 border-right-2-black ">
                    <p class="lead mt-4 p-1">
                        <?= $comt->Cmnt_Txt ?>
                    </p>
                </div>
            </div>
        <?php }
    } else {
        if (!empty($item)) { ?>
            <div class="text-center fw-bold p-5">
                <h2 class="text fw-bold"><i class="fa-regular fa-file"></i> Non Comments</h2>
            </div>
        <?php }
    } ?>
</div>

<?php


echo "<br/>";

echo "</div>";//container

include($temp . "footerAdmin.php");

// ob_end_flush();









