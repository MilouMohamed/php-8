
<?php 

function connextion() { 
    return new PDO("mysql:host=localhost;dbname=mvc_1_v3","root","");
}

function latest(){ 
    return connextion()->query("select * from  stagaires order by id desc")->fetchAll(PDO::FETCH_OBJ);
}

function create($nom,$prenom,$age,$login,$pass){
  $sql=  connextion()->prepare("insert into stagaires (nom,prenom,age,login,pass) valus(?,?,?,?,?) ;");
  $sql->execute([$nom,$prenom,$age,$login,$pass]);
}

function edit(){
    
}

function destroy(){
    
}


