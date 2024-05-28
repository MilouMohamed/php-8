<?php 

if(isset($_COOKIE["V99-1"])  and  isset($_COOKIE["V99"]) ) {


echo "<br>From file index_v99.php value ===>> ". $_COOKIE["V99-1"]."<br>";
echo "<br>From file index_v99.php value ===>> ". $_COOKIE["V99"]."<br>";
}


echo " <br> ------------ <br> ";
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";
?>