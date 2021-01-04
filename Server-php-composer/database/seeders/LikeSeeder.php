<?php

namespace Database\Seeders;

use App\Models\Like;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $like = new Like();
        $like->idUsuario = 2;
        $like->idPost = 1;
        $like->save();

        $like = new Like();
        $like->idUsuario = 3;
        $like->idPost = 1;
        $like->save();

        $like = new Like();
        $like->idUsuario = 1;
        $like->idPost = 2;
        $like->save();
    }
}
