<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Empresa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoriaTest extends TestCase
{

/*
    public function testGetAllCategoriasEmpresaError()
    {
        $response = $this->getJson('/api/v1/categorias');
       // $response->dump();
        $response->assertStatus(422);
    }

    public function testGetAllCategoriasByEmpresa()
    {
        $empresa = factory(Empresa::class)->create();
        //$empresa->dump();
        $response = $this->getJson("/api/v1/categorias?token_company={$empresa->uuid}");
        //$response->dump();
        $response->assertStatus(200);
    }
*/
    public function testErrorGetCategoriaByEmpresa()
    {
        $categoria = 'fake_value';
        $empresa = factory(Empresa::class)->create();

        $response = $this->getJson("/api/v1/categorias/{$categoria}?token_company={$empresa->uuid}");

        $response->assertStatus(404);
    }


    public function testGetCategoriaByEmpresa()
    {
        $categoria = factory(Categoria::class)->create();
        $empresa = factory(Empresa::class)->create();

        $response = $this->getJson("/api/v1/categorias/{$categoria->uuid}?token_company={$empresa->uuid}");

        $response->assertStatus(200);
    }

}
