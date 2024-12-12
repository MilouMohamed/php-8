<?php
// ob_start();

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

        $sort = "ASC";
        $itemSort = array("DESC", "ASC");
        if (isset($_GET["Sort"]) && in_array($_GET["Sort"], $itemSort)) {
            $sort = $_GET["Sort"];
        }



        $categoresAll = getAlllItemsWhere("categories", "1", "1", "=", " Order by OrderCat  $sort ");

        $parentCat=array_filter($categoresAll,function($cat){
            return $cat->ParentCat ==0 ;
        });
        $childCat=array_filter($categoresAll,function($cat){
            return $cat->ParentCat !=0 ;
        });

/*
        print_r($categoresAll);
        echo "<br>-----------<br>";
        print_r($parentCat);
        echo "<br>-----------<br>";

        print_r($childCat);
        echo "<br>-----------<br>";


echo "<br>";
echo "<br>";
echo "<br>";*/
        ?>
        <div class="container categores-manage mb-5 mt-5">
        <h1 class="titre-page">Page Of Categores </h1>
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
                <?php foreach ($parentCat as $cat): ?>
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
                    <?php 
                    if(fncIsHasChildren($categoresAll,$cat->CatID)){

                     echo '   <div class="cheldren ms-5 mb-2">';
                     echo "<h6 class='card-title pt-1  fw-bold '> ". strtoupper("Childrens Of ".$cat->NameCat) ."</h6>";

                    foreach ($childCat as $child) {
                        
                    if( $cat->CatID == $child->ParentCat ){ ?>
                    
<div class="children-cat  ms-3">
     ---> <a class="btn btn-outline-primary m-1 p-0 px-1 " href="?do=Edit&CateID=<?= $child->CatID ?>"><?= strtoupper($child->NameCat) ?></a> 
     <a class="btn btn-outline-danger btn-sm   confirm opacity-0"
                             href="?do=Delete&catID=<?= $child->CatID ?>"><i class="fa fa-close"></i></a>
</div>

<?php    }}  
echo '</div>';
 }?>
                    </div>

 
                   
                    <?php  
                     endforeach; ?>

            </div>
            <a class='btn btn-primary  mt-1' href='?do=Add'>
              <i class="fa fa-plus " ></i>  Add</a>
            </div> 
            
            <br>
        <?php


} elseif ($action == "Insert") {

    $titlePage = "Page Insert Categorie";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $name = $_POST["name"];
        $desc = $_POST["descriptCat"];
        $ordring = $_POST["ordring"];
        $parent = $_POST["parent"];
        $visible = $_POST["visibile"];
        $comment = $_POST["comment"];
        $ads = $_POST["ads"];


        if (empty($name) or strlen($name) < 4) {
            redirectToHome(" Name Is Empty Or less thans 4 Caracters  !!!", type: "alert-danger mt-5", url: "categories.php?do=Add");
        } elseif (checkItem(  "NameCat", "categories", $name) > 0) {
            redirectToHome("This Categore ($name) Is Existed   !!!", type: "alert-danger mt-5", url: "categories.php?do=Add");

        } else {
            $stms2 = $cnx->prepare("INSERT INTO `categories`( `NameCat`, `DescripCat`, `OrderCat`, `VisibiltyCat`, `AllowCmntCat`, `AllowAdsCAt`,`ParentCat`) VALUES (?,?,?,?,?,?,?)");

            $stms2->execute([$name, $desc, $ordring, $visible, $comment, $ads,$parent]);
            redirectToHome("The Categorie $name Is Aded", 4, "alert-success mt-5", url: "categories.php");


        }




    } else {
        redirectToHome("Error You Cant Add Categore From This URL", 4, "alert-danger  mt-5", url: "categories.php?do=Add");

    }


} elseif ($action == "Add") {

    $cates=getAlllItemsWhere("categories","ParentCat","0","=",""); 
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
                <!-- <input type="text" classs="form-control ps-4 d-none" value="Decsription 1" name="descriptCat1"
                    placeholder="Desciption Of The Categorie "> -->
                <textarea class="form-control ps-4 h-50" name="descriptCat" id="descrip">Decsription 1</textarea>
                <label class="ps-4" for="descrip"><?= lang("DESCRITPNIO") ?> : </label>
            </div>
        </div>

        <div class="row g-3 align-items-center justify-content-center p-0">


            <div class="form-floating mb-3 col-md-6 ">
                <input type="number" value="100" aria-valuemin="10" min="0" class="form-control ps-4" name="ordring"
                    placeholder="Ordre Of Categorie">
                <label class="ps-4"><?= lang("ORDRING") ?> : </label>
            </div>

            <div class="form-floating mb-3 col-md-6 ">
                <select class="form-control ps-4" name="parent"
                    placeholder="Ordre Of Categorie">
                    <option value="0">None</option>
                    <?php foreach ($cates as $cat) { ?>
                    <option value="<?= $cat->CatID ?>"><?= $cat->NameCat ?></option>
                        
                        <?php   } ?>
</select>
<label class="ps-4"><?= lang("PARENT") ?> : </label>

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
    // CateID

    // echo "Page Categories ID = ". $_GET["CateID"] ;
    $caetID = (isset($_GET["CateID"]) and intval($_GET["CateID"])) ? intval($_GET["CateID"]) : 0;


    if ($caetID != 0) {

        $item = getAlllItemsWhere("categories", "CatID", $caetID, "=", "");
        $item = reset($item);

        if ($item) {
            $cates=getAlllItemsWhere("categories", "ParentCat", "0", "=", "");
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
                        <textarea class="form-control ps-4 h-50" name="descriptCat"
                            id="descrip"><?= $item->DescripCat ?></textarea>
                        <label class="ps-4" for="descrip"><?= lang("DESCRITPNIO") ?> : </label>

                    </div>
                </div>

                <div class="row g-3 mb-3 align-items-center justify-content-center">
                    <div class="form-floating  col-lg-4  ">
                        <input type="number" value="<?= $item->OrderCat ?>" aria-valuemin="10" min="0" class="form-control ps-4"
                            name="ordring" placeholder="Ordre Of Categorie">
                        <label class="ps-4"><?= lang("ORDRING") ?> : </label>
                    </div>

<!-- *************** -->

<div class="form-floating   col-lg-4  ">
                <select class="form-control ps-4" name="parent"
                    placeholder="Ordre Of Categorie">
                    <option value="0">None</option>
                    <?php foreach ($cates as $cat) { ?>
                    <option value="<?= $cat->CatID ?>" 
                    <?= ($item->ParentCat == $cat->CatID )? "selected":"";   ?>>
                    <?= $cat->NameCat ?></option>
                        
                        <?php   } ?>
</select>
<label class="ps-4"><?= lang("PARENT") ?> : </label>

            </div>  



                </div>

                <div class="row    col-lg-6 col-xl-5  mx-auto  ">
                    <div class=" form-control bg-light  mb-3  ">
                        <div class=" m-1  d-flex align-items-center  ">
                            <label class="pe-5  fw-bold col-form-label "><?= lang("VISIBILTY") ?> : </label>
                            <input type="radio" name="visibile" id="vis-yes" value="1" <?= $item->VisibiltyCat == 1 ? "checked" : ""; ?> />
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
        $parent = $_POST["parent"];
        
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
"AllowAdsCAt"=>$ads,
"ParentCat"=> $parent,
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

   if($catID != 0 &&  checkItem("CatID","categories",$catID)){

    deleteItem("categories","CatID",$catID);
       redirectToHome("Delete Successs ",3,"alert-success","categories.php");
   }
   else{
    redirectToHome("Error en delete ",30,url:"categories.php");

   }



}   else {


    echo " <br><br>";
    redirectToHome(" Probleme Dans L URL !!!", 3, "alert-danger", "categories.php");


}



echo "</br></br>";
echo "</div>";//container

include($temp . "footerAdmin.php");
}

// ob_end_flush();

