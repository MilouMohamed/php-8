<?php

session_start();

if (!isset($_SESSION["UserName"])) {
    header("location: index.php");
    exit;
} else {

    $titlePage = "Items";
    include "init.php";

    $action = isset($_GET["do"]) ? $_GET["do"] : "Manage";




    echo '<div class="container">';
    if ($action == "Manage") {


        $titlePage = "Page Manage Items";

        // // $items = getAlllItemsWhere("items","1","1","=","");
        // $items = getAlllItemsWhere("items", "1", "1", "=", " ORDER BY ItemID DESC");
        $items = getTablesJointur("i.* , c.NameCat   ,u.UserName from users u inner join  items i on  u.UserID = i.Member_ID inner join categories c  on i.Cat_ID = c.CatID   ORDER BY ItemID DESC");



        /*  print_r($items);
        
         Array ( [0] => stdClass Object ( [ItemID] => 7 [Name] => danon 1 [Description] => Bon Prodiot Of the Year 1 [Price] => $100 [Add_Date] => 2024-11-29 [Country_Made] => China [Image] => no-img.jpg [Status] => 2 [Rating] => 0 [Cat_ID] => 2 [Member_ID] => 25 ) ) 
         */
        ?>
        <div class="manage table-responsive">
            <h1 class="titre-page"><?= lang("TITRE_ITEMS_ITEMS") ?> </h1>

            <table class="table table-bordered text-center">

                <tr>
                    <td>#ID</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Price</td>
                    <td>Register Date</td>
                    <td>User Name</td>
                    <td>Categoire</td>
                    <td>Control</td>
                </tr>
                <?php if (count($items) > 0) {
                    foreach ($items as $item) { ?>
                        <tr>
                            <td class="fw-bold"> <?= $item->ItemID ?></td>
                            <td><?= $item->Name ?></td>
                            <td><?= substr(trim($item->Description), 0, 60) . "..." ?></td>
                            <td><?= $item->Price ?></td>
                            <td><?= date_format(date_create($item->Add_Date), "Y-m-d") ?></td>

                            <td><?= $item->UserName ?></td>
                            <td><?= $item->NameCat ?></td>
                            <td>
                                <a href="?do=Edit&itemID=<?= $item->ItemID ?>" class="btn btn-success">
                                    <i class="fa-solid fa-user-pen"></i> Edite</a>
                                <a href="?do=Delete&itemID=<?= $item->ItemID ?>" class="btn btn-danger confirm"><i
                                        class="fa-solid fa-user-xmark"></i> Delete</a>
<?php  if($item->ApproveItm == 0) : ?>
    <a href="?do=Approve&itemID=<?= $item->ItemID ?>" class="btn btn-info "><i
    class="fa fa-check"></i> Approve</a>
    <?php  endif; ?>
                            </td>
                        </tr>

                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="8" class="text-center fw-bold p-5">
                            <h2 class="text fw-bold"><i class="fa-regular fa-file"></i> Non Items</h2>
                        </td>
                    </tr>
                <?php } ?>



            </table>
        </div>

        <a href='?do=Add' class="btn btn-primary mb-5">
            <i class="fa-solid fa-user-plus"></i> New Items </a>
        <?php




    } elseif ($action == "Insert") {

        $titlePage = "Page Insert Categorie";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $nameItm = htmlspecialchars($_POST["Name"]);
            $descItm = filter_var($_POST["DescriptItem"], FILTER_SANITIZE_STRING);
            $priceItm = $_POST["Price"];
            $countryItm = filter_var($_POST["Country"], FILTER_SANITIZE_STRING);
            $statusItm = $_POST["Status"];
            $tagsItem = $_POST["tagsItem"];
            // $member_ID = $_SESSION["UserName"];
            // print_r($_SESSION);
            $member_ID = $_POST["MemberID"];
            $cat_ID = $_POST["CatID"];

            $errorsInput = array();


            if (empty($nameItm) or strlen($nameItm) < 4) {
                $errorsInput[] = " Name Is Empty Or less thans 4 Caracters  !!!";
            }
            if (empty($descItm)) {
                $errorsInput[] = " Description Is Empty   !!!";
            }
            if (empty($priceItm)) {
                $errorsInput[] = " Price Is Empty   !!!";
            }
            if (empty($countryItm)) {
                $errorsInput[] = " Country Made Is Empty   !!!";
            }
            if ($statusItm == 0) {
                $errorsInput[] = " Statut  Is Empty   !!!";
            }
            if ($member_ID == 0) {
                $errorsInput[] = " Member Name  Is Empty   !!!";
            }
            if ($cat_ID == 0) {
                $errorsInput[] = " Categorie Name   Is Empty   !!!";
            }

            if (empty($errorsInput)) {

                /*
`items` SET `ItemID`='[value-1]',`Name`='[value-2]',`Description`='[value-3]',`Price`='[value-4]',`Add_Date`='[value-5]',`Country_Made`='[value-6]',`Image`='[value-7]',`Status`='[value-8]',`Rating`='[value-9]',`Cat_ID`='[value-10]',`Member_ID`='[value-11]'
                */

                if (checkItem( "Name", "items", $nameItm) > 0) {
                    redirectToHome("This Categore ($nameItm) Is Existed   !!!", type: "alert-danger mt-5", url: "items.php?do=Add");

                } else {
                    $stms2 = $cnx->prepare("INSERT INTO `items`( `Name`, `Description`, `Price`, `Country_Made`, `tagsItem`,`Status`,`Member_ID`,`Cat_ID` ) VALUES (?,?,?,?,?,?,?,?)");

                    $stms2->execute([$nameItm, $descItm, $priceItm, $countryItm ,$tagsItem,$statusItm, $member_ID, $cat_ID]);

                    redirectToHome("The Categorie $nameItm Is Aded", 4, "alert-success mt-5", url: "items.php");


                }

            } else {
                echo "<br><br>";
                foreach ($errorsInput as $error) {
                    ?>
                    <div class="alert alert-danger">
                        <?= $error ?>
                    </div>
                    <?php
                }

            }




        } else {
            redirectToHome("Error You Cant Add Categore From This URL", 4, "alert-danger  mt-5", url: "categories.php?do=Add");

        }


    } elseif ($action == "Add") {

        $categoresAll = getAlllItemsWhere("categories", "1", "1", "=", " ");
        $membersAll = getAlllItemsWhere("users", "1", "1", "=", " ");

        ?>

        <h1 class="titre-page"><?= lang("TITRE_ITEMS_ADD") ?> </h1>
        <form class="form-group " action="?do=Insert" method="post">

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8 ">
                    <input type="text" class="form-control ps-4" value="danon 1" name="Name" placeholder="Name Of The Itame">
                    <label class="ps-4"><?= lang("NAME") ?>:</label>
                </div>
            </div>

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8  ">
                    <textarea class="form-control ps-4 h-50" name="DescriptItem"
                        id="descripItem">Bon Prodiot Of the Year 1</textarea>
                    <label class="ps-4" for="descripItem"><?= lang("DESCRITPNIO") ?> : </label>
                </div>
            </div>

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8 ">
                    <input type="text" value="$100" class="form-control ps-4" name="Price" placeholder="Price MAD">
                    <label class="ps-4"><?= lang("PRICE") ?> : </label>
                </div>
            </div>
            
            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8 ">
                    <input type="text" value="China" class="form-control ps-4" name="Country" placeholder="Contry Made">
                    <label class="ps-4"><?= lang("COUNTRY") ?> : </label>
                </div>
            </div>
            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8 ">
                    <input type="text" value="Phone,info,HeadPhone" class="form-control ps-4" name="tagsItem" placeholder="Contry Made">
                    <label class="ps-4"><?= lang("TAGS") ?> : </label>
                </div>
            </div>

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8 ">
                    <select class="form-control" name="Status" id="statu">
                        <option value="0">...</option>
                        <option value="1">New</option>
                        <option value="2">Like New</option>
                        <option value="3">Used</option>
                        <option value="4">Old</option>
                    </select>
                    <label class="ps-4" for="statu"><?= lang("STATUS") ?> : </label>
                </div>
            </div>


            <div class="row g-3 align-items-center justify-content-center">

                <div class="form-floating mb-3 col-md-6  col-lg-6 ">
                    <select class="form-control" name="MemberID" id="statu">
                        <option value="0">...</option>
                        <?php
                        foreach ($membersAll as $member) {
                            echo "<option value='" . $member->UserID . "'>" . $member->UserName . "</option>";
                        }
                        ?>
                    </select>
                    <label class="ps-4" for="statu"><?= lang("MEMBERS") ?> : </label>
                </div>


                <div class="form-floating mb-3 col-md-6 ">
                    <select class="form-control" name="CatID" id="catid">
                        <option value="0">...</option>
                        <?php
                        foreach ($categoresAll as $cat) { 

                            if($cat->ParentCat == 0) {
                                echo "<option value='" . $cat->CatID . "'>"  .$cat->NameCat . "</option>";
                            } 
                            foreach ($categoresAll as $c) {
                                if($c->ParentCat == $cat->CatID ) {
                                    echo "<option value='" . $cat->CatID . "'>" . "----".$cat->NameCat . "</option>";
                                }
                            }
                        }
                        ?>
                    </select>
                    <label class="ps-4" for="catid"><?= lang("CATEGORIES") ?> : </label>
                </div>


            </div>


            <div class="row align-items-center justify-content-center mb-5">
                <div class="col-lg-8  text-center">
                    <input class="btn btn-primary btn-lg w-100  mb-5 " type="submit" value="+<?= lang("ADD") ?>">
                </div>
            </div>

        </form>


        <?php



    } elseif ($action == "Edit") {
        // CateID

        if ($_SERVER['REQUEST_METHOD'] != "GET") {
            redirectToHome("This URL Not Valid  !!!", type: "alert-danger mt-5", url: "items.php");
        }

        // echo "Page Categories ID = ". $_GET["CateID"] ;
        $itemID = (isset($_GET["itemID"]) and intval($_GET["itemID"])) ? intval($_GET["itemID"]) : 0;

        if (checkItem( "ItemID", "items", $itemID) == 0) {
            redirectToHome("This Item  Is not Existed   !!!", type: "alert-danger mt-5", url: "items.php");

        } else {

            $categoresAll = getAlllItemsWhere("categories", "1", "1", "=", " ");
            $membersAll = getAlllItemsWhere("users", "1", "1", "=", " ");
            $item = getAlllItemsWhere("items", "ItemID", $itemID, "=", " ");
            $item = reset($item);

            ?>

            <h1 class="titre-page"><?= lang("TITRE_ITEMS_EDIT") ?> </h1>
            <form class="form-group " action="?do=Update" method="post">

                <div class="row g-3 align-items-center justify-content-center">
                    <div class="form-floating mb-3 col-lg-8 ">
                        <input type="hidden" name="itemiD" value="<?= $item->ItemID ?>">
                        <input type="text" class="form-control ps-4" value="<?= $item->Name ?>" name="Name"
                            placeholder="Name Of The Itame">
                        <label class="ps-4"><?= lang("NAME") ?>:</label>
                    </div>
                </div>

                <div class="row g-3 align-items-center justify-content-center">
                    <div class="form-floating mb-3 col-lg-8  ">
                        <textarea class="form-control ps-4 h-50" name="DescriptItem"
                            id="descripItem"><?= $item->Description ?></textarea>
                        <label class="ps-4" for="descripItem"><?= lang("DESCRITPNIO") ?> : </label>
                    </div>
                </div>

                <div class="row g-3 align-items-center justify-content-center">
                    <div class="form-floating mb-3 col-lg-8 ">
                        <input type="text" value="<?= $item->Price ?>" class="form-control ps-4" name="Price"
                            placeholder="Price MAD">
                        <label class="ps-4"><?= lang("PRICE") ?> : </label>
                    </div>
                </div>

<div class="row g-3 align-items-center justify-content-center">
    <div class="form-floating mb-3 col-lg-8 ">
        <input type="text" value="<?= $item->Country_Made ?>" class="form-control ps-4" name="Country"
            placeholder="Contry Made">
        <label class="ps-4"><?= lang("COUNTRY") ?> : </label>
    </div>
</div>

<div class="row g-3 align-items-center justify-content-center">
    <div class="form-floating mb-3 col-lg-8 ">
        <input type="text" value="<?= $item->tagsItem ?>" class="form-control ps-4" name="tagsItem"
            placeholder="Contry Made">
        <label class="ps-4"><?= lang("TAGS") ?> : </label>
    </div>
</div>
                <!--  -->

                <div class="row g-3 align-items-center justify-content-center">
                    <div class="form-floating mb-3 col-lg-8 ">
                        <select class="form-control" name="Status" id="statu">
                            <!-- <option value="0">...</option> -->
                            <option value="1" <?= ($item->Status = 1) ? "selected" : ""; ?>>New</option>
                            <option value="2" <?= ($item->Status = 2) ? "selected" : ""; ?>>Like New</option>
                            <option value="3" <?= ($item->Status = 3) ? "selected" : ""; ?>>Used</option>
                            <option value="4" <?= ($item->Status = 4) ? "selected" : ""; ?>>Old</option>
                        </select>
                        <label class="ps-4" for="statu"><?= lang("STATUS") ?> : </label>
                    </div>
                </div>


                <div class="row g-3 align-items-center justify-content-center">

                    <div class="form-floating mb-3 col-md-6  col-lg-6 ">
                        <select class="form-control" name="MemberID" id="statu">
                            <option value="0">...</option>
                            <?php
                            foreach ($membersAll as $member) {
                                $echk = ($item->Member_ID == $member->UserID) ? "selected" : "";
                                echo "<option value='" . $member->UserID . "'  $echk >" . $member->UserName . "</option>";
                            }
                            ?>
                        </select>
                        <label class="ps-4" for="statu"><?= lang("MEMBERS") ?> : </label>
                    </div>


                    <div class="form-floating mb-3 col-md-6 ">
                        <select class="form-control" name="CatID" id="catid">
                            <option value="0">...</option>
                            <?php
                            foreach ($categoresAll as $cat) {
                                $echk = ($item->Cat_ID == $cat->CatID) ? "selected" : "";

                                if($cat->ParentCat == 0) {
                                    echo "<option value='" . $cat->CatID . "' $echk>"  .$cat->NameCat . "</option>";
                                } 

                                foreach ($categoresAll as $c) {
                                $echk = ($item->Cat_ID == $c->CatID) ? "selected" : "";

                                    if($c->ParentCat == $cat->CatID ) {
                                        echo "<option value='" . $c->CatID . "' $echk>" . "----".$c->NameCat . "</option>";
                                    }
                                }
 
                                // echo "<option value='" . $cat->CatID . "' $echk >" . $cat->NameCat . "</option>";
                            }

/*
foreach ($categoresAll as $cat) { 

                            if($cat->ParentCat == 0) {
                                echo "<option value='" . $cat->CatID . "'>"  .$cat->NameCat . "</option>";
                            } 
                            foreach ($categoresAll as $c) {
                                if($c->ParentCat == $cat->CatID ) {
                                    echo "<option value='" . $cat->CatID . "'>" . "----".$cat->NameCat . "</option>";
                                }
                            }
                        }


*/

                            ?>
                        </select>
                        <label class="ps-4" for="catid"><?= lang("CATEGORIES") ?> : </label>
                    </div>


                </div>


                <div class="row align-items-center justify-content-center mb-2">
                    <div class="col-lg-8  text-center">
                        <input class="btn btn-primary btn-lg w-100  mb-2 " type="submit" value="+<?= lang("SAVE") ?>">
                    </div>
                </div>

            </form>


            <?php
        $cmnts = getTablesJointur("  cm.*  ,u.UserName as Member from users u inner join  comments cm on  u.UserID  = cm.User_id_cmnt where cm.Item_id_cmnt=  $itemID ");
         
         ?>
         <div class="manage table-responsive">
             <h1 class="titre-pagee mt-2 mb-4"><?= lang("COMMENTS") ?> </h1>
 
             <table class="table table-bordered text-center">
 
                 <tr>
                     <td>#ID</td>
                     <td>Comment</td> 
                     <td>Member Name</td>
                     <td>Creat Date</td>
                     <td>Controle</td>
                 </tr>
                 <?php if (count($cmnts) > 0) {
                     foreach ($cmnts as $cmnt) { ?>
                         <tr>
                             <td class="fw-bold"> <?= $cmnt->Cmnt_ID ?></td>
                             <td><?= $cmnt->Cmnt_Txt ?></td> 
                             <td><?= $cmnt->Member ?></td>
                             <td><?= date_format(date_create($cmnt->Cmnt_Date), "Y-m-d") ?></td>
                             <td> 
                                 <a href="comments.php?do=Edit&cmntID=<?= $cmnt->Cmnt_ID ?>" class="btn btn-success"><i
                                         class="fa-solid fa-user-pen"></i> Edite</a>
                                 <a href="comments.php?do=Delete&cmntID=<?= $cmnt->Cmnt_ID ?>"
                                     onclick="return confirm('Vous Voullez Supprimer <?= $cmnt->Cmnt_Txt ?> ???')"
                                     class="btn btn-danger"><i class="fa-solid fa-user-xmark"></i> Delete</a>
                                 <?php if ($cmnt->Cmnt_Stat == 0): ?>
                                     <a href="comments.php?do=Approve&cmntID=<?= $cmnt->Cmnt_ID ?>" class="btn btn-info"><i class="fa-solid fa-key"></i>
                                         Approve</a>
                                 <?php endif; ?>
                             </td>
                         </tr>
 
                     <?php }
                 } else { ?>
                     <tr>
                         <td colspan="6" class="text-center fw-bold p-5">
                             <h2 class="text fw-bold"><i class="fa-regular fa-file"></i> Non Comments</h2>
                         </td>
                     </tr>
                 <?php } ?>
 
 
 
             </table>
         </div>
 
  
            <?php
        }




    } elseif ($action == "Update") {


        $titlePage = "Page Edit Item";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {



            $itemID = intval($_POST["itemiD"]);
            $nameItm = htmlspecialchars($_POST["Name"]);
            $descItm = filter_var($_POST["DescriptItem"], FILTER_SANITIZE_STRING);
            $priceItm = $_POST["Price"];
            $countryItm = filter_var($_POST["Country"], FILTER_SANITIZE_STRING);
            $statusItm = $_POST["Status"];

            $member_ID = $_POST["MemberID"];
            $cat_ID = $_POST["CatID"];
            $tagsItem =htmlspecialchars( $_POST["tagsItem"]);
            

            if (checkItem( "ItemID", "items", $itemID) == 0) {
                redirectToHome("This Item ($nameItm) Is not Existed   !!!", type: "alert-danger mt-5", url: "items.php");

            } else {
                $errorsInput = array();


                if (empty($nameItm) or strlen($nameItm) < 4) {
                    $errorsInput[] = " Name Is Empty Or less thans 4 Caracters  !!!";
                }
                if (empty($descItm)) {
                    $errorsInput[] = " Description Is Empty   !!!";
                }
                if (empty($priceItm)) {
                    $errorsInput[] = " Price Is Empty   !!!";
                }
                if (empty($countryItm)) {
                    $errorsInput[] = " Country Made Is Empty   !!!";
                }
                if ($statusItm == 0) {
                    $errorsInput[] = " Statut  Is Empty   !!!";
                }
                if ($member_ID == 0) {
                    $errorsInput[] = " Member Name  Is Empty   !!!";
                }
                if ($cat_ID == 0) {
                    $errorsInput[] = " Categorie Name   Is Empty   !!!";
                }

                if (empty($errorsInput)) {


                    $data = ["Name" => $nameItm, "Description" => $descItm, "Price" => $priceItm, "Country_Made" => $countryItm, "Status" => $statusItm, "Member_ID" => $member_ID,"tagsItem"=>$tagsItem, "Cat_ID" => $cat_ID];

                    updateTable("items", $data, "ItemID", $itemID);


                    redirectToHome("The Item $nameItm Is Update", 4, "alert-success mt-5", url: "items.php");


                } else {
                    echo "<br><br>";
                    foreach ($errorsInput as $error) {
                        ?>
                        <div class="alert alert-danger">
                            <?= $error ?>
                        </div>
                        <?php
                    }
                }
            }


        } else {
            redirectToHome("Error You Cant Add Item From This URL", 4, "alert-danger  mt-5", url: "items.php");

        }



    } elseif ($action == "Delete") {



        $itemID = (isset($_GET["itemID"]) && !is_nan($_GET["itemID"])) ?
            intval($_GET["itemID"]) : 0;
        // echo "id IS =" . $itemID;

        if ($itemID != 0 && checkItem( "ItemID", "items", $itemID)) {

            deleteItem("items", "ItemID", $itemID);

            redirectToHome("Delete Successs ", 3, "alert-success", "items.php");
        } else {
            redirectToHome("Error en delete ", 3, url: "items.php");

        }




        echo "Delete ";

    } elseif ($action == "Approve") {


echo "<br><br><br>";
        $itemID = (isset($_GET["itemID"]) && !is_nan($_GET["itemID"])) ?
            intval($_GET["itemID"]) : 0;
        // echo "id IS =" . $itemID;

        if ($itemID != 0 && checkItem( "ItemID", "items", $itemID)) {

            $data=["ApproveItm"=>1];
            updateTable("items", $data,"ItemID", $itemID);

            redirectToHome("Update Successs ", 3, "alert-success", "items.php");
        } else {
            redirectToHome("Error en Update Aprove ", 3, url: "items.php");

        }

 

    } else {


        echo " <br><br>";
        redirectToHome(" Probleme Dans L URL !!!", 3, "alert-danger", "categories.php");


    }



    echo "</div>";//container

    include($temp . "footerAdmin.php");
}

// ob_end_flush();









