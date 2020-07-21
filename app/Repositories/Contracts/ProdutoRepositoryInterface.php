<?php

namespace App\Repositories\Contracts;

interface ProdutoRepositoryInterface
{
    public function getProdutosByEmpresaId(int $idEmpresa, array $categorias);
    public function getProdutoByUuid(string $uuid);
}
