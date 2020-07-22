<?php

namespace App\Services;

use App\Models\Plano;
use App\Repositories\Contracts\EmpresaRepositoryInterface;
use Illuminate\Support\Str;

class EmpresaService
{
    private $plano, $data = [];
    private $repository;

    public function __construct(EmpresaRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAllEmpresas(int $per_page)
    {
        return $this->repository->getAllEmpresas($per_page);

    }

    public function getEmpresaByUuid(string $uuid)
    {
        return $this->repository->getEmpresaByUuid($uuid);
    }



    public function make(Plano $plano, array $data)
    {
        $this->plano = $plano;
        $this->data = $data;
        $empresa = $this->storeEmpresa();
        $user = $this->storeUser($empresa);
        return $user;
    }

    public function storeEmpresa()
    {
        $data = $this->data;

        return $this->plano->empresas()->create([
            'cnpj' => $data['cnpj'],
            'nome' => $data['empresa'],
            'email' => $data['email'],
            'url' => Str::kebab($data['empresa']),
            'inscricao' => now(),
            'expira_acesso' => now()->addDays(7),
        ]);
    }

    public function storeUser($empresa)
    {
        $user = $empresa->users()->create([
            'name' => $this->data['name'],
            'email' => $this->data['email'],
            'password' => bcrypt($this->data['password']),
        ]);

        return $user;
    }
}
