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

    //Membres  edit
    "TITRE_MEMBERS"     =>"Edit Members", 
    "TITRE_MEMBERS_ADD"     =>"Add New Member", 
    "NAME"              =>"NAME", 
    "FULLE_NAME"        =>"Full Name", 
    "EMAIL"             =>"Email", 
    "PASSWORD"          =>"Password", 
    "SAVE"          =>"Save", 
    "ADD"          =>"Add New", 
    "NO_PROFILE_ID"          =>"No Profile withe this id",

    //Membres Update
    "TITRE_MEMBERS_UPDATE"          =>"Update Members",

    

    


);
return $lg[$phrase];

}

