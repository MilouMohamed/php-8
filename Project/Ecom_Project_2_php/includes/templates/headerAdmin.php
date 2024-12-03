<?php

$allCats = getAlllItemsWhere("categories", "1", "1", "=", "order by CatID  ASC");

 

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= getTitle() ?></title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


  <!-- Fontawsome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/brands.min.css">

  <!-- My Style -->
  <link rel="stylesheet" href="<?= $css ?>style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body " data-bs-theme="dark">
    <div class="container">
      <ul class="navbar-nav   mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="navbar-brand" href="index.php"><?= lang("CLIENT") ?></a>
        </li>
      </ul>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="main-nav">
        <ul class="navbar-nav  ms-auto  mb-2 mb-lg-0">
          <?php 
          foreach ($allCats as $cat) {    ?>
            <li class="nav-item ">
              <a class="nav-link " href="categorie.php?pageId=<?= $cat->CatID ?>&pageName=<?=  str_replace(" ","-", $cat->NameCat )?>">
                <?=   $cat->NameCat  ?>
              </a>
            </li>
          <?php } ?>

        </ul>
        <!--  
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <?= lang("MY_NAME") ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="members.php?do=Edit&UserId=<?= $_SESSION["Id"] ?>"><?= lang("EDIT_PROFILE") ?></a></li>
            <li><a class="dropdown-item" href="#"><?= lang("SETTINGS") ?></a></a></li>
            <li><a class="dropdown-item" href="<?= $temp . "logout.php" ?>"><?= lang("LOGOUT") ?></a></li>
          </ul>
        </li>
      </ul>
      -->
      </div>
    </div>
  </nav>