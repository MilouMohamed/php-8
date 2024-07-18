<?php 
 
try {
    $pdo=new PDO("mysql:host=localhost;dbname=todolist","root","");
} catch (PDOException $e) {
  die("Probleme de connection au bd  ". $e->getMessage());
}
                                                                                                            // MILOU MED
?>