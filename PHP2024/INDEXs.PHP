<?php
echo "<div style='padding:20px'>  ";

// echo "<br> -----------11111---------<br>";
// V 46  fonction DRY Dont Repeat 
// default Parameter Value
function my_info($nam ="N1", $age=100, $mail ="defalt--val")
{
    echo "$nam , $age , $mail";
    echo "  <br>";
}
my_info("Nom 1",25 ,"Email"); 
my_info("Nom 3",22  );
my_info(   );
my_info(  age:40  );
my_info("Nom 4",18  );


/*
// V 45  fonction DRY Dont Repeat 
// return value 
echo "  <br>";
// function myTes($ihjskd) : string {
function myTes($ihjskd)
{
    return "funct => " . $ihjskd;
}
echo myTes("hjshd");
echo "  <br>";


// V 44  fonction DRY Dont Repeat 
// simple 
echo "  <br>";
function Hello($nam)
{

    echo "$nam <br>";
}
Hello(4545);
Hello("nam 22");



/*
    // echo "<br> -----------11111---------<br>";
    // V 43  fonction DRY Dont Repeat 
    function Hello($nam) {

echo "$nam <br>"; 

} 
Hello("nam");
Hello("nam 22");


/*
// V 42  Include And Require
// Include warning and countine Script 
echo " <br>"; 
include("test.php");
echo " <br>"; 
include_once("test.php");// varaible change 
echo " <br>"; 


// Require warning and  Stop  Script 
require("test.php"); 
echo " <br>"; 
require_once("test.php"); 
echo " <br>";  
echo $varGlob;
echo " <br>";  
echo " Fin script ";  

/*
// V 37 ->> 42 test  
// Qst 10
echo " <br>"; 

$help_num=4;
$nums=[2,40,5,6,10,30]; 
$help_num=count($nums);
for ($i=0; $i <count($nums) ; $i++) { 
    
$help_num--;
echo " $nums[$i] +  $nums[$help_num] =  ".($nums[$help_num] + $nums[$i] );
echo " <br>";  


}


/*
// V 37 ->> 42 test  
// Qst 9
// M2
echo " <br>"; 
$help_num=3;
$nums=[4,5,6,1,2,3];
$names=["Ahmed","Sayed","Osama","Mohamed","Gamal"];
for ($l=0; $l <count($names) ; $l++) { 
   if(in_array($names[$l],["Sayed","Osama"]))
   {
    echo $names[$l]."<br>";
   }
}
/*
// M1
echo " <br>"; 
$help_num=3;
$nums=[4,5,6,1,2,3];
$names=["Ahmed","Sayed","Osama","Mohamed","Gamal"];
$help_num=$nums[$help_num];//1
 
for ($jk=0; $jk < count($names) ; $jk++) {
    if( $jk == $help_num  ){ 
        echo  "<br>".$names[$jk]; 
    }
    if(   $jk == ( $help_num +  $help_num)){ 
        echo  "<br>".$names[$jk]; 
    }
}



/*
// V 37 ->> 42 test  
// Qst 8
echo " <br>"; 
$numbers=[1,13,12,20,51,17,30];

for ($jk=0; $jk <count($numbers) ; $jk++) { 
    echo ($numbers[$jk] % 2 == 0 ?  ($numbers[$jk]/2)." <br>" : ""); 
}


/*
// V 37 ->> 42 test  
// Qst 7
$mix=[1,2,"A","B","C",3,4];
$isLetter=0;
$isNumeric=0;
for($i=0; $i < count($mix) ; $i++) {
if(is_numeric($mix[$i]))
{
echo "$mix[$i] <br>";
    $isNumeric++;
}
else $isLetter++; 
}
echo "\"  $isNumeric Numbers Printed\"";
echo " <br>"; 
echo "\"  $isLetter Letters  Ignored\"" ;

/*
// Qst 6
$money =["Ahmed" => 1_200,"Rachid" => 200,"Rabi3" => 8_000,"Zakariya" => 3_000];
 
foreach($money as  $k=>$v){
echo "The Name is  $k And i Need  $v Pound from Him  <br>";
}


/*
// V 37 ->> 42 test  
// Qst 5
 
$start=0;
$mix=[1,2,3,"A","B","C",4];
    echo " <br>--- ".count($mix)." -----<br> "; 

    for ($i=$mix[$start] ; $i < count($mix) ; $i++) {  
       echo ( is_numeric($mix[$i]) ?  $mix[$i]."<br>": "" );
    }


/*
// V 37 ->> 42 test  
// Qst 4
$start=10;
$end=0;
$stop=3; 

for ( $i=$start  ;   ;   ){

//     if($start == $i ) 
//     echo "$i <br>"; 
// else echo "0$i <br>"; 

echo ( $start == $i ? "$i ---<br>" :"0$i ---<br>"  );

if($i ==  $stop) break;
$i--;
}

/*
// V 37 ->> 42 test  
// Qst 3

$num =2;
$i =3;
while ($num < 520) {
    if($num == 2){
        $num--; 
    }
    echo "$num <br>";
    $num =$i + $num;
    $i=$i*2; 
} 
echo " <br>------------------<br>";
 
/*
// Qst 2
$indx = 0;
M2
for ($hj=0; $hj < 20 ; ) { 
    $hj+=2;
    echo "$hj <br>";

}

/*M1
while ($indx  <= 20) {
    $indx++;
    if ($indx % 2 === 0)
        echo "$indx <br>";
}
/*
// Qst 1
$indx=10;

while( $indx  > 0)
{
echo "$indx <br>";
$indx--;
}






// echo "<br> -----------11111---------<br>";
// V 42 loop 
//  Break Continue
/*
echo "test ";
echo  " <br>  "; 
*/

