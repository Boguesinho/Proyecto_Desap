<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComentarioController extends Controller
{
    public function addComentario (Request $request, BigInteger $idPost){
        $rules = [
            'comentario'=>'required|string'
        ];
        $this->validate($request, $rules);

        $comentario = new Comentario();
        $comentario->idUsuario = $request->user()->idUsuario;
        $comentario->idPost = $idPost;
        $comentario->comentario = $request->input('comentario');

        $comentario->save();

        return response()->json([
            'message' => 'Comentario guardado con éxito'
        ]);

    }

    public function editComentario (Request $request, $idPost, Comentario $comentario){

        $rules = [
            'comentario'=>'required|string'
        ];
        $this->validate($request, $rules);

        $comentario->idUsuario = $request->user()->idUsuario;
        $comentario->idPost = $idPost;
        $comentario->comentario = $request->input('comentario');

        $comentario->save();

        return response()->json([
            'message' => 'Comentario editado con éxito'
        ]);

    }

    public function deleteComentario (Request $request, $idPost, Comentario $comentario){
        $usuario = $request->user();
        $idUsuario = $usuario->idUsuario;

        DB::table('comentarios')->where('idUsuario', $idUsuario)->where('idPost', $idPost);
    }

    public function getComentarios ($idPost){
        $comentarios = Comentario::orderBy('created_at', 'desc')->where('idPost', $idPost)->get();
        return response()->json($comentarios);
    }

}
