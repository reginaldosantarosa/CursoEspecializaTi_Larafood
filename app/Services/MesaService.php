<?php

namespace App\Services;

use App\Repositories\Contracts\EmpresaRepositoryInterface;
use App\Repositories\Contracts\MesaRepositoryInterface;


class MesaService
{
    protected $mesa, $empresaRepository;

    public function __construct(
        MesaRepositoryInterface $mesa,
        EmpresaRepositoryInterface $empresaRepository
    ) {
        $this->mesa = $mesa;
        $this->empresaRepository = $empresaRepository;
    }

    public function getMesasByUuid(string $uuid)
    {
        $empresa = $this->empresaRepository->getEmpresaByUuid($uuid);
        return $this->mesa->getMesasByEmpresaId($empresa->id);
    }

    public function getMesaByUuid(string $uuid)
    {
        return $this->mesa->getMesaByUuid($uuid);
    }
}
