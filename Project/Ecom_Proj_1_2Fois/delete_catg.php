 <?php


    session_start();
    if (!isset($_SESSION["user"]))
        header("location:connection.php");



    if (isset($_GET["id"])) { 
        include_once "./includee/model.php";

        $sqtStat = database()->prepare("DELETE FROM `ec_categorie` WHERE id=?");
        $res = $sqtStat->execute([$_GET["id"]]);
        if ($res) {
              header("location:list_categ.php");
        } else { 
    ?>
    <link rel="stylesheet" href="style.css">
         <div class="center-v">
             <div class="alert error">
                 <h2>Probleme de Supprission !!</h2>
             </div>
         </div>
 <?php
       }
    }
