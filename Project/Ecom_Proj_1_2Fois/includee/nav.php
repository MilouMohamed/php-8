<?php
session_start(); 
//   echo $_SERVER['PHP_SELF']; 
$pageCurrent=$_SERVER['PHP_SELF'] ; 
$pageIndex="/php2024/Project/Ecom_Proj_1_2Fois/" ; 


?>

<nav>
    <div class="logo">
        <li><a href="index_.php" >Milou MED</a></li>
    </div>
    <ul>

        <?php
        
        if (!isset($_SESSION["user"])) { ?>
            <li><a href="index_.php" class="<?php   echo  ($pageCurrent == ($pageIndex."index_.php"))?"active" :""  ;   ?>" >Insc</a></li>
        <?php } ?>
        <li><a href="connection.php" class="<?php   echo  ($pageCurrent == ($pageIndex."connection.php"))?"active" :""  ;   ?>" >Conx</a></li>

        <li><a href="./FRONT/c_list_categ.php" class="<?php   echo  ($pageCurrent == ($pageIndex."FRONT/c_list_categ.php"))? "active" :""  ;   ?>">Clnt</a>
    </li>



        <?php
        if (isset($_SESSION["user"])) {
            ?>
            <li><a href="ajouter_catg.php" class="<?php   echo  ($pageCurrent == ($pageIndex."ajouter_catg.php"))? "active" :""  ;   ?>" >Aj Catg</a></li>

            <li><a href="ajouter_prod.php" class="<?php   echo  ($pageCurrent == ($pageIndex."ajouter_prod.php"))? "active" :""  ;   ?>" >Aj Prod</a></li>
            
            <li><a href="list_categ.php" class="<?php   echo  ($pageCurrent == ($pageIndex."list_categ.php"))? "active" :""  ;   ?>">lt Cat</a></li>
            
            <li><a href="list_prod.php"  class="<?php   echo  ($pageCurrent == ($pageIndex."list_prod.php"))? "active" :""  ;   ?>" >lt Prd</a></li>
            
            <li><a href="admin.php"  class="<?php   echo  ($pageCurrent == ($pageIndex."admin.php"))? "active" :""  ;   ?>" >Admin</a></li>
            
            <li><a href="comandes.php"  class="<?php   echo  ($pageCurrent == ($pageIndex."comandes.php"))? "active" :""  ;   ?>" >Comandes</a></li>
            
            <li><a href="includee/decnt.php"  class="<?php   echo  ($pageCurrent == ($pageIndex."includee/decnt.php"))? "active" :""  ;   ?>" >Dec</a></li>
             
           
           <?php
        }
        ?>

    </ul>
</nav>