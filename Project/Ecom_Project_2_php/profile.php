<?php
// Project Start le  14-11-2024 


$titlePage = "Profile ";

include "init.php";

// $_SESSION["client"] = ["userName" => $userName, "noId" => 10000];

if (empty($sessionUser)) {
  header("location:login.php");
  exit;
}


$User = getAlllItemsWhere("users", "UserName", $sessionUser, "=", "")[0];

$ItemsOfUser = getAlllItemsWhere("items", "Member_ID", $User->UserID, "=", "");


$commentsOfUser = getAlllItemsWhere("comments", "User_id_cmnt", $User->UserID, "=", "");
// $ItemsOfUser=[];
// $commentsOfUser=[];

// print_r($commentsOfUser );

// print_r($ItemsOfUser); 
// $cateFavor = getTablesJointur("SELECT count(*) FROM `items` i INNER JOIN  categories c on i.Cat_ID = c.CatID WHERE i.Member_ID= $User->UserID")[0];



echo "<b>" . $User->UserName . "</b><br>";

?>

<div class="info pt-3 pb-4">
  <div class="container">
    <div class="row row-cols-1    g-4">

      <div class="col col-md-6">
        <div class="card h-100">
          <div class="card-header  text-white bg-primary">My Information</div>
          <!-- <img src="..." class="card-img-top" alt="..."> -->
          <div class="card-body">
            <h5 class="card-title border-bottom">Name : <?= $sessionUser ?> </h5>
            <div class="card-text">
              <div> Email : <?= $User->UserName ?> </div>
              <div> Full Name : <?= $User->FullName ?> </div>
              <div> Regester Date : <?= $User->CreateAt ?> </div>
              <div> Favourite Category : <?= $User->CreateAt ?> </div>
            </div>
          </div>
          <div class="card-footer">
            <small class="text-body-secondary">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>



      <div class="col col-md-6">
        <div class="card h-100">
          <div class="card-header  text-white bg-primary">Latest Comments</div>
          <!-- <img src="..." class="card-img-top" alt="..."> -->
          <div class="card-body">
            <h5 class="card-title">Test : Comments <?= $sessionUser ?> </h5>
            <div class="card-text">
              <?php
              if (empty($commentsOfUser)) {
                echo "<h3 class='fw-bold bg-gray text-center'>No Comments</h3>";
              } else {

                foreach ($commentsOfUser as $comt): ?>

                  <p class="ms-3 border-left-2-red ps-2"><?= $comt->Cmnt_Txt ?></p>

                <?php endforeach;
              } ?>

            </div>
          </div>
          <div class="card-footer">
            <small class="text-body-secondary">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>

      <div class="col  ">
        <div class="card h-100">
          <div class="card-header  text-white bg-primary">My Ads</div>
          <!-- <img src="..." class="card-img-top" alt="..."> -->
          <div class="card-body">
            <h5 class="card-title">Test : Ads <?= $sessionUser ?> </h5>
            <div class="card-text mydisp ">
              <div class="row">

                <?php
                if (empty($ItemsOfUser)) {
                  echo "<h3 class='fw-bold bg-gray text-center'>No Items</h3>";
                } else {
                  foreach ($ItemsOfUser as $item): ?>

                    <div class="col-sm-6 col-md-4 col-lg-2  mb-1 mt-1 ">
                      <div class="thumbnail box-item ">
                        <div class="price-tag">
                          <?= $item->Price ?>
                        </div>
                        <img src="./doc/user-picture.png" alt="No Image" class="img-fluid img-thumbnail" />
                        <h3 class="title p-1"><?= $item->Name ?></h3>
                        <p class="p-2">
                          <?= substr($item->Description, 0, 50) . "..." ?>
                        </p>
                      </div>
                    </div>

                  <?php endforeach;
                } ?>



              </div>
            </div>
          </div>
          <div class="card-footer">
            <small class="text-body-secondary">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>



<?php include($temp . "footerAdmin.php"); ?>