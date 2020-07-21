<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Empresa;
use App\Models\Pedido;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Pedido::class, function (Faker $faker) {
    return [
        'empresa_id' => factory(Empresa::class),
        'identificacao' => uniqid() . Str::random(10),
        'total' => 20,
        'status' => 'aberto',
    ];
});
