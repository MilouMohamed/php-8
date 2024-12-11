<?php
// Project Start le  14-11-2024 


$titlePage = "Home";

include "init.php";

// $_SESSION["client"] = ["userName" => $userName, "noId" => 10000];
/*
if(empty($sessionUser)){
     header("location:login.php");
   exit; 
}
*/

$allItems = getAlllItemsWhere("items", "ApproveItm ", "1", "=", " order by ItemID DESC");

?>
<div class="container ">
  <h1 class="titre-page border-x-2-red w-max" >Page Home</h1>

  <div class="row mb-3">

    <?php
    if (empty($allItems)) {
      echo "<div class='text-center alert alert-danger'> No Items Or pending Approve 🤗🤗🤗</div>";

    } else {

      foreach ($allItems as $item): ?>

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
            <div class="date text-end me-3">
              <?= $item->Add_Date ?>
            </div>
          </div>
        </div>

      <?php endforeach;
    } ?>

  </div>
</div>

<?php include($temp . "footerAdmin.php"); ?>