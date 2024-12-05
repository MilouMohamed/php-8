<nav class="navbar navbar-expand-lg bg-body " data-bs-theme="dark">
  <div class="container">
    <ul class="navbar-nav   mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="navbar-brand" href="dashboard.php"><?= lang("ADMIN")?></a> 
      </li>
    </ul>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="main-nav">
    <ul class="navbar-nav  me-auto  mb-2 mb-lg-0">
      <li class="nav-item d-flex"> 
        <a class="nav-link" href="categories.php?do=Manage"><?= lang("CATEGORIES")?></a>
        <a class="nav-link" href="items.php"><?= lang("ITEMS")?></a>
        <a class="nav-link" href="members.php"><?= lang("MEMBERS")?></a>
        <a class="nav-link" href="comments.php"><?= lang("COMMENTS")?></a>
        <a class="nav-link" href="../index.php">CLient</a>
        <!-- <a class="nav-link" href="dashboard.php">< ?= lang("DASHBOARD")? ></a> -->
        <a class="nav-link" href="#"><?= lang("LOGS")?></a>
      </li>
    </ul>
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <?= lang("MY_NAME")?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="members.php?do=Edit&UserId=<?= $_SESSION["Id"] ?>"><?= lang("EDIT_PROFILE")?></a></li>
            <li><a class="dropdown-item" href="#"><?= lang("SETTINGS")?></a></a></li>
            <li><a class="dropdown-item" href="<?= $temp . "logout.php" ?>"><?= lang("LOGOUT")?></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>