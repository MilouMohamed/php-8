<?php

include_once("databaseEcom.php");

$sqlstat = $pdo->prepare("SELECT * FROM `ec_catg`  ");

$sqlstat->execute();

$tab_prods = $sqlstat->fetchAll();




if (isset($_POST["sendNc"])) { 

    $lib = $_POST["Libelle"];
    $prix = $_POST["prix"];
    $disc = $_POST["discont"];
    $id_cat = $_POST["id_categor"];
    if (!empty($lib)  and !empty($prix)  and !empty($disc)  and !empty($id_cat)) {
        $dt = date("Y-m-d H:i:s");  

        $rqt =   $pdo->prepare("INSERT INTO `ec_prod`(  `libelle`, `prix`, `discont`, `id_cg`, `date_crate_p`) VALUES (?,?,?,?,?)");
        $inserte =  $rqt->execute([$lib, $prix, $disc, $id_cat, $dt]);
        if ($inserte) {
            ?>
            <div class="label-info label-info-bon ">
                Bien Ajouter <?php echo $lib  ?> Dans Les Categores
            </div>
        <?php
        }
        else{
        ?>
            <div class="label-info label-info-bon ">
                Probleme !!! (456000)
            </div>
        <?php
        }

       
    } else {


    ?>
        <div class="label-info  ">
            Probleme Tous les Champ Sont Obligatoir !!!
        </div>
<?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Produite</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once("nav.php")   ?>

    <div class="container-global cont-categ">
        <h2>Ajoutre Produit</h2>

        <form action="" method="post" class="form-prod">
            <!-- libelle 	prix 	discont 	id_cg 	  -->

            <div class="libell">
                <label for="Libelle">Libelle : </label>
                <input type="text" name="Libelle" value="lib1">
            </div>

            <div class="libell">
                <label for="prix">Prix : </label>
                <input type="number" name="prix" min="1" step="0.5" value="2">
            </div>

            <div class="libell" id="myRangLab">
                <label for="discont">Discont : </label>
                <input type="range" name="discont" min="0" max="90" value="40">
            </div>

            <div class="libell">
                <label for="id_categor">Choisissez Une : </label>
                <select name="id_categor">
                    <option value="">Choisissez Une Categorie</option>
                    <option value="2" selected>My Cat</option>
                    <?php
                    //SELECT * FROM `ec_catg`  `id_cg`,`libelle`
                    foreach ($tab_prods as   $value) {

                        echo "<option value=' " . $value["id_cg"] . "'> " . $value["libelle"] . "</option>";
                    }
                    ?>
                </select>
            </div>



            <button type="submit" name="sendNc">Ajouter Produit</button>

        </form>

    </div>


    <script>
var progres= document.getElementsByName("discont")[0];
var label1= document.querySelector("#myRangLab label::after");
  
 
console.log(progres); 

progres.onchange=()=> {
    var val=progres.value;
    console.log(val); 
    

    
    console.log(label1); 

  

}


    </script>
    <style>
#myRangLab label {
position: relative;  
}
#myRangLab label::after  {
position: absolute;
content: "";
width: 20px; 
height: 20px;   
border-radius: 40%;
background-color: #ac9e9e;
  top: -12px;
  left: 120px;
}


    </style>
</body>

</html>