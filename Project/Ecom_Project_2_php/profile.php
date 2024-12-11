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

// print_r($ItemsOfUser);

$commentsOfUser = getAlllItemsWhere("comments", "User_id_cmnt", $User->UserID, "=", "");
// $ItemsOfUser=[];
// $commentsOfUser=[];
 
// echo "<b>" . $User->UserName . "</b><br>";

?>

<div class="info pt-3 pb-4">
  <div class="container">
  <h1 class="titre-page">My Profile</h1>
    <div class="row row-cols-1    g-4">

      <div class="col col-xl-6">
        <div class="card h-100">
          <div class="card-header  text-white bg-primary"><i class="fa-solid fa-circle-info"></i> My Information</div>
          <!-- <img src="..." class="card-img-top" alt="..."> -->
          <div class="card-body">
            <h5 class="card-title  border-bottom border-1 border-dark mb-1">
              <i class="fa-solid fa-lock"></i> Name : <?= $sessionUser ?>
            </h5>
            <div class="card-text info">
              <div><span><i class="fa-regular fa-paper-plane"></i> Email </span> : <?= $User->UserName ?> </div>
              <div><span><i class="fa-solid fa-user"></i> Full Name </span> : <?= $User->FullName ?> </div>
              <div><span><i class="fa-solid fa-calendar-days"></i> Regester Date </span> : <?= $User->CreateAt ?> </div>
              <div><span><i class="fa-regular fa-star"></i> Favourite Category </span> : <?= $User->CreateAt ?> </div>
              </ul>

            </div>
          </div>
          <div class="card-footer">
            <div class="text-body-secondary mx-auto  text-center">------------ ------------ ------------</div>
          </div>
        </div>
      </div>


      <div class="col col-xl-6" i="commetID">
        <div class="card h-100">
          <div class="card-header  text-white bg-primary"> <i class="fa-regular fa-comments"></i> Latest Comments</div>
          <!-- <img src="..." class="card-img-top" alt="..."> -->
          <div class="card-body ">
            <h5 class="card-title border-bottom border-1 border-dark mb-1">Test : Comments <?= $sessionUser ?> </h5>
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
            <div class="text-body-secondary mx-auto text-center">------------ ------------ ------------</div>
          </div>
        </div>
      </div>

      <div class="col  ">
        <div class="card h-100">
          <div class="card-header  text-white bg-primary"><i class="fa-solid fa-puzzle-piece"></i> My Ads</div>
          <!-- <img src="..." class="card-img-top" alt="..."> -->
          <div class="card-body">
            <h5 class="card-title border-bottom border-1 border-dark mb-1">Test : Ads <?= $sessionUser ?> </h5>
            <div class="card-text mydisp ">
              <div class="row">

                <?php
                if (empty($ItemsOfUser)) {
                  echo "<h3 class='fw-bold bg-gray text-center'>No Items</h3>";
                } else {
                  foreach ($ItemsOfUser as $item): ?>

                    <div class="col-sm-6 col-md-3    p-2">
                      <div class="thumbnail box-item  border-1 border border p-1">
                        <div class="price-tag">
                          <?= $item->Price ?>
                        </div>
                        <?php if( $item->ApproveItm ==0){   ?>
                          <div class="p-absolut pending-approve">
                            Pending ...
                          </div>
                          <?php   }  ?>
                        <img src="./doc/user-picture.png" alt="No Image" class="img-fluid img-thumbnail" />
                        <h4 class="title p-1"> 
                          <a href="itemDetail.php?itemId=<?= $item->ItemID ?>">
                            <?= $item->Name ?>
                          </a>
                        </h4>
                        <p class="pt-2 p-0 mb-0">
                          <?= substr($item->Description, 0, 50) . "..." ?>
                        </p>
                        <div class="date text-end">
                        <?= $item->Add_Date ?>
                        </div>
                      </div>
                    </div>

                  <?php endforeach;
                } ?>



              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-body-secondary mx-auto  text-center">------------ ------------ ------------</div>
          </div>
        </div>
      </div>


    </div>
  </div>
</div>



<?php include($temp . "footerAdmin.php"); ?>