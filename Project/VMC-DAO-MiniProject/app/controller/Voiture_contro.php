<?php
namespace app\controller;
use app\models\model;
use app\models\Voiture;


class Voiture_contro extends Base_contro
{


    public static function getModel()
    {
        if (is_null(static::$model)) {
            static::$model = new Voiture();
        }
        return static::$model;
    }


    public static function index_Action()
    {
        $voitures = static::getModel()->latest();
        static::view("list", $voitures);

    }

    public static function create_Action()
    {
        static::view("create");

    }
    public static function store_Action()
    {

      
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            static::getModel()
                ->setModele($_POST["model"])
                ->setPrix($_POST["prix"])
                ->create();
            static::header("list");

        }   

    }
    public static function edit_Action()
    {
        $id = $_GET["id"];
        static::view("edit", Voiture::where($id));

    }
 
    public static function update_Action()
    {  
          
        if($_SERVER['REQUEST_METHOD'] == "POST"){
 
        static::getModel()
            ->setModele($_POST["model"])
            ->setPrix($_POST["prix"])
            ->update($_POST["id"]);

          static::header("list");

    }
}


    public static function delete_Action()
    { 
        static::getModel()->delete($_GET["id"]);
        static::header("list");
    } 
}











