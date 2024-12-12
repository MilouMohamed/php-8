<?php
ob_start();

session_start();

if (!isset($_SESSION["UserName"])) {
    header("location: index.php");
    exit;
} else {

    $titlePage = "Comments";
    include "init.php";

    $action = isset($_GET["do"]) ? $_GET["do"] : "Manage";


    echo '<div class="container">';
    if ($action == "Manage") {

        $cmnts = getTablesJointur("  cm.* ,i.Name as NameItem  ,u.UserName as Member from users u inner join  comments cm on  u.UserID  = cm.User_id_cmnt inner join items i  on i.ItemID = cm.Item_id_cmnt order by  cm.Cmnt_ID DESC ");
         
        ?>
        <div class="manage table-responsive">
            <h1 class="titre-page"><?= lang("COMMENTS") ?> </h1>

            <table class="table table-bordered text-center">

                <tr>
                    <td>#ID</td>
                    <td>Comment</td>
                    <td>Item</td>
                    <td>Member Name</td>
                    <td>Creat Date</td>
                    <td>Controle</td>
                </tr>
                <?php if (count($cmnts) > 0) {
                    foreach ($cmnts as $cmnt) { ?>
                        <tr>
                            <td class="fw-bold"> <?= $cmnt->Cmnt_ID ?></td>
                            <td><?= $cmnt->Cmnt_Txt ?></td>
                            <td><?= $cmnt->NameItem ?></td>
                            <td><?= $cmnt->Member ?></td>
                            <td><?= date_format(date_create($cmnt->Cmnt_Date), "Y-m-d") ?></td>
                            <td>
                                <!-- ?do=Edit&cmntID=".$cmntID -->
                                <a href="?do=Edit&cmntID=<?= $cmnt->Cmnt_ID ?>" class="btn btn-success"><i
                                        class="fa-solid fa-user-pen"></i> Edite</a>
                                <a href="?do=Delete&cmntID=<?= $cmnt->Cmnt_ID ?>"
                                    onclick="return confirm('Vous Voullez Supprimer <?= $cmnt->Cmnt_Txt ?> ???')"
                                    class="btn btn-danger"><i class="fa-solid fa-user-xmark"></i> Delete</a>
                                <?php if ($cmnt->Cmnt_Stat == 0): ?>
                                    <a href="?do=Approve&cmntID=<?= $cmnt->Cmnt_ID ?>" class="btn btn-info"><i class="fa-solid fa-key"></i>
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


    } elseif ($action == "Edit") {

        $titlePage=lang("TITRE_COMMENT_UPDATE");
        // echo "Page Edite ID = ". $_GET["cmntID"] ;
        $cmntID = (isset($_GET["cmntID"]) and intval($_GET["cmntID"])) ? intval($_GET["cmntID"]) : 0;


        if ($cmntID != 0) {
            $cmnt = getAlllItemsWhere("comments", "Cmnt_ID", $cmntID, "=", "");
            $cmnt = reset($cmnt);
            $count = count((array) $cmnt);
 
            if ($count > 0) {

                ?>

                <h1 class="titre-page"><?= lang("TITRE_COMMENT_UPDATE") ?> </h1>
                <form class="form-group " action="?do=Update" method="post">
                    <input type="hidden" class="form-control ps-4" id="cmntID" name="cmntID" value="<?= $cmnt->Cmnt_ID ?>">

                    <div class="row g-3 align-items-center justify-content-center">
                        <div class="form-floating mb-3 col-lg-8 " >
                            <textarea class="form-control ps-4 " name="comment" id="cmnt"  style="height:200px"
                                placeholder="Comments" required><?= $cmnt->Cmnt_Txt ?></textarea>
                                            <label class="ps-4" for="cmnt"><?= lang("COMMENTS") ?></label>
                                        </div>
                                    </div> 
  
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-lg-8  text-center">
                                            <input class="btn btn-primary btn-lg w-100   mb-5" type="submit" value="<?= lang("SAVE") ?>">
                                        </div>
                                    </div>

                                </form>


                                <?php

            } else {

                redirectToHome(lang("NO_COMMENT_ID") . " Dans DB ", 3, url: "commetns.php?do=Manage");
            }

        } else {

            redirectToHome(lang("NO_COMMENT_ID") . "  Dans Url ", 3, url: "commetns.php?do=Manage");

        }
    } elseif ($action == "Update") {

        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            echo "<h1>" . lang("TITRE_COMMENT_UPDATE") . " </h1>";

            $cmntID = $_POST["cmntID"];
            $cometText = filter_var($_POST["comment"], FILTER_SANITIZE_STRING); 

 
            $errorsList = array();

            if (empty($cometText)) {
                $errorsList[] = "The Comment Cant Be Empty";
            }   
 
            if (count($errorsList) == 0) {
                try {
 
                    // $cmntID = $_POST["cmntID"];
                    // $cometText ; 
                    updateTable("comments",["Cmnt_Txt"=>$cometText],"Cmnt_ID",$cmntID);

                     redirectToHome("The Comment Has Updated", 3, "alert-success", "comments.php");

                   

                } catch (PDOException $exp) {

                    redirectToHome(" Error on Modification" . $exp->getMessage(), 3,url:"comments.php");
 
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

            redirectToHome("Vous N avez pas le Droit de Modifier !!!", 3);

            // ? >
            // <div class="alert alert-danger">
            //     <h2> Vous N avez pas le Droit de Modifier !!!</h2>
            // </div>
            // < ?php
        }


    } elseif ($action == "Delete") {

        echo '  <h1 class="titre-page" >' . lang("TITRE_COMMENT_DELETE") . ' </h1>';
 
        $cmntID = (isset($_GET["cmntID"]) and intval($_GET["cmntID"])) ? intval($_GET["cmntID"]) : 0;
 

        if ($cmntID != 0 and  getCount("comments","Cmnt_ID",$cmntID,"=")) {

            $stmt = $cnx->prepare("delete from comments where Cmnt_ID=?");
            $stmt->execute([$cmntID]);

            deleteItem("comments","Cmnt_ID",$cmntID);

            echo " <br><br>";
            redirectToHome("  The Comment Is Deleted", 4, "alert-success","comments.php?do=Manage");
 

        } else {


            echo " <br><br>";
            redirectToHome("  This ID Is Not Existed !!!", 4, "alert-danger","comments.php?do=Manage");
 
        }
    } elseif ($action == "Approve") {

        $cmntID = (isset($_GET["cmntID"]) and intval($_GET["cmntID"])) ? intval($_GET["cmntID"]) : 0;


        if ($cmntID != 0 and getCount("comments","Cmnt_ID",$cmntID,"=")) {

            updateTable("comments",["Cmnt_Stat"=>1],"Cmnt_ID",$cmntID);
            

            echo " <br><br>";
            redirectToHome("  The Comment Is Approved ", 4, "alert-success","comments.php");


        } else {

            echo " <br><br>";
            redirectToHome("  This ID Is Not Existed !!!", 4, "alert-danger","comments.php");

        }
    } else {


        echo " <br><br>";
        redirectToHome(" Probleme Dans L URL !!!", 3);


    }

    echo "</div>";

    include($temp . "footerAdmin.php");
}
ob_end_flush();

