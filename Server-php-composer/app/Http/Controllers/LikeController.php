<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;


class LikeController extends Controller
{
    public function addLike (Request $request, int $idPost){
        $like = new Like();
        $like->idUsuario = $request->user()->id;
        $like->idPost = $idPost;
        $like->save();

        return response()->json([
            'message' => 'Like guardado con éxito'
        ]);

    }

    public function deleteLike (Request $request, int $idlike){

        $like=Like::find($idlike);
        $like->delete();

        return response()->json([
            'message' => 'Like eliminado con éxito'
        ]);
    }

    public function getNumLikes (int $idPost){
        $like = Like::where('idPost', $idPost)->count()->get();
        return response()->json($like);
    }


}
