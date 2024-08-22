<?php
namespace app\models;
use PDO;

class model
{

    protected $id;
    protected static  $db;

    public function getId()
    {
        return $this->id;
    }
    public static function database()
    {  

         if (is_null(static::$db)) {
            static::$db = new PDO("mysql:dbname=mvc_1_v3;host=localhost;", "root", "");
        }
        return static::$db;
    }
}
