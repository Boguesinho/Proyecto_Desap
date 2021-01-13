<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Post;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComentarioController extends Controller
{
    public function addComentario (Request $request, int $idPost){
        $rules = [
            'comentario'=>'required|string'
        ];
        $this->validate($request, $rules);


        $comentario = new Comentario();
        $comentario->idUsuario = $request->user()->id;
        $comentario->idPost = $idPost;
        $comentario->comentario = $request->input('comentario');

        $comentario->save();

        return response()->json([
            'message' => 'Comentario guardado con éxito'
        ]);

    }

    public function editComentario (Request $request, int $idPost, int $idcomentario){

        $rules = [
            'comentario'=>'required|string'
        ];
        $this->validate($request, $rules);

        $comentario=Comentario::find($idcomentario);
        $comentario->idUsuario = $request->user()->id;
        $comentario->idPost = $idPost;
        $comentario->comentario = $request->input('comentario');

        $comentario->save();

        return response()->json([
            'message' => 'Comentario editado con éxito'
        ]);

    }

    public function deleteComentario (Request $request, int $idcomentario){

        $comentario=Comentario::find($idcomentario);
        $comentario->delete();

        return response()->json([
            'message' => 'Comentario eliminado con éxito'
        ]);

    }

    public function getComentarios (int $idPost){
        $comentarios = Comentario::orderBy('created_at', 'desc')->where('idPost', $idPost)->get();
        return response()->json($comentarios);
    }

}
