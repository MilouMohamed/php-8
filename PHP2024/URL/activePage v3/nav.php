<?php 

$nmm=100;
function getPageActive($name="index"){
    global $titre;
   global $nmm;
    $nmm=0;
    if(isset($titre) && $titre == $name){
        echo "class='active'";
    } 
}
getPageActive("tes");


echo "<br> ---------- $nmm ------------ -----  <br>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($titre )){  echo  $titre ;}?></title>
    <style>

*{
    
list-style:none;
text-decoration: none; 
box-sizing: border-box;
}
ul{
display: flex;
gap: 20px;
border-bottom: 3px dashed black;
margin-bottom: 5px;
overflow: visible;
}

        .active{
            background-color: green;
            padding: 15px 12px;
            font-weight: bold;
            border-radius: 12px;
            color: white;
        }
    </style>
</head>
<body>
    


<ul id="link">
    <li><a <?=getPageActive("Home") ?> href="index.php">Home</a></li>
    <li><a <?=getPageActive("About") ?> href="about.php">About</a></li>
    <li><a <?=getPageActive("CONTACT") ?> href="countact.php">Contact</a></li>
    <li><a <?=getPageActive("SERVICES") ?> href="service.php">Service</a></li>
    <li><a <?=getPageActive("Base") ?> href="base.php">Base</a></li>
</ul>
<script>
    /*
window.onload =function(){ 
    console.log("object");

    list_link=document.querySelectorAll("#link li a");
     
    list_link.forEach(link => {
        link.onclick=function(e){
            // e.preventDefault();
            console.log(link);
            list_link.forEach(noactive => {
                noactive.classList.remove("active");
            });
            link.classList.add("active");

        }

    });

};
*/

</script>
</body>
</html>