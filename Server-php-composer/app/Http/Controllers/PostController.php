<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request, $idMultimedia){
        $rules = [
            'descripcion'=>'required|string'
        ];
        $this->validate($request, $rules);

        $post = new Post();
        $post->idUsuario = $request->user()->idUsuario;
        $post->descripcion = $request->input('descripcion');
        $post->idMultimedia = $idMultimedia;
        $post->save();


    }
}
