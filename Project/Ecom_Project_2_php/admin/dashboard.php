<?php

session_start();

if (!isset($_SESSION["UserName"])) {
    header("location: index.php");
    exit;
} else {

    $titlePage = "Dashboard";
    include "init.php";

    // Start Dashboard $_SESSION['UserName'] $_SESSION['Id'].
    $nbrUsers = 5;
    $usersLatest = getLatest("*", "users", $nbrUsers);

    $nbrItems = 5;
    $itemsLatest = getLatest("*", "items", $nbrItems, "Add_Date");

    ?>
    <h1 class="titre-page text-uppercase"><?= lang("DASHBOARD") ?> </h1>

    <div class="container">
        <div class="dashbord-status text-center">
            <div class="row">
                <div class="col-md-3">
                    <div class="statu  st-members ">
                        <i class="fa fa-user-group "></i>
                        <div class="info">
                            <h3>Total Members</h3>
                            <span><a href="members.php"><?= countItems("UserId", "users") ?></a></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 ">
                    <div class="statu st-pending">
                        <i class="fa fa-user-plus  "></i>
                        <div class="info">
                            <h3>Pending Members</h3>
                            <span><a
                                    href="members.php?do=Manage&Panding=YES"><?= getCount("users", "RegStatus", "0", "=", "and  GroupId != 1"); ?></a></span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 ">
                    <div class="statu st-items">

                        <i class="fa fa-tags "></i>
                        <div class="info">
                            <h3>Total Items</h3>
                            <span>
                                <a href="items.php?do=Manage"><?= getCount("items", "1", "1", "="); ?></a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 ">
                    <div class="statu st-comment">
                        <i class="fa fa-comments "></i>
                        <div class="info">
                            <h3>Total Comments</h3>
                            <span>3500</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="dashbord-latest mt-3">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card ">
                        <div class="card-header d-flex">
                            <i class="fa-solid fa-people-line fs-4"></i> Latest <?= $nbrUsers ?> Registered Users
                            <span class="show-hide-list ms-auto ">
                                <i class="fa fa-plus"></i>
                            </span>
                        </div>
                        <div class="card-body d-none">
                            <ul class="list-group list-group-numbered1">
                                <?php foreach ($usersLatest as $key => $item) { ?>
                                    <li class="list-group-item justify-content-between d-flex">
                                        <?= strtoupper(($key + 1) . " | " . $item->FullName) ?>
                                        <div>
                                            <a class="btn btn-primary   ps-2 pe-2 p-0"
                                                href="members.php?do=Edit&UserId=<?= $item->UserID ?>"><i
                                                    class="fa  fa-edit"></i> Ed</a>

                                            <?php if ($item->RegStatus == 0): ?>
                                                <a href="members.php?do=Active&UserId=<?= $item->UserID ?>"
                                                    class="btn btn-info   ps-2 pe-2 p-0 text-white"><i class="fa-solid fa-key"></i>
                                                    Ac</a>
                                            <?php endif; ?>
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
                        <div class="card-header d-flex">
                            <i class="fa-solid fa-list-check fs-4"></i> Latest <?= $nbrItems ?> Registered Items
                            <span class="show-hide-list ms-auto ">
                                <i class="fa fa-plus"></i>
                            </span>
                        </div>
                        <div class="card-body d-none">
                            <ul class="list-group list-group-numbered1">
                                <?php foreach ($itemsLatest as $key => $item) { ?>
                                    <li class="list-group-item justify-content-between d-flex">
                                        <?= strtoupper(($key + 1) . " | " . $item->Name) ?>
                                        <div>
                                            <a class="btn btn-primary   ps-2 pe-2 p-0"
                                                href="items.php?do=Edit&itemID=<?= $item->ItemID ?>"><i class="fa  fa-edit"></i>
                                                Ed</a>

                                            <?php if ($item->ApproveItm == 0): ?>
                                                <a href="items.php?do=Approve&itemID=<?= $item->ItemID ?>"
                                                    class="btn btn-info   ps-2 pe-2 p-0 text-white"><i class="fa fa-check"></i>
                                                    Ap</a>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="card-footer text-muted">
                            Pied de page Items
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

