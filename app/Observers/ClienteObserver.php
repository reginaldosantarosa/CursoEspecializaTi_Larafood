<?php

namespace App\Observers;

use App\Models\Cliente;
use Illuminate\Support\Str;

class ClienteObserver
{
    public function creating(cliente $cliente)
    {

        $cliente->uuid = Str::uuid();
    }



}
