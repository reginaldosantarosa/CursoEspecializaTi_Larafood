<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EmpresaFormRequest;
use App\Http\Resources\CategoriaResource;
use App\Services\CategoriaService;
use App\Services\EmpresaService;
use Illuminate\Http\Request;

class CategoriaApiController extends Controller
{
    protected $categoriaService;

    public function __construct(CategoriaService $categoriaService)
    {
        $this->categoriaService = $categoriaService;
    }

    public function categorasByEmpresa(EmpresaFormRequest $request)
    {
        // if (!$request->token_company) {
        //     return response()->json(['message' => 'Token Not Found'], 404);
        // }

        $categorias = $this->categoriaService->getCategoriasByUuid($request->token_company);
         dd($categorias);
        return CategoriaResource::collection($categorias);
    }


    public function show(EmpresaFormRequest $request, $identify)
    {
        if (!$categoria = $this->categoriaService->getCategoriaByUuid($identify)) {
            return response()->json(['message' => 'Category Not Found'], 404);
        }










        return new CategoriaResource($categoria);
    }
}
