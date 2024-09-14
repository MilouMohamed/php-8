<?php
echo "laravel";
// VIdeo      V32
// Validation Par Class
//php artisan make:request ProfileRequest (voir http /Requests)
// $fildes=  $request->validated();// Les Champ Valide
//


// VIdeo      V31
// crypateg et VAlidation du mote de passe
//ProfileControle  $request->validate([ "password"=>"required|confirmed",
//type="text" name="password_confirmation"
// crypage
// 
// $fildes["password"]=Hash::make($fildes["password"]);


// VIdeo      V30
// la validation d un formulaire
//$request->validate([
    // "name"=>"required|unique:nomTable
 //  @error('name') {{$message}} @enderror
 /* all errors
 @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{$error}}
        @endforeach 
    @endif
*/


// VIdeo      V29
// Route model binding 
//Controller == return view("profile/show",compact("profile") );//29
//Routes == Route::get('/profiles/{profile}
//Routes == Route::get('/profiles/{profile:email}
// getRouteKeyName() : string{  return "id"; default


// VIdeo      V28
// Redirectnio 
// redirect("/home")
// redirect()->route(...)  == to_route(...)
// redirect()->action(...)
// back(...)->withInput()


// VIdeo      V27
// FlashBag  route()->width("keySession","msg")
// @if(session()->has('sucess')) 

// VIdeo      V26
// Insertion de Donnees STORE
// @csrf pour les formulaires ( view create )
//Model ==> Profile ==> protected $fillable=[ "name","amil",..
       



// VIdeo      V25
// Formulaire pour  Ajouter

// VIdeo      V24
// cadr Profile

// VIdeo      V23
// Show Profile details


// VIdeo      V22
// Pagination Router Condition(whire("id","\d+"))


// VIdeo      V21
// Profile Dans un Table Html
// href={{route("homePage")}} et name("homePage")
// $profilles=  profile::all();  dans View


// Controller      V20
//Documentation


// Controller      V19  seeder
// php artisan migrate:fresh --seed
// php artisan make:factory ProfileFactory --model=profile (Pour Creer Une factory pour insere dans bd )

  


// Controller      V18
// Creer des donnees de test Seending / Seender (insert)
//php artisan db:seed (Pour inser dans databaseSeeder.php)
//php artisan make:seeder ProfileSeeder
//php artisan db:seed --class=ProfileSeeder (execute un  seul fichier )


// Controller      V17
// ORM  Model et Migrations (fichier .env (datebase et mysql))
//php artisan make:model profile -m OU(--migration)
//php artisan migrate (Pour cree les tables) pas de changemet si une table est cree



// Controller      V16
// ORM Object Relation Mapping => crud
//php artisan make:model profile

// Controller      V15
// components Slots 


// Controller      V14
// components et Props 




// Controller      V13
// @extends ("layout.master") 
// @section("title")
// @yield("title")


// Controller      V12
// Layout  @extends("layout.master") html5

// Controller      V11
// blade   include  / once endOnce / onculeFirst ...

// Controller      V10
// blade (switch isset Empty)


// Controller      V9
// blade if foreach

// Controller      v8
// php artisan make:controller homeController
// <h2>{{$home}}</h2> 
//homeController::class end use namespace1 


// Passage de donnees a la vue      v7
// Request $request

 

//composer create-project laravel/laravel formation_Mo_Ja ;



// cd formation_mo_ja/
// php artisan          ===> all cmd
// php artisan  serve    ===> lance le serveur
// Instal           v3
// Routage          v6
/****************************** 
    Route web.php
        GET     => lecture
        POST    => Ajouter (Formulaire) 
        PUT     => Modification Complet
        PATCH   => Modification Partielle
        DELLETE => Supprimer

 Eexemple User => nom ="Nom1" , pren ="pre 1";
               PATCH  selement nom
               PUT    selement nom et pren
        */