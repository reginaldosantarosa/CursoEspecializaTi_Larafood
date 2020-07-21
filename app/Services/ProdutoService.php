<?php

namespace App\Services;

use App\Repositories\Contracts\EmpresaRepositoryInterface;
use App\Repositories\Contracts\ProdutoRepositoryInterface;


class ProdutoService
{
    protected $produtoRepository, $empresaRepository;

    public function __construct(
        ProdutoRepositoryInterface $produtoRepository,
        EmpresaRepositoryInterface $empresaRepository
    ) {
        $this->produtoRepository = $produtoRepository;
        $this->empresaRepository = $empresaRepository;
    }

    public function getProdutosByEmpresaId(string $uuid, array $categorias)
    {
        $empresa = $this->empresaRepository->getempresaByUuid($uuid);
        return $this->produtoRepository->getProdutosByEmpresaId($empresa->id, $categorias);
    }

    public function getProdutoByUuid(string $uuid)
    {
        return $this->produtoRepository->getProdutoByUuid($uuid);
    }

}
