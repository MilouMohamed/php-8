<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../style.css">
    <link rel="stylesheet" href="./../css/all.min.css">
    <title>Ecom Site</title>
</head>

<body>
    <?php
    include "../includee/c_nav.php";

    // if (!isset($_SESSION["user"]))
    // header("location:connection.php");
    

    require "../includee/model.php";

    $categors = database()->query("select  * from `ec_categorie`  order by id desc ")->fetchAll(PDO::FETCH_OBJ);

    // var_dump($categors);
    
    if (count($categors) == 0) {
        ?>
        <div class="alert error">
            <h2>Pas De Categories</h2>
        </div>
        <?php die();
    }

    ?>
    <div class="container">
        <div class="center-v">

            <h1>Liste Des Categories</h1>
            <hr><br> 
            <div class="list-Items m-5 ">
                <?php
                foreach ($categors as $catgr):
                    ?>

                    <a class="btn  m-5 hvr-b-r" 
                    href="<?php echo "./c_categ.php?id=$catgr->id&libelle=$catgr->libelle&icon=$catgr->icon_c"; ?> 
                    " >
 

                    <i class="<?php echo  $catgr->icon_c  ; ?>" ></i>
                   

                    <?=$catgr->libelle ; ?>
                    </a>

                    <!-- &icon=$catgr->icon_c -->

                    <?php
                endforeach;
                ?>
            </div>


        </div>

        <i class="fa-solid fa-icons"></i>
            <i class="fa-solid fa-icons"></i>
    </div>

</body>

</html>