/*
// V 41 loop 
//  Break Continue
echo "Continue";
echo  " <br>  "; 
$list=["a","b","c","d","e","f"];

foreach ($list as $val) :

if($val === "c")
continue ; 
echo  "$val  ******* ** </br>";
endforeach ;

echo  "</br> ** ******* ** </br> </br>"; 

foreach ($list as $val) {

    if($val === "c")
    break ; 
    echo  "$val  ******* ** </br>";
    }
    
/*
// V 40 loop 
//  Foreach

$list=["a","b","c","d","e","f"];
echo  " <pre>  ";
print_r($list);
echo  " </pre>  ";

$list2=[$list[0]=>"1a",$list[1]=>"1b",$list[2]=>"1c",$list[3]=>"1d",$list[4]=>"1e",$list[5]=>"1f"];
echo  " <pre>  ";
print_r($list2);
echo  " </pre>  ";


echo "Length ".(count($list)). "<br> ";
foreach ($list as $key => $value) {
 echo "key=$key => value=$value ";
 echo  " <br>  ";

}


/*
// V 39 loop 
//  For 
$inddx=0;
for (; ; ) :
    if($inddx > 5 ) break;
    echo "$inddx  -___+___-  <br>";  
    $inddx++;
endfor;

 echo "<br> -----------11111---------<br>";

 
for ( $jj=0; $jj < 5 ;$jj++ ) { 
   echo "$jj  -----++++ <br>"; 
}

/*
// V 38 loop 
// Do While   One  Time 
$i=0; 
do {
    echo  " <br> $i";
    $i+=6;
}while( $i < 103);
echo  " <br>    ----------------------  <br>"; 
 

/*
// V 37 loop 
// While
echo  " <br>    -------------  <br>";
$i=0;
while ( $i < 10 )
{ 
    echo  " <br> $i";
    $i++;
}
echo  " <br>    -------------  <br>";
$i=0;
while ( $i < 10 ) : 
    echo  " <br> $i -------- ";
    $i++;
endwhile;
echo  " <br>    -------------  <br>";

/*
for($i = 1; $i <= 20 ; $i++) {
    echo  " <br> $i";
   echo ($i % 10 == 0) ?   " <br>************ "  :  "";
}
*/


