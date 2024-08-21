<?php

namespace app\models;

use Exception;
use PDO;

require "models.php";

class Stagaire extends Models
{
    private $nom;
    private $prenom;
    private $age;
    private $login;
    private $pass;



    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nm)
    {
        $this->nom = $nm;
    }

    public function getPrenom()
    {
        return $this->prenom;
    }
    public function setPrenom($prn)
    {
        $this->prenom = $prn;
    }
    public function getAge()
    {
        return $this->age;
    }
    public function setAge($ag)
    {
        $this->age = $ag;
    }
    public function getLogin()
    {
        return $this->login;
    }
    public function setLogin($lg)
    {
        $this->login = $lg;
    }
    public function getPass()
    {
        return $this->pass;
    }
    public function setPass($ps)
    {
        $this->pass = $ps;
    }



    /********  FUNCTION *************/
    function create()
    {
        // Methode Static
        $sql = static::dataBase()->prepare("INSERT INTO stagaires_dao   VALUES (null,?,?,?,?,?)");

        return $sql->execute([$this->nom, $this->prenom, $this->age, $this->login, $this->pass]);
    }

    public static function delete($id_stg)
    {
        // Methode Static
        $sqlState = self::dataBase()->prepare("delete from stagaires_dao where id = ? ;");
        return $sqlState->execute([$id_stg]);
    }

    function edit($i, $n, $pr, $a, $l, $pw)
    {
        $sqlState = $this->dataBase()->prepare("UPDATE `stagaires_dao` SET   nom= ?, prenom=?,age=?,login=?,pass=? WHERE id= ?");
        return $sqlState->execute([$n, $pr, $a, $l, $pw, $i]);
    }

    public static function all()
    {
        $stgr = static::dataBase()->query(" select * from stagaires_dao  ")->fetchAll(PDO::FETCH_CLASS, Stagaire::class);
        return $stgr;
    }

    public static function find($id)
    {

return current( static::where("id",$id));
        /*
        //probleme de return One lement
        $sqlStat = static::dataBase()->prepare(" select * from stagaires_dao where   id= ?");
        $sqlStat->execute([$id]);
        $sqlStat->setFetchMode(PDO::FETCH_CLASS, Stagaire::class);

        return $sqlStat->fetch();


        // OU  Pour fetchAll
        // $stgr=current( $sqlStat->fetchAll(PDO::FETCH_CLASS,Stagaire::class)); 


        //OU  Pour PDO::XXXX
        // $stgr=$sqlStat->fetch(PDO::FETCH_CLASS,'Stagaire'); 
        // $stgr=current($stgr);
        // var_dump($stgr);
        // return $stgr;
        */
    }

    public  static function where($column, $value,$operat='=') {
      $sqlState=  static::dataBase()->prepare("SELECT * FROM  stagaires_dao  WHERE   $column $operat ? "); 
      $sqlState->execute([$value]); 
      $donnees=$sqlState->fetchAll(PDO::FETCH_CLASS,"Stagaire"); 

if(empty($donnees)){
throw new Exception("Aucun Stagaire n'est Trouvé !!!!" );

}

      return  $donnees;
    }
}
