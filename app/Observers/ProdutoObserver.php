<?php

namespace App\Observers;
use App\Models\Produto;
use Illuminate\Support\Str;

class ProdutoObserver
{
    public function creating(Produto $produto)
    {
        $produto->flag = Str::kebab($produto->titulo);
        $produto->uuid = Str::uuid();
    }


    public function updating(Produto $produto)
    {
        $produto->flag = Str::kebab($produto->titulo);
    }
}
