<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function addComentario (Request $request, BigInteger $idPost){
        $rules = [
            'comentario'=>'required|string'
        ];
        $this->validate($request, $rules);

        $comentario = new Comentario();
        $comentario->idUsuario = $request->user()->idUsuario;
        $comentario->idPost = $request->post()->idPost;
        $comentario->comentario = $request->input('comentario');

        $comentario->save();

        return response()->json([
            'message' => 'Try again!'
        ]);

    }

    public function deleteComentario (Request $request, Comentario $comentario){
        $usuario = $request->user();
        $idU = $usuario->idUsuario;



    }

}
