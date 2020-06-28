<?php

namespace App\Observers;

use App\Models\Empresa;
use Illuminate\Support\Str;

class EmpresaObserver
{
    public function creating(Empresa $empresa)
    {
        $empresa->uuid = Str::uuid();
        $empresa->url = Str::kebab($empresa->nome);
    }


    public function updating(Empresa $empresa)
    {
        $empresa->url = Str::kebab($empresa->nome);
    }
}
