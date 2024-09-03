<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../css/all.min.css">

    <title>Ecom Site</title>
</head>

<body>
    <?php

    include "../includee/c_nav.php";



    require "../includee/model.php";
/*
session_destroy();
session_unset();
die;
*/


    // session_start();
    echo "<br>-------------<br>";
    // var_dump($_SESSION["user"]->id); 

    if (!isset($_SESSION["user"]))
        header("location:../connection.php");

if( isset( $_POST["id"]) &&  isset( $_POST["val"])  ){
    $id_user = $_SESSION["user"]->id;
 
    if (isset($_SESSION["panier"][$id_user][$_POST["id"]])) {
        $_SESSION["panier"][$id_user][$_POST["id"]] = [ 
            "id_p" => $_POST["id"],  
            "qtt"  => $_POST["val"]
            
        ];
    } else { 
        $_SESSION["panier"][$id_user][$_POST["id"]] = [
            "id_p" => $_POST["id"] ,
            "qtt"  => $_POST["val"]
        ];
    }

    
    echo "<pre>";
    var_dump($_SESSION["panier"][$id_user][$_POST["id"]]);
    echo "<br> qqtt=".($_SESSION["panier"][$id_user][$_POST["id"]]["qtt"]);
 
}

header("location:./c_detail_prod.php?id=".$_POST["id"]);
/*
    echo "<pre>";
    // print_r($_SESSION["user"]);
    echo "<br>** SESSION[panier] **<br>";
    print_r($_SESSION["panier"]); 
     
    echo "</pre>";
*/
    ?> 


</body>

</html>