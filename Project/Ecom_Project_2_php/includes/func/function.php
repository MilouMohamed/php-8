<?php

function getTitle()
{
    global $titlePage;

    if (isset($titlePage)) {
        echo $titlePage;
    } else {
        echo "Default";
    }

}
function getAllUsers($query = "")
{
    // global $cnx;
    // $stmnt = $cnx->query("select * from users where GroupId != 1 order by CreateAt");
    // return $stmnt->fetchAll(PDO::FETCH_OBJ);
    return getAlllItemsWhere("users", "2", "1 and  GroupId != 1 $query order by CreateAt");
}
 

function checkItemStaus($name ){
    
   $etat=   getAlllItemsWhere("users", "UserName", $name, "=", "and  RegStatus = '1' ") ;

   $etat=reset($etat); 

   return  $etat? true : false;
}
function getAlllItemsWhere($table, $where, $value, $opra = "!=", $option = "and  GroupId != 1")
{
    global $cnx;
      $stmnt = $cnx->query("select * from $table where $where $opra '$value' $option");
    return $stmnt->fetchAll(PDO::FETCH_OBJ);
}
 
function getCount($table , $where, $value, $opra = "!=",$option="")
{
    // global $cnx;
    // $stmnt = $cnx->query("select count($colon) from $table where $where $opra $value and  GroupId != 1");
    return count(getAlllItemsWhere($table, $where, $value, $opra,$option));
     // return $stmnt->fetchAll(PDO::FETCH_OBJ);
}

function isExistId($userId)
{
    // global $cnx;
    // $stmnt = $cnx->prepare("select * from users where UserID = :userID");
    // $stmnt->bindParam(":userID", $userId);
    // $stmnt->execute();
    // $count = $stmnt->rowCount();
    // return ($count > 0) ? true : false; 

    return checkItem(  "UserID", "users", $userId) > 0 ? true : false;

}
function isExistName($Username,$idUser=0)
{
    // global $cnx;
    // $stmnt = $cnx->prepare("select * from users where UserName = :userNAME");
    // $stmnt->bindParam(":userNAME", $Username);
    // $stmnt->execute();
    // $count = $stmnt->rowCount();
    // return ($count > 0) ? true : false; 
    return checkItem( "UserName", "users", $Username) > 0 ? true : false;

}

function checkItem( $att, $table, $value,$etoie = "*")
{
    global $cnx;
    // $stmnt = $cnx->prepare("select ? from ? where  ?=?");
    $qery = "select $etoie from $table  where $att =:valuee";
    $stmnt = $cnx->prepare($qery);

    $stmnt->bindParam(":valuee", $value);

    $stmnt->execute();

    $count = $stmnt->rowCount();

    return ($count > 0) ? true : false;
}




function redirectToHome($errMsg, $secend = 3, $type = "alert-danger", $url = "members.php")
{

    echo "  <div class='alert $type'>$errMsg</div>";
    echo "  <div class='alert alert-info'>You Well be Redirect In $secend secends ...</div>";

    header("Refresh:$secend;url=$url");
    exit();
}

function countItems($col, $table)
{
    global $cnx;

    $qery = "select count($col) from $table where  GroupId != 1";
    $stmnt = $cnx->prepare($qery);
    $stmnt->execute();
    return $stmnt->fetchColumn();
}

// Latest 
 
function getLatest($col, $table, $limit = 5, $order = "UserID")
{
    global $cnx;

    $qery = "select $col from $table  order by $order DESC limit $limit  ";
    // $qery = "select $col from $table  order by $order limit $limit  where  GroupId != 1";
    $stmnt = $cnx->prepare($qery);
    $stmnt->execute();
    return $stmnt->fetchAll(PDO::FETCH_OBJ);
}


function updateTable($table, $data, $colID, $colIDVal)
{
    global $cnx;

    $colums = array_keys($data); 
    $values = array_values($data);
    $values[] = $colIDVal; 

    $setters = implode("=? , ", $colums) . "=? ";
 
    $qery = "UPDATE $table SET  $setters WHERE  $colID=?"; 


    $stmnt = $cnx->prepare($qery);
    $stmnt->execute($values);

    return $stmnt->rowCount(); 
}
 


function deleteItem($table, $colID, $colIDVal){
    global $cnx;

    
    $qery = "Delete from  $table  WHERE  $colID = ?  ";  
    $stmnt = $cnx->prepare($qery);
    $stmnt->execute([$colIDVal]);
    // return $stmnt->rowCount();


}

 
function getTablesJointur($table="* from users")
{
    global $cnx;
    $stmnt = $cnx->query("select $table ");
    return $stmnt->fetchAll(PDO::FETCH_OBJ);
}




