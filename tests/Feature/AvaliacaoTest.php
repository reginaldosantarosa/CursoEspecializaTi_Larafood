<?php

namespace Tests\Feature;

use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class AvaliacaoTest extends TestCase
{
/*
        public function testErrorCreateNewEvaluation()
    {
        $pedido = 'fake_value';
        $response = $this->postJson("/auth/v1/pedidos/{$pedido}/avaliacoes");
      //  $response->dump();
        $response->assertStatus(401);
    }

*/

        public function testCreateNewEvaluation()
    {
        $cliente = factory(Cliente::class)->create();
        $token = $cliente->createToken(Str::random(10))->plainTextToken;
        $pedido = $cliente->pedidos()->save(factory(Pedido::class)->make());

        $payload = [
            'estrelas' => 5,
            'comentario' => Str::random(10),
        ];

        $headers = [
            'Authorization' => "Bearer {$token}",
        ];

        $response = $this->postJson(
            "/auth/v1/pedidos/{$pedido}/avaliacoes",
            $payload,
            $headers
        );
        $response->dump();
        $response->assertStatus(201);
    }


}
