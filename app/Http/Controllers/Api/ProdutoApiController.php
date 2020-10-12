<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EmpresaFormRequest;
use App\Http\Resources\ProdutoResource;
use App\Services\ProdutoService;
use Illuminate\Http\Request;

class ProdutoApiController extends Controller
{
    protected $produtoService;

    public function __construct(ProdutoService $produtoService)
    {
        $this->produtoService = $produtoService;
    }

    public function produtosByEmpresa(EmpresaFormRequest $request)
    {

        $produtos = $this->produtoService->getProdutosByEmpresaId(
            $request->token_company,
            $request->get('categorias', [])
        );

        return ProdutoResource::collection($produtos);
    }

    public function show(EmpresaFormRequest $request, $identify)
    {
        if (!$produto = $this->produtoService->getProdutoByUuid($identify)) {
            return response()->json(['message' => 'Product Not Found'], 404);
        }

        return new ProdutoResource($produto);
    }
}
