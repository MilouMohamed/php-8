<?php
echo "laravel";
// VIdeo      V67
// php artisan cache:table (Pour Cree une table dans db pour les caches)
// cache et cache_locks
// php artisan migrate
// config  
// 'default' => env('CACHE_DRIVER', 'database'),// databese place pour stoce les donnees
// .env  CACHE_DRIVER=database 
/* Pour importe les donnes du cache
 $profile= Cache::remember($prefex,10,function() use ($id){
         return profile::findOrFail($id);
      });
      // Cache::forget($prefex) Supprimer Cache
*/





// VIdeo      V66
// php artisan make:resource ProfileResource
// Pour Personaliser les Resource De Json
// Ou Lieu de returne Profile  en vas reteurne une colection Pesronaliser 
// dans ControlProfile dans func show 
        // return new ProfileResource($profile);// v 66
        // $values["created_at_2"]=date_format(date_create($this->created_at),"Y-m-d");Normalisation des donnees
        // return $values;
// Pour PAge Not FOund 
/*
//API/*  => JSON namespace App\Exceptions;
        $this->renderable(function (NotFoundHttpException $nfex,Request $request) {
            if ($request->is("api/*")) {
                return response()->json([
                    "Message"=>"Probleme not found"
                ],404);
            }
        });
*/





// VIdeo      V65
// Afficher Ajouter Modifier Supprimer WebServices 
// aficharge  
    //M1 $profiles=profile::all();
    //M1   return  response()->json($profiles);
    // return Publication::all();//Not supprimer
    // return Publication::withTrashed()->get(); // Toutes
//  meme pour delete et update    $data=[
    // "name"=>"Mwdox",
    // "email"=>"Mwdox@gmail.com",
    // "langProg"=>["n1"=>1,"n2"=>2,"n3"=>3]
// ];
// return response()->json(
    // $data
// );




// VIdeo      V64
// Liste Profile (web services)
// php artisan make:co ntroller Api/ProfileController --model=profile --api     
// Dans Route(web) api.php aouter 
// Route::apiResource("profiles",ProfileController::class);//ProfileContr de api
// public function index()
// { $profiles=profile::all();
//   return  response()->json($profiles); Format Json
//Ou 
    // return Publication::all();//Not supprimer
    // return Publication::withTrashed()->get(); // Toutes


// VIdeo      V63
// Web Services REST
// Thiorique  


// VIdeo      V62
// les Autorisations et Permission  
//----> Polices     Comme(Controllers)
//(creation d un Policy sur Publication) php artisan make:policy publicationPolicy --model=publication
/////// Ajouter Le code dans Provider / AuthServiceProvider
// protected $policies = [ 
    // Publication::class => publicationPolicy::class,
    // update(GenericUser $user, publication $publication): bool
    // {   return $user->id === $publication->Profile_id;

    //Pour probleme undefind genericUser  
//   dans config/auth.php   'users' => [ 
        //  'driver' => 'eloquent',
        //  'table' => 'profiles',
        //  "model"=>profile::class

//Probleme (profile::getAuthIdentifierName()) class profile extends User
// dans controller if ($requestt->user()->cannot("update", $publication)) {
//     abort(403);
// }
       
// dans View cardPub   @can("update", $publication) place de @auto et if(update)


// VIdeo      V61
// les Autorisations et Permission
//----> Gates       Comme(Routes)
//----> Polices     Comme(Controllers)
// app/http/Provider/AuthService
/* public function boot(): void
    { $this->registerPolicies(); 
        //Gates  V61
        Gate::define("update-publication",function(GenericUser $profile,Publication $pub){
            return $profile->id === $pub->Profile_id;
        });
    }
*/
// if (!Gate::allows("update-publication",$publication)) { v61

//best => Gate::authorize("update-publication",$publication);//v61





// VIdeo      V60
// les Autorisations et Permission
/* Methode 1
 if (Auth::id() !== $publication->Profile_Pub->id) {
            return abort("404");
        } 
*/



// VIdeo      V59
// Afficher Image du profiele dans la list des publication
// public function Profile_Pub() {   
    // return $this->belongsTo(profile::class,"Profile_id");
// } 



// VIdeo      V58
// Afichage des publicatios dans Profile laravel
// return $this->hasMany(Publication::class); comme jointure (Publication et Profile)
// <x-PubCard :canUpdate="auth()->user()->id === $pub->Profile_id" :pub="$pub" />



// VIdeo      V57
// Affecter Pub a un utilisateur
//dans View @auth
// @if ($pub->Profile_id === Auth::user()->id)
/*** Controller ****************** */
// $formValidate["Profile_id"] =Auth::user()->id;



// VIdeo      V56
// Relationship
// 1 - n  | n - n  | n - 1  ...
//php artisan make:migration add_Profile_id_to_publications_table //Pour Ajouter Un  nevau champ 
// $table->unsignedBigInteger("Profile_id");
// $table->foreign("Profile_id")->references("id")->on("profiles")->onDelete("Cascad")->onUpdate("Cascad");



// VIdeo      V55
// Page index(Afficher Les Publs) Publications



// VIdeo      V54
// Modifier Publication




// VIdeo      V53
// Ajouter Publicatin 
// Route::resource("publication",PublicationController::class);
// Pour Linke automaticment et mis les Routes 
// php artisan make:request PublicationRequest
        // Pour Ajouter roules(validation des Donnees titre ...)








// VIdeo      V52
// headers Responces Request
// $responce=new Response(["data"=>"ookk"]);
// $res =$responce->withHeaders([
    // "Content-Type"=>"Application/Json"
    //, "Content-Type"=>"text/html",
