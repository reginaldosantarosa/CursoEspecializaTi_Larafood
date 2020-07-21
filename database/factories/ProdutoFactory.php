<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Empresa;
use App\Models\Produto;
use Faker\Generator as Faker;

$factory->define(Produto::class, function (Faker $faker) {
    return [
        'empresa_id' => factory(Empresa::class),
        'titulo' => $faker->unique()->name,
        'descricao' => $faker->sentence,
        'imagem' => 'pizza.png',
        'preco' => 10,
    ];
});
