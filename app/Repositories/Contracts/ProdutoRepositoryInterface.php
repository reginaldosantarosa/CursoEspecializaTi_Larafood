<?php

namespace App\Repositories\Contracts;

interface ProdutoRepositoryInterface
{
    public function getProdutosByEmpresaId(int $idTenant, array $categories);
    public function getProdutoByUuid(string $uuid);
}
