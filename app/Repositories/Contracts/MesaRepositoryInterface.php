<?php

namespace App\Repositories\Contracts;

interface MesaRepositoryInterface
{
    public function getMesasByEmpresaUuid(string $uuid);
    public function getMesasByEmpresaId(int $idEmpresa);
    public function getMesaByUuid(string $uuid);
}
