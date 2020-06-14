<?php

namespace App\Empresa;

use App\Models\Empresa;

class ManagerEmpresa
{
    public function getEmpresaIdentificacao(): int
    {
        return auth()->user()->empresa_id;
    }

    public function getEmpresa(): Empresa
    {
        return auth()->user()->empresa;
    }

    public function isAdmin(): bool
    {   //verifica se no arquivo dentro de cong/empresa.php
        return in_array(auth()->user()->email, config('empresa.admins'));
    }


}
