<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Restaurant;
use Faker\Generator as Faker;

$factory->define(Restaurant::class, function (Faker $faker) {
    return [
        
        'name' => $faker->sentence(1),
        'email' => $faker->sentence(1),
        'address' => $faker->sentence(1),
        
    ];
});
