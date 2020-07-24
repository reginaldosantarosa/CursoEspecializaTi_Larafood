<?php

namespace Tests\Feature;

use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Mesa;
use App\Models\Pedido;
use App\Models\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class PedidoTest extends TestCase
{

    public function testValidationCreateNewPedido()
    {
        $payload = [];
        $response = $this->postJson('/api/v1/pedidos', $payload);

        $response->assertStatus(422)
            ->assertJsonPath('errors.token_company', [
                trans('validation.required', ['attribute' => 'token company'])
            ])
            ->assertJsonPath('errors.produtos', [
                trans('validation.required', ['attribute' => 'produtos'])
            ]);
    }


    public function testCreateNewPedido()
    {
        $empresa = factory(Empresa::class)->create();

        $payload = [
            'token_company' => $empresa->uuid,
            'produtos' => [],
        ];

        $produtos = factory(Produto::class, 10)->create();
        foreach ($produtos as $produto) {
            array_push($payload['produtos'], [
                'identificacao' => $produto->uuid,
                'quantidade' => 2,
            ]);
        }

        $response = $this->postJson('/api/v1/pedidos', $payload);
        $response->assertStatus(201);
    }


    public function testTotalPedido()
    {
        $empresa = factory(Empresa::class)->create();
        $payload = [
            'token_company' => $empresa->uuid,
            'produtos' => [],
        ];

        $produtos = factory(Produto::class, 2)->create();
        foreach ($produtos as $produto) {
            array_push($payload['produtos'], [
                'identificacao' => $produto->uuid,
                'quantidade' => 1,
            ]);
        }


        $response = $this->postJson('/api/v1/pedidos', $payload);

        $response->assertStatus(201)
                  ->assertJsonPath('total', 20);
    }



    public function testPedidoNotFound()
    {
        $pedido = 'fake_value';
        $response = $this->getJson("/api/v1/pedidos/{$pedido}");
        $response->assertStatus(404);
    }


    public function testGetPedido()
    {
        $pedido = factory(Pedido::class)->create();
        $response = $this->getJson("/api/v1/pedidos/{$pedido->identificacao}");
        $response->assertStatus(200);
    }


    public function testCreateNewPedidoAuthenticated()
    {
        $cliente = factory(Cliente::class)->create();
        $token = $cliente->createToken(Str::random(10))->plainTextToken;
        $empresa = factory(Empresa::class)->create();
        $payload = [
            'token_company' => $empresa->uuid,
            'produtos' => [],
        ];


        $produtos = factory(Produto::class, 2)->create();

        foreach ($produtos as $produto) {
            array_push($payload['produtos'], [
                'identificacao' => $produto->uuid,
                'quantidade' => 1,
            ]);
        }

        $response = $this->postJson('/api/auth/v1/pedidos', $payload, [
            'Authorization' => "Bearer {$token}"
        ]);

        $response->assertStatus(201);
    }

    public function testCreateNewPedidoWithTable()
    {
        $mesa = factory(Mesa::class)->create();
        $empresa = factory(Empresa::class)->create();

        $payload = [
            'token_company' => $empresa->uuid,
            'mesa' => $mesa->uuid,
            'produtos' => [],
        ];

        $produtos = factory(Produto::class, 2)->create();
        foreach ($produtos as $produto) {
            array_push($payload['produtos'], [
                'identificacao' => $produto->uuid,
                'quantidade' => 1,
            ]);
        }

        $response = $this->postJson('/api/v1/pedidos', $payload);
        $response->assertStatus(201);
    }



    public function testGetMyPedidos()
    {
        $cliente = factory(Cliente::class)->create();
        $token = $cliente->createToken(Str::random(10))->plainTextToken;

        factory(Pedido::class, 2)->create(['cliente_id' => $cliente->id]);
        $response = $this->getJson('/api/auth/v1/meus-pedidos', [
            'Authorization' => "Bearer {$token}"
        ]);

        $response->assertStatus(200)
                 ->assertJsonCount(2, 'data');
    }
}
