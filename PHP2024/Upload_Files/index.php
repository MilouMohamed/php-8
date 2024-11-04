<br>
<?php

?>
<br><br><br>
<form method="post" enctype="multipart/form-data">
    <label for="File">Files Multiple : </label>
    <input type="file" width="200px" name="my-works[]" Multiple="multiple"> <br>
    ----------------------------------<br>
    <input type="submit" value="Envoyer">
</form>
<hr>
<?php

// Pour Les serveur En Ligne
echo "---------------";
echo "<br> REALPATH =\t\t\t\t";
echo  realpath(dirname(getcwd()));

echo "<br> FILLE =\t\t\t\t";
echo  __FILE__;

echo "<br> DIR =\t\t\t\t";
echo  __DIR__;
echo "<br>";
echo "---------------";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "OUi POST <br>";

    $images_up = $_FILES["my-works"];
    echo "<pre>";
    //  print_r($_FILES["my-works"]);

    $name_type_s = $images_up["type"];
    $name_tmp_name_s = $images_up["tmp_name"];
    $name_img_s = $images_up["name"];
    $name_size_s = $images_up["size"];
    $name_error_s = $images_up["error"];


    // echo "Count " . count($name_img_s);
    // echo "<br>";
    $extentios = array("png", "jpg", "jpeg", "gif");
    if ($name_error_s[0] == 4) {
        echo "<div style='background-color:orange;padding:7px 12px; 
        margin-bottom:10px'>  No File Uploded</div>";
    } else {

        $img_To_bd="";
        for ($i = 0; $i < count($name_img_s); $i++):

            $errors = array();


            if ($name_size_s[$i] > 1000_000)
                $errors[] = " Grand Size !!!";
            $typeImg = explode(".", $name_img_s[$i]);
            $typeImg = strtolower(end($typeImg));
            // echo "<br> typeImg $typeImg <br>";

            if (!in_array($typeImg, $extentios))
                $errors[] = " Pad de type Image !!!";



                $nameRand="Image_".rand(2,40_000_000_000).".$typeImg"; 

        if (empty($errors)) { 
            move_uploaded_file($name_tmp_name_s[$i], __DIR__ . "\up\\". $nameRand);

            echo "<div style='background-color:green;padding:5px; margin-bottom:10px'>Nom Fille $name_img_s[$i] \t\t\t\t Est Bien Uplode  " . ($i + 1) . " </div>";
            $img_To_bd.="/". $nameRand;


        } else {

            echo "<br>Error File Number  \t\t |" . ($i + 1) . "|<br>";
            echo "<div style='background-color:orange;padding:7px 12px; 
        margin-bottom:10px'>";
            for ($j = 0; $j < count($errors); $j++) {
                echo "---Nom Fille " . $name_img_s[$i] . "\t    :$errors[$j]";
            }
            echo "</div>"; 
       
        }

    endfor;
    echo "<br/>"; 

   echo $img_To_bd;

}


}







/*
    echo "<pre>";
    // print_r($image_up);
    echo "</pre>";
    echo "Name is   $name_img <br>";
    echo "Type is   $name_type <br>";
    echo "temp is   $name_tmp_name <br>";
    echo "Size is   $name_size <br>";
*/




/*
    $extentios = array("png", "jpg", "jpeg", "gif");

    $extent_img = explode('.', $name_img);
    $extent_img = strtolower(end($extent_img));



    // print_r($extent_img);

    $errors = array();

    if ($name_error == 4) {
        $errors[] = "<h2>Pas De Fichier Uplode !!!</h2>";
    } else {

        if ($name_size > 10_000):
            $errors[] = "<h2> La taille Est Superieur de X </h2>";
        endif;

        if (!in_array($extent_img, $extentios)):
            $errors[] = "<h2>Le fichier N Est Pas Image !!!</h2>";
        endif;
    }




    if (empty($errors)) {
        move_uploaded_file($name_tmp_name, __DIR__ . "\up\\" . $name_img);
    } else {
        foreach ($errors as $erro) {
            echo $erro;
        }
    }



}





/*

echo $_SERVER['DOCUMENT_ROOT'] . "<br>";
echo __FILE__ . "<br>";
;
echo __DIR__ . "<br>";
;

single file
<br>
<?php
?>
<br><br><br>
<form method="post" enctype="multipart/form-data">
<label for="File">Files Multiple : </label>
    <input type="file" width="200px" name="my-works[]" Multiple="multiple"> <br>
    ----------------------------------<br>
    <label for="File">File : </label>
    <input type="file" width="200px" name="my-work" Multiple="multiple"> <br>
    ----------------------------------<br>
    <input type="submit" value="Envoyer">
</form>
<hr>
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "OUi POST <br>";

    $image_up = $_FILES["my-work"];
    echo "<pre>";
echo "Count ".count($_FILES);
    print_r($_FILES["my-work"]);

    $name_type = $image_up["type"];
    $name_tmp_name = $image_up["tmp_name"];
    $name_img = $image_up["name"];
    $name_size = $image_up["size"];
    $name_error = $image_up["error"];

    echo "<pre>";
    // print_r($image_up);
    echo "</pre>";
    echo "Name is   $name_img <br>";
    echo "Type is   $name_type <br>";
    echo "temp is   $name_tmp_name <br>";
    echo "Size is   $name_size <br>";


    $extentios = array("png", "jpg", "jpeg", "gif");

    $extent_img = explode('.', $name_img);
    $extent_img = strtolower(end($extent_img));



    // print_r($extent_img);

    $errors = array();

    if ($name_error == 4) {
        $errors[] = "<h2>Pas De Fichier Uplode !!!</h2>";
    } else {

        if ($name_size > 10_000):
            $errors[] = "<h2> La taille Est Superieur de X </h2>";
        endif;

        if (!in_array($extent_img, $extentios)):
            $errors[] = "<h2>Le fichier N Est Pas Image !!!</h2>";
        endif;
    }




    if (empty($errors)) {
        move_uploaded_file($name_tmp_name, __DIR__ . "\up\\" . $name_img);
    } else {
        foreach ($errors as $erro) {
            echo $erro;
        }
    }



}





/*

echo $_SERVER['DOCUMENT_ROOT'] . "<br>";
echo __FILE__ . "<br>";
;
echo __DIR__ . "<br>";
;
*/

?>