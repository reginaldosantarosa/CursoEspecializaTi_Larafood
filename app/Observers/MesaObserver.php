<?php

namespace App\Observers;

use App\Models\Categoria;
use App\Models\Mesa;
use Illuminate\Support\Str;

class MesaObserver
{
    public function creating(Mesa $mesa)
    {

        $mesa->uuid = Str::uuid();
    }


}
