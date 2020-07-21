<?php

namespace App\Repositories\Contracts;

interface AvaliacaoRepositoryInterface
{
    public function novaAvaliacaoPedido(int $idOrder, int $idClient, array $evaluation);
    public function getAvaliacaoByPedido(int $idOrder);
    public function getAvaliacoesByCliente(int $idClient);
    public function getEvaliacaoById(int $id);
    public function getAvaliacaoByClienteIdByPedidoId(int $idOrder, int $idClient);
}
