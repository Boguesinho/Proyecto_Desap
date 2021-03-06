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
    //Route::post('register/cuenta',[CuentaController::class, 'create']);   //Registrar cuenta
    Route::post('logout',[UsuarioController::class, 'logout']); //Cerrar sesión

    //HomeController
    Route::get('{username}/buscarUsuario', [HomeController::class, 'buscarUsuario']);

    //Cuenta
    Route::get('/getCuenta',[CuentaController::class, 'getCuenta']);
    Route::put('editInfo',[CuentaController::class, 'editInfo']);

    //Comentarios
    Route::post('{idPost}/addComentario', [ComentarioController::class, 'addComentario']);
    Route::put('{idPost}/{idComentario}/editComentario', [ComentarioController::class, 'editComentario']);
    Route::delete('{idComentario}/deleteComentario', [ComentarioController::class, 'deleteComentario']);
    Route::get('{idPost}/getComentarios', [ComentarioController::class, 'getComentarios']);

    //Seguidores
    Route::get('getSeguidores', [FollowerController::class, 'getSeguidores']);
    Route::get('getSeguidos', [FollowerController::class, 'getSeguidos']);
    Route::post('{idSeguido}/seguirUsuario', [FollowerController::class, 'seguirUsuario']);
    Route::delete('{idSeguido}/unfollowUsuario', [FollowerController::class, 'unfollowUsuario']);

    //Like
    Route::post('{idPost}/addLike', [LikeController::class, 'addLike']);
    Route::delete('{idLike}/deleteLike', [LikeController::class, 'deleteLike']);
    Route::get('{idPost}/getNumLikes', [LikeController::class, 'getNumLikes']);

    //Post
    Route::post('/createPost', [PostController::class, 'createPost']);
    Route::put('{idPost}/editPost', [PostController::class, 'editPost']);
    Route::delete('{idPost}/deletePost', [PostController::class, 'deletePost']);
    Route::get('misPosts',[PostController::class,'misPosts']);
    Route::get('getPostSeguidos', [PostController::class, 'getPostSeguidos']);
    Route::get('getPostsCount', [PostController::class, 'getPostsCount']);

    //Multimedia
    Route::post('subirFotoPerfil', [MultimediaController::class, 'subirFotoPerfil']);
    Route::get('getFotoPerfil', [MultimediaController::class, 'getFotoPerfil']);
    Route::get('{idPost}/getImagenPost', [MultimediaController::class, 'getImagenPost']);

});
