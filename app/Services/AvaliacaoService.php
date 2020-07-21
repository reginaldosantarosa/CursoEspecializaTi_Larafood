<?php

namespace App\Services;

use App\Repositories\Contracts\AvaliacaoRepositoryInterface;
use App\Repositories\Contracts\PedidoRepositoryInterface;
use Illuminate\Http\Request;

class AvaliacaoService
{
    protected $avaliacaoRepository, $pedidoRepository;

    public function __construct(
        AvaliacaoRepositoryInterface $avaliacao,
        PedidoRepositoryInterface $pedidoRepository
    ) {
        $this->avaliacaoRepository = $avaliacao;
        $this->pedidoRepository = $pedidoRepository;
    }

    public function createNovaAvaliacao(string $identificacaoPedido, array $avaliacao)
    {
        $clienteId = $this->getIdCliente();
        $pedido = $this->pedidoRepository->getPedidoByIdentificacao($identificacaoPedido);

        return $this->avaliacaoRepository->novaAvaliacaoPedido($pedido->id, $clienteId, $avaliacao);
    }

    private function getIdCliente()
    {
        return auth()->user()->id;
    }
}
