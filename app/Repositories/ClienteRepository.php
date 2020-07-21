<?php

namespace App\Repositories;

use App\Models\Cliente;
use App\Repositories\Contracts\ClienteRepositoryInterface;

class ClienteRepository implements ClienteRepositoryInterface
{
    protected $entity;

    public function __construct(Cliente $cliente)
    {
        $this->entity = $cliente;
    }

    public function createNewCliente(array $data)
    {
        $data['password'] = bcrypt($data['password']);

        return $this->entity->create($data);
    }

    public function getCliente(int $id)
    {

    }
}
