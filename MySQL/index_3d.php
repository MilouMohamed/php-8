<?php

 

if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "on") {
    $location = 'http://www.incentivehouse.ma/3D/Kech/index.html';
    header('HTTP/1.1 301 Moved Permanently');
    header('Location:' . $location);

    exit;
}



?>