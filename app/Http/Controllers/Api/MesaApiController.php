<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EmpresaFormRequest;
use App\Http\Resources\MesaResource;
use App\Services\MesaService;
use Illuminate\Http\Request;

class MesaApiController extends Controller
{
    protected $mesaService;

    public function __construct(MesaService $mesaService)
    {
        $this->mesaService = $mesaService;
    }

    public function mesasByEmpresa(EmpresaFormRequest $request)
    {
        // if (!$request->token_company) {
        //     return response()->json(['message' => 'Token Not Found'], 404);
        // }

        $categorias = $this->mesaService->getMesasByUuid($request->token_company);
        return MesaResource::collection($categorias);
    }


    public function show(EmpresaFormRequest $request, $identify)
    {
        if (!$mesa = $this->mesaService->getMesaByUuid($identify)) {
            return response()->json(['message' => 'Table Not Found'], 404);
        }

        return new MesaResource($mesa);
    }


}
