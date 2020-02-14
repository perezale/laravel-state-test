<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Camera;
use Faker\Generator as Faker;

$factory->define(Camera::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
