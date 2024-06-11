<?php

echo "Ficher Index <br>";
// V1 , V2 , V3 et V4   Presentation   
// php is single inhertence 
echo "<br>------***------** POO **--------***------<br>";
echo " ---- V29  ---- ----  -----  ...... ...... <br>";
//  29 Traits  Part 2    php > 5.4 
echo   "<br>";

trait  TraitOne
{
    public function f1_One()
    {
        echo "Is f1 from TraitOne <br>";
    }
}
trait  TraitTwo
{
    public function f1_Two()
    {
        echo "----Is f1 from TraitTwo <br>";
    }
}

trait TraitThree
{
    public function f1_Three()
    {
        echo "--------Is f1 from TraitThree <br>";
    }
}

class Samsung
{
}

class Howawi
{
}

class LG
{
    use TraitOne;

}

class Phone
{// like extentds or implemetns 
    use TraitOne;
    use TraitTwo;
    use TraitThree;
}

$sams= new Samsung();

$howaw= new Howawi();
$lg= new LG();

$phone= new Phone();
$phone->f1_One();
$phone->f1_Two();
$phone->f1_Three();
echo " ---------------- LG ---------------  <br> ";
$lg= new LG();
$lg->f1_One(); 



print "<br>";
print "<pre>";
print_r($sams);
print_r($howaw);
print_r($lg);
print_r($phone);
print "</pre>";





