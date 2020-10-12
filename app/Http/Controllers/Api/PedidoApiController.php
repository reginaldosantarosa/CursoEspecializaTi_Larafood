<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePedido;
use App\Http\Resources\PedidoResource;
use App\Services\PedidoService;

class PedidoApiController extends Controller
{
    protected $pedidoService;

    public function __construct(PedidoService $pedidoService)
    {
        $this->pedidoService = $pedidoService;
    }

    public function store(StorePedido $request)
    {
        $pedido = $this->pedidoService->createNovoPedido($request->all());
        return new PedidoResource($pedido);
    }

    public function show($identificacao)
    {    
        if (!$pedido = $this->pedidoService->getPedidoByIdentificacao($identificacao)) {
             
            return response()->json(['message' => 'Not Found'], 404);
        }     

       return new PedidoResource($pedido);
    }

    public function meusPedidos()
    {
        $pedidos = $this->pedidoService->pedidosByCliente();     
        return PedidoResource::collection($pedidos);
    }
}
