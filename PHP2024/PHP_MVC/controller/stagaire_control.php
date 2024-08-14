
<?php 
require_once "./model/stagaire_model.php";

function index_Action(){

$list_stgr=latest(); 
require_once "./view/list_stgr.php"; 
}

function create_Action(){
    require_once "./view/create_view.php"; 
}

function edit_Action(){
    
}

function destroy_Action(){
    
}


