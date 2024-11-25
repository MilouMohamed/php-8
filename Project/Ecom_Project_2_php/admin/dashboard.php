<?php

session_start();

if (!isset($_SESSION["UserName"])) {
    header("location: index.php");
    exit;
} else {

    $titlePage = "Dashboard";
    include "init.php";

    // Start Dashboard $_SESSION['UserName'] $_SESSION['Id'].
    $nbrItems = 5;
    $itemsLatest = getLatest("*", "users", $nbrItems);

    ?>
    <h1 class="titre-page text-uppercase"><?= lang("DASHBOARD") ?> </h1>

    <div class="container">
        <div class="dashbord-status text-center">
            <div class="row">
                <div class="col-md-3">
                    <div class="statu st-members">
                        <h3>Total Members</h3>
                        <span><a href="members.php"><?= countItems("UserId", "users") ?></a></span>
                    </div>
                </div>

                <div class="col-md-3 ">
                    <div class="statu st-pending">
                        <h3>Pending Members</h3>
                        <span><a
                                href="members.php?do=Manage&Panding=YES"><?= getCount("users", "", "RegStatus", "0", "="); ?></a></span>
                    </div>
                </div>

                <div class="col-md-3 ">
                    <div class="statu st-items">
                        <h3>Total Items</h3>
                        <span>3200</span>
                    </div>
                </div>

                <div class="col-md-3 ">
                    <div class="statu st-comment">
                        <h3>Total Comments</h3>
                        <span>3500</span>
                    </div>
                </div>

            </div>
        </div>

        <div class="dashbord-latest mt-3">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa-solid fa-people-line fs-4"></i> Latest <?= $nbrItems ?> Registered Users
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-numbered1">
                                <?php foreach ($itemsLatest as $key => $item) { ?>
                                    <li class="list-group-item justify-content-between d-flex">
                                        <?= strtoupper(($key+1)." | ". $item->FullName) ?>
                                        <div>
                                <a class="btn btn-primary   ps-2 pe-2 p-0" href="members.php?do=Edit&UserId=<?= $item->UserID?>"><i class="fa  fa-edit"></i> Ed</a>
                              
                                <?php if($item->RegStatus == 0): ?> 
                                    <a href="members.php?do=Active&UserId=<?= $item->UserID ?>" class="btn btn-info   ps-2 pe-2 p-0 text-white"><i class="fa-solid fa-key"></i> Ac</a>
                                <?php endif;  ?>
                                </div>
                            </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="card-footer text-muted">
                            Pied de page
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa-solid fa-list-check fs-4"></i> Latest Items
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Titre de la carte</h5>
                        </div>
                        <div class="card-footer text-muted">
                            Pied de page
                        </div>
                    </div>
                </div>
            </div>



        </div>


    </div>

    <?php

    // End Dashboard

    include($temp . "footerAdmin.php");
}

