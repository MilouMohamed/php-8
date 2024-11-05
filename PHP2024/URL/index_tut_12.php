<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php

    ;
    echo "<br> -------------- <br>";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        if (isset($_POST["envoye"])) {

            echo "<br> ---- Name  <br>"; 
            echo $_POST["Name"];
            echo "<br> ---- Lang  <br>";
            $lgChekd=implode("/", $_POST["lang"]);
echo $lgChekd."<br>";
print_r(explode("/",$lgChekd));
echo "<br> -****************************************** ************<br>";

        }
    }


    ?>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <h2>Les Langagues</h2>
        Name : <input type="text" name="Name">
        <hr>
        <input type="checkbox" name="lang[]"   value="HTML"> HTML
        <hr>
        <input type="checkbox" name="lang[]"   value="CSS"> CSS
        <hr>
        <input type="checkbox" name="lang[]"   value="PHP"> PHP
        <hr>
        <input type="submit" value="Envoye" name="envoye">
    </form>
    <br><br><br>



</body>

</html>


<?php
/*
echo "Is URL";
$myUrl='http://username:password@hostname:9090/path?arg=value&nbr=455&txt=blabla#anchor';;

echo "<pre>";
echo "URL = ".$myUrl;
echo "<br>---- ----- ----- ----- ----- ----- ---- ----- ---- ---- <br>";
print_r(parse_url($myUrl));
echo "<br>---- ----- ----- ----- ----- ----- ---- ----- ---- ---- <br>";
echo parse_url($myUrl,PHP_URL_QUERY);
parse_str(parse_url($myUrl,PHP_URL_QUERY),$query);
echo "<br>";
print_r($query);

echo "</pre>";



*/


echo '<a href="https://www.youtube.com/watch?v=x4f32i5lYH0&list=PLDoPjvoNmBAwP0emFTIiCNcySKz-mlZj7"> Tuto</a>';
?>

<!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/x4f32i5lYH0?si=8IKisYF4QtRdwf_-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->