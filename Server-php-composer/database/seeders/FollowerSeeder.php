<?php

namespace Database\Seeders;

use App\Models\Follower;
use Illuminate\Database\Seeder;

class FollowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $follower=new Follower();
        $follower->idSeguidor = 2;
        $follower->idSeguido = 1;
        $follower->save();

        $follower=new Follower();
        $follower->idSeguidor = 3;
        $follower->idSeguido = 1;
        $follower->save();

        $follower=new Follower();
        $follower->idSeguidor = 1;
        $follower->idSeguido = 2;
        $follower->save();

        $follower=new Follower();
        $follower->idSeguidor = 3;
        $follower->idSeguido = 2;
        $follower->save();

        $follower=new Follower();
        $follower->idSeguidor = 2;
        $follower->idSeguido = 3;
        $follower->save();
    }
}
