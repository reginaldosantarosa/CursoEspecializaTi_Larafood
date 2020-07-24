<?php

namespace Tests\Feature;

use App\Models\Empresa;
use App\Models\Produto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    /**
     * Error Get All Products
     *
     * @return void
     */
    public function testErrorGetAllProducts()
    {
        $empresa = 'fake_value';

        $response = $this->getJson("/api/v1/produtos?token_company={$empresa}");

        $response->assertStatus(422);
    }

    /**
     * Get All Products
     *
     * @return void
     */
    public function testGetAllProducts()
    {
        $empresa = factory(Empresa::class)->create();

        $response = $this->getJson("/api/v1/produtos?token_company={$empresa->uuid}");

        $response->assertStatus(200);
    }

    /**
     * Produt Not Found (404)
     *
     * @return void
     */
    public function testNotFoundProduct()
    {
        $empresa = factory(Empresa::class)->create();
        $produto = 'fake_value';

        $response = $this->getJson("/api/v1/produtos/{$produto}?token_company={$empresa->uuid}");

        $response->assertStatus(404);
    }

    /**
     * Get Product by Identify
     *
     * @return void
     */
    public function testGetProductByIdentify()
    {
        $empresa = factory(Empresa::class)->create();
        $produto = factory(Produto::class)->create();

        $response = $this->getJson("/api/v1/produtos/{$produto->uuid}?token_company={$empresa->uuid}");

        $response->assertStatus(200);
    }
}
