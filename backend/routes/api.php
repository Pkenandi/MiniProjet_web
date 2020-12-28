<?php
namespace app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\Models\etudiant;
use app\Http\Controllers\EtudiantController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::apiResource('etudiant','EtudiantController');

Route::get('register','EtudiantController@enregistrement'); // elle te renvoie la reponse si tout s'est bien passée
Route::post('register','EtudiantController@store'); // elle enregistre tout dans la base des données
Route::post('login','EtudiantController@LogIn'); 