// V 30 ->> 36 test 
/*
// Qst 8
echo "<br>-----------    ----------- <br> ";
$day="Sat";
if ($day === "Sat" || $day === "Sun" || $day === "Mon" )
echo " We Are Open All The Day";

elseif ($day === "Tue" || $day === "Wed"   )
echo " We Are Open  From 08:12";

elseif ($day === "Thu" || $day === "Fri"   )
echo " We Are Closed";
else 
echo " Unknown Day";



/*
// Qst 7
echo "test 30 --  36 <br>";
$num_one=23;
$num_two=5; 
$op="/";
echo "<br>-----------  $op  ----------- <br> ";
 switch($op) {
    case "+": {
        echo $num_one+$num_two;
        break;
    }
    case "-": {
        echo $num_one - $num_two;
        break;
    }
    case "*"  : {
        echo $num_one * $num_two;
        break;
    }
    case "/": {
        echo floor( $num_one / $num_two );
        echo "<br>".$num_one % $num_two;
        break;
    }
    
    default : {
        echo "Unknown operation";
    }

}






/*
// Qst 6
echo "test 30 --  36 <br>";

$genre = "Hack And Slash";

switch ($genre) {
    case "RPG": {
            echo "I Recommend Ys Games";
            break;
        }

    case "Hack And Slash": {
            echo "I Recommend Castlevania Games";
            break;
        }


    case "FPS": {
            echo "I Recommend Uncharted Games";
            break;
        }


    case "Platform": {
            echo "I Recommend Megaman Games";
            break;
        }

    case "Puzzle": {
            echo "I Recommend Megaman Games";
            break;
        }

    case "Puzzle": {
            echo "I Recommend Megaman Games";
            break;
        }
    default: {
            echo "I Recommend Shadow Of Mordor And Shadow Of War";
            break;
        }
}


/*
// Needed Output
"I Recommend Castlevania Games"
 


/*
// Qst 5
$name="Osama";
$age=40;
$counrty="Maroc";

if( $age > 18 &&  $age==40  && $counrty=="Maroc" ) {
    echo "The age Is good <br>The Name Is Good <br>Tne Country Is Good";
} 


/*
// Qst 4
echo "test 30 --  36 <br>";
$a=30;
$b=20;
$c=10;
echo  ($a+$b === $c ? "A+B=C": ($a+$c === $b ? "A+C=B": ($b+$c === $a ? "B+C=A": "The End")));

/*
// Qst 3

// print_r($_SERVER);
$list_adnm=["m1","g","c","m"];

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    if($_POST["user-name"]) {

        echo '<br> Mane Is '.$_POST["user-name"];
        if( in_array($_POST["user-name"],$list_adnm)){
        echo "<br> Is Admin ----";

        }
    }

}


?>

<form action="" method="POST">

    <input type="text" name="user-name">
    <input type="submit" value="Send">

</form>

<?php


/*
// Qst 1 et 2  esy
echo "test 30 --  36 ";
$a=100;
$b=200;
$c=100;
 



/*
// V 36 switch 
echo  " <br>    -------------  <br>";
$nbbrr=10;

switch ($nbbrr){
    case 1 : {
       echo "is One Is => $nbbrr";
       break ;
    }

    case 2 : {
        echo "is Two Is => $nbbrr";
        break ;
     }

     case 3 : {
        echo "is Three Is => $nbbrr";
        break ;
     }
     default :{
        echo "is Note 1 , 2 Or 3 Is => $nbbrr"; 
     } 
}


/*
// V 35 if Else ....
// ternary Operator  => Short If ;
echo  " <br>    -------------  <br>";
echo  " <br>".((1 < 10 )? "Yes":"Non");
echo  " <br>";




/*
// V 34 if Else ....
echo  " <br>    -------------  <br>";
echo "Clear  nested if";

// V 33 if Else ....
echo  " <br>    -------------  <br>";
 
if (10 > 4 ) :  echo  " <br> test Yes  <br>"; endif;
if (10 > 4): echo "deuxeime 1"; elseif  (4 > 2) : echo "Deuxieme 2"; 
else: echo "else";
endif;
/*
// V 32 if Else ....
echo  " <br>    -------------  <br>";



$vaar =  1 > 5 ? 8888 :  100_200;
echo $vaar;
echo  " <br>    -------------  <br>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medox</title>
</head>

<body>
    <h1>
        <?php
        echo "<pre>";
        print_r($_SERVER["REQUEST_METHOD"]);
        echo "<pre/>";




        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($_POST["user-name"] and  $_POST["lang"]) {
                echo  "User Name " . $_POST["user-name"];
                echo "<br>";
                echo "Option " . $_POST["lang"];
            }  

            if ($_POST["lang"] == "ar") {
                header("Location: arabic.php");
                exit();
            }

            if ($_POST["lang"] == "fr") {
                header("Location: france.php");
                exit();
            }
            if ($_POST["lang"] == "en") {
                header("Location: english.php");
                exit();
            }
        }
        echo "<br>";
        echo " *********** ";
        ?>
    </h1>
    <br>
    <hr>

    <form method="post" action="#">
        <label for="user-name">User Name</label>
        <input type="text" name="user-name" />
        <select name="lang" id="">
            <option value="ar">Arabic</option>
            <option value="en">englich</option>
            <option value="fr">france</option>
        </select>
        <button type="submit">Send</button>
    </form>

</body>

</html>


<?php


/*
// V 31 if Else ....
echo  " <br>    -------------  <br>";

$vaar=  1 > 5 ? 8888 :  100_200 ;
echo $vaar;

// V 30 if Else ....
/*
echo  " <br>    -------------  <br>";
if (0) {
    echo "yees";
}elseif (true) {
    echo "Non";

}


*/
/*
// V 20 ->> 29 test 
// Qst 8
echo  " <br>";
// $a=@$b or die("proobleme");

// $f=@ file("txt.txt") or die("proobleme file");
echo default "test";
echo  " <br>";
$g = (@include("inddx.php")) or die("proobleme file php");
echo  " <br>";
echo "test final";

/*
// Qst 7
$a=10;
$b=20;


echo  (($a + $b) *( $a + $b) + $a * $a) * $a ;
echo  " <br>"; 
echo  " <br>"; 
echo  " <br>"; 


/*
// Qst 6
// M1
$a="Nom 1";
$b="Nom 2";
$c="Nom 3";
 $d = $a ." ";
 $d .= $b ." ";
 $d .= $c  ;

// M2
$d = $a ." ".$b." ".$c;
// M3
$d = ' ${$a}  ';
 echo  " <br>"; 
 echo  $d; 
 echo  " <br>"; 



/*
// Qst 5

$ponts=10; 
++$ponts ;
++$ponts ;
 echo    ++ $ponts;
 echo  " <br>"; 

 $ponts=10; 
   -- $ponts;
 echo    -- $ponts;
 echo  " <br>"; 

 $ponts=10; 
 $ponts-=1;
echo   --$ponts."<br>";
$ponts+=4;
echo   ++$ponts;


/*
// Qst 4

$a=10;
$b=20;
$c=15;
var_dump( $a  <   $b);
var_dump( $c  >   $a);
var_dump( $a  >=   $b); 
var_dump( $a  <>   $b); 
var_dump( $a  ||   $c); 
var_dump( $a   and  $c);
var_dump( gettype($a) == gettype($b)  ); 
var_dump( gettype($a) === gettype($b)  );
var_dump( gettype((float)$a)  != gettype($b)  );


/*
// Qst 3

$a=10;
$b=20;
echo  $b % $a - true ; 
echo  " <br>"; 
echo  -($a*$a + $a) /($a)  +$a; 
echo  " <br>";  
echo ($a - $b )/$a  ."  ***** ";
echo gettype(($a - $b) / $a);

/*
// Qst 2
$a="10";
echo  "$a <br>";
echo gettype( +$a ); 

echo  " <br> $a <br>";  
echo gettype( (int)$a ); 

echo  " <br> $a <br>"; 
echo gettype( (integer)$a ); 

echo  " <br> $a <br>"; 
echo  get_debug_type($a); 


/*
// Qst 1
echo 10 * 20 - 15 % 3 + 190 + 10  - 400;//0
/*
// V 29 Error Control Operator
// || awlawiya  que Or
// ( || )         or ( ..  )


$a=10 or 100;
echo $a; //10  ===> ($a=10) or 100  ==>$a=10
echo  " <br>    ------Or --------  <br>";
$a=10 || true;//10  ===>  $a= (10 || true)
echo $a; //1
echo  " <br>    -------||-------  <br>";

echo 10 or true;
echo  " <br>    **************** <br>";

/*
echo 10 || true;
echo  " <br>    **************** <br>";
echo -5 || false ||  0 ||  "" ||  []  ;
echo  " <br>     ***********<br>"; 
echo 20 && false &&  0 &&  "" &&  []  ;
echo  " <br>     ***<br>"; 
echo 20 && true &&  85 &&  "abs" &&  52  ;
echo  " <br>     *******<br>"; 
echo -5 || false;
echo  "  <br>  ****<br>";
echo  "<br> ------------ <br>";
echo true;//1
echo  "<br> ------------ <br>";
echo var_dump(1);//1
echo  "<br> ------------ <br>";


/*
// V 28 Error Control Operator
$userName=2;
(@include("./scoures.php")) or die("Pas de file scoure");
echo  "<br> ";

var_dump(@include("./scoures.php"));
 
$fl=@file("file.txt") or  die("pas de donnes"); 

echo "<pre>";
print_r($fl);
echo "</pre>";
echo  "<br> ------------ <br>";

/*



  $a=10;
$b=@$a or die("Pas de variable a");
echo  $b;
echo  "<br> ";
echo  "<br> ";
echo  "<br> ------------ <br>";
echo  "<br> ";

/*
// V 27 Array Operator
// ==  et != key , Value ,No Type
// === et  !==  key , Value , Type , Order
echo  "<br> ";
$arry1=[1=>10,2=>20];
$arry2=[2=>"20",1=>"10"];
$arry3=[2=>"A",1=>"B"];
$arry4=[1=>"B",2=>"A"];
// $arry4=[2=>"A",1=>"B"];
 
echo "<pre>"; 
var_dump($arry3 !== $arry4);//true;
echo "<br> ------------<br> ";
var_dump($arry1 == $arry2);//true;
var_dump($arry3 === $arry4);//true  value  ;
var_dump($arry1 === $arry2);//false  
echo "</pre>";
 
echo "<pre>";
print_r($arry1 + $arry2);
echo "</pre>";

/*
// V 26 Concatenate String
// .  and  .= 
echo  "<br> ";
$a ="Nom1 ";
$a .= " Nom2"; 
$a .= " Nom3"; 
echo  "<br> ";
echo $a;
echo  "<br> "; 

echo  "<br> ";
$a="Nom1";
$$a = "Nom2"; 
$$$a = "Nom3"; 

echo $Nom2; //Nom3
echo  "<br> ";
echo  "<br> ";
echo  "<br> ";
echo  "<br> ";

/*
echo  "<br> ";
$a="Nom 1";
$b = "Nom 2";
$c="Nom 3";

define("MY_CNST",444);
echo " $a  --  $b  --- $c ".MY_CNST;
echo  "<br> ";
echo "{$a}  --  {$b}  --- {$c}" ;
echo  "<br> ";
echo "". $a  ."-- ". $b ." ---". $c." ";
echo  "<br> ";
echo '${$a}  --  ${$b}  --- ${$c} '.MY_CNST ;
echo  "<br> ";



/*
// V 25 Compere  Operators
// Or ||  => 
// And && 
// Xor    =>  qOne Is True Note Both
echo "<br> ";
var_dump(10 > 5 xor 4 > 8 );
echo "<br> ------------ <br>";
var_dump(false xor true);
echo "<br> ";
var_dump(true xor true);
echo "<br> ";
var_dump(false xor false);
echo "<br> ";
echo "<br> ";
echo "<br> ";

/*
// V 24    Increments And Decrement Operators
$a=10;
echo --$a; //9
echo "<br> ";
echo --$a;//8
echo "<br> ";
echo $a++;//8
echo "<br> ";
echo $a;//9
echo "<br> "; 



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
$ userNm= "Medox";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wecm : <?php echo $ userNm?></title>
</head>

<body>
    <h1>Binevenu <?php echo $ userNm?></h1>
    <div>
        <p><?= "$ userNm45"; ?> Your Score is</p>
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
$ userNm= "nom 1";
$ userNm= "nom 2";
echo "<br/>";
echo $ userName;
echo "<br/>";
echo $ UserName;
echo "<br/>";
echo "  $ userNm<br/>";
echo '  $ userNm<br/>';






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

echo " </div> MILOU Med";                                                                                       //Milou Med
