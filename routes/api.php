<?php

use App\Http\Controllers\Api\ImagelistController;
use App\Http\Controllers\Api\ImagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;

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
Route::post('register', [LoginController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
     
// Route::get('prueba',[ImagesController::class,'index']);
Route::middleware('auth:api')->group( function () {
    Route::resource('images', ImagesController::class);
    Route::resource('imageslist', ImagelistController::class);
    Route::get('prueba',[ImagesController::class,'index']);
});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
