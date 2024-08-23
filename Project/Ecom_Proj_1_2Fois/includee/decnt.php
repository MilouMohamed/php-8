 
    <?php
 session_start();
        session_unset();
        session_destroy();
        
  if(is_null($_SESSION["user"]) or empty($_SESSION["user"])){
    header("location:../connection.php");
      }