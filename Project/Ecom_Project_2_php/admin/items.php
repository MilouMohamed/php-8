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
 
echo "is mamane";
echo "<a href='?do=Add'> Add </a>"; 


$itemsAll = getAlllItemsWhere("items", "1", "1", "=", " ");
/*
        ?>
        <div class="container categores-manage mb-5 mt-5">
            <div class="card border-info mb-3  " style1="max-width: 18rem;">
                <div class="card-header d-flex justify-content-between  fw-bold">
                    <span class="fw-bold  pt-2 pb-2"> <i class="fa fa-edit"></i> Manage Categores</span>
                    <span class="try-by   pt-2 pb-2  ful-clsc">
                     <i class="fa fa-sort"></i>   Ordering :[
                        <a class="<?= ($sort == "DESC") ? "text-primary" : "text-black"; ?>" href="?Sort=DESC">Desc</a> |
                        <a class="<?= ($sort == "ASC") ? "text-primary" : "text-black"; ?>" href="?Sort=ASC">Asc</a> ]
                      ||    <i class="fa fa-eye"></i>  View :[
                        <span data-name="full"> Full</span> |
                        <span  class="text-primary"   data-name="classic"> Classic</span> ]
                    </span>
                </div>
                <?php foreach ($categoresAll as $cat): ?>
                    <div class="card-body position-relative border-info  border pt-0 pb-0">
                    <div class="  position-absolute z-2    btns-hidden ">
                            <a class="btn btn-outline-primary  " href="?do=Edit&CateID=<?= $cat->CatID ?>"><i
                                    class="fa  fa-edit"></i> Edite</a>
                            <a class="btn btn-outline-danger  confirm"
                             href="?do=Delete&catID=<?= $cat->CatID ?>"><i class="fa fa-close"></i> Dellet</a>
                        </div> 

                        <div class="  position-absolute   bg-transparent  div-date  "><?= $cat->Create_At ?></div> 
                      
                      
                        <h5 class="card-title pt-1  fw-bold"><?= strtoupper($cat->NameCat) ?></h5>


                        <div class="hide-show">

                        <p class="card-text d-block"><?= $cat->DescripCat ?></p>
 
                        
                        <div class="settings-cart d-block">
                            <?php $cnot=0; if ($cat->VisibiltyCat == 1) { $cnot++; ?>
                                <span class=" bg-info"><i class="fa fa-eye"></i> Hidden</span><?php } ?>
                            <?php if ($cat->AllowCmntCat == 1) { $cnot++; ?>
                                <span class=" bg-danger"><i class="fa-regular fa-comment-dots"></i> Comment Disabled</span><?php } ?>
                            <?php if ($cat->AllowAdsCAt == 1) { $cnot++; ?>
                                <span class=" bg-warning"><i class="fa-regular fa-bookmark"></i> Ads Disabled</span>
                                <?php }
                               
                                if($cnot == 0){  ?>
                                    <span > -------- ------</span>
                                    <?php }   
                                ?>


                        </div>
                    </div>
                    <hr class="p-0 pb-3  m-0 mt-2" />

                    </div>

 
                <?php endforeach; ?>

            </div>
            <a class='btn btn-primary  mt-1' href='?do=Add'>
              <i class="fa fa-plus " ></i>  Add</a>
            </div> 
            
            <br>
        <?php
*/


    } elseif ($action == "Insert") {

        $titlePage = "Page Insert Categorie";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            $nameItm    = htmlspecialchars($_POST["Name"]);
            $descItm    =filter_var( $_POST["DescriptItem"],FILTER_SANITIZE_STRING);
            $priceItm   = $_POST["Price"];
            $countryItm =filter_var( $_POST["Country"],FILTER_SANITIZE_STRING);
            $statusItm  = $_POST["Status"];
            // $member_ID = $_SESSION["UserName"];
            // print_r($_SESSION);
            $member_ID = $_POST["MemberID"];
            $cat_ID = $_POST["CatID"];
            
            $errorsInput=array();


            if (empty($nameItm) or strlen($nameItm) < 4) {
                $errorsInput[]=" Name Is Empty Or less thans 4 Caracters  !!!" ;
            } 
            if (empty($descItm) ) {
                $errorsInput[]=" Description Is Empty   !!!" ;
            } 
            if (empty($priceItm) ) {
                $errorsInput[]=" Price Is Empty   !!!" ;
            } 
            if (empty($countryItm) ) {
                $errorsInput[]=" Country Made Is Empty   !!!" ;
            } 
            if ($statusItm == 0 ) {
                $errorsInput[]=" Statut  Is Empty   !!!" ;
            }  
            if ($member_ID == 0 ) {
                $errorsInput[]=" Member Name  Is Empty   !!!" ;
            }  
            if ($cat_ID == 0 ) {
                $errorsInput[]=" Categorie Name   Is Empty   !!!" ;
            }  

            if(empty($errorsInput)){
                
                /*
`items` SET `ItemID`='[value-1]',`Name`='[value-2]',`Description`='[value-3]',`Price`='[value-4]',`Add_Date`='[value-5]',`Country_Made`='[value-6]',`Image`='[value-7]',`Status`='[value-8]',`Rating`='[value-9]',`Cat_ID`='[value-10]',`Member_ID`='[value-11]'
                */

            if (checkItem("*", "Name", "items", $nameItm) > 0) {
                redirectToHome("This Categore ($nameItm) Is Existed   !!!", type: "alert-danger mt-5", url: "items.php?do=Add");

            } else {
                $stms2 = $cnx->prepare("INSERT INTO `items`( `Name`, `Description`, `Price`, `Country_Made`, `Status`,`Member_ID`,`Cat_ID` ) VALUES (?,?,?,?,?,?,?)");

                 $stms2->execute([$nameItm, $descItm, $priceItm, $countryItm, $statusItm, $member_ID, $cat_ID]);

                 redirectToHome("The Categorie $nameItm Is Aded", 4, "alert-success mt-5", url: "items.php");


            }

        }else {
            echo "<br><br>";
foreach ($errorsInput as $error) {
    ?>
    <div class="alert alert-danger">
   <?=  $error ?>
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
                    <input type="text" class="form-control ps-4" value="danon 1" name="Name"
                        placeholder="Name Of The Itame" >
                    <label class="ps-4"><?= lang("NAME") ?>:</label>
                </div>
            </div>

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8  "> 
                    <textarea class="form-control ps-4 h-50" name="DescriptItem" id="descripItem">Bon Prodiot Of the Year 1</textarea>
                    <label class="ps-4" for="descripItem"><?= lang("DESCRITPNIO") ?> : </label>
                </div>
            </div>

            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8 ">
                    <input type="text" value="$100"  class="form-control ps-4" name="Price"
                        placeholder="Price MAD">
                    <label class="ps-4"><?= lang("PRICE") ?> : </label>
                </div>
            </div>
   
            <div class="row g-3 align-items-center justify-content-center">
                <div class="form-floating mb-3 col-lg-8 ">
                    <input type="text" value="China"  class="form-control ps-4" name="Country"
                        placeholder="Contry Made">
                    <label class="ps-4"><?= lang("COUNTRY") ?> : </label>
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
                        echo "<option value='". $member->UserID."'>". $member->UserName."</option>";
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
                        echo "<option value='". $cat->CatID."'>". $cat->NameCat."</option>";
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

        // echo "Page Categories ID = ". $_GET["CateID"] ;
        $caetID = (isset($_GET["CateID"]) and intval($_GET["CateID"])) ? intval($_GET["CateID"]) : 0;


        if ($caetID != 0) {

            $item = getAlllItemsWhere("categories", "CatID", $caetID, "=", "");
            $item = reset($item);

            if ($item) {

                ?>

                <h1 class="titre-page"><?= lang("TITRE_CATEGORIES_EDIT") ?> </h1>
                <form class="form-group " action="?do=Update" method="post">

                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="form-floating mb-3 col-lg-8 ">
                            <input type="hidden" name="catID" value="<?= $item->CatID ?>">
                            <input type="text" class="form-control ps-4" name="name" placeholder="Name Of The Categorie"
                                value="<?= $item->NameCat ?>" required>
                            <label class="ps-4"><?= lang("NAME") ?>:</label>
                        </div>
                    </div>

                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="form-floating mb-3 col-lg-8  ">
                            <!-- <input type="text" class="form-control ps-4" value="<?= $item->DescripCat ?>" name="descriptCat"
                placeholder="Desciption Of The Categorie "> -->
                            <textarea class="form-control ps-4 h-50" name="descriptCat"
                                id="descrip"><?= $item->DescripCat ?></textarea>
                            <label class="ps-4" for="descrip"><?= lang("DESCRITPNIO") ?> : </label>

                        </div>
                    </div>

                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="form-floating mb-3 col-lg-8 ">
                            <input type="number" value="<?= $item->OrderCat ?>" aria-valuemin="10" min="0" class="form-control ps-4"
                                name="ordring" placeholder="Ordre Of Categorie">
                            <label class="ps-4"><?= lang("ORDRING") ?> : </label>
                        </div>
                    </div>

                    <div class="row    col-lg-6 col-xl-5  mx-auto  ">
                        <div class=" form-control bg-light  mb-3  ">
                            <div class=" m-1  d-flex align-items-center  ">
                                <label class="pe-5  fw-bold col-form-label "><?= lang("VISIBILTY") ?> : </label>
                                <input type="radio" name="visibile" id="vis-yes" value="1" 
                                <?= $item->VisibiltyCat == 1 ? "checked" : ""; ?> />
                                <label class="pe-4 ps-1" for="vis-yes"><?= lang("YES") ?></label>
                                <div class="ms-4 me-4">|||</div>
                                <input type="radio" name="visibile" id="vis-non" value="0" <?= $item->VisibiltyCat == 0 ? "checked" : ""; ?> />
                                <label class="pe-4  ps-1" for="vis-non"><?= lang("NO") ?></label>

                            </div>
                        </div>
                    </div>


                    <div class="row col-lg-6  col-xl-5   mx-auto">
                        <div class="form-control bg-light mb-3   mx-auto ">
                            <div class="m-1 d-flex align-items-center ">
                                <label class="pe-2 pe-md-4 fw-bold col-form-label">
                                    <?= lang("ALLOW_CMNT") ?> :
                                </label>

                                <input type="radio" name="comment" value="1" id="cmnt-yes" <?= $item->AllowCmntCat == 1 ? "checked" : ""; ?> />
                                <label class="pe-4 ps-1" for="cmnt-yes">
                                    <?= lang("YES") ?>
                                </label>

                                <div class="ms-4 me-4">|||</div>

                                <input type="radio" name="comment" value="0" id="cmnt-non" <?= $item->AllowCmntCat == 0 ? "checked" : ""; ?> />
                                <label class="pe-4 ps-1" for="cmnt-non">
                                    <?= lang("NO") ?>
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="row  col-lg-6 col-xl-5  mx-auto  ">
                        <div class=" form-control bg-light  mb-3   ">
                            <div class=" m-1  d-flex align-items-center  ">
                                <label class="pe-5 fw-bold col-form-label "><?= lang("ALLOW_ADS") ?> : </label>
                                <input type="radio" name="ads" value="1" id="ads-yes" <?= $item->AllowAdsCAt == 1 ? "checked" : ""; ?> />
                                <label class="pe-4 ps-1" for="ads-yes"><?= lang("YES") ?></label>
                                <div class="ms-4 me-4">|||</div>
                                <input type="radio" name="ads" value="0" id="ads-non" <?= $item->AllowAdsCAt == 0 ? "checked" : ""; ?> />
                                <label class="pe-4  ps-1" for="ads-non"><?= lang("NO") ?></label>
                            </div>
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

                echo "<br><br><br><br><br><br>";
                redirectToHome("Pas De Categorie Pour ID = $caetID ", 4, url: "categories.php");
                exit();
            }
        }
 

    } elseif ($action == "Update") {




        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            echo "<h1>" . lang("TITRE_MEMBERS_UPDATE") . " </h1>";

            $catID = $_POST["catID"];
            $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
            $descriptCat = filter_var($_POST["descriptCat"], FILTER_SANITIZE_STRING);
 
            $ordring = $_POST["ordring"];

            $visibile = $_POST["visibile"];
            $comment = $_POST["comment"];
            $ads = $_POST["ads"];



            $errorsList = array();

            if (empty($name) || strlen($name)< 4) {
                $errorsList[] = "The Name Cant Be Empty Or less Than 4 Charaters";
            } 

            if (count($errorsList) == 0) {
                try { 
$data=[ "NameCat"=>$name,"DescripCat"=>$descriptCat,
"OrderCat"=>$ordring,
"VisibiltyCat"=>$visibile,
"AllowCmntCat"=>$comment,
"AllowAdsCAt"=>$ads
];
                    updateTable("categories", $data, "CatID", $catID);
 
                    redirectToHome("The Profile Has Updated", 3, "alert-success", "?do=Edit&CateID=" . $catID);



                } catch (PDOException $exp) {

                    redirectToHome(" Error on Modification" . $exp->getMessage(), 6, url: "categories.php");
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

            redirectToHome("Vous N avez pas le Droit de Modifier !!!", 3,url:"categories.php");
            
        }






    } elseif ($action == "Delete") {

         

        $catID=(isset($_GET["catID"] ) && !is_nan($_GET["catID"]))?
         intval($_GET["catID"]) : 0;
       echo "id IS =". $catID;

       if($catID != 0 &&  checkItem("*","CatID","categories",$catID)){

        deleteItem("categories","CatID",$catID);
           redirectToHome("Delete Successs ",3,"alert-success","categories.php");
       }
       else{
        redirectToHome("Error en delete ",30,url:"categories.php");

       }




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

// ob_end_flush();









