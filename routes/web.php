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




Route::get('/ajoutFrais',function(){

    return view('Vues/ajoutFrais');
});





Route::get('/ajoutFrais', [\App\Http\Controllers\FraisController::class, 'addFrais']);
Route::post('/postajoutFrais', [\App\Http\Controllers\FraisController::class, 'validateFrais']);
Route::get('/modifierFrais/{id}', [FraisController::class, 'updateFrais']);
Route::post('/postmodifierFrais',

    array(
        'uses' => 'App\Http\Controllers\FraisController@ValideFraisHorsForfait',
        'as' => 'postmodifierFrais'
    )
);




