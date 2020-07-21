<?php

namespace App\Repositories\Contracts;

interface EmpresaRepositoryInterface
{
    public function getAllEmpresas(int $per_page);
    public function getEmpresaByUuid(string $uuid);

}
