<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecruteurController;
use App\Http\Controllers\CondidatController;
use App\Http\Controllers\CondidatureController;
use App\Http\Controllers\CvController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\CompetenceController;
use App\Http\Controllers\LangueController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\NiveauEtudeController;
use App\Http\Controllers\AvisController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/inscrire',[UserController::class,'register']);
Route::post('/connecter',[UserController::class,'login']);
Route::get('/afficher',[OffreController::class,'index']);
Route::get('/trouver/{id}',[OffreController::class,'show']);
//Route::get('/chercher/{sujet}',[OffreController::class,'search']);

Route::post('/contactus',[ContactController::class,'store']);
Route::get('/contact/{user_id}',[ContactController::class,'getCondiContact']);



Route::get('/find/{user_id}',[OffreController::class,'getRecrutOffres']);
Route::get('/finds/{offre_id}',[CondidatureController::class,'search']);

Route::get('/condidat',[UserController::class,'getcondidat']);
Route::post('/recruteur',[UserController::class,'getrecruteur']);
Route::post('/user-by-id',[UserController::class,'getUserById']);
Route::get('/admin',[UserController::class,'getadmin']);
Route::get('/user/{condidature_id}/{user_id}',[UserController::class,'getuser']);


Route::post('/condidature',[CondidatureController::class,'store']);
Route::post('/upcondidature',[CondidatureController::class,'update']);
Route::put('/modifie/{id}',[UserController::class,'update']);

Route::post('/addcv',[CvController::class,'store']);
Route::put('/upcv/{id}',[CvController::class,'update']);
Route::get('/getcv/{id}',[CvController::class,'show']);

Route::post('/addville',[VilleController::class,'store']);
Route::delete('/delville/{id}',[VilleController::class,'destroy']);
Route::put('/upville/{id}',[VilleController::class,'update']);
Route::get('/getville',[VilleController::class,'index']);
Route::post('/addexp',[ExperienceController::class,'store']);
Route::delete('/delexp/{id}',[ExperienceController::class,'destroy']);
Route::put('/upexp/{id}',[ExperienceController::class,'update']);
Route::get('/getexp',[ExperienceController::class,'index']);
Route::post('/addlang',[LangueController::class,'store']);
Route::delete('/dellang/{id}',[LangueController::class,'destroy']);
Route::put('/uplang/{id}',[LangueController::class,'update']);
Route::get('/getlang',[LangueController::class,'index']);
Route::post('/addcomp',[CompetenceController::class,'store']);
Route::delete('/delcomp/{id}',[CompetenceController::class,'destroy']);
Route::put('/upcomp/{id}',[CompetenceController::class,'update']);
Route::get('/getcomp',[CompetenceController::class,'index']);
Route::post('/addniv',[NiveauEtudeController::class,'store']);
Route::delete('/delniv/{id}',[NiveauEtudeController::class,'destroy']);
Route::put('/upniv/{id}',[NiveauEtudeController::class,'update']);
Route::get('/getniv',[NiveauEtudeController::class,'index']);

Route::post('/avis',[AvisController::class,'store']);


Route::group (['middleware' => ['auth:sanctum']], function () {
    Route::post('/ajouter',[OffreController::class,'store']);
    Route::put('/modifier/{id}',[OffreController::class,'update']);
    Route::delete('/supprimer/{id}',[OffreController::class,'destroy']);
    Route::post('/déconnecter',[UserController::class,'logout']);
    Route::get('/profile',[UserController::class,'profil']);
    Route::get('/offre/edit/form',[OffreController::class,'getEditFormData']);
});
