<?php

namespace Database\Seeders;

use App\Models\Multimedia;
use Illuminate\Database\Seeder;

class MultimediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $multimedia = new Multimedia();
        $multimedia->ruta = 'public/storage/profile/test1.jpg';
        $multimedia->save();

    }
}
