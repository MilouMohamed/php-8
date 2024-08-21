<?php
namespace app\models;
 

class Voiture extends model
{
 
    private $modele;
    private $prix;

   

    public function getModele()
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

    public function  __construct($medel, $prix)
    { 
        $this->modele = $medel;
        $this->prix = $prix;
    }
}
