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
function getAllUsers()
{
    global $cnx;
    $stmnt = $cnx->query("select * from users where GroupId != 1 order by CreateAt");
    return $stmnt->fetchAll(PDO::FETCH_OBJ);
}

function isExistId($userId)
{
    // global $cnx;
    // $stmnt = $cnx->prepare("select * from users where UserID = :userID");
    // $stmnt->bindParam(":userID", $userId);
    // $stmnt->execute();
    // $count = $stmnt->rowCount();
    // return ($count > 0) ? true : false; 

    return checkItem("*", "UserID", "users", $userId) > 0 ? true : false;

}
function isExistName($Username)
{
    // global $cnx;
    // $stmnt = $cnx->prepare("select * from users where UserName = :userNAME");
    // $stmnt->bindParam(":userNAME", $Username);
    // $stmnt->execute();
    // $count = $stmnt->rowCount();
    // return ($count > 0) ? true : false; 
    return checkItem("*", "UserName", "users", $Username) > 0 ? true : false;

}

function checkItem($etoie = "*", $att, $table, $value)
{
    global $cnx;
    // $stmnt = $cnx->prepare("select ? from ? where  ?=?");
    $qery = "select $etoie from $table  where $att =:valuee";
    $stmnt = $cnx->prepare($qery);

    $stmnt->bindParam(":valuee", $value);

    $stmnt->execute();

    $count = $stmnt->rowCount();

    return ($count > 0 )? true :false;
}




function redirectToHome($errMsg, $secend = 3, $type = "alert-danger",$url="members.php")
{

    echo "  <div class='alert $type'>$errMsg</div>";
    echo "  <div class='alert alert-info'>You Well be Redirect In $secend secends ...</div>";

    header("Refresh:3;url=$url");
    exit();
}





