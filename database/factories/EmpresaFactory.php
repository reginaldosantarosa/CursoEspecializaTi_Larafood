<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Empresa;
use App\Models\Plano;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    return [
        'plano_id' => factory(Plano::class),
        'cnpj' => uniqid() . date('YmdHis'),
        'nome' => $faker->unique()->name,
        'email' => $faker->unique()->safeEmail,
    ];
});
