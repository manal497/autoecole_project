<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\CandidatController;



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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

Route::get('home', [HomeController::class,'index'])->name('home');
Route::get('candidatlist',[CandidatController::class, 'select'])->name('candidatlist');


//ajout reservation
Route::post('ajoutReservation', [CandidatController::class, 'createReservation'])->name('ajoutReservation');
//ajouter les candidat
Route::post('ajoutCandidat', [CandidatController::class, 'create'])->name('ajoutCandidat');



//modifier les informations des candidats
Route::put('updateInfoCandidat', [updateCandidat::class, 'updateInfo'])->name('updateInfoCandidat');

//------------------------------update Candidat---------------------------------------------------
//la vue
Route::get('formulaireUpdate/{cin_candidat}', [updateCandidat::class,'formupdate']);
//details
Route::get('datailsCandidat/{cin_candidat}', [updateCandidat::class, 'detailsCandidat']);
//
Route::put('updateResCandidat', [updateCandidat::class, 'updateReservation'])->name('updateResCandidat');
//
Route::put('updateDocCandidat', [updateCandidat::class, 'updateDocCandidat'])->name('updateDocCandidat');
Route::resource('seances', SeanceController::class);
