<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new Usuario();
        $usuario->username = 'boguesihno';
        $usuario->password = Hash::make('ola12345');
        $usuario->save();

        $usuario = new Usuario();
        $usuario->username = 'ale123';
        $usuario->password = Hash::make('ola12345');
        $usuario->save();

        $usuario = new Usuario();
        $usuario->username = 'cesar10';
        $usuario->password = Hash::make('ola12345');
        $usuario->save();

    }
}
