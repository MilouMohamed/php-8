<?php
echo "<div style='padding:20px'>  ";

// echo "<br> -----------11111---------<br>"; 
// V 64  Array   function Part 3

$lis_crs =[10,20,30];

echo array_product($lis_crs)."<br>";// 6 000
echo array_sum($lis_crs)."<br>";   // 60



$lis_crs = [ "php"=>"php1", "JS"=>"js1","react"=>"js1", "Css"=>"Css1", "Html"=>"HTML1",1,"1"]; 
$pad=["A","B","C","D"];

echo "<pre>"; 
print_r($pad);
print_r(array_pad($pad,10,"@"));  // A B C D @ @ @ @...
print_r(array_pad($pad,-10,"@"));  // @ @ @ @ A B C D...
echo "</pre>"; 

/* 
echo "<pre>"; 
print_r($lis_crs);
print_r(array_values($lis_crs)); // all values 

print_r(array_keys($lis_crs));//"php" ,"JS" ,0...
print_r(array_keys($lis_crs,"js1"));//  JS , react 
print_r(array_keys($lis_crs,"1"));//[0] => 1, [1] => 1
print_r(array_keys($lis_crs,"1",true));//   [0] => 1
echo "<pre>";

/*
// echo "<br> -----------11111---------<br>"; 
// V 64  Array   function Part 2
$lis_crs = [ "php"=>"php1", "JS"=>"js1", "Css"=>"Css1", "Html"=>"HTML1"]; 

if(array_key_exists("php",$lis_crs)) 
echo " Yes In Key <br>"; 
else 
echo " Note In Key <br>"; 

echo "<pre>";
// print_r(); 
echo "</pre>";




/*
$list1 = [ "1","Nom1", "Nom2", "Nom3", "Nom4",["Pre1","Pre2"]]; 

if(in_array(1,$list1,true)) { // N != n ; true(Type) 1 != "1"
echo "Yes in  array";
}
else {
echo "Note  in  array";

}
/*

echo count($list1, 1 )."  <br> ------------ <br>";//7  (1) [1 2 3 4 5[6 7]];
echo "<pre>";
print_r($list1);
print_r($list2);
print_r(array_flip( $list1));// Key=> value ====> value=> Key
echo "</pre>";
/*


$list2=[] ;
foreach($list1 as $key=>$value) { 
 try {
    $list2[$value]= $key; 
 } catch ( error) {
     //Probleme nisted Array["Pre1","Pre2"]
 }
}

echo "<pre>";
print_r($list1);
print_r($list2);
print_r(array_flip( $list1));// Key=> value ====> value=> Key
 echo "</pre>";

 /*
echo "<pre>";
print_r($list1);
print_r(array_reverse( $list1));// Key 0=> "Nom1" ====> 4=> "Nom1"
print_r(array_reverse( $list1,true));// Key 0=> "Nom1" ====> 0=> "Nom1" fin de array 
echo "</pre>";







/*
// echo "<br> -----------11111---------<br>"; 
// V 63  Array   function Part 1
$list1 = ["Nom1", "Nom2", "Nom3", "Nom4", "Nom4", "Nom1","Nom1", "Nom3", "Nom3", "Nom1"];
echo "<pre>";
// print_r(array_count_values($list1)); // [A] => Nom1 ....
/* [Nom1] => 3
    [Nom2] => 1
    [Nom3] => 3
    [Nom4] => 1 */ 
    /*
    // print_r($list1) ;
echo "</pre>";

$lis1 = $list1; 
$list_res = [];
for ($i = 0; $i < count($list1) - 1; $i++) :

    $elem = $list1[$i];
$cntr = 1;
    echo $elem." | ";
    for ($j = $i +1; $j < count($list1); $j++) :
        if ($elem == $list1[$j]) {
            $cntr++;
            $list1[$j]="\0";
        }
        $list_res[$elem]=$cntr;
    endfor;

 
endfor;
echo "<pre>";
print_r($list_res);
// print_r(array_count_values($list_res));
echo "</pre>";
/*


$list_keys=["A","b","C","d","E"];
$list_values=["Nom1","Nom2","Nom3","Nom4","Nom5" ];
echo "<pre>";
print_r(array_combine($list_keys,$list_values));// [A] => Nom1 ....
echo "</pre>";




$list1=["Nom1","Nom2","Nom3","Nom4","Nom5","Nom6","Nom7","Nom8"];
echo "<pre>";
print_r(array_chunk($list1,3));
echo "</pre>";
$list2=["A"=>"Nom1","b"=>"Nom2","c"=>"Nom3","D"=>"Nom4","e"=>"Nom5","F"=>"Nom6","G"=>"Nom7","H"=>"Nom8"];
echo "<pre>";
print_r(array_chunk($list2,3,true));//True for keys
echo "</pre>";
echo "<pre>";
print_r(array_change_key_case($list2,CASE_LOWER));// Lower  for keys
print_r(array_change_key_case($list2,CASE_UPPER));// Upper   for keys
echo "</pre>";



echo  "<br>";



/*
// V 53 ->> 62 test  
// Qst 7 function string
$chain=["E",1,2,"L","z","E","R","o"];
echo  "<br>";
$chn= implode( str_replace([1,2],"", $chain))."<br>"; //ELzERo
echo  $chn."<br>"; //ELzERo
echo  "<br>";
echo implode( array_filter($chain,fn($elm)=> is_string($elm) ))."<br>"; //ELzERo
echo "<pre>";
print_r(str_replace([1,2],"", $chain));
print_r(  array_map("strtolower",$chain)   );// map to lower case 
print_r(  array_map("ucfirst",$chain)   );// map to lower case 
echo "</pre>";


/*
// V 53 ->> 62 test  
// Qst 6 function string
$chain=["E","l","z","e","r","o"];
echo implode($chain)."<br>";  

 
/*
// V 53 ->> 62 test  
// Qst 5 function string
$strl="Elzero Web School";
$e="e";
$o="O";
$four=4; 

echo $strl."<br>"; 
echo substr_count( $strl,$e,$four)."<br>"; 
echo substr_count(strtoupper( $strl),$o,-$four)."<br>";  
/*
// V 53 ->> 62 test  
// Qst 4 function string
$str="<div><b> Medox One  </b></div> ";
echo $str."<br>"; 
echo strip_tags( $str)."<br>"; // remove all tags
echo strip_tags( $str,"<b>")."<br>";  //Remove  div
echo str_replace("<div>","",$str)."<br>"; 
 

/*
// V 53 ->> 62 test  
// Qst 3 function string
$str="aAa"; 
$num=3;
$chr="_";

  $str=  str_repeat( str_pad( strtolower($str),4,"_"),$num) ;
echo $str."<br>";

$str="aAa"; 
$str=  str_repeat( strtolower($str).$chr,$num);
echo $str."<br>";


echo "<br>";
echo "<br>";

/*
// V 53 ->> 62 test  
// Qst 2  function string
echo "<br>";
$str="Orezle"; 
echo "$str <br>"; 
echo ucfirst(strtolower( strrev($str)));


/*
// V 53 ->> 62 test  
// Qst 1  function string
$nm_1=-1;
$nm_2=2.5;
$let_1="o";
$let_2="z";
$str="El%er0"; 
  $nm_2=(int) $nm_2;
  $str[$nm_2]=$let_2;
$str= substr_replace($str,$let_1,$nm_1);  
echo "<br> ".strlen($str) ."<br> "; 
echo $str;
// $str= str_replace(["0","%"],["o","z"],$str);
echo "<br> " ; 
echo $str;
echo "<br>";


// V 62  String  function Part 9
// wordwrap(string ,length,"elemtn" , bool respect lenght)
/*
echo number_format(100_000.123456)."<br>";        //100,000
echo number_format(100_000.123456,3,".")."<br>";  //100,000.123
echo number_format(100_000.123456,4,",","_")."<br>";//100_000,1235
echo number_format(100_000.123456,4,"#","@")."<br>";//100@000#1235
echo floor(100_000.123456)."<br>";//100000



// strstr senctive  W != w ;
echo strstr("Elzero Web","W")."<br>"; //Web
echo strstr("Elzero Web","z")."<br>"; //zero Web
echo strstr("Elzero Web","W",true)."<br>"; //Elzero 
echo strstr("Elzero Web","W",false)."<br>"; //Web 
echo strstr("Elzero Web","L")."<br>"; //vide var_dump => bool(false) 

// strstr Insensetive  W == w ;
echo stristr("Elzero Web","L",false)."<br>"; //lzero Web 


/*
// echo "<br> -----------11111---------<br>";
// V 61  String  function Part 8
// wordwrap(string ,length,"elemtn" , bool respect lenght)
 

echo "<br>"; 
echo similar_text("Elzero","Elzeroo")."<br>"; // 6 rapport de similarit
echo similar_text("Elz12457896","Elzeroo")."<br>"; // 3 Elz == Elzeroo
echo similar_text("Elz_ero","Elzeroo",$perc)."<br>"; // 6 
echo "$perc <br>";// taux de l egalite
echo "************<br>"; 
echo strrev("Elzeroho")."<br>";
echo ("Elzeroom")."<br>";
echo ord("A")."<br>"; //65
echo ord("a")."<br>"; //97
echo chr(65)."<br>"; //a
echo chr(97)."<br>"; //A
echo "<br>"; /*
echo "************<br>"; 
$nom="Medo med  meddooxlbh one three fourYou addOnd";
echo wordwrap($nom,8,"<br>") ; // ...<br>meddooxlbh<br> ... 9ata3 chaises par <br> chaque 8 characts
echo "<br>"; 
echo wordwrap($nom,8,"<br>",true) ; //...meddoox<br>lbh one   ...9ata3 chaises par <br> chaque 8 characts




/*
// V 60  String  function Part 7
// substr_replace(string , eleme ,index Start 0 , length)
echo "<pre>"; 
echo substr_replace("OneTwo","Z",0);//Z
echo "<pre>";
echo substr_replace("OneTwo","Z",3);//OneZ
echo "<pre>";
echo substr_replace("OneTwo","Z",-1);//OneTwZ
echo "<pre>";
echo substr_replace("OneTwo","Z",2);//OnZ
echo "<pre>";
echo substr_replace("OneTwo","Z",2,2);//OnZwo
echo "<pre>";
echo substr_replace("OneTwo","Z",1,4);//OZo 
echo "<pre>";
echo substr_replace("OneTwoh jt","Z",1,-1);//OZt
echo "<pre>";
echo substr_replace("OneTwoh ","@",1,0);//O@neTwoh  0 Pour Insert not repalace
echo "<pre>";
echo "<pre>";
print_r(substr_replace(["onetwo","TherrFour"],"F",0)); // F F
print_r(substr_replace(["onetwo","TherrFour"],"F",1));
print_r(substr_replace(["onetwo","TherrFour"],"F",-1));
echo "</pre>";




/*
// echo "<br> -----------11111---------<br>";
// V 59  String  function Part 6
// str_replace h != H sencitive
// str_ireplace h == H Insencitive

echo "<pre>";
print_r(str_replace([1,3,2],["one","Three"],[1,2,3,4]));//2 = null 
echo "</pre>";
echo "<pre>";
print_r(str_replace([1,3],["one","Three"],[1,2,3,4]));
echo "</pre>";


echo str_replace(["@","#"],[1,2],"#web Sh@#l Zer@ #",$dd);//2web Sh12l Zer1 2
echo "<br>";

echo str_replace("@","o","web Sh@@l Zer@",$dd);//web Shool Zero
echo "<br>";
echo "<br> $dd"; //




/*
// echo "<br> -----------11111---------<br>";
// V 58  String  function Part 5
// Dans Url  use 

//String translate 
echo strtr("abcdb","b",4)."<br>";  //a4cd4
echo strtr("abcd","ac","fr")."<br>";//fbrd
$arrl=["@"=>"l","#"=>"o"];
echo strtr("Web shc##@ zer## @#@ ",$arrl)."<br>";//Web shcool zeroo lol 

/*

//
echo str_pad("12",8,"*",STR_PAD_RIGHT)."<br>";//12******
echo str_pad("12",8,"*",STR_PAD_LEFT)."<br>"; //******12
echo str_pad("12",8,"*",STR_PAD_BOTH)."<br>"; //***12***
echo str_pad("12",8,"*")."<br>";//12******
echo str_pad("234",8,0)."<br>"; //23400000
echo str_pad("3456",8,0)."<br>";
echo str_pad("45678",8,0)."<br>";
echo str_pad("567891",8,0)."<br>";
echo " "."<br>"; 

/* 
echo "hello [] () * + . <br>";           // hello [] () * + . 
echo quotemeta("hello [] () * + . <br>");//hello \[\] \(\) \* \+ \.

parse_str("nom=Nom1&add=Adr1&emal=Email@",$arryyy);
echo "<pre>";
print_r($arryyy);
echo "</pre>";
echo  $arryyy['nom']." | ".$arryyy['add']." | ".$arryyy['emal']." | ";


/*
// echo "<br> -----------11111---------<br>";
// V 57  String  function Part 4
// strpos Case sencitive  H !+= h
// strRpos (dernie element) Case sencitive  H !+= h
// strIpos Case Insencitive H = H
// strRIpos (dernie element) Case Insencitive and Right  
// Substr_count  

echo "<br>"; 
var_dump(substr_count("Hello Hello he He","he")); //int 1

echo "<br>"; 
var_dump(substr_count("Hello Hello he He","He",6,11)); //int 2
echo "<br>"; 
/*
var_dump(strripos("Hello Hello","h")); //int 6
echo "<br>";  
echo "<br>"; 
var_dump(strpos("Hello Hello","h")); //bool false
echo "<br>"; 
var_dump(stripos("Hello Hello","h")); //int 0
echo "<br>"; 
var_dump(stripos("Hello Hello","h",-11)); //int 0


/*
echo "<br>"; 
var_dump(strpos("Hello Hello","H")); //int 0
echo "<br>"; 
var_dump(strpos("Hello Hello","H",4)); //int 6
echo "<br>"; 
var_dump(strpos("Hello Hello","r",0));// bool false
echo "<br>"; 
var_dump(strpos("Hello He.llo",".",-4)); //int 8


/*
// echo "<br> -----------11111---------<br>";
// V 56  String  function Part 3
echo "<br>";// new lineto <br>
echo nl2br("noom1\nnoon2\nnoom3",true);
echo nl2br("noom1\nnoon2\nnoom3",false);// <br> <br />
echo "<br> ************************ <br>";
echo nl2br("nom 1
nom2
noom3");
/*
echo "<br>";
echo "<h4> T ome <i>Paragraph </i> </h4> ";
echo  strip_tags( "<h4> T ome <i>Paragraph </i> </h4> ");// delete all atgs
echo  strip_tags( "<h4> T ome <i>Paragraph </i> </h4> ","<h4>");// not h4
echo  strip_tags( "<h4> T ome <i>Paragraph </i> </h4> ","<h4><i>");//Note h4 et i tag
echo "<br>";
echo chunk_split("abcd efghk rnhoop 4588",3)."<br>  55555 <br> ";
echo chunk_split("abcd efghk rnhoop 4588",3,"@")."<br>";//abc@d e@fgh@k r@nho@op @458@8@   copie en trois Morceu 
echo chunk_split("0631514142",3,"--")."<br>";// 3 Trois cararters -- carat

echo "<pre>";
print_r( str_split("abcdef"));// 1  cararters en array
print_r( str_split("abcdef",2));// 2  cararters en array
echo "</pre>";



/*
// echo "<br> -----------11111---------<br>";
// V 55  String  function Part 2

echo "<br>";
echo strlen("    abcd 1  ")."<br>";
echo strlen(trim("    abcd 1  "))."<br>";
echo trim("@@@##abcd1efg gh1#@# hj##@#","#@")."<br>";// # et @ abcd1efg gh1#@# hj
echo rtrim("##@@@##abcd1efg###","#")."<br>";// # 
echo ltrim("##@@@##abcd1efg###","#")."<br>";//left  @@@##abcd1efg###

/*
echo "<br>";
echo str_shuffle("ABCDEF"); // Random letters
echo "<br>";
echo strrev("ABCDEF");
/*
$frind="non1 et non2 et nom3 et n4";

echo "<br>";
echo "<pre>";
print_r(explode("et",$frind));
print_r(explode("et",$frind,2));// nom1 , nom2 et nom3...n4;
print_r(explode("et",$frind,-1));// nom1 , nom2 , nom3 ;
echo "</pre>";


echo "<br>";
/*



$frind=["nom1","nom2","nom3","nom4"];

echo implode($frind)."<br>";//Join en js
echo implode(" ",$frind)."<br>";
echo implode("-",$frind)."<br>";
echo implode("*",$frind)."<br>"; 
echo implode("  ",$frind)."<br>"; 
echo implode("@",$frind)."<br>"; 

/*
// echo "<br> -----------11111---------<br>";
// V 54  String  function Part 1
echo "<br>";
$chaine="GabCDefGH nom1 NOM2 Nom3";
echo ucfirst($chaine) ."<br>";
echo lcfirst($chaine) ."<br>";
echo strtolower($chaine) ."<br>";
echo strtoupper($chaine) ."<br>";
echo ucwords($chaine) ."<br>";  
echo ucwords("abc jFG jGK-mo") ."<br>"; 
echo ucwords("abc jFG jGK-mo","-") ."<br>"; 
echo str_repeat("10 ",5) ."<br>";



/*
// echo "<br> -----------11111---------<br>";
// V 53  String 
echo "<br>";
echo "String function";
$strng="abcdeF";
echo " $strng[5] ".strlen($strng)." <br> ".( $strng)." <br> ";
echo " $strng[-1]   <br> " ;
echo " {$strng[strlen($strng) -1]}  <br> " ;

echo " $strng <br> ";
$strng[0]=5;
echo " $strng <br> ";
$strng[9]=5;
echo " $strng <br> ";
echo " Length =".strlen($strng)." <br> ".( $strng)." <br> ";




// V 43 ->> 52 test  
// Qst 9 anonyme function 
echo "<br>";
$greet=function ($nnmm){
    return "$nnmm Greeting";
};
echo $greet("Medox");
// Arrow 
echo "<br>";
$greet_arr=fn ($nnmm)=>"$nnmm Greeting"; 
echo $greet_arr("Medox");

  

echo "<br> ************************** ";
echo "<br>";


// V 43 ->> 52 test  
// Qst 8 global voir github  global variables
$msg="Helow";

$Hello =fn($nm)=> ( "$msg $nm");
$Hello2 =function($nm) {
    global $msg ;
return "$msg $nm 2222 ";
};


echo $Hello2("Medox");
echo "<br>";
echo $Hello("Medox");

/*
// V 43 ->> 52 test  
// Qst 7
echo "<br>";
function sooom(int $n1,int $n2) { 
    // $n1=(double)$n1;
    $n2= $n2 +0.0;
return $n1 +$n2; 
}

echo sooom(20 ,10);
echo "<br>";
echo gettype( sooom(20 ,10));


/*
// V 43 ->> 52 test  
// Qst 6
function calculate($nbr1, $nbr2, $oprt = "+")
{
    // echo $oprt."---------------- $nbr1*$nbr2";
    switch ($oprt) {
        case  "+":
        case   "a":
        case "add": {
                return ($nbr1 + $nbr2  );
               
            }
        case  "s":
        case "-": {
            return ($nbr1 - $nbr2);
                
            }
        case  "m":
        case "*": {
            return ($nbr1 * $nbr2);
                 
            }
        default:
        return "Error"; 
    }
}
echo "<br>";
echo calculate(10, 20);
echo "<br>";
echo calculate(10, 20, "a");
echo "<br>";
echo calculate(10, 20, "s");
echo "<br>";
echo calculate(10, 20, "-");
echo "<br>";
echo calculate(10, 20, "*");
echo "<br>";
echo calculate(10, 20, "m");
echo "<br>";
echo calculate(10, 20, "mk");
echo "<br>";
/*
// V 43 ->> 52 test  
// Qst 5
echo "<br>";
echo  gettype("ejdn");
echo  gettype(15);
echo  gettype(true);
//string  integer boolean

function check_status($a, $b, $c)
{
    $tchng = [$a, $b, $c];
    $l_n = [];
    foreach ($tchng as $ietm) {
        if (gettype($ietm) == "string") $l_n[0] = $ietm;
        if (gettype($ietm) == "integer") $l_n[1] = $ietm;
        if (gettype($ietm) == "boolean") $l_n[2] = $ietm;
    }
    $l_n[2] = ($l_n[2] ? "Yes" : "Non");

    return "Hello $l_n[0] ,Yr Age Is $l_n[1] , You Are Avalable ?  $l_n[2]";
}
echo "<br>";
echo check_status("Osama",25,true);
echo "<br>";
echo check_status(22,"Osama",true);
echo "<br>";
echo check_status(true,"Osama",45);
echo "<br>";
echo check_status(false,"Osama",35);
echo "<br>";



/*
// V 43 ->> 52 test  
// Qst 4

function multiply(){
    $nbr=1;
    foreach(func_get_args() as $item){
if(is_numeric($item)){
    if(is_double($item)){
        $item=(int)$item;
    }
    $nbr*= $item;
}
    }
    return $nbr;
}

echo "<br>";
echo multiply(10,20);
echo "<br>"; 
echo multiply("A",10,30);
echo "<br>"; 
echo multiply(100.5,10,"B");

/*
// V 43 ->> 52 test  
// Qst 3


function sum_all() {
    $som=0;
    foreach(func_get_args() as $nbr) {
        if($nbr != 5){
            if($nbr === 10)
            $som+=$nbr+10;
        else  $som+=$nbr;
        } 
    }
    return $som; 
}
echo  sum_all(10,12,5,6,6,10);
echo "<br>";
echo  sum_all(5,10,5,10);
echo "<br>";

/*
// V 43 ->> 52 test  
// Qst 2

$get_args=function () { 
    $vr="";
    // foreach(func_get_args() as $elem ):
    //     $vr.=" || $elem";
    // endforeach;
$vr=implode("  |  ",func_get_args());
//js Join(" | ")
return $vr;
};

echo $get_args("Non1 ","Non2 ","Non3 ","Non4 ","Non5 ");
echo "<br>";
echo $get_args("Non10 ","Non20 " );
/*
// V 43 ->> 52 test  
// Qst 1 

function geteting($nm,$gend="") { 
    if($gend != ""){
        $genr =($gend == "Male"? "Mr":"Miss");
        return " Hellow --- $genr --- $nm <br>";
    }
    return " Hellow  $nm <br>";

}

echo geteting("H-Nom10","Male");
echo geteting("H-Nom24","Female");
echo geteting("H-Nom37");

/*
// V 52   Arrow Fonction
echo "<br>";
echo "Arrow Function";


$nb1=10; 
$fnc2= fn($nnn) => "-- $nnn $nb1 --"; 
echo "<br>"; 
echo $fnc2(500);

$fnc=fn($nbrrr) =>  $nbrrr +5;

echo "<br>";

echo $fnc(40);

$f11= function ($sds=5000) use($nb1) {
    echo " $sds  $nb1";
};
echo "<br>";
echo $f11();


/*
// echo "<br> -----------11111---------<br>";
// V 51  Varaibble function and scope 

$list=[10,20,30,40,50,60];
$nbr=25;

function add_five($nbrrr)  {
    return $nbrrr +5;
}

$list_add=array_map("add_five",$list);

$list_add_ten=array_map(function ($nbrrrrr){ return $nbrrrrr+10;},$list);
//Anonyme Function callback  
echo "<pre>";
print_r($list);
print_r($list_add);
print_r($list_add_ten); 
echo "</pre>";





 $nnbbrr=5555;  
$fun_on=function ($one) use($nnbbrr)  {
    return "------ $one----- $nnbbrr";
};
echo $fun_on(4455);
echo "<br>";


$ny_func=function($sfg){
    return "test Funct $sfg";
};
echo $ny_func(1122);

/*
// echo "<br> -----------11111---------<br>";
// V 50 Varaibble function
// Arguments By references   and Type Declaration

function calculate($n1 ,$n2):int { 
    return $n1+$n2;
}


echo calculate(10.5,9.5)." Type Is ".gettype(calculate(10.5,9.5));
echo "<br>";
var_dump(calculate(10.5,9.5));


echo "  <br>";   
function add_five(&$nb){  // by referance
    return $nb+=20;   
}

$nbrr=10;
echo add_five($nbrr);
echo "  <br>";   
echo $nbrr;

/*
// V 49 Varaibble function
// variable Like Function 

if(function_exists("two")){
    echo "Yes  Existe";

}else {
    echo "not Existe";
}

echo "  <br>"; 

echo strlen("445522");
echo "  <br>"; 


function two($tt=55555)  {
    return "Two Function $tt"; 
}
echo two(445545);
$func2="two";
echo "  <br>"; 
echo $func2("Test param ");

echo "  <br> ---------------------- <br>";

function one()  {
    return "One Function "; 
}

echo one();
echo "  <br>";
$func1="one";
echo $func1();//One Function

/*
// echo "<br> -----------11111---------<br>";
// V 48  fonction Variable Arguments List
// ...Array  Splat operator

echo "  <br>";
function test_3_ponts($n,$c="DEf-Val",...$skls)  {
    echo "$n  | $c  =>>>> ";
    foreach($skls as  $slk):
        echo " | $slk ";
    endforeach;
    echo " <br> ";
}
$list=["html","PHP","REACT"];
test_3_ponts("Non1","Contry1","html","Css","JS");
test_3_ponts("Non1");
test_3_ponts("Non1","Contry1",...$list);
test_3_ponts("Non1","Contry1",...["JS","CSharp","ADo"]);

// echo "<br> -----------11111---------<br>";
// V 47  fonction Variable Arguments List

/*
func_num_args();   all elems
func_get_arg(index); elem
func_get_arges() ; Array
*/

/*
// M2
function sommme_tow()
{
    $som = 0;
    for ($i = 0; $i < func_num_args(); $i++) {
        $som += func_get_arg($i);
    }
    return $som;
}

echo sommme_tow(1, 5, 30);
echo "  <br>";
echo sommme_tow(1, 5, 3, 1000);
echo "  <br>";
echo "****************************  <br>";



// M1
function sommme(...$nbrs)
{
    $som = 0;

    for ($i = 0; $i < count($nbrs); $i++) {
        $som += $nbrs[$i];
    }
    return $som;
}

echo sommme(1, 5, 30);
echo "  <br>";
echo sommme(1, 5, 3, 1000);
echo "  <br>";

/*
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
