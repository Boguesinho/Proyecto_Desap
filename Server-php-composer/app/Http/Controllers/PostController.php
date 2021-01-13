<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Post;
use App\Models\Usuario;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function getPostSeguidos (Request $request){
        $logeado = $request->user()->id;
        $post = Post::whereIn('idUsuario', DB::table('followers')->selectRaw('idSeguido as idUsuario')->where('idSeguidor', $logeado))
            ->orderBy('updated_at', 'desc')->get();
        return response()->json($post);
    }

    public function misPosts(Request $request){
        $posts = Post::where('idUsuario', $request->user()->id)->get();
        return response()->json($posts);
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
