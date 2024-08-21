<?php
namespace app\models;
use PDO;

class model
{

    private $id;
    private static  $db;

    public function getId()
    {
        return $this->id;
    }
    public static function database()
    {

        if (is_null(static::$db)) {
            static::$db = new PDO("MYSQL:local:localhost,dbname=mvc_1_v3", "root");
        }
        return static::$db;
    }
}
