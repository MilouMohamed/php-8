 <?php 

    require "./includee/model.php";
 
    $id_cmd=$_GET["id"];
    $valid=$_GET["valid"];
    $valid=($valid == 0)? 1 : 0;
 
    $sqlStat = database()->prepare("update `ec_cmd` set `valid`=?  where  id=?");

    $sqlStat->execute([$valid,$id_cmd]);

    $cmd_list= $sqlStat->fetch(PDO::FETCH_OBJ);

    header("location:detatail_comandes.php?id_cmd=$id_cmd");
 
