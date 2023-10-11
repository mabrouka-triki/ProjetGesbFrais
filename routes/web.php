<?php
use App\Http\Controllers\VisiteurController;
use App\Http\Controllers\FraisController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});



Route::get('/listeFrais', [App\Http\Controllers\FraisController::class, 'getFraisVisiteur']);

Route::get('/formLogin ',[\App\Http\Controllers\VisiteurController::class,'getLogin']);


Route::post('/login ',[\App\Http\Controllers\VisiteurController::class,'signIn']);

Route::get('/getLogout ',[\App\Http\Controllers\VisiteurController::class,'singOut']);

// Route pour afficher le formulaire de modification/ajout de frais
Route::get('/modifierFrais/{id}', [FraisController::class, 'updateFrais']);

// Route pour traiter la soumission du formulaire de modification/ajout de frais
Route::post('/updateFrais/{id}', [FraisController::class, 'updateFrais'])
    ->name('updateFrais');



Route::get('/ajoutFrais',function(){
    return view("vues/ajoutFrais");
});



Route::post('/postFrais',[FraisController::class,'addFrais']);
