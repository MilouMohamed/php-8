
<?php 

function connextion() { 
    return new PDO("mysql:host=localhost;dbname=mvc_1_v3","root","");
}

function latest(){ 
    return connextion()->query("select * from  stagaires order by id desc")->fetchAll(PDO::FETCH_OBJ);
}

function create(){
  // extract($_POST)
  $nom=$_POST["nom"];
  $prenom=$_POST["prenom"];
  $age=$_POST["age"];
  $login=$_POST["login"];
  $pass=$_POST["pass"];

  
  $sql=  connextion()->prepare("INSERT INTO `stagaires`  VALUES (null,?,?,?,?,?) ");
  $sql->execute([$nom,$prenom,$age,$login,$pass]);

}

   

function destroy($id){

  $sql=connextion()->prepare("delete from stagaires where id = ?");
   
  $sql->execute([$id]);
}

function view($id){
$sql=connextion()->prepare("select *  from stagaires where id = ?");
 $sql->execute([$id]);
 
return $sql->fetch(PDO::FETCH_OBJ); 
}

function update($id){
 
  $nom=$_POST["nom"];
  $prenom=$_POST["prenom"];
  $age=$_POST["age"];
  $login=$_POST["login"];
  $pass=$_POST["pass"];
 
  $sql=  connextion()->prepare("UPDATE stagaires SET nom=? , prenom =?,age=? , login=?,pass=? WHERE id=?;");
  $sql->execute([$nom,$prenom,$age,$login,$pass,$id]);
 

}

