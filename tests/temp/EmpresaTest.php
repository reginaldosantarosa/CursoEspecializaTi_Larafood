<?php

namespace Tests\Feature;

use App\Models\Empresa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmpresaTest extends TestCase
{
    public function testGetAllEmpresas()
    {
        factory(Empresa::class, 1)->create();
        $response = $this->getJson('/api/v1/empresas');
      //  $response->dump();
        $response->assertStatus(200);
                // ->assertJsonCount(1, 'data');
    }
}
