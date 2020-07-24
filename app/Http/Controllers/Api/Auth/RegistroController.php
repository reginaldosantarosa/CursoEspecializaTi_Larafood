<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreCliente;
use App\Http\Resources\ClienteResource;

use App\Services\ClienteService;
use Illuminate\Http\Request;

class RegistroController extends Controller
{

    protected $clienteService;

    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }


    public function store(StoreCliente $request)
    {
        $cliente = $this->clienteService->createNewCliente($request->all());

        return new ClienteResource($cliente);
    }
}
