<?php

namespace Database\Seeders;

use App\Models\Comentario;
use Illuminate\Database\Seeder;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comentario = new Comentario();
        $comentario->idUsuario = 2;
        $comentario->idPost = 1;
        $comentario->comentario = 'prueba comentario del usuario 2 al post 1';
        $comentario->save();

        $comentario = new Comentario();
        $comentario->idUsuario = 3;
        $comentario->idPost = 1;
        $comentario->comentario = 'prueba comentario del usuario 3 al post 1';
        $comentario->save();

        $comentario = new Comentario();
        $comentario->idUsuario = 1;
        $comentario->idPost = 1;
        $comentario->comentario = 'prueba comentario del usuario 1 al post 1';
        $comentario->save();
    }
}
