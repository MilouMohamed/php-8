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
    //detatail_comandes.php

    require "./includee/model.php";

    $id_cmd=$_GET["id_cmd"];

    $sqlStat = database()->prepare("SELECT c.*,u.login as 'Nom' FROM `ec_cmd` c  inner JOIN ec_user  u on c.id_client = u.id  where c.id= ?  order by c.date_c_cmd desc ");

    $sqlStat->execute([$id_cmd]);
    $cmd_list= $sqlStat->fetch(PDO::FETCH_OBJ);

 
    // $cmd_list 

    //id 	id_client 	total 	date_c_cmd 	Nom 	
    // var_dump($cmd_list);
    
    if (is_null($cmd_list)) {
        ?>
        <div class="alert error">
            <h2>Pas De Commandes </h2>
        </div>
        <?php die();
    }
 

    $sqlStat = database()->prepare("SELECT c.*,p.libelle as 'lib', p.discount FROM `ec_line_cmd` c inner JOIN ec_produit p on p.id =c.id_p WHERE c.id_cmd = ? order by  c.id_p desc  ");

    $sqlStat->execute([$id_cmd]);
    $Ling_cmd_list= $sqlStat->fetchAll(PDO::FETCH_OBJ);
    
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
                        <th>Link</th> 
                    </tr>
                </thead>
                <tbody>
                   
                        <tr>
                            <td><?= $cmd_list->id; ?> </td>
                            <td><?= $cmd_list->Nom; ?> </td>
                            <td><?= $cmd_list->total; ?></td>
                            <td><?= $cmd_list->date_c_cmd; ?></td>
                            <td><a href="valid_cmd.php?<?php echo"id=$cmd_list->id&valid=$cmd_list->valid"; ?>">
                            <?= $cmd_list->valid == 0 ? "Valider" :"Anuller"; ?>
                            <i class="fa-solid fa-arrow-rotate-left">

                            </i></a></td>
                           <!-- //id 	id_client 	total 	date_c_cmd 	Nom   -->
                        </tr>
                        
                </tbody>
            </table>

            <br> <hr>
            <h1 class="center-v">Details Des Commandes  </h1>
            <br> 

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Prod</th>
                        <th>Prix Un</th>
                        <th>Descnt</th>
                        <th>Qtt</th> 
                        <th>Total</th>  
                    </tr>
                </thead>
                <tbody>
                    <?php
           
                    foreach ($Ling_cmd_list as $cmd_item):
                        ?>
                        <tr>
                            <td><?= $cmd_item->id; ?> </td>
                            <td><?= $cmd_item->lib; ?> </td>
                            <td><?= $cmd_item->prix; ?></td>
                            <td><?= $cmd_item->discount; ?></td>
                            <td>X <?= $cmd_item->qtt; ?></td>
                            <td><?= $cmd_item->total; ?></td> 
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