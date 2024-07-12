<?php
session_start();
$id_u = $_SESSION["utilisateur"]["id_u"];

unset($_SESSION["Panier"][$id_u]);  
 

?>