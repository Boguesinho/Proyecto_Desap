<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;

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
Route::post('register', [UsuarioController::class, 'register']);
Route::post('login', [UsuarioController::class, 'authenticate']);

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

/*
Route::group(['prefix' => 'auth'], function()
{
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});
*/


Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('user',[UsuarioController::class, 'getAuthenticatedUser']);

    Route::get("ping", function(){
         return ["message" => "pong"];
    });

});
Route::get("home", [HomeController::class, "index"]);
// Route::get("ping", function(){
//     return ["message" => "pong"];
// });