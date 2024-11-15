<?php


function lang($phrase){

static $lg=array(

    // HOME PAGE
    "MESSAGE"=>"Welcomme",
    "ADMIN"=>"Administrator", 

);
return $lg[$phrase];

}

