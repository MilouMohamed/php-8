<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Ecom Site</title>
</head>

<body>
    <?php

    include "./includee/nav.php"; 


    if (!isset($_SESSION["user"]))  
    header("location:connection.php"); 
  
    ?>
    <div class="container">

        <h2>list page</h2> 
        <div class="center-v  bg-gray p-3 ">
            
        <h3>Bonjour Mr <?=  strtoupper( $_SESSION["user"]->login); ?></h3>
        
        </div>
    </div>
</body>

</html>
 
 