// ]);
    //  return $res;

    // dd($request->header()); info sur header 
    // "accept" => array:1 [▼
    // 0 => "text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/png,image/svg+xml,*/*;q=0.8"
//   ]
// dd($request->url(),$request->fullUrl());
    //http://127.0.0.1:8000/request?id=55 fullUrl



// VIdeo      V51
// Cookies Laravel
// $cokObg= cookie("Age",$cok,1);// dure limite
// $cokObg= cookie()->forever("Age",$cok);// 400 jrs
// return $resp->withCookie($cokObg);
// Route::get("/cookies/get",function(Request $request){
    // dd( $request->cookie("Age"));// Respect Case


// VIdeo      V50
// Response Afficher And Download file
// return response()->download("storage/profile/imgs/profile.jpg"); // pour ignore 

 
// VIdeo      V49
//Request,input,string
// use Illuminate\Http\Request ; dans route web 
// pour use   function(Request $request )dump($request->name);
// Pour les perfermance use  $request->input("name_inpt");// ben perfermance
// dump($request->input("name_inpt","si name_inpt n est pas dans from"));
// dump($request->date("date_inpt" ));
//

// VIdeo      V48
//injection de dépendances  class dans  parametres d une fun 
// Route::get("/srv/{a}/{b}",function($a,$b,Calcul $calcul){
    //injection de dépendances
        // $som=$calcul->somme($a,$b);
// class Calcul



// VIdeo      V47
// Routege \ Argument Option  \ Away \ Cache 
// Route::get("/age/{age?}" // ? pour Facultatif
// dd(Route::current());
// dd(Route::currentRouteName()); // name 
// dd(Route::currentRouteAction()); // Action stor|create|destroy ....

// Route::get(...(){ return redirect()->away("https://www.google.ma");// vers page externe

//php artisan route:cache
//php artisan route:clear


// VIdeo      V46
// protected function redirectTo(Request $request): ?string
// {  return $request->expectsJson() ? null : route('login.show');
// dans Route  ->middleware("auth");Ou dans Controller constructor




// VIdeo      V45
// Route Group Resources (dans 1 ligne)
// php artisan route:list --name=profile  (Pour Afficher Les Routes De Profile)
// Route::resource("profiles",ProfileController::class); 

//php artisan make:model Publication -mcr  (Model / Controller / Resources)



// VIdeo      V44
// Route Group
// Route::prefix("profiles")->name("profiles.")->group(function(){ ici les Route::get..
        // Name(ici) et get(ici)
// Route::controller(ProfileController::class)->group(function () {
/* 
Route::prefix("profiles")->name("profiles.")->group(function () {
    Route::controller(ProfileController::class)->group(function () { 
    
        Route::get('/', "index")->name("index"); 
        // enplace de 
       Route::get('/profiles',[ProfileController::class,"index"])->name("profiles.index");

*/


// VIdeo      V43
// changemant de Routes Name
/*Model / Profile
public function getImageAttribute($value){
return "my iimmgg Wooo $value";// si  image nexiste pas
}
*/




// VIdeo      V42
// securete csrf





// VIdeo      V41
// VIdeo      V40 
// Afficher Et Modifier Image
// cmd php artisan storage:link  (storage dans public)
//src="{{asset("./storage/$prfl->image")}}"



// VIdeo      V39
//Soft delete 
//cmd  php artisan make:migration add_delete_at_to_profiles_table --table=profiles
//Migration \ func up $table->softDeletes(); 
//Migration \ func down  $table->dropSoftDeletes(); 
// cmd   php artisan migrate

// Models \ profile \ use SoftDeletes;  use Illuminate\Database\Eloquent\SoftDeletes; 


// VIdeo      V38
// Ajouter Image Dans BD
//rules(): array { return [ "image"=>"image|mimes:png,jpg,svg,jpeg|max:2048(en kb en peux ajouter les Dimentions)"
// dans Contr stor  $request->file("image")->store("profile/imgs","public");
//  $filename= $request->file("image")->store("profile/imgs","public");//v 38 (public pour les serveur exemple s3 voir v 38)
// $fildes["image"]=$filename;
// $filename= $request->file("image")->storeAs("profile/imgs","nameFile","public");//v 38

// VIdeo      V37
// Ajouter Un Champ Dans BD image
// php artisan make:migration add_image_to_profiles_table --table=profiles
// func up(){   $table->string("image",150)->after("bio");}
// func down(){   $table->dropColumn("image");}
// php artisan migrate        pour execute vers bd
// from 



// VIdeo      V36
//Modifier
//form   @csrf  @method("put")
// Route::put
// controller update(ProfileRequest $request,profile $profile ) 
   // $profile->update();
 //  $fildes = $request->validated();// Les Champ Valide
//$profile->fill($fildes)->save();




// VIdeo      V35 
// Supprission
//Route::delete(....
// <form ...> @method("DELETE") 
// func destroy(profile $profile) $profile->delete();


// VIdeo      V34
// Logout Decennection  
// @auth  si connecte @endauth  // @guest si non connecte @endguest
// session()->flush();
// Auth::logout();
// {{Auth()->user()->email}}


// VIdeo      V33
// Autontification 
/*
if (Auth::attempt($valus)) {
    $request->session()->regenerate();
    return redirect()->route("homePage")->with("god","Voue etes Connecte Par Email ". $emial); 
} else {
    return back()->withErrors([
        "login_error" => "Email Ou mot de pass Incorect ."
    ])->onlyInput("login");
}*/
// ----------------------
// dans controller login
// dd(Auth::attempt($valus));
// use Illuminate\Support\Facades\Auth;
// changemet de table user vers table Profiles dans fichier config {Auto}




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


// composer dump-autoload (laravel 10)



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