<?php

const USER="root";
const PASS="";  
const OOPTION=[
    PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
];

try {
$cnx= new PDO("mysql:host=localhost;dbname=securete_ews",USER,PASS,OOPTION);   
$cnx->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
} catch (PDOException $exp) {
   echo "<br>PROBLEME DE CONNEXION ".$exp->getMessage()."<br>";
}


echo "FROM DB";

