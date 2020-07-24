<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistroTest extends TestCase
{


    public function testErrorCreateNewClient()
    {
        $payload = [
            'nome' => 'Carlos Client',
            'email' => 'carlos@client.com.br',
        ];

        $response = $this->postJson('/api/auth/registro', $payload);
        $response->assertStatus(422);
       //  ->assertExactJson([
      //       'message' => 'The given data was invalid.',
       //      'errors' => [
        //         'password' => [trans('validation.required', ['attribute' => 'password'])]
         //    ]
       //  ]);
    }

    public function testSuccessCreateNewClient()
    {
        $payload = [
            'nome' => 'Carlos Client2',
            'email' => 'carlos@client.com.br',
            'password' => '123456',
        ];

        $response = $this->postJson('/api/auth/registro', $payload);
        $response->assertStatus(201)
                 ->assertExactJson([
                   'data' => [
                        'nome' => $payload['nome'],
                        'email' => $payload['email'],
                   ]
            ]);
    }
}
