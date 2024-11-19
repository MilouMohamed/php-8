<?php


$dsn="mysql:host=localhost;dbname=ecom_php_2";
$user="root";
$pass="";
$optionBD=array(
    PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
);


try {
   $cnx=new PDO($dsn,$user,$pass,$optionBD);
   $cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//    echo "<br>Oui Connecte<br>";
} catch (PDOException $exp) { 
    echo "<br>Probleme De Connection $exp<br>";
}
 





