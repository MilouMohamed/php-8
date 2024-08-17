
<?php 
require_once "./model/stagaire_model.php";

function index_Action(){

$list_stgr=latest(); 
require_once "view/list_stgr.php"; 
}

function create_Action(){
    require_once "./view/create_view.php"; 
}

function stor_Action(){ 
    create();
    header("location:afficher_2.php?action=listStgr");
}
 
function edit_Action(){ 
    $id_stg=$_GET["id"];
    $stagaire=  view($id_stg);
    require_once "./view/edit.php";

}
function delete_Action(){
    $id_stg=$_GET["id"];
       require_once "./view/delete.php";
}

function destroy_Action(){
      
    $id_stg=$_GET["id"];
    destroy($id_stg);
       header("location:afficher_2.php?action=listStgr");
}

function update_action(){
      
     $id_stg=$_POST["id"];
      update($id_stg);
   header("location:afficher_2.php?action=listStgr");

}

