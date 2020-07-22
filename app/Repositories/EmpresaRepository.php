<?php

namespace App\Repositories;
use App\Models\Empresa;
use App\Repositories\Contracts\EmpresaRepositoryInterface;

class EmpresaRepository implements EmpresaRepositoryInterface
{
    protected $entity;

    public function __construct(Empresa $empresa)
    {
        $this->entity = $empresa;
    }


    public function getAllEmpresas(int $per_page)    {
        return $this->entity->paginate($per_page);
        //return $this->entity->all();
    }

    public function getEmpresaByUuid(string $uuid)
    {
        return $this->entity
            ->where('uuid', $uuid)
            ->first();
    }
}
