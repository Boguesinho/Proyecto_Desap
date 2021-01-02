<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;


Route::post('register', [UsuarioController::class, 'register']);    //guardar registro usuario
Route::post('register/cuenta',[CuentaController::class, 'register']); //Registrar cuenta
Route::post('login', [UsuarioController::class, 'authenticate']);


Route::group(['middleware' => ['jwt.verify']], function() {

    Route::get('cuenta',[CuentaController::class, 'index']);
    Route::put('cuenta/edit',[CuentaController::class, 'edit']);


    /*
    Route::get('user',[UsuarioController::class, 'getAuthenticatedUser']);
    Route::get("ping", function(){
         return ["message" => "pong"];
    });
    */
    Route::post('logout',[UsuarioController::class, 'logout']);

});

//Route::get("home", [HomeController::class, "index"]);
