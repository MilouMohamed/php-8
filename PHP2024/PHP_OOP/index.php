<?php

echo "Ficher Index <br>";
// V1 , V2 , V3 et V4   Presentation   

echo "<br>------***------** POO **--------***------<br>";
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
