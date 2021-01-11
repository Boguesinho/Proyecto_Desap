<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Post;
use App\Models\Usuario;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPosts(BigInteger $idSeguido){

    }

    public function misPosts(Request $request){

    }

    public function createPost(Request $request, BigInteger $idMultimedia){
        $rules = [
            'descripcion'=>'required|string'
        ];
        $this->validate($request, $rules);

        $post = new Post();
        $post->idUsuario = $request->user()->id;
        $post->descripcion = $request->input('descripcion');
        $post->idMultimedia = $idMultimedia;
        $post->save();

        return response()->json([
            'message' => 'Post creado con éxito'
        ]);
    }

    public function editPost(Request $request, BigInteger $idMultimedia, Post $post){
        $rules = [
            'descripcion'=>'required|string'
        ];
        $this->validate($request, $rules);

        $post->idUsuario = $request->user()->id;
        $post->descripcion = $request->input('descripcion');
        $post->idMultimedia = $idMultimedia;
        $post->save();

        return response()->json([
            'message' => 'Post editado con éxito'
        ]);
    }

    public function deletePost(Post $post){
        $post->delete();
        return response()->json([
            'message' => 'Post eliminado con éxito'
        ]);

    }
}
