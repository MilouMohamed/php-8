<?php
$titlePage = "Logout/Signup";
 
session_start(); 
session_reset();
session_destroy();
session_cache_expire(0);

echo "is Desconnected <br>";