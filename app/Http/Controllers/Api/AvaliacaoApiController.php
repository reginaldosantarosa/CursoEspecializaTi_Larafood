<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAvaliacao;
use App\Http\Resources\AvaliacaoResource;
use App\Services\AvaliacaoService;
use Illuminate\Http\Request;


class AvaliacaoApiController extends Controller
{
    protected $avaliacaoService;

    public function __construct(AvaliacaoService $avaliacaoService)
    {
        $this->avaliacaoService = $avaliacaoService;
    }

    public function store(StoreAvaliacao $request)
    {
        $data = $request->only('estrelas', 'comentario');
        $avaliacao = $this->avaliacaoService->createNovaAvaliacao($request->identificacaoPedido, $data);

        return (new AvaliacaoResource($avaliacao))
            ->response()
            ->setStatusCode(201);
    }
}
