<?php

echo "Is From Securete";
echo "<br>";
// Video 18
// ini_set('display_errors', '0');// desacteve msg error
// error_reporting(0);

// v 10 https let s encrypt  free ssl


// v 9 header location thene exit or die

   header("location:test_php.php");
// die(); or exit(); //Pour Arrete le script
echo "<br>is File index v 18 videoS<br>";



// v 8 htaccess (desactive Un Chemain)
// ------ M1 dans fichie .htaccess
# ceci est un commentaire   
// Option -Indexes 
// # Echo Erorr Message
// ErrorDocument 403 "Hello You Cant Entre This Directory"

// ------ M2 Ajoute des Index.php OU html dans les Folders




/*
// v 7 desable Error
try {
    // phpinfo();
    require "test.php"  ;
} catch (Exception $exp) {
   echo "MY Error <br>";
//    echo $exp."<br>";
}






/*
// v 6 Hash password
// password_hash et password_verify
$pass="123400";

$pass_hash =password_hash($pass,PASSWORD_DEFAULT);
echo"HASH = ".$pass_hash;
echo "<br><br><br>";
if(password_verify("123400",$pass_hash)):
echo "Oui meme";
else:
echo "Non Pas les  memes";
endif;





/*
// anciane methode
$md5="Osama00";
$md5=md5($md5);
echo "<br>---- ----- ------ ----- ---- ---- ----- ----- <br>";
echo"MD5 = ".$md5;




/*
//  sql Injection
// v 5 Prevent Remote File Injection 
// include page dans votre page
//serveur config redemarer .. php.ini allow_url_include=0

if (isset($_GET["p"])) {
    $page = $_GET["p"];
    $pages = array("test_txt.txt", "test_php.php");
    if (in_array($page, $pages)) {
        echo "Oui dans Liste<br><br>";
        include $page;
    }else {
        echo "Pas dans Liste  des Pages<br>";
    }
}

 
// include "test_php.php";






/*
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