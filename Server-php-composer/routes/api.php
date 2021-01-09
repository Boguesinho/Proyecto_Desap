<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\ComentarioController;
use \App\Http\Controllers\FollowerController;
use \App\Http\Controllers\LikeController;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\MultimediaController;


Route::post('register', [UsuarioController::class, 'register']);    // registro usuario
Route::post('login', [UsuarioController::class, 'authenticate']); //login

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::post('register/cuenta',[CuentaController::class, 'create']);   //Registrar cuenta

    Route::get('home', [HomeController::class, "index"]);
    Route::get('{idCuenta}/getCuenta',[CuentaController::class, 'getCuenta']);
    Route::put('cuenta/edit',[CuentaController::class, 'edit']);

    //Comentarios
    Route::post('{idPost}/addComentario', [ComentarioController::class, 'addComentario']);
    Route::put('{idPost}/{comentario}/editComentario', [ComentarioController::class, 'editComentario']);
    Route::delete('{comentario}/deleteComentario', [ComentarioController::class, 'deleteComentario']);
    Route::get('{idPost}/getComentarios', [ComentarioController::class, 'getComentarios']);

    //Seguidores
    Route::get('getSeguidores', [FollowerController::class, 'getSeguidores']);
    Route::get('getSeguidos', [FollowerController::class, 'getSeguidos']);

    //Like
    Route::post('{idPost}/addLike', [LikeController::class, 'addLike']);
    Route::delete('{idLike}/deleteLike', [LikeController::class, 'deleteLike']);
    Route::get('{idPost}/getNumLikes', [LikeController::class, 'getNumLikes']);

    //Post


    //Multimedia


    Route::post('logout',[UsuarioController::class, 'logout']);
});





    /*
    Route::get('user',[UsuarioController::class, 'getAuthenticatedUser']);
    Route::get("ping", function(){
         return ["message" => "pong"];
    });
    */

