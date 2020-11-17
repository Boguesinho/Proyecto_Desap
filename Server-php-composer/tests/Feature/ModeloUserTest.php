<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ModeloUserTest extends TestCase
{
    /**
     * @ test
     */
    public function testRegistroUsuario()
    {
        $this->get('/usuario/registrar')
        ->assertStatus(200)
        ->assertSee ('Registrar Usuario');
    }

    public function testEditarUsuario()
    {
        $this->get('/usuario/editar')
        ->assertStatus(200)
        ->assertSee ('Editar usuario');
    }


}
