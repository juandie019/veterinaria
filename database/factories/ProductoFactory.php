<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Producto::class, function (Faker $faker) {
    return [
        'id_producto' => Str::random(10),
        'nombre' => $faker->name,
        'precio' => 150,
    ];
});
