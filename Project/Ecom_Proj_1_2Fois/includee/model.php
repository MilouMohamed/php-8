<?php
 

function database()
{ 
        return    $db = new PDO("mysql:host=localhost;dbname=ecom_1_2eme_f", "root", "");
 
}

