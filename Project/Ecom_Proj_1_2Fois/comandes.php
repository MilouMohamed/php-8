<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <title>Ecom Site</title>
</head>

<body>
    <?php
    include "./includee/nav.php";

    //  if (!isset($_SESSION["user"]))
    //  header("location:connection.php");
    

    require "./includee/model.php";

    $cmd_list = database()->query("SELECT c.*,u.login as 'Nom' FROM `ec_cmd` c  inner JOIN ec_user  u on c.id_client = u.id order by c.date_c_cmd desc ")->fetchAll(PDO::FETCH_OBJ);

    //id 	id_client 	total 	date_c_cmd 	Nom 	
    // var_dump($cmd_list);
    
    if (count($cmd_list) == 0) {
        ?>
        <div class="alert error">
            <h2>Pas De Commandes </h2>
        </div>
        <?php die();
    }

    ?>
    <div class="container">
        <div class="center-v">

            <h1>Liste Des  Commandes</h1>
            <hr><br> 
            <div class="list-Items m-5 ">
                
            
            <hr>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOM</th>
                        <th>TOTAL</th>
                        <th>Date</th> 
                        <th>Details</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($cmd_list as $cmd_item):
                        ?>
                        <tr>
                            <td><?= $cmd_item->id; ?> </td>
                            <td><?= $cmd_item->Nom; ?> </td>
                            <td><?= $cmd_item->total; ?> MAD</td>
                            <td><?= $cmd_item->date_c_cmd; ?></td>
                            <td><a href="detatail_comandes.php?id_cmd=<?= $cmd_item->id; ?>"> 
                            <i class="fa-solid fa-bag-shopping"></i>
                            </a></td>
                           <!-- //id 	id_client 	total 	date_c_cmd 	Nom   -->
                        </tr>
                        <?php
                    endforeach;
                    ?>
                </tbody>
            </table>

            </div>


        </div>

        
    </div>

</body>

</html>