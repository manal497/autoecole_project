<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\CandidatController;
use App\Http\Controllers\CandidatFacturation;
use App\Http\Controllers\moniteurController;
use App\Http\Controllers\recuFacturation;
use App\Http\Controllers\AssisterController;






use App\Http\Controllers\updateCandidat;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('seances', SeanceController::class);
    Route::resource('vehicules', VehiculeController::class);



    
});

// Route::get('home', [HomeController::class,'index'])->name('home');
//Route::get('candidatlist',[CandidatController::class, 'select'])->name('candidatlist');


//ajout reservation
//Route::post('ajoutReservation', [CandidatController::class, 'createReservation'])->name('ajoutReservation');
//ajouter les candidat
//Route::post('ajoutCandidat', [CandidatController::class, 'create'])->name('ajoutCandidat');



//modifier les informations des candidats
//Route::put('updateInfoCandidat', [updateCandidat::class, 'updateInfo'])->name('updateInfoCandidat');

//------------------------------update Candidat---------------------------------------------------
//la vue
//Route::get('formulaireUpdate/{cin_candidat}', [updateCandidat::class,'formupdate']);
//details
//Route::get('datailsCandidat/{cin_candidat}', [updateCandidat::class, 'detailsCandidat']);
//
//Route::put('updateResCandidat', [updateCandidat::class, 'updateReservation'])->name('updateResCandidat');
//
//Route::put('updateDocCandidat', [updateCandidat::class, 'updateDocCandidat'])->name('updateDocCandidat');

//--------------la page home----------------------------------//
Route::get('home', [HomeController::class,'index'])->name('home');
//*
//---------------------------la liste des candidats------------------------//
Route::get('candidatlist',[CandidatController::class, 'select'])->name('candidatlist');
//** 
//-----------------------------------ajout reservation------------------------------------//
Route::post('ajoutReservation', [CandidatController::class, 'createReservation'])->name('ajoutReservation');
//** 
//----------------------------------ajouter les candidats ---------------------------//
Route::post('ajoutCandidat', [CandidatController::class, 'create'])->name('ajoutCandidat');
//** 


Route::post('ajoutDocumments', [candidatController::class, 'createDocumment'])->name('ajoutDocumments');
//-----------------modifier les informations des candidats-------------------------------------------//
Route::put('updateInfoCandidat', [updateCandidat::class, 'updateInfo'])->name('updateInfoCandidat');
//** 
//------------------------------la vue d'update Candidat---------------------------------------------------
Route::get('formulaireUpdate/{cin_candidat}', [updateCandidat::class,'formupdate']);
//** */
//--------------------------------details candidats------------------------------------------//
Route::get('datailsCandidat/{cin_candidat}', [updateCandidat::class, 'detailsCandidat']);
//** 
//------------------------------------update reservation------------------------------------//
Route::put('updateResCandidat', [updateCandidat::class, 'updateReservation'])->name('updateResCandidat');
//** 
//------------------------------------update documents------------------------------------------------//
Route::put('updateDocCandidat', [updateCandidat::class, 'updateDoc'])->name('updateDocCandidat');
//** 
//------------------------------------liste des reservations-------------------------------------//
Route::get('listRes',[CandidatFacturation::class,'listReservation'])->name('listRes');
//** 
//-------------------------------------list des facturations--------------------------------------//
Route::get('facturation/{id_reservation}', [CandidatFacturation::class, 'listFacturation'])->name('facturation');
//** 
//--------------------------------------------ajouter facturations---------------------------------//
Route::post('ajoutFacturation',[CandidatFacturation::class, 'addFact'])->name('ajoutFacturation');
//** 
//--------------------------------------------modifier une facturations----------------------------------//
Route::put('updateFacturations', [CandidatFacturation::class,'updateFact'])->name('updateFacturations');
//** 
//-------------------------------------telecharger une facturations
Route::get('/facturation/RecuDownload/{id_fact}',[recuFacturation::class,'download']);


//********************************//
//**
 //--------------------------Les moniteurs------------------------------------------------/---------------//
 //** */
 //-------------------------------liste moniteurs-------------------------------------//
 Route::get('listeMoniteurs',[moniteurController::class,'liste'])->name('listeMoniteurs');
 Route::get('CreateMoniteur',[moniteurController::class,'create'])->name('createMoniteur');

//** */
//------------------------------------ajouter moniteur------------------------------------------//
 Route::post('ajoutMoniteur',[moniteurController::class, 'addMoniteur'])->name('ajoutMoniteur');
 //** */
 //------------------------------form modification moniteur---------------------------------------//
 Route::get('formulaireUpdateMoniteur/{id}', [moniteurController::class,'formupdate']);
 //** */
 //-----------------------------------modification moniteurs-----------------------------------//
 Route::put('updateMoniteur', [moniteurController::class,'updateMoniteur'])->name('updateMoniteur');
 
 //----------------------------------details moniteur---------------------------------------------//
 //** */
 
 Route::get('datailsMoniteur/{id_moniteur}',[moniteurController::class,'details']);

Route::resource('affectations', AffectationController::class);
Route::resource('assisters', AssisterController::class);



Route::view('/ecole', 'ecole')->name('ecole');




