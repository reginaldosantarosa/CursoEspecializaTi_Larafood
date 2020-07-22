<?php

namespace App\Repositories;

use App\Repositories\Contracts\CategoriaRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CategoriaRepository implements CategoriaRepositoryInterface
{
    protected $table;

    public function __construct()
    {
        $this->table = 'categorias';
    }

    public function getCategoriasByEmpresaUuid(string $uuid)
    {
        return DB::table($this->table)
            ->join('empresas', 'empresas.id', '=', 'categorias.empresa_id')
            ->where('empresas.uuid', $uuid)
            ->select('categorias.*')
            ->get();
    }

    public function getCategoriasByEmpresaId(int $idTenant)
    {
        return DB::table($this->table)
                    ->where('empresa_id', $idTenant)
                    ->get();
    }

    public function getCategoriaByUuid(string $uuid)
    {
        return DB::table($this->table)
                    ->where('uuid', $uuid)
                    ->first();
    }
}
