<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProdutoRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProdutoRepository implements ProdutoRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'produtos';
    }

    public function getProdutosByEmpresaId(int $idEmpresa, array $categorias)
    {
        return DB::table($this->table)
                    ->join('categoria_produto', 'categoria_produto.produto_id', '=', 'produtos.id')
                    ->join('categorias', 'categoria_produto.categoria_id', '=', 'categorias.id')
                    ->where('produtos.empresa_id', $idEmpresa)
                    ->where('categorias.empresa_id', $idEmpresa)
                    ->where(function ($query) use ($categorias) {
                        if ($categorias != [])
                            $query->whereIn('categorias.uuid', $categorias);
                    })
                    ->select('produtos.*')
                    ->get();
    }

    public function getProdutoByUuid(string $uuid)
    {
        return DB::table($this->table)
                    ->where('uuid', $uuid)
                    ->first();
    }
}
