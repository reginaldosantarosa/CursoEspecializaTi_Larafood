<?php

namespace App\Repositories\Contracts;

interface ClienteRepositoryInterface
{
    public function createNewCliente(array $data);
    public function getCliente(int $id);
}
