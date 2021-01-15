<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new Post();
        $post->idUsuario = 1;
        $post->descripcion = 'prueba siiuuu';
        $post->idMultimedia = 1;
        $post->save();

        $post = new Post();
        $post->idUsuario = 2;
        $post->descripcion = 'prueba2 siiuuu';
        $post->idMultimedia = 2;
        $post->save();

        $post = new Post();
        $post->idUsuario = 3;
        $post->descripcion = 'prueba3 siiuuu';
        $post->idMultimedia = 3;
        $post->save();

        $post = new Post();
        $post->idUsuario = 3;
        $post->descripcion = 'prueba4 siiuuu';
        $post->idMultimedia = 2;
        $post->save();

    }
}
