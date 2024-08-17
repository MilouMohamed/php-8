<?php
require_once "./controller/stagaire_control.php";


if (isset($_GET["action"])) {
    $action = $_GET["action"];

    switch ($action) {

        case "create": {
            create_Action();
            break;
        }
        case "listStgr": {
            index_Action();
            break;
        }
        case "destroy": {
            destroy_Action();
            break;
        }
        case "edit": {
            edit_Action();
            break;
        }
        case "store": {
            stor_Action();
            break;
        }
        case "update": {
            update_action();
            break;
        }
        case "delete": {
            delete_Action();
            break;
        }

        default: {
            echo "IS DEFAULT <br>";

        }

    }














    // <!-- MILOU MED  -->




}