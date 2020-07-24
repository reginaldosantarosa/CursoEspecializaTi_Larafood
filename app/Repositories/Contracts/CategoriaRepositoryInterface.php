<?php

namespace App\Repositories\Contracts;

interface CategoriaRepositoryInterface
{
    public function getCategoriasByEmpresaUuid(string $uuid);
    public function getCategoriasByEmpresaId(int $idTenant);
    public function getCategoriaByUuid(string $uuid);
}
