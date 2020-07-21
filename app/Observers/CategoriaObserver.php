<?php

namespace App\Observers;

use App\Models\Categoria;
use Illuminate\Support\Str;

class CategoriaObserver
{
    public function creating(Categoria $categoria)
    {
        //$categoria->uuid = Str::uuid();
        $categoria->url = Str::kebab($categoria->nome);
        $categoria->uuid = Str::uuid();
    }


    public function updating(Categoria $categoria)
    {
        $categoria->url = Str::kebab($categoria->nome);
    }
}
