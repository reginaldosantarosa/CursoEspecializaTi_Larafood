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
<<<<<<< HEAD:tests/Feature/AvaliacaoTest.php
        $response->dump();
        $response->assertStatus(401);
    }

/*
=======
      //  $response->dump();
        $response->assertStatus(401);
    }

*/
>>>>>>> feature-api:tests/temp/AvaliacaoTest.php

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
<<<<<<< HEAD:tests/Feature/AvaliacaoTest.php
      //  $response->dump();
        $response->assertStatus(201);
    }
*/
=======
        $response->dump();
        $response->assertStatus(201);
    }


>>>>>>> feature-api:tests/temp/AvaliacaoTest.php
}
