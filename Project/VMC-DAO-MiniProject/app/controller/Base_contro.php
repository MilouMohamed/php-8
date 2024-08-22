<?php
namespace app\controller;



class Base_contro
{  
    protected  static $model;
 
    public static function view($view, $voitures=null){
 
        require "app/views/".$view.".php";

    }
 
    public static function header($action){
        header("location:index_1.php?action=$action");
    }



}


