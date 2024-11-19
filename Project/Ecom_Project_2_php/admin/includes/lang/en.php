<?php


function lang($phrase){

static $lg=array(
    
    "MESSAGE_ERROR"=>"Error !!", 

    // HOME  ADMIN
    "MESSAGE"           =>"Welcomme",
    "PAGE_LOGIN_TITRE"  =>"LOGIN PAGE", 


    //dashboard
    "ADMIN"             =>"Admin", 
    "CATEGORIES"        =>"Categories", 
    "LOGOUT"            =>"Logout", 
    "EDIT_PROFILE"      =>"Edite Prof", 
    "SETTINGS"          =>"Settings", 
    "MY_NAME"           =>"MILOU MED", 
    "ITEMS"             =>"Items", 
    "MEMBERS"           =>"Members", 
    "STATISTIC"         =>"Statistic", 
    "LOGS"              =>"Logs", 


);
return $lg[$phrase];

}

