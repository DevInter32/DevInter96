<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
	$name = $faker->name;
	$now = new DateTime();
    return [
        'name' => $name,
        'role_id' => \App\Rol::all()->random()->id,
        'email' => $faker->unique()->safeEmail,
	    'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
	    'remember_token' => str_random(10),
	    'imagen_perfil' => $faker->randomElement(['androi.jpg','avatar.jpg','JavaScript.png','CSS3.jpg','html5.jpg','pokemon.png','python.jpg']),
	    'email_verified_at'=> $now->format('Y-m-d H:i:s')
    ];
});
