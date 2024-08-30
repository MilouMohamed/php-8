<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Ecom Site</title>
</head>

<body>
    <?php

    include "./includee/nav.php";
    require "./includee/model.php";

    if (!isset($_SESSION["user"]))
        header("location:connection.php");


    if (isset($_GET["id"])) {

        $sqlState = database()->prepare("SELECT * FROM `ec_produit` WHERE id =? ");
        $sqlState->execute([$_GET["id"]]);
        $prod = $sqlState->fetch(PDO::FETCH_OBJ);

    }
    // var_dump($prod); 
    // id 	libelle 	prix 	discount 	id_categorie 	date_c 	img 
   
    if (isset($_POST["modifier_prod"])) {

echo "<pre>";
          var_dump($_POST);
echo "</pre>";
        

        $id = $_POST["id"];
        $libel = $_POST["libel"];
        $prix = $_POST["prix"];
        $discount = $_POST["discount"];
        $id_categorie = $_POST["id_categorie"];

          

        if (empty($libel) || empty($prix)  || empty($discount)  ) {
            ?>
            <div class="alert error">
                <h2>Tous les Champs sont Obligatoire </h2>
            </div>
            <?php
        } else {

            $date = date("Y-m-d H:i:s");
            $sqlState = database()->prepare("update  `ec_produit` set libelle =? , prix=? , discount=? , id_categorie =? where id = ?"); 
            // <!-- // id 	libelle 	prix 	discount 	id_categorie 	date_c 	img 	 -->  
            $etat = $sqlState->execute([$libel, $prix, $discount,$id_categorie, $id]);


            if ($etat) {
                header("location:list_prod.php");
            } else {
                ?>
                <div class="alert error">
                    <h2>Probleme de Connection !!!</h2>
                </div>
                <?php
            }
        }
    }

    ?>
    <div class="container">
        <form method="POST" class="center mdf">

            <h1>Modifier Produit</h1>
            <input type="hidden" name="id" value="<?= $prod->id ?>">

            <div class="row">
                <label for="libel">Libelle : </label>
                <input type="text" name="libel" value="<?= $prod->libelle ?>">
            </div>


            <div class="row">
                <label for="prix">Prix : </label>
                <input type="number"  step="2"  name="prix" value="<?= $prod->prix ?>"></input>
            </div>
 
            <div class="row">
                <label for="discount">Disc : </label>
                <input type="range" name="discount" value="<?= $prod->discount ?>"></input>
            </div> 
            <?php

            $categrs_option = database()->query("SELECT * FROM `ec_categorie`")->fetchAll(PDO::FETCH_OBJ);

            ?>
            <div class="row">
                <label for="id_categorie">Categ : </label>
                <select name="id_categorie">
                    <?php
                    foreach ($categrs_option as $ctg) {
                        if ($prod->id_categorie == $ctg->id)
                        ?>
                        <option value="<?= $ctg->id ?>" <?php if ($prod->id_categorie == $ctg->id)
                        { echo "selected" ; } ?> >
                            <?php  echo  "  $ctg->libelle </option>";
                      } ?>

                </select>
            </div>
             
            
            <div class="row">
                <label >Date : </label>
                <!-- <input type="Date"  value="<?= date_format( date_create($prod->date_c),"Y-m-d");   ?>" disabled />  -->
                <input type="text"  value="<?= $prod->date_c    ?>" disabled /> 
            </div>
            
            <div class="row"> 
                <input type="submit" name="modifier_prod" value="Modifier">
            </div>


        </form>

    </div>

</body>

</html>