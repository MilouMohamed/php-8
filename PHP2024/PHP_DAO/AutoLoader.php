<?php
 
class AutoLoader {


  public static function regester(){

spl_autoload_register(static function ($class) {


    $fileName =  $class . ".php";
    $fileName=str_replace("\\","/",$fileName);
//  echo "Class $class<br>";
//  echo "fileName $fileName<br>";

    if (file_exists($fileName)) {
      require $fileName;
    }
  });
}
}
  