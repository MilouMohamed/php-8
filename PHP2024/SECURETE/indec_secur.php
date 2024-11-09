<?php

echo "Is From Securete";
echo "<br>";

//  sql Injection
// v 4   SQl Injection
require_once "db.php";

if(isset($_GET["id"]) && !empty($_GET["id"])){
    $id_get= filter_var( $_GET["id"],FILTER_SANITIZE_NUMBER_INT);

    echo "<br>is ID $id_get<br>";

 
$requet= $cnx->prepare("select *  from users where id =?");
$requet->execute([$id_get]);

$count=$requet->rowCount();
if($count > 0):
$rows=$requet->fetchAll(PDO::FETCH_OBJ);

echo "<br>";
echo $count;
echo "<br>";
foreach($rows as $item):
echo "id = ".$item->id." || Name = ".$item->name;
endforeach;

else:
echo "<br>No User";

endif;

}else
echo "<br>No ID in GET";


/*
//  sql Injection
// v 3  XSS CROSS SITE SCRIPTING
if(isset($_GET["nom"])):
    // $nom= filter_var($_GET["nom"],FILTER_SANITIZE_STRING);
        // echo $nom."<br>";//STRING

        // $nbr= filter_var($_GET["nom"],FILTER_SANITIZE_NUMBER_INT);// RETURN NUMBER
            // echo $nbr."<br>";
            echo $_GET["nom"];
endif;



/* */