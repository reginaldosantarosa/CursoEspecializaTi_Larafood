<?php

namespace App\Repositories;

use App\Repositories\Contracts\MesaRepositoryInterface;
use Illuminate\Support\Facades\DB;

class MesaRepository implements MesaRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'mesas';
    }

    public function getMesasByEmpresaUuid(string $uuid)
    {
        return DB::table($this->table)
            ->join('empresas', 'empresas.id', '=', 'mesas.empresa_id')
            ->where('empresas.uuid', $uuid)
            ->select('mesas.*')
            ->get();
    }

    public function getMesasByEmpresaId(int $idTenant)
    {
        return DB::table($this->table)
                    ->where('empresa_id', $idTenant)
                    ->get();
    }

    public function getMesaByUuid(string $uuid)
    {
        return DB::table($this->table)
                    ->where('uuid', $uuid)
                    ->first();
    }
}
