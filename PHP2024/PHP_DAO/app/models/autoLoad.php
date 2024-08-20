<?php



spl_autoload_register(function ($class) {

    $fileName = "./app/models/" . $class . ".php";
    if (file_exists($fileName)) {
      require $fileName;
    }
  });
  