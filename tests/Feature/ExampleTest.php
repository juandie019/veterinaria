<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProductoEncontradoYCantidadSuficiente()
    {
        $response = $this->postJson('/api/producto/1414',['cantidad' => 1]);

        $response -> assertJson([
                    "id_producto" => 1414,
                    "nombre" => "CROQUETAS",
                    "descripcion" => "De maiz",
                    "cantidad_disponible" => 109,
                    "precio" => 150]);
    }

    public function testProductoExistePeroLaCantidadSolicitadaEsNegativa()
    {
        $response = $this->postJson('/api/producto/1414',['cantidad' => -1]);

        $response -> assertJson(['noSuficiente' => true]);
    }

    public function testProductoExistePeroLaCantidadSolicitadaExcedeElExistente()
    {
        $response = $this->postJson('/api/producto/1414',['cantidad' => 1000]);

        $response -> assertJson(['noSuficiente' => true]);
    }


    public function testProductoNoExiste()
    {
        $response = $this->postJson('/api/producto/1617',['cantidad' => 10]);

        $response -> assertJson(['noFound' => true]);
    }
}
