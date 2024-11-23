<?php

session_start();

if (!isset($_SESSION["UserName"])) {
    header("location: index.php");
    exit;
} else {

    $titlePage = "Dashboard";
    include "init.php";

    // Start Dashboard $_SESSION['UserName'] $_SESSION['Id'].
    ?>
    <h1 class="titre-page text-uppercase"><?= lang("DASHBOARD") ?> </h1>

    <div class="container">
        <div class="dashbord-status text-center">
            <div class="row">
                <div class="col-md-3 ">
                    <div class="statu">
                        <h3>Total Members</h3>
                        <span><?= countItems("UserId","users")  ?></span>
                    </div>
                </div>

                <div class="col-md-3 ">
                    <div class="statu">
                        <h3>Pending Members</h3>
                        <span>30</span>
                    </div>
                </div>

                <div class="col-md-3 ">
                    <div class="statu">
                        <h3>Total Items</h3>
                        <span>3200</span>
                    </div>
                </div>

                <div class="col-md-3 ">
                    <div class="statu">
                        <h3>Total Comments</h3>
                        <span>3500</span>
                    </div>
                </div>

            </div>
        </div>

        <div class="dashbord-latest mt-3">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card"  >
                        <div class="card-header">
                        <i class="fa-solid fa-people-line fs-4"></i>   Latest Registered Users
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Titre de la carte</h5>
                        </div>
                        <div class="card-footer text-muted">
                            Pied de page
                        </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card"  >
                        <div class="card-header">
                        <i class="fa-solid fa-list-check fs-4"></i>   Latest Items
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

