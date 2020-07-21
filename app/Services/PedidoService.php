<?php

namespace App\Services;

use App\Repositories\Contracts\PedidoRepositoryInterface;
use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Repositories\Contracts\MesaRepositoryInterface;
use App\Repositories\Contracts\EmpresaRepositoryInterface;
use Illuminate\Http\Request;

class PedidoService
{
    protected $pedidoRepository, $empresaRepository, $mesaRepository, $produtoRepository;

    public function __construct(
        PedidoRepositoryInterface $pedidoRepository,
        EmpresaRepositoryInterface $empresaRepository,
        MesaRepositoryInterface $mesaRepository,
        ProdutoRepositoryInterface $produtoRepository
    ) {
        $this->pedidoRepository = $pedidoRepository;
        $this->empresaRepository = $empresaRepository;
        $this->mesaRepository = $mesaRepository;
        $this->produtoRepository = $produtoRepository;
    }

    public function pedidosByCliente()
    {
        $idCliente = $this->getClienteIdByPedido();

        return $this->pedidoRepository->getPedidosByClienteId($idCliente);
    }

    public function getPedidoByIdentificacao(string $identificacao)
    {
        return $this->pedidoRepository->getPedidoByIdentificacao($identificacao);
    }

    public function createNovoPedido(array $pedido)
    {
        $produtosPedido = $this->getProdutosByPedido($pedido['produtos'] ?? []);

        $identificacao = $this->getIdentificacaoPedido();
        $total = $this->getTotalPedido($produtosPedido);
        $status = 'aberto';
        $empresaId = $this->getEmpresaIdByPedido($pedido['token_company']);
        $comentario = isset($pedido['comentario']) ? $pedido['comentario'] : '';
        $clienteId = $this->getClienteIdByPedido();
        $mesaId = $this->getMesaIdByPedido($pedido['mesa'] ?? '');

        $pedido = $this->pedidoRepository->createNovoPedido(
            $identificacao,
            $total,
            $status,
            $empresaId,
            $comentario,
            $clienteId,
            $mesaId
        );

        $this->pedidoRepository->registroProdutosPedido($pedido->id, $produtosPedido);

        return $pedido;
    }


    //cria um identificdor nico para essa ordem
    private function getIdentificacaoPedido(int $qtyCaraceters = 8)
    {
        $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');

        $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
        $numbers .= 1234567890;

        // $specialCharacters = str_shuffle('!@#$%*-');

        // $characters = $smallLetters.$numbers.$specialCharacters;
        $characters = $smallLetters.$numbers;

        $identificacao = substr(str_shuffle($characters), 0, $qtyCaraceters);


        //veririfca se ja existe um identificador igual ao ue foi gerado!
        if ($this->pedidoRepository->getPedidoByIdentificacao($identificacao)) {
            $this->getIdentificacaoPedido($qtyCaraceters + 1);
        }

        return $identificacao;
    }

    private function getProdutosByPedido(array $produtosPedido): array
    {
        $produtos= [];
        foreach ($produtosPedido as $produtoPedido) {
            $produto = $this->produtoRepository->getProdutoByUuid($produtoPedido['identificacao']);

            array_push($produtos, [
                'id' => $produto->id,
                'quantidade' => $produtoPedido['quantidade'],
                'preco' => $produto->preco,
            ]);
        }

        return $produtos;
    }

    private function getTotalPedido(array $produtos): float
    {
        $total = 0;

        foreach ($produtos as $produto) {
            $total += ($produto['preco'] * $produto['quantidade']);
        }

        return (float) $total;
    }

    private function getEmpresaIdByPedido(string $uuid)
    {
        $empresa = $this->empresaRepository->getEmpresaByUuid($uuid);
        return $empresa->id;
    }

    private function getMesaIdByPedido(string $uuid = '')
    {
        if ($uuid) {
            $mesa = $this->mesaRepository->getMesaByUuid($uuid);

            return $mesa->id;
        }

        return '';
    }

    private function getClienteIdByPedido()
    {
        return auth()->check() ? auth()->user()->id : '';
    }

}
