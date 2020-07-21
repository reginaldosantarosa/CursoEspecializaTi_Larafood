<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmpresaResource;
use App\Services\EmpresaService;
use Illuminate\Http\Request;

class EmpresaApiController extends Controller
{
    protected $empresaService;

    public function __construct(EmpresaService $empresaService)
    {
        $this->empresaService = $empresaService;
    }

    public function index(Request $request)
    {
        $per_page = (int) $request->get('per_page', 15);
        $empresas = $this->empresaService->getAllEmpresas($per_page);
        //$empresas = $this->empresaService->getAllEmpresas();

        return EmpresaResource::collection($empresas);
    }

    public function show($uuid)
    {
        if (!$empresa = $this->empresaService->getEmpresaByUuid($uuid)) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return new EmpresaResource($empresa);
    }

}
