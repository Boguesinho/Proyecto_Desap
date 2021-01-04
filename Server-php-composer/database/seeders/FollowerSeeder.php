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
        $follower->idFollower = 2;
        $follower->idUsuario = 1;
        $follower->save();

        $follower=new Follower();
        $follower->idFollower = 3;
        $follower->idUsuario = 1;
        $follower->save();
    }
}
