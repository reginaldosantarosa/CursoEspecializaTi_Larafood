<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Plano;
use Faker\Generator as Faker;

$factory->define(Plano::class, function (Faker $faker) {
    return [
        'nome' => $faker->unique()->word,
        'preco' => 89.0,
        'descricao' => $faker->sentence,
    ];
});
