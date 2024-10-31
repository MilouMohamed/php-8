<br>
<?php
?>
<br><br><br>
<form method="post" enctype="multipart/form-data">
    <label for="File">File : </label>
    <input type="file" name="my-work"> <br>
    ----------------------------------<br>
    <input type="submit" value="Envoyer">
</form>
<hr>
<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    echo "OUi POST <br>";

    $image_up = $_FILES["my-work"];

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