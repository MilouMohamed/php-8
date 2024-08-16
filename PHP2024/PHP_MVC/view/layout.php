<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> </title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
<?php include_once "./view/include/nav.php"; ?>
    <div class="container">
        <h1><?= $title ?></h1>
        <?= $content ?>

    </div>

</body>

</html>