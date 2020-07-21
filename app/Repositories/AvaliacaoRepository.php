<?php

namespace App\Repositories;

use App\Models\Avaliacao;
use App\Repositories\Contracts\AvaliacaoRepositoryInterface;

class AvaliacaoRepository implements AvaliacaoRepositoryInterface
{
    protected $entity;

    public function __construct(Avaliacao $avaliacao)
    {
        $this->entity = $avaliacao;
    }

    public function novaAvaliacaoPedido(int $idPedido, int $idCliente, array $avaliacao)
    {
        $data = [
            'cliente_id' => $idCliente,
            'pedido_id' => $idPedido,
            'estrelas' => $avaliacao['estrelas'],
            'comentario' => isset($avaliacao['comentario']) ? $avaliacao['comentario'] : '',
        ];

        return $this->entity->create($data);
    }

    public function getAvaliacaoByPedido(int $idPedido)
    {
        return $this->entity->where('pedido_id', $idPedido)->get();
    }


    public function getAvaliacoesByCliente(int $idCliente)
    {
        return $this->entity->where('cliente_id', $idCliente)->get();
    }

    public function getEvaliacaoById(int $id)
    {
        return $this->entity->find($id);
    }

    public function getAvaliacaoByClienteIdByPedidoId(int $idPedido, int $idCliente)
    {
        return $this->entity
                    ->where('cliente_id', $idCliente)
                    ->where('pedido_id', $idPedido)
                    ->first();
    }
}
