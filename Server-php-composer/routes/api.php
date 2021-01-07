<?php

use App\Http\Controllers\CuentaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ComentarioController;


Route::post('register', [UsuarioController::class, 'register']);    // registro usuario
Route::post('login', [UsuarioController::class, 'authenticate']); //login

Route::group(['middleware' => ['jwt.verify']], function() {

    Route::post('register/cuenta',[CuentaController::class, 'create']);   //Registrar cuenta

    Route::get('home', [HomeController::class, "index"]);
    Route::get('cuenta/{idCuenta}',[CuentaController::class, 'index']);
    Route::put('cuenta/edit',[CuentaController::class, 'edit']);

    //Comentarios
    Route::post('{idPost}/addComentario', [ComentarioController::class, 'addComentario']);
    Route::put('{idPost}/{comentario}/editComentario', [ComentarioController::class, 'editComentario']);
    Route::delete('{idPost}/{comentario}/deleteComentario', [ComentarioController::class, 'deleteComentario']);
    Route::get('{idPost}/getComentarios', [ComentarioController::class, 'getComentarios']);



    Route::post('logout',[UsuarioController::class, 'logout']);
});





    /*
    Route::get('user',[UsuarioController::class, 'getAuthenticatedUser']);
    Route::get("ping", function(){
         return ["message" => "pong"];
    });
    */