/*
echo " ---- V28  ---- ----  -----  ...... ...... <br>";
//  28 Traits  Part 1    php > 5.4 
// Presentation
// Traits Comme Class but
        ---not instancied 
        ---not impliment
echo   "<br>";  


/*
echo " ---- V27  ---- ----  -----  ...... ...... <br>";
//  27 Chaining  ()->()->()->();
class Phone
{ 
    public $pre = "Pre1";

    public function f1()
    {
        echo " This F1<br>";
        return $this;
    }
    public function f2()
    {
        echo " This F2<br>";
        return $this;
    }
    public function f3()
    {
        echo " This F3<br>";
        return $this;// This for Chaining
    }
 
}

$phone= new Phone();
//   $phone->f1();
//   $phone->f2();
//   $phone->f3();

  $phone->f1()->f2()->f3();


echo   "<br>";  




/* 
echo " ---- V26  ---- ----  -----  ...... ...... <br>";
//  26 Static

define("KEY_ONE", 12000);

echo KEY_ONE . "    </br></br>";

class Phone
{

    public $pre = "Pre1";

    public function sayHello()
    {
        echo " <br>This IS Func Sey Hello<br>";
    }
 
    public static $name = "Nom1";// not accesse from Object = new ...
    public static function sayHelloTwo()// this not work her
    {
        echo " <br>This IS Func Sey Hello Static <br>";
    }
}

$phone1 = new Phone();

echo $phone1->pre . "<br>";  
$phone1->sayHello();
$phone1->sayHelloTwo();// accesse to static from object


echo Phone::$name . "<br>";
echo Phone::sayHelloTwo() . "<br>";





/*  
echo " ---- V25  ---- ----  -----  ...... ...... <br>";
//  25 Clone Part  2
// object (clone)  have object(Copy)
// ce exemple n est pas la


class Phone
{
    public $n1 = 0; 

    public function __construct($n11) {
        $this->n1 = ++ $n11;
    }

    public function __clone() {
        $this->n1 = ++$this->n1;
    } 
}

class Phone2
{
    public $object1; 

    function __clone()
    {
        // Force a copy of this->object, otherwise
        // it will point to same object.
        $this->object1 = clone $this->object1;
    }
}

$obj = new Phone2();

$obj->object1 = new Phone(10); 

$obj2 = clone $obj;
$obj->object1=1000;

print "Original obj : \n<br><pre>";
print_r($obj);

print "Cloned obj2 : \n<br>";
print_r($obj2);
print "</pre>";

 
/*
echo " ---- V24  ---- ----  -----  ...... ...... <br>";
//  24 Clone Part   1
class Iphone {
    public $name;
    public $prenom;

    public function __construct($n,$p) {
        $this->name = $n;
        $this->prenom = $p;
    }


}

$phone=new Iphone("Nom1",10);
$copy=$phone;  // Copy By Reference 
$copy2=clone $phone;  // Copy   clone

$phone->name="Nom 001";
$copy->name="Nom 003";


echo "<pre>";
print_r($phone); // "Nom03",10
print_r($copy);  // "Nom03",10
print_r($copy2); // "Nom1" ,10
echo "</pre>";








/*
echo "V23  ---- ----  -----  ...... ...... <br>";
//  23 Magic methods  Get Set   like C#
// get exicute if proprty not existe or private proprty
// set exicute if proprty not existe or private proprty
// set interge la jouter de class->newOption
// set respect OOP

class Sony
{ 
    public $name="16gb";
    public $ram="Sony1";  
      private $colorOne;

 /*M1   public function __get($name)
    { echo "The Fnstion [".$name."] Is not accessible<br>";
    }
*/
/*
public function __set($name, $value)// inserdit $phon1->colorOne=1200
{
    echo " $name is $value  from set   <br>   ";
}

}


$phon1 = new Sony();
// echo  $phon1->color."<br>"; // get M1
  $phon1->colorOne=1200; // set interdit   M2 
echo  $phon1->colorOne."<br>"; // set
echo "<pre>";
print_r($phon1);
echo "</pre>";
/*
echo "V22  ---- ----  -----  ...... ...... <br>";
//  22 Magic methods 2 __Call call if fonction note existe  or Private 

class Sony
{ 
    public $name="16gb";
    public $ram="Sony1"; 

    private function seyHello()
    {
        echo  "<br>From Hello <br>";
    }

    public function __call($name, $arguments)// si le Methode n existe pas 
    {
        echo "<br>The test $name Is Note Fond  || ".implode(" ",$arguments)." ||  <br>";
    }
 
}

$phon1 = new Sony( );
$phon1->htesTEstMethode();
$phon1->func_meyhode_2(1,2,3,5,6);
$phon1->func_meyhode_3();
echo "<pre>";
print_r($phon1);
echo "</pre>";




/* 
echo "V21  ---- ----  -----  ...... ...... <br>";
//  21 Magic methods 1 Constract
// Strta with [ __ ]
class Sony
{

    public $name;
    public $ram;

    public function seyHello()
    {
        echo  "<br>From Hello ";
    }

    public function __construct($nm, $rm)
    {
        $this->name = $nm;
        $this->ram = $rm;
        echo  "<br> ----- Constractor -----<br>";
        echo  " Hello $nm and ram is $rm <br>";
    }


    public function __destruct()
    {
        echo "<br> Is Destroy <br>";
    }
}
 

$phon1 = new Sony("Sony1", "16gb");
$phon1->seyHello();
echo "<pre>";
print_r($phon1);
echo "</pre>";





/*
echo "V20  ---- ----  -----  ...... ...... <br>";
//  20  PUBLIC PRIVATE PROTECTER =====>visibility Markers
// public ou rien   ===> public (any scop)
// Protected        ==> in class and extends Class
// Private          ==> just class parent




/*
echo "V19  ---- ----  -----  ...... ...... <br>";
//  19 Part 1 Polymorphism mota3adidi axkal wojoh
// interrface  like abstract class

interface DBConnects {

    public function getUsers();// Obligatoire redefini dans class fille
    public function getArticles();
    public function getStats(); 
}
 class MySql implements DBConnects {
    public function getUsers()
    {
        echo "<br>SQL get Users Her";
     }
     public function getArticles()
     {
         echo "<br>SQL get Article  Her";
      }
      public function getStats()
      {
          echo "<br>SQL get Stats Her";
       }
}

class Oracl implements DBConnects {
    public function getUsers()
    {        echo "<br> Users From Oracle";    }
    public function getArticles() 
    {        echo "<br> Articles  From Oracle";    }
    public function getStats() 
    {        echo "<br> Articles  From Oracle";    }

}


$row = new Oracl;
$row->getUsers();
$row->getArticles();
$row->getStats();
echo "<pre>";
print_r($row);
echo "</pre>";




/*
echo "V18  ---- ----  -----  ...... ...... <br>";
//  18 Part 1 Polymorphism mota3adidi axkal wojoh
// v 18  explication  Presentation




/*
echo "V17  ---- ----  -----  ...... ...... <br>";
//  17 Part 2 Abstraction 

echo "Test de V 17 ";

abstract class MeakPhone
{ 
    abstract public function testPerform();
    abstract public function verfyOwner();
    abstract public function sayHello($n);
}

class Sony extends MeakPhone
{
    public $owner;
    public function testPerform()
    {
        echo "<br> testPerform  Sony <br>";
    } 
    public function verfyOwner()
    {
        echo "<br> verfyOwner Sony  <br>";
    }
    public function sayHello($o)
    {
    $this->owner=$o;
        echo "<br> sayHello Sony  $o <br>";
    }
}
class Samsung extends MeakPhone {
public $owner;
    public function testPerform()
    {
        echo "<br> testPerform  Samsung <br>";
    }
    public function verfyOwner()
    {
        echo "<br> verfyOwner Samsung  <br>";
    }
    public function sayHello($o)
    {
        $this->owner=$o;
        echo "<br> sayHello Samsung  $o <br>";
    }

}

$sony1= new Sony(); 
echo $sony1->sayHello("Nom SOny1 ");
echo "<pre>";
print_r($sony1);
echo "<pre>";

$samsng= new Samsung(); 
echo $samsng->sayHello("Nom Samsung 1 ");
echo "<pre>";
print_r($samsng);
echo "<pre>";



/*
echo "V16  ---- ----  -----  ...... ...... <br>";
//  16 Part 1 Abstraction 
// abstract funct not contant body
abstract class MeakPhone {

    public $ram;
    public function seyHolle() {
        echo "<br> Hay From MeakPhone <br>";
    }
    abstract public function sayBy();// override in class filles obligatoir
}

class ApplePhone extends MeakPhone {
    // public function seyHolle() {
    //     echo "<br> Hay From MeakPhone in ApplePhone <br>";
    // }
    public function sayBy()//Obligatoire add body in this class extend
    {
        echo "<br> From Apple Phone <br>";
    }
}
  $phno1=new ApplePhone(); 

  echo $phno1->seyHolle();
  echo $phno1->sayBy();
  echo "<pre>";
  print_r($phno1);
  echo "<pre>";

/*
echo "V15  ---- ----  -----  ...... ...... <br>";
// Override  Inheritance Final keyword
// can not extend class final 
// final not modificable
 class ApplePhone
{
    public $name;
    public $inch;
    public $ram;
    public $space;

    public function new_item($n, $i, $r, $s = "15GB Default")
    {
        $this->name = $n;
        $this->inch = $i;
        $this->ram = $r;
        $this->space = $s;
    }

    // final   public function  sayHello() // cant overide dans SonyPhone
       public function  sayHello()
    {
        echo "Hay Phone " . $this->name . "<br>";
    }
}

final class SonyPhone extends ApplePhone
{

    public $ecran  ;


    public function sayHello()
    {
        echo "Hay Phone  " . $this->name . " Phone From Sony<br>";
    }
}

$phone1 = new ApplePhone();
$phone1->new_item("Nom1", 17, "16gb", "250gb");
echo "<pre>";
print_r($phone1);
echo "<pre>";
echo $phone1->sayHello();

echo "<br>----------------------------------------<br>";

$phone2 = new SonyPhone();
$phone2->new_item("Nom2",26,"16gb","512gb");
$phone2->ecran="LCD+";
echo "<pre>";
print_r($phone2);
echo "<pre>";
echo $phone2->sayHello();

echo "<br>----------------------------------------<br>";

/*
echo "V14  ---- ----  -----  ...... ...... <br>";
// Override 
class ApplePhone
{ 
    public $name;
    public $inch;
    public $ram;
    public $space; 

    public function new_item($n, $i, $r, $s = "15GB Default")
    {
        $this->name = $n;
        $this->inch = $i;
        $this->ram = $r;
        $this->space = $s; 
    }

    public function  sayHello()  {
        echo "Hay Phone " . $this->name . "<br>";
    }
}


class  SonyPhone extends ApplePhone
{

    public $ecran = "LCD";

    public function  sayHello()  {// override
        echo "Hay Phone " . $this->name . " and ".$this->ecran."<br>";
    }
}


$phone1= new ApplePhone();
$phone1->new_item("Nom10",7.6,16,"8gb");
$phone1->sayHello();

$phone2= new SonyPhone();
$phone2->new_item("Nom20",8.6,32,"16gb");
$phone2->sayHello();

echo  "<pre>";
print_r($phone1);
echo "<br>-------------------------------<br>";
print_r($phone2);
echo  "</pre>";

/*
echo "V13  ---- ----  -----  ...... ...... <br>";
// inheritence  l heritage
class ApplePhone {
 
    public $name;
    public $inch;
    public $ram;
    public $space;
    private $lock; 
    
    public function new_item($n, $i, $r, $s = "15GB Default")
    {
        $this->name = $n;
        $this->inch = $i;
        $this->ram = $r;
        $this->space = $s;
        $this->lock="default";
    } 
}

class SonyPhone extends ApplePhone {

 public $camer="LCD";

 public function add_new_sony ($n, $i, $r, $s = "15GB Default",$cm)
 {
     $this->name    = $n;
     $this->inch    = $i;
     $this->ram     = $r;
     $this->space   = $s; 
     $this->camer   = $cm;
 }  
}

$phone1= new ApplePhone();
$phone1->new_item("Nom10",7.6,16,"8gb");

$phone2= new ApplePhone();
$phone2->new_item("Nom20",8.6,32,"16gb");
echo  "<pre>";
print_r($phone1);
echo "<br>-------------------------------<br>";
print_r($phone2);
echo  "</pre>";
/*
echo "V12  ---- ----  -----  ...... ...... <br>";
// Ecncapsulation    ====> provate or protected
class ApplePhone
{
    public $name;
    public $inch;
    public $ram;
    public $space;
    private $lock;// update from class only

    public function new_item($n, $i, $r, $s = "15GB Default")
    {
        $this->name = $n;
        $this->inch = $i;
        $this->ram = $r;
        $this->space = $s;
    }

    public function chefr_lock($lc)
    {
        $this->lock = sha1( $lc); // chefre les donnes
    }
}



$phon = new ApplePhone();
$phon->new_item("nom1", 17, 16, "250Gb");
//   $phon->lock="Nom122";

  $phon->chefr_lock("Nom123");// private lock ici change
 
echo "<pre>";
print_r($phon);
echo "</pre>";

/*
echo "V11  ---- ----  -----  ...... ...... <br>";

class ApplePhone
{
    public $name;
    public $inch;
    public $ram;
    public $space;

public function new_item($n,$i,$r,$s="15GB Default"){
$this->name=$n;
$this->inch=$i;
$this->ram=$r;
$this->space=$s;

}
}

$phon=new ApplePhone();
$phon2=new ApplePhone();
$phon->new_item("nom1",17,16,"250Gb");
$phon2->new_item("nom2",15,32);

echo "<pre>";
print_r($phon);
print_r($phon2);
echo "</pre>";


/*
echo "V10  ---- ----  -----  ...... ...... <br>";
// self and this

class ApplePhone
{
    public $name;
    public $inch;
    public $ram;
    public $space;

    const NBRCACH = 52;

    public function get_Nbr()
    {
        echo "<br>test De Constant " . self::NBRCACH;
    }
}
$phon1 = new ApplePhone();
echo $phon1::NBRCACH; // M1

/*
echo "V9  ---- ----  -----  ...... ...... <br>";
// constante  php 5.3 > const + define
// const === define     
// self:: Pour les constant  dans la class
define("NMBR", "tstd");
echo NMBR . "<br>";

const nbr = 100;
echo nbr . "<br>";


echo "<br>   <br>";
class ApplePhone
{
    public $name;
    public $inch;
    public $ram;
    public $space;

    const NBRCACH = 52;

    public function get_Nbr()
    {
        echo "<br>test De Constant " . self::NBRCACH;
    }
}
$phon1 = new ApplePhone();
echo $phon1::NBRCACH; // M1
echo "<br>";
echo ApplePhone::NBRCACH;// M2

/*
echo "V8  ---- ----  -----  ...... ...... <br>";
// This    ===> pseudo variable
class ApplePhone
{
    public $name;
    public $inch;
    public $ram;
    public $space;



    public function check_Name()
    {
        if (strlen($this->name) > 3) {
            echo "<br> This Phone Yes  <br>";
        } else
            echo "<br> This Phone No  <br>";
    }

    public function getProprty()
    {
        echo "<br> This Phone Ram = " . $this->ram . " And inch = " . $this->inch;
        echo "<br>";
    }

    public function testNom($nm)
    {
        if (strlen($nm)  > 3)
            echo "<br> Name > 3  ";
        else
            echo "<br> Name <= 3 ";
    }
}

$phone1 = new ApplePhone();
$phone1->name = "Phone1";
$phone1->inch = 8;
$phone1->ram = 16;
$phone1->space = 250;
$phone1->getProprty();
$phone1->check_Name();

$phone2 = new ApplePhone();
$phone2->name = "Phn";
$phone2->check_Name();
echo "-------------------------------------";
$phone1->testNom("nom1");
$phone1->testNom("nom");
$phone2->testNom("nom"); 
$phone2->testNom("nom1");

echo "-------------------------------------";



echo "<pre>";
print_r($phone1);
print_r($phone2);
echo "</pre>";

/*
echo "V7  ---- ----  -----  ...... ...... <br>";
// Function 

class ApplePhone
{
    public $ram;
    public $inch;
    public $space;


    public function echo_func($tes)
    {
        echo "<br>This is My $tes Function<br>";
    }
}

$iph7 = new ApplePhone(); 
echo "<pre>"; 
print_r($iph7);
echo "</pre>";

$iph7->echo_func("4455");


echo "V6  ---- ----  -----  ...... ...... <br>";
/*
class ApplePhone {

public $ram;
public $inch;
public $space;
public $color="black";//default values
public $colo=[1,5,6,];

}

$iph7= new ApplePhone();
$iph7->ram="10Gb";
$iph7->inch=7.6;
$iph7->space="250gb";
$iph7->color="Red";
$iph7->new_proprete="new";//add new attribuite


echo "<pre>";
// var_dump($iph7);
print_r($iph7);
echo "</pre>";
echo "<br>";

$iph6= new ApplePhone();
$iph6->ram="1Gb";
$iph6->inch=5;
$iph6->space="64gb"; 


echo "<pre>"; 
print_r($iph6);
echo "</pre>";
 /*
 echo "<br>------***------** POO **--------***------<br>";
 echo "V5  ---- ----  -----  ...... ...... <br>";

// ici variable  dans la class proprete

class ApplePhone { 
    public $ram="Phone 1";// public = var $ram // anciene version 
    public $inch;
    public $space;          
    public $color;       
}

$phone=new ApplePhone();
echo "<pre>";
var_dump($phone);
echo "</pre>";
echo "<br>";


$phone7=new ApplePhone();
echo "<pre>";
var_dump($phone7);
echo "</pre>";








                                                                                MILOU Mohamed
*/


echo "<link href='style.css' rel='stylesheet' >";
