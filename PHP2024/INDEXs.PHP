<?php
echo "<div style='padding:20px'>  ";
// echo "<br> -----------11111---------<br>";
// V 24  

/*
// V 23  Comparaison Operator Part 2
//  >  <   >=  <=     <=> (1 , 0 , -1) exemlpe a - b ==> 
// Comparasion on string
echo "<br> ";
var_dump(100 <=> 500);//-1
echo "<br> ";
var_dump(100 <=> 50);//1
echo "<br> ";
var_dump(100 <=> 100);// 0
echo "<br> ";
echo "<br> ";



/*
// V 22  Comparaison Operator Part 1
// ==  value
// != , <> value
// === value & type 
echo "<br> ";
var_dump(100 == "100"); // true
echo "<br> ";
var_dump(100.00 == "100"); // true
echo "<br> ";
var_dump(100 === "100"); // False
echo "<br> ";
var_dump(100 === 100.0); // False
echo "<br> ";
echo "<br> ";



// V 21  Operation  and assigments /
/*
$a=10;
$a+=20;
echo  $a;  
echo $a++;  
echo "<br> ";
/*
// V 20  Operation + - *  ** /

echo -(int)"100 fgt"; // -100
echo "<br> ";
echo gettype(-(int)"100 fgt"); // integer
echo "<br> -----------11111---------<br>";

echo +"100";
echo "<br> ";
echo gettype(+"100");
echo "<br> --------------------<br>";

echo "100";
echo "<br> ";
echo gettype("100");
echo "<br> --------------------<br>";

echo 21 % 10;
echo "<br> ";
echo 20 / 10;
echo "<br> ";
echo 2 ** 4;
echo "<br> ";


/*
// V 13 ->> 19 test 
// Qst 6
echo __LINE__;
echo "<br> ";
echo __FILE__;
echo "<br> ";
echo __DIR__;
echo "<br> ";


// Qst 5 
/*  
Clone file post break echo string int bool if else print


// Qst 4
/*
echo "<pre>";
// print_r($_SERVER);
echo "<pre>";
echo $_SERVER["DOCUMENT_ROOT"];
echo "<br> ";
echo $_SERVER["SERVER_NAME"];
echo "<br> ";
echo $_SERVER["SystemRoot"];
echo "<br> ";
echo $_SERVER["OPENSSL_CONF"];
echo "<br> ";

/*
// Qst 3

$a=200;
$b=$a;
$a=100;

echo "<br> ";
echo  $b;
$b=&$a;
// $b=$b -$a;
echo "<br> ";
echo  $b;
echo "<br> ";

/*
// Qst 2
$myvar="test1";
$$myvar="Web";
echo "<br> ";
echo $test1;
echo "<br> ";
echo $$myvar;
echo "<br> ";
echo  " $test1";
echo "<br> ";
echo  'Web ----'; 
echo "<br> ";
echo  ${$myvar};
echo "<br> ";
echo  "${$myvar}";
echo "<br> "; 
echo "<br> ";
echo "<br> ";



/*
// Qst 1
$name="Php And React js";
$name="Php ,React js";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document <?=$name;?></title>
</head>
<body>
    
<h1>This is <?=$name;?></h1>
<p> I Love <?=$name;?></p>
</body>
</html>

<?php

/*
// V 19  Predefined And ..
echo php_uname();
echo "<br> ";
echo phpversion();
echo "<br> ";
echo PHP_VERSION;
echo "<br> ";
echo __LINE__;
echo "<br> ";
echo __FILE__;
function fddd()  { 
    echo "<br> ";
    echo __METHOD__;
}
fddd();

echo "<br> ";
echo __DIR__;
echo "<br> "; 
echo "<br> ";
echo "<br> ";
echo "<br> ";

/*
// V 18   Constants
define("DB_NAME","medox");
echo DB_NAME;
echo "<br> ";
define("NM_NMBR",554);
echo NM_NMBR * 10_00;
echo "<br> ";


/*
// V 17   Variable Pre-defined 
echo "<br/> ------------*********----------- <br/>";
echo "<pre> ";
print_r($_SERVER["HTTP_CONNECTION"]);
echo " </pre>";
if( !is_null($_POST["userName"]))
{
    echo  $_POST["userName"]; 
}
else echo "Pas de donne ";

?>
<form action="" method="post">
    <input type="text" name="userName">
    <input type="submit" value="Seend">
</form>
<?php
/*
// V 16   Assigne By Value And By Reference
echo "<br/> ------------*********----------- <br/>";
$a="Nom 1";
$b="Nom 2";

$b =&$a;//Referance
$a="Nom 251";

echo $a;
echo "<br/> ------------*********----------- <br/>"; 
echo $b;




/*
// V 15   variable  to Variable
$a = "osama";
$$a = "Medox";
$$$a = "Test ";  

echo "<br/>";
echo $a . "----  ----" . $$a;
echo "<br/> ------------*********----------- <br/>";
echo "<br/>";
echo $osama;
echo "<br/>";
echo $Medox."  ---------   ".$osama;
echo "<br/>";  
echo  "1 js js js js js js js js js js js js  ${$a}  <br/>"; // Medox
echo  "2 js js js js js js js js js js js js  ${$$a}  <br/>"; //Test


/*
// V 14 testing  variable and naming Rules
echo "<br/>";
$userName = "Medox";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wecm : <?php echo $userName ?></title>
</head>

<body>
    <h1>Binevenu <?php echo $userName ?></h1>
    <div>
        <p><?= "$userName 45"; ?> Your Score is</p>
    </div>
    <h3>
        <?php include("scoures.php") ?>
    </h3>
</body>

</html>
<?php

/*
// V 13  variable and naming Rules
echo "<br/>";
$userName = "nom 1";
$UserName = "nom 2";
echo "<br/>";
echo $userName;
echo "<br/>";
echo $UserName;
echo "<br/>";
echo "  $UserName <br/>";
echo '  $UserName <br/>';






// V 6 ->> 12 test 
//   
// echo "<br/>------ nl2br  HereDoc-------<br/>";

/*
// Qst 8
$arryy = array(
    "FrontEnd" => [
        0 => "HTML",
        "Css",
        "JS" => [
            "Vues" => [
                2 => "v2",
                3 => "v3",
            ],
            0 => "Reactjs",
            1 => "Svelet",
        ]
    ],

    "BackEnd" => [
        "php",
        "MySql",
        "Security",
    ],
    0 => "Get",
    1 => "GetHub",
    "testing" => [
        "Unite Test",
        "End to End ",
        "Integration ",
    ]
);
echo "<pre>";
print_r($arryy);
echo "</pre>";


// Qst 7
/*
$myvar = "Programming";

echo  (int) (bool) "hello ";
echo "<br/>-------------<br/>";
echo  (int) "1hello "; 
echo "<br/>-------------<br/>";
echo gettype((int) "hello PHP ");

/*
// Qst 6
$myvar = "Programming";

echo <<<"Code"
Hellow \PHP\
We Love $myvar
Code;




/*
// Qst 5
echo <<<'tOne'
Hello "' Med'"  
We Love $Php  
Language Specially "Php"
tOne;
echo "<br/>------ nl2br  HereDoc-------<br/>";

echo nl2br(
    <<<'tOne'
Hello " ' Med' "   
We Love $Php$  
Language Specially "Php"
tOne
);
/*
// Qst 4
echo "We \n Love \n  Learning \n    Php \n   version 8 \n ";
echo "<br/>------HereDoc-------<br/>";

echo <<<"tst"
We 
Love  
Learning  
Php  <br>   version 8 2    
tst;
echo "<br/>----- nl2br --------<br/>";
echo nl2br("We \n Love \n  Learning \n    Php \n   version 8 \n  ");
echo "<br/>";
/*
// Qst 3
echo "// Needed Outpout";
echo "<br/>";
echo "// Hellow\" \\\\ test \"\"\" We love \"$\$PHP ";

// Qst 2
/*
echo " ------- ";
echo gettype(100); //100
echo " <br/> -------";
echo var_dump((int) 100); //int(100)
echo " <br/> -------";
echo  get_debug_type(100); // int
echo "<br/>";

/* Qst 1
echo ((int)(15.2 +  14.7 +  (10.5 + 10.5))); //50
echo " ------- ";
echo gettype((int)(15.2 +  14.7 +  (10.5 + 10.5))); //50
echo "<br/>";

echo (int)15.2 + (int)14.7 + (int)(10.5 + 10.5); //50
echo " ------- ";
echo gettype((int)15.2 + (int)14.7 + (int)(10.5 + 10.5)); //50



/*
// V 12 array with Complex tests
//   
echo "<pre>";
print_r([
    "A" => "Non1",
    "B" => "Non2",
    "Non3",
    1 => "Non0",
    15 => "Non15",
    "Non16", // Incre;ant apre le dernier Index ici 15
    "Non17",
    "Non18"
]);
echo "</pre>";

/*
// V 11 strign And Escapacing
// Heredoc NowDoc
// hereDoc


$name = "medox-Var";
echo "<br/>";
echo "<ul>";
echo "<li>" . $name . "</li>";
echo "<li>" . $name . "</li>";
echo "<li>" . $name . "</li>";
echo "</ul>";
echo "<br/>";
////// hereDoc
echo <<<"navLinks"
<ul> 
    <li> $name  </li> 
    <li> $name  </li> 
    <li> $name  </li> 
<ul>  
navLinks;
echo "<br/>";





echo <<<"HereOne"
test de test 1 \\\\ * * * / / /
test de test 2 - $name
HereOne;
echo "<br/>";

// NowDoc 
echo <<<'NowOne'
test de test 1 \\\\ * * * / / /
test de test 2 - $name
NowOne;
echo "<br/>";

/*
// V 10 strign And Escapacing
// nl2br()


echo "<br/>";
echo "Test Php   
multe Line ";
echo "<br/>";
echo nl2br("Test Php   
multe Line  nl2br -");
echo "<br/>";
echo "Testting ";
echo "<br/>";
echo 'Testting \' ';
echo "<br/>";
echo 'Testting  " " ';
echo "<br/>";
echo "Testting  ' ' ";
echo "<br/>";


/*
// V 9 Boolean And Convert type
// var_dump() to boolean 

echo "<br/>";
var_dump(array(45));
echo "<br/>";
var_dump(1.5);
echo "<br/>";
var_dump((bool) null);
echo "<br/>";
var_dump((bool) []);
echo "<br/>";
var_dump((bool) [1]);
echo "<br/>";
var_dump((bool) array());
echo "<br/>";
var_dump((bool) [12, 4]);
echo "<br/> -------------- <br/>";
var_dump((bool) "0");
echo "<br/>";
var_dump((bool) " qbs");
echo "<br/>";
var_dump((bool) 0);
echo "<br/>";
var_dump((bool) 0);
echo "<br/>";
echo "<br/>";
echo 1.5 + 5.5; // 
// V 8 Manial Conversion
// Data Type  
/*
echo "<br/>";
echo 1.5 + 5.5; // 
echo "<br/>";
echo (int) (1.5 + 5.5); //
echo "<br/>";
echo gettype(1.5 + 5.5); //
echo "<br/>";
echo 1 + (int) "2.9"; //
echo "<br/>";
echo 1 +  "2.2"; //
echo "<br/>";
echo 1 + (int)"25 test 1 "; //
echo "<br/>";
echo 1 + "25 test"; //3


/*
// V 7 type juggling + Automatic Conversion
// Data Type  


echo "VVVVVVVVVVVVVVVV  ==== 7<br/>"; 
echo  10 + 15.3;//  25.3 double
echo "<br/>";  
echo  gettype( 4+15.6);//  double
/*
echo  4+"2 test";//6 + warning
echo  gettype( 4+"2 test");//  Integer  + warning
echo "<br/>"; 
echo 1 + "2";//3
echo "<br/>"; 
echo gettype(1+ "2");
echo "<br/>"; 
echo true;
echo "<br/>"; 
echo false;
echo "---<br/>"; 


/*

// V 6 type of date
// integer float double string
 echo "<br/>";
 echo gettype(array(12,55,8));
 echo gettype(array(12,55,8));
 echo "<br/>"; 
 echo gettype([12,55,8]);
 echo "<br/>"; 
 echo gettype(array("n1"=>1,"n2"=>2,"n3"=>3));
 echo "<br/>";
 echo gettype(true);
 echo "<br/>";
 echo gettype(10.5);
 echo "<br/>";
 echo gettype(0);
 echo "<br/>";
 echo gettype(+"4");//Integer
 echo "<br/>";
 echo gettype("4");//String
 echo "<br/>";
 echo "<br/>";
 echo "<br/>";





# echo phpinfo();
// echo phpinfo();
/*
echo phpinfo(); 
echo "We love js and react jjss";
?>
<?="<br/>";?>
<?="test short";?>
 */

echo " </div>";
