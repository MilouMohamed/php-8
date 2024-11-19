<?php


function lang($phrase){

static $lg=array(

    // HOME PAGE
    "MESSAGE"=>"مرحبا",
    "ADMIN"=>"مسؤول", 
    "CATEGORIES"=>"الفآت", 
    "LOGOUT"=>"خروج", 
    "EDIT_PROFILE"=>"تغيير الحساب", 
    "SETTINGS"=>"الاعدادات", 
    "MESSAGE_ERROR"=>"خطأ", 
    "MY_NAME"=>"الميلوع محمد", 
    "PAGE_LOGIN_TITRE"=>"صفحة تسجيل الدخول", 


);
return $lg[$phrase];

}

