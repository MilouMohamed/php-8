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
    "DASHBOARD"         =>"Dashboard", 

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
    "PICTUR"          =>"Image",
    

    //Membres Update
    "TITRE_MEMBERS_UPDATE"          =>"Update Members",
    //Membres Items
    "TITRE_MEMBERS_ITEMS"          =>"Thes Members",
    //Membres Items
    "TITRE_MEMBERS_DELETE"          =>"Delete Member",
    //Membres Pending
    "TITRE_MEMBERS_PENDING"          =>"Pending Member",
    "TITRE_MEMBERS_ACTIVE"          =>"Pending Activation",
    
    // Ctegories 
    "TITRE_CATEGORIES_ADD"=>"Add New Categorie",
    "DESCRITPNIO"=>"Description",
    "ORDRING"=>"Ordring",
    "VISIBILTY"=>"Visible",
    "ALLOW_CMNT"=>"Allow Commenting",
    "ALLOW_ADS"=>"Allow Ads",
    "YES"=>"Yes",
    "NO"=>"No",
    "PARENT"=>"Parent",
    "TITRE_CATEGORIES_EDIT"=>"Edit Categorie",
    

    
    // Items 
    "TITRE_ITEMS_ADD"=>"Add New Item",
    "TITRE_ITEMS_ITEMS"=>"Page Of Items",
    "PRICE"=>"Price",
    "COUNTRY"=>"Country",
    "STATUS"=>"Status",
    "TITRE_ITEMS_EDIT"=>"Item Edit",
    "TAGS"=>"Tags",
    
    
    
    // COMMENTS 
    "COMMENTS"=>"Comments",
    "NO_COMMENT_ID"=>"No Comment ",
    "TITRE_COMMENT_UPDATE"=>"Update Comment ",
    "TITRE_COMMENT_DELETE"=>"Dellete Comment ",
    

    // FIN  HOME  ADMIN
    // STRAT CLIENT
    "CLIENT"=>"Client ",

    // END CLIENT


);
return $lg[$phrase];

}

