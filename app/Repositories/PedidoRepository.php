<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Pedido;
use App\Repositories\Contracts\PedidoRepositoryInterface;
use Illuminate\Support\Facades\DB;

class PedidoRepository implements PedidoRepositoryInterface
{
    protected $entity;

    public function __construct(Pedido $pedido)
    {
        $this->entity = $pedido;

    }

    public function createNovoPedido(
        string $identificacao,
        float $total,
        string $status,
        int $empresaId,
        string $comentario = '',
        $clienteId = '',
        $mesaId = ''
    ) {
        $data = [
            'empresa_id' => $empresaId,
            'identificacao' => $identificacao,
            'total' => $total,
            'status' => $status,
            'comentario' => $comentario,
        ];

        if ($clienteId)
            $data['cliente_id'] = $clienteId;
        if ($mesaId)
            $data['mesa_id'] = $mesaId;

        $pedido = $this->entity->create($data);

        return $pedido;
    }

    //verifica se a identificacaoc riada ja existe no banco
    public function getPedidoByIdentificacao(string $identificacao)
    {
        return $this->entity
                        ->where('identificacao', $identificacao)
                        ->first();
    }

    public function registroProdutosPedido(int $pedidoId, array $produtos)
    {
        $pedido = $this->entity->find($pedidoId);
        $pedidoProdutos = [];

        foreach ($produtos as $produto) {
            $pedidoProdutos[$produto['id']] = [
                'quantidade' => $produto['quantidade'],
                'preco' => $produto['preco'],
            ];
        }

        $pedido->produtos()->attach($pedidoProdutos);

        // foreach ($produtos as $produto) {
        //     array_push($pedidoProdutos, [
        //         'pedido_id' => $pedidoId,
        //         'produto_id' => $produto['id'],
        //         'quantidade' => $produto['quantidade'],
        //         'preco' => $produto['preco'],
        //     ]);
        // }

        // DB::table('pedido_produto)->insert($perdidoProdutos);
    }

    public function getPedidosByClienteId(int $idCliente)
    {
        $pedidos = $this->entity
                            ->where('cliente_id', $idCliente)
                            ->paginate();

        return $pedidos;
    }
}
