<?php

$id=$_GET["id"];
if (isset($_GET["id"])) {
 require_once("databaseEcom.php");

$sql= $pdo->prepare("SELECT * FROM `ec_catg` WHERE  `id_cg` = ? ");
 
$sql->execute([$id])  ; 
$sql=$sql->fetch(PDO::FETCH_OBJ); 

// var_dump($sql);

$libl=$sql->libelle;
$desc=$sql->descrip;
$date_cr=$sql->date_crate_c;
$econ_c=$sql->econ_c;

?>
        <div class="label-info label-info-bon ">
            Modification de  <?php echo $libl  ?> Dans Les Categores
        </div>
<?php
    }
    else   {

?>
<div class="label-info  ">
    Probleme Dans la Base de donnees !!!
</div>
<?php
    }
if(isset($_POST["send_modif"])){
// Modification 

$libl=$_POST["Libelle"];
$desc=$_POST["description"];
$date_cr=$_POST["date_creat"]; 
$econ_c=$_POST["econ_c"]; 

if(!empty($libl) && !empty($desc) && !empty($date_cr) && !empty($econ_c) ){ 
$req= $pdo->prepare("UPDATE `ec_catg`  set libelle=?, `descrip`=?,econ_c =?,date_crate_c =?
                     WHERE id_cg=?;"); 

 $req->execute([$libl,$desc,$econ_c,$date_cr,$id]); 

} else {
    ?> 
<div class="label-info  ">
    Libelle , Description  Et Date Son Obligatoir;
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
    <title>Modifeir Categore</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include_once("nav.php")   ?>

    <div class="container-global cont-categ">
        <h2>Modifier Une Categore
<h1>
 
</h1>

        </h2>
        
        <form action="" method="post" class="form-categ">
            <div class="libell">
                <label for="Libelle">Libelle : </label>
                <input type="text" name="Libelle" value="<?= $libl ;?>">
            </div>

            <div class="libell">
                <label for="description">Description : </label>
                <textarea name="description" > <?= $desc ;?></textarea>
            </div>
            <div class="libell">
                <label for="econ_c">Econ_c : </label>
                <textarea name="econ_c" > <?= $econ_c ;?></textarea>
            </div>

            <div class="libell">
                <label for="date_creat">Date De Creation : </label>
                <input type="datetime-local"  min="2020-01-01T12:00"  max="2028-01-01T12:00" name="date_creat"  
                 value="<?php echo date_format(date_create($date_cr),'Y-m-d H:i') ;?>">
            </div>
            <button type="submit"   name="send_modif">Modifeir La Categore</button>

        </form>



    </div>
</body>

</html>