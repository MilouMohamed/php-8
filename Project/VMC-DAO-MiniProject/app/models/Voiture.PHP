<?php
namespace app\models;
use PDO;


class Voiture extends model
{

    private $modele;
    private $prix;



    public function getModel()
    {
        return $this->modele;
    }


    public function setModele($mdl)
    {
        $this->modele = $mdl;
        return $this;
    }


    public function getPrix()
    {
        return $this->prix;
    }
    public function setPrix($pri)
    {
        $this->prix = $pri;
        return $this;
    }




    public static function latest()
    {
        return model::database()->query("select * from voiture order by id desc ")->fetchAll(PDO::FETCH_CLASS, __CLASS__);
        // __CLASS__ ou static::class
    }

    public function create()
    {
        $sqlStat = model::database()->prepare("insert into  voiture values(null,?,?) ");

        return $sqlStat->execute([$this->modele, $this->prix]);
    }


    public function update($id)
    {
        $sqlStat = model::database()->prepare("update voiture set modele=? , prix=? where id =?  ");
        $sqlStat->execute([$this->modele, $this->prix, $id]);

    }

    public static function destroy($id)
    {
        $sqlStat = model::database()->prepare("delete   from voiture where id ?  ");

        $sqlStat->execute([$id]);
    }

    public static function veiw($id)
    {
        return static::where($id);
    }

    public static function where($id)
    {
        $sqlStat = static::database()->prepare("select *  from voiture where id = ?");
        $sqlStat->execute([$id]);
        return current($sqlStat->fetchAll(PDO::FETCH_CLASS, __CLASS__));

    }

    public static function delete($id)
    { 
        $sqlSate = static::database()->prepare("delete  from voiture where id = ?");
        $sqlSate->execute([$id]); 
        
    }

}

// MILOU MED
