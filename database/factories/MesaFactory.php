<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Empresa;
use App\Models\Mesa;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Mesa::class, function (Faker $faker) {
    return [
        'empresa_id' => factory(Empresa::class),
        'identificacao' => Str::random(5).uniqid(),
        'descricao' => $faker->sentence,
    ];
});
