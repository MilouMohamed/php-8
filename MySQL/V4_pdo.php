<?php

// v4  
// define("CNX","mysql:host=localhost;dbname=products;");
  define("CNX","mysql:host=localhost;dbname=V_5;");


$dsn=CNX;
$user="root";
$pw="";
$option=array(
    PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES utf8",// Pour lettres Arabic
);
try {

$db= new PDO($dsn,$user,$pw,$option);// start new connecsion with pdo class
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
echo " <br>You are Connected <br>";

// $q="insert into items (nome) values ('Prod-44'),('Prod-55') ;";
// $q="insert into items (nome) values ('منتج  88') ;";

// $db->exec($q);


// V5
for ($i=0; $i < 500; $i++) { 
  $prer=$db->prepare("insert into numerc (nbr) values (1200)");
  $prer->execute();
  echo "   ".$i;
}


}catch(PDOException $msg) {
 
    echo " <br>Probleme".$msg->getMessage()." <br>"; 
}







