<?php

namespace App\Services;

use App\Repositories\Contracts\ClienteRepositoryInterface;
use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Repositories\Contracts\EmpresaRepositoryInterface;

class ClienteService
{
    protected $clienteRepository;

    public function __construct(ClienteRepositoryInterface $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function createNewCliente(array $data)
    {
        return $this->clienteRepository->createNewCliente($data);
    }
}
