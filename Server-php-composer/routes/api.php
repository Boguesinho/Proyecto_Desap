<?php

use App\Http\Controllers\CuentaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;


Route::post('register', [UsuarioController::class, 'register']);    // registro usuario
Route::post('register/cuenta',[CuentaController::class, 'register']);   //Registrar cuenta
Route::post('login', [UsuarioController::class, 'authenticate']); //login

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get("home", [HomeController::class, "index"]);
    Route::get('cuenta',[CuentaController::class, 'index']);
    Route::put('cuenta/edit',[CuentaController::class, 'edit']);

    Route::post('logout',[UsuarioController::class, 'logout']);
});





    /*
    Route::get('user',[UsuarioController::class, 'getAuthenticatedUser']);
    Route::get("ping", function(){
         return ["message" => "pong"];
    });
    */

