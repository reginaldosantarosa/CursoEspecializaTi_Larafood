<?php

namespace App\Empresa;

use App\Models\Empresa;

class ManagerEmpresa
{
    public function getEmpresaIdentificacao()//: int
    {
        return auth()->check() ? auth()->user()->empresa_id : '';
    }

    public function getEmpresa()//: Empresa
    {
        return auth()->check() ?  auth()->user()->empresa: '';
    }

    public function isAdmin(): bool
    {   //verifica se no arquivo dentro de config/empresa.php
        return in_array(auth()->user()->email, config('empresa.admins'));
    }


}
