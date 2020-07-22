<?php

namespace App\Services;

use App\Repositories\Contracts\CategoriaRepositoryInterface;
use App\Repositories\Contracts\EmpresaRepositoryInterface;

class CategoriaService
{
    protected $categoriaRepository, $empresaRepository;
    public function __construct(
        CategoriaRepositoryInterface $categoriaRepository,
        EmpresaRepositoryInterface $empresaRepository
    )
    {
        $this->categoriaRepository = $categoriaRepository;
        $this->empresaRepository = $empresaRepository;
    }

    public function getCategoriasByUuid(string $uuid)
    {
        $empresa = $this->empresaRepository->getEmpresaByUuid($uuid);
        return $this->categoriaRepository->getCategoriasByEmpresaId($empresa->id);
    }

    public function getCategoriaByUuid(string $uuid)
    {
        return $this->categoriaRepository->getCategoriaByUuid($uuid);
    }
}
