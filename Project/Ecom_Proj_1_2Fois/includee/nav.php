<?php

session_start();


?>

<nav>
    <div class="logo">
        <li><a href="index_.php">Milou MED</a></li>
    </div>
    <ul>

        <?php
        if (!isset($_SESSION["user"])) { ?>
            <li><a href="index_.php">Insc</a></li>
        <?php } ?>
        <li><a href="connection.php">Conx</a></li>
        <?php
        if (isset($_SESSION["user"])) {
            ?>
            <li><a href="ajouter_catg.php">Aj Catg</a></li>
            <li><a href="ajouter_prod.php">Aj Prod</a></li>
            <li><a href="list_categ.php">lt Cat</a></li>
            <li><a href="list_prod.php">lt Prd</a></li>
            <li><a href="admin.php">Admin</a></li>
            <li><a href="includee/decnt.php">Dec</a></li>
        <?php
        }
        ?>

    </ul>
</nav>