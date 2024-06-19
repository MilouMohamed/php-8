<?php

// v6
  define("CNX","mysql:host=localhost;dbname=V_5;");
// V_5 Table V_6

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
 
 $q="insert into items (nome) values ('منتج  88') ;";

 $db->exec($q);

 

}catch(PDOException $msg) {
 
    echo " <br>Probleme".$msg->getMessage()." <br>"; 
}







