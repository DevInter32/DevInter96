<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entrada;
use Faker\Generator as Faker;

$factory->define(Entrada::class, function (Faker $faker) {
	$titulo = $faker->sentence;
	$imagen = $faker->randomElement(['androi.jpg','code_php.jpeg','dota.jpg','Rootear-Android.jpg']);
	$tiempo = "5 minutos";
    return [
        'user_id'=>\App\User::all()->random()->id,
        'titulo' => $titulo,
        'descripcion' => $faker->paragraph,
        'img_vista_previa' => $imagen,
        'img_vista_completa' => $imagen,
        'tiempo_lectura' => $tiempo
    ];
});
