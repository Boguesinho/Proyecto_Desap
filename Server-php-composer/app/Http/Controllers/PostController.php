<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Multimedia;
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

    public function createPost(Request $request){
        $rules = [
            'descripcion'=>'required|string',
            'ruta'=>'required|image'
        ];
        $this->validate($request, $rules);

        $post = new Post();
        $post->idUsuario = $request->user()->id;
        $post->descripcion = $request->input('descripcion');

        if ($request->hasFile("ruta")) {
            $multimedia = new Multimedia();
            $multimedia->ruta = $request->file('ruta')->store();
            $multimedia->save();
        }

        $post->idMultimedia = $multimedia->id;
        $post->save();

        return response()->json([
            'message' => 'Post creado con éxito'
        ]);
    }

    public function editPost(Request $request, int $idpost){
        $rules = [
            'descripcion'=>'required|string',
            'ruta'=>'required|image'
        ];
        $this->validate($request, $rules);

        $post=Post::find($idpost);
        $post->idUsuario = $request->user()->id;
        $post->descripcion = $request->input('descripcion');
        if ($request->hasFile("ruta")) {
            $multimedia = Multimedia::find($post->idMultimedia);
            $multimedia->ruta = $request->file('ruta')->store();
            $multimedia->save();
        }
        $post->idMultimedia = $multimedia->id;
        $post->save();

        return response()->json([
            'message' => 'Post editado con éxito'
        ]);
    }

    public function deletePost(int $idpost){
        $post=Post::find($idpost);
        $post->delete();
        return response()->json([
            'message' => 'Post eliminado con éxito'
        ]);

    }
}
