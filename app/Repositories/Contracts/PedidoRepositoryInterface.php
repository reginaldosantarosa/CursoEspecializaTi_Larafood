<?php

namespace App\Repositories\Contracts;

interface PedidoRepositoryInterface
{
    public function createNovoPedido(
        string $identificacao,
        float $total,
        string $status,
        int $empresaId,
        string $commentario = '',
        $clienteId = '',
        $mesaId = ''
    );
    public function getPedidoByIdentificacao(string $identificacao);
    public function registroProdutosPedido(int $pedidoId, array $produtos);
    public function getPedidosByClienteId(int $idCliente);
}
