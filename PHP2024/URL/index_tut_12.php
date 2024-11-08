<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php


$startTime=microtime(true);
echo "</br>Start = $startTime</br>"; 
$array_repeat=range(1,1_000);

echo "<pre>";
echo "********";
echo "--------";
print_r($array_repeat);
echo "--------";
echo "********";
echo "</pre>";

for ($i=0; $i < 5_000; $i++) { 
    echo "<h1><br>";
    echo "****1";
    echo "<p>Code One <p>".$i;
    echo "****2";
    echo "<br></h1>";
}

$entTime=microtime(true);
echo "</br>End = $entTime</br>";

$deff=$entTime - $startTime;
$deff=round($deff,5);
echo "</br>deff = $deff</br>";

/*


// V12 Measer Page Loadung Time (Temp de chargement)


// V11 Introduction




//10 Requer VS Include

include "./v5/file2_inc.inc";


echo "Yes No Proble";
//9 if nested


/*
//8 if Short  Opeateur Ternaire
//7 if nested
    // V6 glob();
    $i = 70;
if($i == "0"){
echo "Yes zeroooooooooo<br>";
}
else {
echo "No  zeroooooooooo<br>";

} 

echo  $i ;


    
    $i = 0;
    echo "<br> $i Items<br>";
    foreach (glob("inc_v6/*{.inc,.php}",GLOB_BRACE) as $file) {
        include $file  ;
        $i++;
    }
    echo "<br> $i Items<br>";
    echo "<br> ";





    /*
  // V5 Scandir();
  $dir=__DIR__."/V5/";
  echo $dir;
  echo "<br><br> ************** ************ *********** *********<br><br>";
  echo "<pre>";
  echo "Glob";
  print_r(glob($dir));
  $files_glob = glob("./V5/*.txt");// Tous Les fichies TXT dans dossier v5
  print_r($files_glob);
  echo "<br>";
  echo "scandir"; 
  $files_scandir=scandir($dir);
  $files_scandir=array_diff($files_scandir,array(".",".."));
  print_r($files_scandir);

  $list_exten=["png","jpeg","jpg","gif"];
  $list_exten_php=["php","inc"];

  // echo "Extention", pathinfo($files_scandir[3])["extension"];
  $i=0;

  foreach($files_scandir as $file){
      if(in_array(  strtolower( pathinfo($file,PATHINFO_EXTENSION) ),$list_exten_php) ){
  // echo "IS PHP FILE <br>"; 
  include $dir . $file;
  $i++;
  }
  }


  /*
  foreach ($files_scandir as $file) {
      $exten=strtolower( pathinfo($file,PATHINFO_EXTENSION));
      echo "<p> $exten --- ";
      if(in_array($exten,$list_exten))
  echo "Oui Image <p>";
       else 
      echo "No Pas Image <p>";

    $i++;
  }*/

    /*
    echo "<br> $i Items<br>";

    echo "</pre>";
    echo "<br><br> ************** ************ *********** *********<br><br>";








    ?>


        <?php
    /*
        ;
        echo "<br> -------------- <br>";
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            if (isset($_POST["envoye"])) {

                echo "<br> ---- Name  <br>"; 
                echo $_POST["Name"];
                echo "<br> ---- Lang  <br>";
                $lgChekd=implode("/", $_POST["lang"]);
    echo $lgChekd."<br>";
    print_r(explode("/",$lgChekd));
    echo "<br> -****************************************** ************<br>";

            }
        }
    /**
     
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <h2>Les Langagues</h2>
            Name : <input type="text" name="Name">
            <hr>
            <input type="checkbox" name="lang[]"   value="HTML"> HTML
            <hr>
            <input type="checkbox" name="lang[]"   value="CSS"> CSS
            <hr>
            <input type="checkbox" name="lang[]"   value="PHP"> PHP
            <hr>
            <input type="submit" value="Envoye" name="envoye">
        </form>
        <br><br><br>

    <?php  */
    ?>

</body>

</html>


<?php
/*
echo "Is URL";
$myUrl='http://username:password@hostname:9090/path?arg=value&nbr=455&txt=blabla#anchor';;

echo "<pre>";
echo "URL = ".$myUrl;
echo "<br>---- ----- ----- ----- ----- ----- ---- ----- ---- ---- <br>";
print_r(parse_url($myUrl));
echo "<br>---- ----- ----- ----- ----- ----- ---- ----- ---- ---- <br>";
echo parse_url($myUrl,PHP_URL_QUERY);
parse_str(parse_url($myUrl,PHP_URL_QUERY),$query);
echo "<br>";
print_r($query);

echo "</pre>";





echo '<a href="https://www.youtube.com/watch?v=x4f32i5lYH0&list=PLDoPjvoNmBAwP0emFTIiCNcySKz-mlZj7"> Tuto</a>';
*/

?>

<!-- <iframe width="560" height="315" src="https://www.youtube.com/embed/x4f32i5lYH0?si=8IKisYF4QtRdwf_-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->