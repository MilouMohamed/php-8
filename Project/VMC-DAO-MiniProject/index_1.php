<?php
use app\controller\Voiture_contro;

require "vendor/autoload.php";

if (isset($_GET["action"])) {

    $actionPage = $_GET["action"];

    switch ($actionPage) {
        case 'list': {
            Voiture_contro::index_Action();
            break;
        }
        case 'create': {
            Voiture_contro::create_Action();
            break;
        }
        
        case 'store': {
            Voiture_contro::store_Action();
            break;
        }
         
        case 'edit': {
            Voiture_contro::edit_Action(); 
            break;
        }
        case 'update': {
            Voiture_contro::update_Action();
            break;
        }
        case 'delete': {
            Voiture_contro::delete_Action();
            break;
        }
        
        

        default: {
            echo "<h2>Page Not Found 404 <h2>";

            break;
        }
    }

}

// print_r($voitr);




/*

echo "<pre>";
echo "</pre>";


composer init ;


 composer dump-autoload











base de donness
use mvc_1_v3 ;

CREATE table Voiture (
id int PRIMARY key AUTO_INCREMENT ,
    modele varchar(100),
    prix double 
)   ;


INSERT INTO `voiture`  VALUES 
( null,"Bmw 1",10000.2),
 ( null, "Mercides 1",7000),
 ( null, "toyota 1",99000),
 (  null, "toyota 2",90000),
 (  null,"jep 01",66600),
 (  null,"dacia 1",22200);
*/













