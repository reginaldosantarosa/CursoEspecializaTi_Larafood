<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Categoria;
use App\Models\Empresa;
use Faker\Generator as Faker;

$factory->define(Categoria::class, function (Faker $faker) {
    return [
        'empresa_id' => factory(Empresa::class),
        'nome' => $faker->unique()->name,
        'descricao' => $faker->sentence,
    ];
});
